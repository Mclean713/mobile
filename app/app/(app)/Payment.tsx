import React, { useState } from "react";
import { SafeAreaView, View, Text, Pressable, TouchableOpacity } from "react-native";

type PaymentMethod = {
  id: string;
  label: string;
  icon: React.ReactNode; 
};

const paymentMethods: PaymentMethod[] = [
  { id: "card", label: "Credit/Debit Card", icon: <Text>💳</Text> },
  { id: "paypal", label: "Airtel Money", icon: <Text>🅿️</Text> },
  { id: "applepay", label: "TMN", icon: <Text>🍎</Text> },
];

export default function PaymentMethodScreen() {
  const [selectedId, setSelectedId] = useState<string | null>(null);

  return (
    <SafeAreaView className="flex-1 bg-white px-6 pt-8">
      <Text className="text-2xl font-bold mb-6">Choose Payment Method</Text>

      <View className="space-y-4 flex-1">
        {paymentMethods.map(({ id, label, icon }) => {
          const isSelected = selectedId === id;
          return (
            <Pressable
              key={id}
              className={`flex-row items-center p-4 rounded-lg border ${
                isSelected ? "border-blue-600 bg-blue-100" : "border-gray-300"
              }`}
              onPress={() => setSelectedId(id)}
            >
              <View className="mr-4">{icon}</View>
              <Text className="text-lg">{label}</Text>
            </Pressable>
          );
        })}
      </View>

      <TouchableOpacity
        disabled={!selectedId}
        className={`py-4 rounded-lg mb-4 ${
          selectedId ? "bg-blue-600" : "bg-gray-400"
        }`}
        onPress={() => {
          if (selectedId) {
            alert(`You selected: ${selectedId}`);
          }
        }}
      >
        <Text className="text-center text-white text-lg font-semibold">
          Continue
        </Text>
      </TouchableOpacity>
    </SafeAreaView>
  );
}
