<?php

namespace App\Http\Controllers;

use App\Flyer;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Helpers;
use App\Http\Flash;
use App\Http\Requests\ChangeFlyerRequest;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FlyersController extends Controller
{
    //isproban scope
    public function index()
    {
        // $flash = new Flash();
        // $flash->message('Hej');
        // dd(Session::get('flash_message'));
        //dd(proba());
        $flyers = Flyer::cheep()->orderBy('price')->get();
        return view('pages.index', compact('flyers'));
    }

    public function getall()
    {
        $flyers=auth()->user()->flyers;
       return view('flyers.all',compact('flyers'));
    }


    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view('flyers.show', compact('flyer'));
    }
    public function create()
    {
        Session::flash('success', 'Dobro dosli');
        return view('flyers.create');
    }

    public function store(FlyerRequest $request)
    {
       // $flyer = Flyer::create($request->all());
      $flyer=auth()->user()->publish(new Flyer($request->all()));
      //auth()->user()->publish( $flyer );
        //  Session::flash('Flyers successfully created');
      //  return back()->with('success', 'Item created successfully!');

        //prva opcija
      //  return redirect($flyer->zip .'/'. str_replace('','-',$flyer->street));
        //druga opcija preko path

       //return redirect($flyer->path());
        //treca opcija preko helper funkcije
      
        return redirect(flyer_path($flyer))->with('success', 'Item created successfully!');
        
    }

    public function addPhoto($zip, $street, ChangeFlyerRequest $request)
    {
        // public function addPhoto($zip, $street,Request $request)
        //  {
        // validacija prebacena u ChangeFlyerRequest
        // $this->validate($request, [
        //     'photo' => 'required|mimes:jpg,jpeg,png,bmp'

        // ]);
        // 
        // if($flyer->user_id!==auth()->user()->id){ ovaj red radi
        //     // if(!$flyer->ownedBy(Auth::user())){
        //         return $this->unauthorized($request);
        //     }

        // opcija broj dva

        //   if(!$this->userCreatedFlyer($request)){
        //     return $this->unauthorized($request);
        //   }
        $photo = $this->makePhoto($request->file('photo'));
        $flyer = Flyer::locatedAt($zip, $street);
        $flyer->addPhoto($photo);
    }

    public function unauthorized(Request $request)
    {
        if ($request->ajax()) {
            return response(['message' => 'No way'], 403);
        }
        flash('No way');
        return redirect('/');
    }

    public function userCreatedFlyer($request)
    {
        return Flyer::where([
            'zip' => $request->zip,
            'street' => $request->street,
            'user_id' => $this->user->id,
        ]);
    }
    public function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())->move($file);
    }
    public function destroy($id)
    {
        $photo=Photo::findOrFail($id);
        $photo->delete();
        return back();
    }
}
