<?php

namespace App\Http\Controllers;

use Request;
use App\Company;
//use App\File;
//use App\Company;

class SearchController extends Controller
{
	public function search(Request $request)
	{
	    $q = Request::get('q');
	    $company = Company::where('company','LIKE','%'.$q.'%')->get();
	    if(count($company) > 0)
	        return view('search')->withDetails($company)->withQuery($q );
	    else return view ('search')->withMessage('No Details found. Try to search again !');
	}
}
