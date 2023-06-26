<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Rest;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function createStart()
    {
        $attendance = new Attendance();
        $attendance->user_id = auth()->user()->id; 
        $attendance->work_date = date('Y-m-d'); 
        $attendance->start_time = date('H:i:s'); 
        $attendance->save();
        return redirect('/dashboard');
    }

    public function createEnd()
    {
        $attendance = Attendance::where('user_id', auth()->user()->id)
        ->latest()
        ->first();

    if ($attendance) {
        $attendance->end_time = date('H:i:s'); 
        $attendance->save(); 
    }

    return redirect('/dashboard'); 
    }

    public function breakStart(Request $request)
    {
        $attendance = attendance::where('work_date',date('Y-m-d'))->where('user_id', auth()->user()->id)->latest()->first();
        $breakStartTime = date('H:i:s');
        $rest = new Rest();
        $rest->attendance_id = $attendance->id;
        $rest->break_start_time = $breakStartTime;
        $rest->save();

        return redirect('/dashboard');
    }

    public function breakEnd(Request $request)
    {
    $attendance = attendance::where('work_date', date('Y-m-d'))
        ->where('user_id', auth()->user()->id)
        ->latest()
        ->first();

    $latestRest = Rest::where('attendance_id', $attendance->id)
        ->latest()
        ->first();

    if ($latestRest && $latestRest->break_end_time === null) {
        $latestRest->break_end_time = date('H:i:s');
        $latestRest->save();
    }

    return redirect('/dashboard');
    }


public function showAttendance($date = null)
{
    if ($date) {
        $selectedDate = Carbon::parse($date)->toDateString();
    } else {
        $selectedDate = Carbon::now()->toDateString();
    }
    $dt = Carbon::parse($selectedDate);
    //$dt = Carbon::now();
    //$date = $dt->toDateString();
    //$now = Carbon::now();
    $now_format = $dt->format('Y-m-d');
    

    $attendances = Attendance::where('work_date', $date)->paginate(5);
    $data = [];

    foreach ($attendances as $attendance) {
        $start = Carbon::parse($attendance->start_time);
        $end = Carbon::parse($attendance->end_time);
        $diff = $end->diff($start);
        $hours = $diff->h;
        $minutes = $diff->i;
        $seconds = $diff->s;
        $workHours = $hours . ":" . $minutes . ":" . $seconds;

        $rests = Rest::where('attendance_id', $attendance->id)->get();

        $breakHours = [];
        foreach ($rests as $rest) {
            $start = Carbon::parse($rest->break_start_time);
            $end = Carbon::parse($rest->break_end_time);
            $diff = $end->diff($start);
            $hours = $diff->h;
            $minutes = $diff->i;
            $seconds = $diff->s;
            $breakHours[] = $hours . ":" . $minutes . ":" . $seconds;
        }

        array_push($data, [
            'attendance' => $attendance,
            'workHours' => $workHours,
            'breakHours' => $breakHours,
        ]);
    }
    $previousDate = Carbon::parse($selectedDate)->subDay()->toDateString();
    $nextDate = Carbon::parse($selectedDate)->addDay()->toDateString();


    return view('layouts.attendance',compact('data','now_format','previousDate', 'nextDate'),['attendances' => $attendances]);
}

    public function index() {
        $selectedDate = Carbon::now()->toDateString();
        $dt = Carbon::parse($selectedDate);
        $now_format = $dt->format('Y-m-d');
        $attendances = Attendance::where('work_date', $selectedDate)->paginate(5);
        return view('dashboard',compact('now_format'));

    }

    

}