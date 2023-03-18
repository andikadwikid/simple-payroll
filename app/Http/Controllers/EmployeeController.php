<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('divisions')->latest()->paginate(10);

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('employee.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'division_id' => 'required',
        ]);

        try{
            Employee::create($request->all());
            return redirect()->route('employee.index')->with('success', 'Employee created successfully');
        }catch(Exception $e){
            return redirect()->route('employee.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Employee $employee)
    {
        $divisions = Division::all();
        return view('employee.edit', compact('employee', 'divisions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'division_id' => 'required',
        ]);

        try{
            $employee->update($request->all());
            return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
        }catch(Exception $e){
            return redirect()->route('employee.index')->with('error', $e->getMessage());
        }
    }

    public function destroy(Employee $employee)
    {
        try{
            $employee->delete();
            return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
        }catch(Exception $e){
            return redirect()->route('employee.index')->with('error', $e->getMessage());
        }
    }
}
