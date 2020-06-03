<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(15);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|unique:companies|max:255',
            'phone' => 'max:13',
        ]);

        $company = new company;
        $company->company = $request->company;
        $company->type = $request->type;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->owner = $request->owner;
        $company->shareholders = $request->shareholders;
        $company->description = $request->description;
        $company->nepalidate = $request->nepalidate;
        $company->is_active = $request->publish;
        $company->save();
        return redirect()->route('company.show', $company->id)->with('msg', 'Congratulation! New Company Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = company::findOrFail($id);
        $file = File::where('company_id', '=', $company->id)->get();
        //dd($file);
        return view('company.show', compact('company', 'file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Company::findOrFail($id);
        $update->company = $request->company;
        $update->type = $request->type;
        $update->address = $request->address;
        $update->phone = $request->phone;
        $update->owner = $request->owner;
        $update->shareholders = $request->shareholders;
        $update->description = $request->description;
        $update->nepalidate = $request->nepalidate;
        $update->is_active = $request->publish;
        $update->update();
        return redirect()->route('company.show', $id)->with('msg', 'Congratulation! New Company Created');
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('company.index')->with('msg', 'Item deleted sucessfully');
    }

    public function trash()
    {
        $trashed = Company::onlyTrashed()->paginate(15);
        return view('company.trash', compact('trashed'));
    }

    public function restore($id)
    {
        $companytrashed = Company::onlyTrashed()->findOrFail($id);
        $companytrashed->restore($companytrashed);
        return back()->with('msg', 'Item restored sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Company::onlyTrashed()->findOrFail($id);
        $destroy->forcedelete($destroy);
        return back()->with('msg', 'Item permanent deleted.');
    }
}
