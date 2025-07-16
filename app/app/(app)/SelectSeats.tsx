import React, { useState } from "react";
import {
  View,
  Text,
  ScrollView,
  Pressable,
  SafeAreaView,
  TouchableOpacity,
} from "react-native";
import { clsx } from "clsx";
import { Route } from "expo-router/build/Route";
import { router } from "expo-router";

const ROWS = 10;
const LAST_ROW = 11;
const COLUMNS = ["A", "B", "C", "D", "E"];
const LAST_ROW_COLUMNS = ["A", "B", "C", "D", "E", "F"];

type Seat = {
  id: string;
  row: number;
  col: string;
  state: "available" | "booked";
};

const generateSeats = (): Seat[] => {
  const seats: Seat[] = [];

  for (let row = 1; row <= ROWS; row++) {
    for (let col of COLUMNS) {
      seats.push({
        id: `${row}${col}`,
        row,
        col,
        state: Math.random() < 0.15 ? "booked" : "available",
      });
    }
  }

  // Row 11 (6 seats)
  for (let col of LAST_ROW_COLUMNS) {
    seats.push({
      id: `${LAST_ROW}${col}`,
      row: LAST_ROW,
      col,
      state: Math.random() < 0.15 ? "booked" : "available",
    });
  }

  return seats;
};

export default function SeatSelector() {
  const [seats, setSeats] = useState(generateSeats());
  const [selected, setSelected] = useState<Set<string>>(new Set());

  const toggleSeat = (id: string) => {
    const seat = seats.find((s) => s.id === id);
    if (!seat || seat.state === "booked") return;

    const newSelected = new Set(selected);
    newSelected.has(id) ? newSelected.delete(id) : newSelected.add(id);
    setSelected(newSelected);
  };

  const availableCount = seats.filter((s) => s.state === "available").length;

  return (
    <SafeAreaView className="flex-1 bg-white px-4 pt-6">
      <View className="items-center mb-4">
        <Text className="text-xl font-bold mb-1">Select Your Seat</Text>
        <Text className="text-sm text-gray-500 mb-3">
          {availableCount} seats available
        </Text>

        {/* Legend moved here */}
        <View className="flex-row justify-center space-x-6">
          <View className="flex-row items-center space-x-2">
            <View className="w-4 h-4 bg-green-500 rounded" />
            <Text className="text-xs">Available</Text>
          </View>
          <View className="flex-row items-center space-x-2">
            <View className="w-4 h-4 bg-red-500 rounded" />
            <Text className="text-xs">Booked</Text>
          </View>
          <View className="flex-row items-center space-x-2">
            <View className="w-4 h-4 bg-blue-500 rounded" />
            <Text className="text-xs">Selected</Text>
          </View>
        </View>
      </View>

      <ScrollView
        className="flex-1"
        contentContainerStyle={{ alignItems: "center", paddingBottom: 20 }}
      >
        {/* Rows 1–10 */}
        {Array.from({ length: ROWS }, (_, i) => {
          const row = i + 1;
          return (
            <View key={row} className="flex-row items-center mb-3">
              <Text className="w-6 text-center mr-2 text-sm">{row}</Text>
              {COLUMNS.map((col, idx) => {
                const seat = seats.find((s) => s.row === row && s.col === col);
                if (!seat) return null;

                const isSelected = selected.has(seat.id);

                const seatClass = clsx(
                  "w-10 h-10 mx-1 rounded-md items-center justify-center",
                  seat.state === "booked"
                    ? "bg-red-500"
                    : isSelected
                    ? "bg-blue-500"
                    : "bg-green-500"
                );

                return (
                  <React.Fragment key={seat.id}>
                    {/* Add aisle space between B and C */}
                    {idx === 2 && <View className="w-6" />}
                    <Pressable
                      className={seatClass}
                      onPress={() => toggleSeat(seat.id)}
                    >
                      <Text className="text-lg">🪑</Text>
                    </Pressable>
                  </React.Fragment>
                );
              })}
            </View>
          );
        })}

        {/* Row 11 - 6 seats */}
        <View className="flex-row items-center mb-4">
          <Text className="w-6 text-center mr-2 text-sm">{LAST_ROW}</Text>
          {LAST_ROW_COLUMNS.map((col) => {
            const seat = seats.find(
              (s) => s.row === LAST_ROW && s.col === col
            );
            if (!seat) return null;

            const isSelected = selected.has(seat.id);

            const seatClass = clsx(
              "w-10 h-10 mx-1 rounded-md items-center justify-center",
              seat.state === "booked"
                ? "bg-red-500"
                : isSelected
                ? "bg-blue-500"
                : "bg-green-500"
            );

            return (
              <Pressable
                key={seat.id}
                className={seatClass}
                onPress={() => toggleSeat(seat.id)}
              >
                <Text className="text-lg">🪑</Text>
              </Pressable>
            );
          })}
        </View>
      </ScrollView>

    </SafeAreaView>
  );
}


