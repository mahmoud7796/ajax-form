<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){
          $countries['data'] = Country::orderby('name') ->select('id', 'name')-> get();
        return view('ajax.index', compact('countries'));
    }

    public function getState($countryId = 0){
        $states['data'] = State::orderby('name') ->select('id', 'name')-> where('country_id',$countryId)->get();
        return response()->json($states);

    }

    public function indexSer(){
       return $users = User::get() ;
        return view('index', compact('users'));
    }

    public function services(){

    }
}
