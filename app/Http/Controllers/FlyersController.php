<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Helpers;
use Illuminate\Support\Facades\Session;

class FlyersController extends Controller
{

   /* public function show(Flyer $flyer)
    {
       return view('flyers.show',compact('flyer'));
    }*/

    public function show( $zip,$street)
    {
      
        $flyer= Flyer::locatedAt($zip,$street)->first();
        return view('flyers.show',compact('flyer'));
       
    }
    public function create()
    {
        Session::flash('success', 'Dobro dosli');
        // flash("hello");
        return view('flyers.create');
    }

    public function store(FlyerRequest $request)
    {
        //validacija preko request
        $flyer=Flyer::create($request->all()); 
   // flashing message
      flash('Flyers successfully created');
       // return redirect()->back();
        return back()->with('success','Item created successfully!');
    }
}
