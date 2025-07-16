import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { View, Text, TextInput, FlatList, TouchableOpacity, ActivityIndicator, RefreshControl, Alert } from 'react-native';
import { useLocalSearchParams, useRouter } from 'expo-router';
import axiosInstance from '@/config/axiosConfig';
import { useSession } from '@/context/AuthContext';

interface Bus {
  id: string;
  name: string;
  time: string;
  price: number;
  route: string;
  availableSeats?: number;
}

interface SearchParams {
  origin: string;
  destination: string;
  date: string;
  [key: string]: string | string[];
}

const SearchBuses: React.FC = () => {
  
  const params = useLocalSearchParams<SearchParams>();
  const { origin, destination, date } = params;
  const router = useRouter();

  const [searchQuery, setSearchQuery] = useState<string>('');
  const [buses, setBuses] = useState<Bus[]>([]);
  const [filteredBuses, setFilteredBuses] = useState<Bus[]>([]);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);
  const [refreshing, setRefreshing] = useState<boolean>(false);

  const fetchBuses = async (): Promise<void> => {
    try {
      setLoading(true);
      setError(null);
      
      const response = await axiosInstance.get('/api/buses', {
        params: {
          origin,
          destination,
          date
        },
       
      });

      setBuses(response.data);
      setFilteredBuses(response.data);
    } catch (err) {
      if (axios.isAxiosError(err)) {
        setError(err.response?.data?.message || err.message || 'Network Error');
      } else {
        setError('An unexpected error occurred');
      }
      console.error('Error fetching buses:', err);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchBuses();
  }, [origin, destination, date]);

  useEffect(() => {
    if (searchQuery.trim() === '') {
      setFilteredBuses(buses);
    } else {
      const lower = searchQuery.toLowerCase();
      setFilteredBuses(
        buses.filter((bus) => 
          bus.name.toLowerCase().includes(lower) ||
          bus.route.toLowerCase().includes(lower)
        )
      );
    }
  }, [searchQuery, buses]);

  const onRefresh = async (): Promise<void> => {
    setRefreshing(true);
    await fetchBuses();
    setRefreshing(false);
  };

  const handleSelect = (busId: string): void => {

    const selectedBus = buses.find(bus => bus.id === busId);



    if (!selectedBus) return;

    router.push({
      pathname: '/SelectSeats',
      params: { numberValue: '14' } });
  };

  if (loading && !refreshing) {
    return (
      <View className="flex-1 justify-center items-center">
        <ActivityIndicator size="large" color="#0000ff" />
        <Text className="mt-4">Loading buses...</Text>
      </View>
    );
  }

  if (error) {
    return (
      <View className="flex-1 justify-center items-center">
        <Text className="text-red-500 mb-2">Error: {error}</Text>
        <TouchableOpacity 
          className="bg-blue-500 px-4 py-2 rounded"
          onPress={fetchBuses}
        >
          <Text className="text-white">Retry</Text>
        </TouchableOpacity>
      </View>
    );
  }

  return (
    <View className="flex-1 bg-white p-4">
      <Text className="text-xl font-bold mb-2">
        Buses from {origin} to {destination} on {date}
      </Text>
     
      <TextInput
        placeholder="Search by bus name or route..."
        value={searchQuery}
        onChangeText={setSearchQuery}
        className="border border-gray-300 rounded-md px-4 py-2 mb-4"
      />

      <FlatList<Bus>
        data={filteredBuses}
        keyExtractor={(item) => item.id}
        refreshControl={
          <RefreshControl
            refreshing={refreshing}
            onRefresh={onRefresh}
          />
        }
        renderItem={({ item }) => (
          <TouchableOpacity
            className="border border-gray-200 rounded-md p-4 mb-3 shadow-sm bg-white"
            onPress={() => handleSelect(item.id)}
          >
            <Text className="text-lg font-semibold">{item.name}</Text>
            <Text className="text-gray-600">Departure: {item.time}</Text>
            <Text className="text-gray-600">Route: {item.route}</Text>
            <Text className="text-blue-600 font-bold mt-1">Mkw {item.price}</Text>
            {item.availableSeats !== undefined && (
              <Text className="text-green-600 mt-1">
                {item.availableSeats} seats available
              </Text>
            )}
          </TouchableOpacity>
        )}
        ListEmptyComponent={
          <Text className="text-center text-gray-500 mt-10">
            {buses.length === 0 ? 'No buses available for this route' : 'No buses match your search'}
          </Text>
        }
      />
    </View>
  );
};

export default SearchBuses;