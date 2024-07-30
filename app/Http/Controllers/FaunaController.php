<?php

namespace App\Http\Controllers;

use App\Animal\Mammals;
use App\Animal\Poultry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class FaunaController extends Controller
{
    public function index()
    {
        $mammals = new Mammals();
        $poultry = new Poultry();

        echo $mammals->greeting();
        echo "<br>";
        echo $poultry->greeting();
    }

    public function logGreetings()
    {
        $date = Carbon::now()->format('Y-m-d');
        $logFileName = Arr::last(explode("\\", get_class())) . "-{$date}.log";
        $mammals = new Mammals();
        $poultry = new Poultry();

        Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$logFileName}"),
        ])->info($mammals->greeting());

        Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$logFileName}"),
        ])->info($poultry->greeting());

        return "Greetings have been logged.";
    }
}
