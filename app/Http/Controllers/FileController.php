<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::paginate(10);
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //only active companies are shown in dowpdown list
        $companies = Company::where('is_active', '=', 1)->get();
        return view('files.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $store = new File;
        if($request->File('image')){
            $imgName = '';
            if($file = $request->File('image'))
            {
                //dd($imgName);
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'JPG';
                $folderName = '/uploads/image';
                $contentPath = public_path() . '/' . $folderName;
                $imgName = $fileName;
                $file->move($contentPath, $imgName);
            }
        $store->name = strip_tags($imgName);
        }
        $store->company_id = $request->company_id;
        $store->description = $request->description;
        $store->save();
        return redirect()->route('file.index')->with('msg', 'File saved sucessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::FindOrFail($id);
        return view('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::latest()->get();
        $file = File::FindOrFail($id);
        return view('files.edit', compact('companies', 'file'));
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
        $update = File::FindOrFail($id);
        if($request->File('image')){
            $imgName = '';
            if($file = $request->File('image'))
            {
                //dd($imgName);
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'JPG';
                $folderName = '/uploads/image';
                $contentPath = public_path() . '/' . $folderName;
                $imgName = $fileName;
                $file->move($contentPath, $imgName);
            }
        $update->name = strip_tags($imgName);
        }
        $update->company_id = $request->company_id;
        $update->description = $request->description;
        $update->update();
        return redirect()->route('file.index')->with('msg', 'File saved sucessfully.');
    }

    public function delete($id)
    {
        $file = File::FindOrFail($id);
        $file->delete();
        return back()->with('msg', 'File deleted sucessfully.');
    }

    public function trash()
    {
        $trashed = File::onlyTrashed()->paginate(10);
        return view('files.trash', compact('trashed'));
    }

    public function restore($id)
    {
        $fileTrashed = File::onlyTrashed()->findOrFail($id);
        $fileTrashed->restore($fileTrashed);
        return back()->with('msg', 'Item restored.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = File::onlyTrashed()->findOrFail($id);

        /*foreach($destroy->documents() as $document) {
            if(file_exists(public_path('/uploads/image/' . $document->name))) {
                unlink(public_path('/uploads/image/' . $document->name));
            }
        }*/


        //$subpage->documents()->delete();
        $destroy->forcedelete($destroy);
        //unlink(public_path() .  '/uploads/image';
        return back()->with('msg', 'Item permanent deleted.');
    }
}
