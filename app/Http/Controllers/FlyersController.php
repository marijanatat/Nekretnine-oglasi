<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Helpers;


class FlyersController extends Controller
{
    public function create()
    {
        return view('flyers.create');
    }

    public function store(FlyerRequest $request)
    {
        //validacija preko request
        $flyer=Flyer::create($request->all());
    
 // flashing message
      flash('Flyers successfully created');
        return redirect()->back();
    }
}
