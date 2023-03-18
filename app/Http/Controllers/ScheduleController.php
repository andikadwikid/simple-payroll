<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('schedule.create', compact('employees'));
    }

    public function store(Request $request){
        try{
            $request->validate([
                'employee_id' => 'required',
                'start_time' => 'required',
                'start_date' => 'required',
            ]);

            $check = Schedule::where('employee_id', $request->employee_id)->first();
            if ($check) {
                return redirect()->route('schedule.index')->with('error', 'Schedule already exists.');
            }

            Schedule::create([
                'employee_id' => $request->employee_id,
                'start_time' => Carbon::parse($request->start_time),
                'start_date' => Carbon::parse($request->start_date),
            ]);

            return redirect()->route('schedule.index')->with('success', 'Schedule created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('schedule.index')->with('error', 'Schedule creation failed.');
        }
    }

    public function edit(Schedule $schedule)
    {
        $employees = Employee::all();
        return view('schedule.edit', compact('schedule', 'employees'));
    }

    public function update(Request $request,Schedule $schedule){
        try{
            $schedule->update([
                'employee_id' => $request->employee_id,
                'start_time' => Carbon::parse($request->start_time),
                'start_date' => Carbon::parse($request->start_date),
            ]);

            return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('schedule.index')->with('error', 'Schedule update failed.');
        }
    }

    public function destroy(Schedule $schedule)
    {
        try{
            $schedule->delete();
            return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('schedule.index')->with('error', 'Schedule deletion failed.');
        }
    }
}
