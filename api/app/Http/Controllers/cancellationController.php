<?php

namespace App\Http\Controllers;
use App\Models\Manifest;
use Illuminate\Http\Request;
use App\Services\cancellationService;
class cancellationController extends Controller
{
    protected $cancellationP;

    public function __construct(cancellationService $cancellation)
    {
        $this->cancellationP = $cancellation;
    }

    public function showWeeklyCancellation()
    {
        $percentage = $this->cancellationP->getWeeklyCancellationPercentage();

        return response()->json([
            'percentage' => $percentage
        ]);
    }

}