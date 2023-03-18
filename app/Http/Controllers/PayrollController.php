<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::latest('date')->paginate(10);
        return view('payroll.index', compact('payrolls'));
    }

    public function create()
    {
        $employees = Employee::all();
        $schedules= Schedule::all();
        return view('payroll.create', compact('employees', 'schedules'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'employee_id' => 'required',
                'date' => 'required',
                'salary' => 'required',
            ]);

            // hitung jumlah absent berdasarkan month
            $absent = Attendance::where('employee_id', $request->employee_id)
                ->whereMonth('date', Carbon::parse($request->date)->format('m'))
                ->where('absent', true)
                ->count();

            if($absent == 0)
            {
                return redirect()->route('payroll.index')
                    ->with('error', 'Employee already has payroll in this month.');
            }

            // hitung jumlah terlambat berdasarkan month
            $late = Attendance::where('employee_id', $request->employee_id)
                ->whereMonth('date', Carbon::parse($request->date)->format('m'))
                ->where('late', true)
                ->count();

            $deduction_late = $late * 10000;

            // total salary = (salary / total days) * absent - deduction_late
            $total_salary = ($request->salary/$request->total_days) * $absent;
            $total_salary-= $deduction_late;

            //cek apakah employee sudah ada payroll di bulan yang sama
            $checkPayrollEmployee = Payroll::where('employee_id', $request->employee_id)
                ->whereMonth('date', Carbon::parse($request->date)->format('m'))
                ->first();

            //jika sudah ada payroll di bulan yang sama, maka redirect ke halaman payroll index
            if ($checkPayrollEmployee) {
                return redirect()->route('payroll.index')
                    ->with('error', 'Employee already has payroll in this month.');
            }

            Payroll::create([
                'employee_id' => $request->employee_id,
                'count_absent' => $absent,
                'count_late' => $late,
                'salary' => $request->salary,
                'total_salary' => $total_salary,
                'total_days' => $request->total_days,
                'date' => Carbon::today(),
            ]);

            return redirect()->route('payroll.index')
                ->with('success', 'Payroll created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('payroll.index')
                ->with('error', 'Payroll created failed.');
        }
    }

    public function edit(Payroll $payroll)
    {
        $payroll = Payroll::find($payroll->id);
        return view('payroll.edit', compact('payroll'));
    }

    public function update(Request $request, Payroll $payroll)
    {
        try{
            $request->validate([
                'employee_id' => 'required',
                'salary' => 'required',
            ]);

            // hitung jumlah absent berdasarkan month
            $absent = Attendance::where('employee_id', $request->employee_id)
                ->whereMonth('date', Carbon::parse($request->date)->format('m'))
                ->where('absent', true)
                ->count();


            // hitung jumlah terlambat berdasarkan month
            $late = Attendance::where('employee_id', $request->employee_id)
            ->whereMonth('date', Carbon::parse($request->date)->format('m'))
            ->where('late', true)
            ->count();

            $deduction_late = $late * 10000;

            // total salary = (salary / total days) * absent - deduction_late
            $total_salary = ($request->salary/$request->total_days) * $absent;
            $total_salary-= $deduction_late;

            $payroll = Payroll::find($payroll->id);

            $payroll->update([
            'count_absent' => $absent,
            'count_late' => $late,
            'salary' => $request->salary,
            'total_salary' => $total_salary,
            'total_days' => $request->total_days,
            ]);

            return redirect()->route('payroll.index')
                ->with('success', 'Payroll updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('payroll.index')
                ->with('error', 'Payroll updated failed.');
        }
    }

    public function destroy(Payroll $payroll)
    {
        try{
            $payroll->delete();

            return redirect()->route('payroll.index')
                ->with('success', 'Payroll deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('payroll.index')
                ->with('error', 'Payroll deleted failed.');
        }
    }
}
