<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $company = Company::orderBy('updated_at', 'desc')->paginate(10);
            return view('company',compact('company'));
        } catch (Throwable $e) {
            report($e);
            abort(404);
            return false;
        }
    }

    public function companiesAjaxPage(){
        try {
            $company = Company::orderBy('updated_at', 'desc')->paginate(10);
            return view('ajax.companies_ajax',compact('company'));
        } catch (Throwable $e) {
            report($e);
            abort(404);
            return false;
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $route = route('companies.store');
            return view('company_form',compact('route'));
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        try{
            if($request->logo){
                $imageName = time().'.'.$request->logo->extension();
                $request->logo->move(storage_path('app/public'), $imageName);
                $request = new Request($request->all());
                $request->merge(['logo' => \Request::root() .'/storage/app/public/'.$imageName]);
            }
            $request->request->remove('_token');
            Company::create($request->all());
            return redirect()->route('companies.index');
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        try{
            $route = '';
            return view('company_form',compact('company','route'));
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        try{
            $route = route('companies.update',$company);
            return view('company_form',compact('company','route'));
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        try{
            if($request->logo){
                $imageName = time().'.'.$request->logo->extension();
                $request->logo->move(storage_path('app/public'), $imageName);
                $request = new Request($request->all());
                $request->merge(['logo' => \Request::root() .'/storage/app/public/'.$imageName]);
            }
            $request->request->remove('_token');
            $request->request->remove('_method');
            Company::where('id', $company->id)
                ->update($request->all());
            return redirect()->route('companies.index');
        } catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        try{
            $company->delete();
            return redirect()->route('companies.index');
        } catch (Throwable $e) {
            abort(404);
        }
    }
}
