<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employee = Employee::orderBy('updated_at', 'desc')->paginate(10);
            return view('employee',compact('employee'));
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
    public function employeesAjaxPage(){
        try {
            $employee = Employee::orderBy('updated_at', 'desc')->paginate(10);
            return view('ajax.employees_ajax',compact('employee'));
        } catch (Throwable $e) {
            abort(404);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $route = route('employee.store');
            $company = Company::orderBy('updated_at', 'desc')->get();
            return view('employee_form',compact('company','route'));
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try{
            $request->request->remove('_token');
            Employee::create($request->all());
            return redirect()->route('employee.index');
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        try{
            $route = '';
            $company = Company::orderBy('updated_at', 'desc')->get();
            return view('employee_form',compact('employee','company','route'));
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {

        try{
            $route = route('employee.update',$employee);
            $company = Company::orderBy('updated_at', 'desc')->get();
            return view('employee_form',compact('employee','company','route'));
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        try{
            $request->request->remove('_token');
            $request->request->remove('_method');
            Employee::where('id', $employee->id)
                ->update($request->all());
            return redirect()->route('employee.index');
        } catch (Throwable $e) {
            abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try{
            $employee->delete();
            return redirect()->route('employee.index');
        } catch (Throwable $e) {
            abort(404);
        }
    }
}
