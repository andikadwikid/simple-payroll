<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Schedule;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $attendances = Attendance::latest('date')->paginate(10);
        
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        $divisions = Division::all();
        $schedules = Schedule::all();
        return view('attendance.create', compact('employees', 'divisions', 'schedules'));
    }

    public function checkin(Request $request){
        try{
            $request->validate([
                'employee_id' => 'required',
                'division_id' => 'required'
            ]);

            $timeNow = Carbon::now()->format('H:i:s');

            $employee = Employee::findOrFail($request->employee_id);
            $division = Division::findOrFail($request->division_id);
            $attendance = Attendance::where('employee_id', $employee->id)->whereDate('date', Carbon::today())->first();

            $checkEmployee = Employee::where('id', $employee->id)->where('division_id', $division->id)->first();

            // cek apakah employee ada di divisi yang sama
            if(!$checkEmployee){
                return redirect()->route('attendance.create')->with('error', 'Employee not found');
            }

            // cek apakah employee ada di schedule
            $checkEmployeeSchedule = Schedule::where('employee_id', $employee->id)->first();

            // jika tidak ada di schedule, maka redirect ke halaman attendance create
            if(!$checkEmployeeSchedule){
                return redirect()->route('attendance.create')->with('error', 'Employee schedule not found');
            }

            // cek apakah employee sudah checkin
            if($attendance){
                return redirect()->route('attendance.create')->with('error', 'Employee has been checked in');
            }

            // jam kerja employee
            $work_time = $employee->schedules->start_time;

            // cek apakah employee terlambat
            if($timeNow > $work_time){
                $late = true;
            }
            $attendance = Attendance::create([
                'employee_id' => $employee->id,
                'checkin_time' => $timeNow,
                'late' => $late,
                'absent' => false,
                'date' => Carbon::today()
            ]);
            return redirect()->route('attendance.index')->with('success', 'Employee has been checked in');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function checkout(Attendance $attendance){
        try{
            $timeNow = Carbon::now()->format('H:i:s');

            $attendance->checkout_time = $timeNow;
            $attendance->absent = true;
            $attendance->save();

            return redirect()->route('attendance.index')->with('success', 'Employee has been checked out');
        } catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
