<?php

namespace App\Http\Controllers;
use App\Table;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class TablesController extends Controller
{
    public function index()
    {
        
        $tables = Table::all();
        return View ('table', compact('tables'));
    }

    
}

/*

public function search(){
        $q = Input::get ( 'q' );
        $user = Table::where('objective','LIKE','%'.$q.'%')->orWhere('country','LIKE','%'.$q.'%')->orWhere('action_item','LIKE','%'.$q.'%')->get();
        if(count($user) > 0)
            return view('search')->withDetails($user)->withQuery ( $q );
        else 
            return view ('search')->withMessage('No Details found. Try to search again !');
    }


*/