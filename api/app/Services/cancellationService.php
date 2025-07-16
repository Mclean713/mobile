<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\bookings;
use App\Models\Manifest;
use Carbon\Carbon;

class cancellationService
{
    public function getWeeklyCancellationPercentage(): float
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $total = bookings::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

        if ($total === 0) {
            return 0.0;
        }

        $cancelled = bookings::where('status', 'cancelled')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        return round(($cancelled / $total) * 100, 2);
    }
}
