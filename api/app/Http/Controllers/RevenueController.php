<?php

namespace App\Http\Controllers;

use App\Models\Cancellation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\cancellationService;
use App\Services\bookingService;
use App\Models\bookings;
use App\Models\Schedule;
use Carbon\Carbon;

class RevenueController extends Controller
{
    protected $cancellationP;
    protected $bookingAmount;
    public function __construct(cancellationService $cancellation, bookingService $bookingAmount)
    {
        $this->cancellationP = $cancellation;
        $this->bookingAmount = $bookingAmount;
    }

    public function view(){
        $user = Auth::user()->id;

        $percentage = $this->cancellationP->getWeeklyCancellationPercentage();
        $percentageAmount = $this->bookingAmount->getWeeklyTotalAmountPercentage();
        $data = $this->bookingAmount->getWeeklyAmountData();

        $total = bookings::where('status', 'confirmed')
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->sum('amount');
        $cancellation = Cancellation::where('user_id', $user)->count();

        $now = Carbon::now();
        $startOfThisWeek = $now->copy()->startOfWeek();
        $endOfThisWeek = $now->copy()->endOfWeek();         
        $startOfLastWeek = $now->copy()->subWeek()->startOfWeek();
        $endOfLastWeek = $now->copy()->subWeek()->endOfWeek();

                $completedTrips = Schedule::Where('status', 'completed')
                    ->whereBetween('created_at', [$startOfThisWeek, $endOfThisWeek])
                    ->count();

                $lastWeekCompleted = Schedule::Where('status', 'completed')
                    ->whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])
                    ->count();

                $percentageChange = $lastWeekCompleted > 0
                    ? (($completedTrips - $lastWeekCompleted) / $lastWeekCompleted) * 100
                    : ($completedTrips > 0 ? 100 : 0);

                $percentageChange = round($percentageChange, 2);

        return view('revenue',['cancellation'=>$cancellation,
                                           'percentage'=>$percentage,
                                           'total'=>$total,
                                           'percentageAmount'=>$percentageAmount,
                                           'data'=>$data,
                                           'percentageChange'=>$percentageChange
                                        ]);
    }
}
