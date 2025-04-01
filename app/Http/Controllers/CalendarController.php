<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;

class CalendarController extends Controller
{

    public function register(Request $request)
    {
        $request->validate(['year'=>'required']);
        $this->registerCalendar($request->year);
        return redirect()->route('dashboard')->withToastSuccess('Calendar Registered');
    }

    public function index()
    {
        return view('calendar.index');
    }

    public function synch($yearId)
    {
        Year::find($yearId)->synchronizeData();
        return redirect()->route('calendar.index')->withSuccess('Data Synchronized');
    }

    Public function registerCalendar($year) {
        
        $newYear = Year::firstOrCreate(['name'=>$year]);
        
        // Loop through all 12 months
        for ($month = 1; $month <= 12; $month++) {
            $monthName = date('F', mktime(0, 0, 0, $month, 1, $year)); // Get the full month name
            $startDate = "$year-$month-01"; // Start date of the month
            $endDate = date("Y-m-t", strtotime($startDate)); // Get the last date of the month
            $daysInMonth = date('t', strtotime($startDate)); // Number of days in the month
    
            // Register the month
            $newMonth = $newYear->months()->firstOrCreate([
                'name'=> $monthName,
                'start' => $startDate,
                'end' => $endDate,
                'days' => $daysInMonth
            ]);
    
            // register the weeks of the month
            $weekCount = 1;
            $currentDate = strtotime($startDate);
            $dayOfWeek = date('w', $currentDate); // Get the starting day of the month
            
            // Loop through days and group them into weeks
            while ($currentDate <= strtotime($endDate)) {
                $newWeek = $newMonth->weeks()->firstOrCreate([
                    'name' => $this->getWeekName($weekCount),
                    'week_no' => $weekCount,
                    'start' => date('Y-m-d', $currentDate),
                    'end' => date('Y-m-d', strtotime('+6 days', $currentDate))
                ]);
                
                // Generate each week
                for ($i = 0; $i < 7; $i++) {
                    if ($currentDate <= strtotime($endDate)) {
                        $newWeek->days()->firstOrCreate([
                            'name' => date('l', $currentDate),
                            'date' => date('Y-m-d', $currentDate)
                        ]);
                    }
                    $currentDate = strtotime('+1 day', $currentDate);
                }
                $weekCount++;              
            }
        }
        
    }
    
    public function getWeekName($weekCount) {
        $weekNames = ['first', 'second', 'third', 'fourth', 'fifth'];
        return $weekNames[$weekCount - 1] ?? 'fifth'; // Default to fifth if more than 5 weeks
    }
     
    
}
