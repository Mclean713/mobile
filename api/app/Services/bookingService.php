<?php

namespace App\Services;

use App\Models\bookings;
use Carbon\Carbon;

class bookingService
{
     public function getWeeklyTotalAmountPercentage(): float
    {
            $startOfWeek = now()->startOfWeek();
            $endOfWeek = now()->endOfWeek();


            $totalAmount = bookings::where('status', 'confirmed')->sum('amount');

            if ($totalAmount === 0) {
                return 0.0;
            }


            $weeklyAmount = bookings::where('status', 'confirmed')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->sum('amount');

  
            return round(($weeklyAmount / $totalAmount) * 100, 2);
   }

public function getWeeklyAmountData(int $weeks = 4): array
{
    $data = [];

    for ($i = $weeks - 1; $i >= 0; $i--) {
        $start = Carbon::now()->startOfWeek()->subWeeks($i);
        $end = Carbon::now()->endOfWeek()->subWeeks($i);

        $total =bookings::where('status', 'confirmed')
            ->whereBetween('created_at', [$start, $end])
            ->sum('amount');

        $weekLabel = 	$start->format('M j') . '–' . $end->format('M j');

        $data[] = [
            'week' => $weekLabel,
            'total' => round($total, 2),
        ];
    }

    return $data;
}


}
