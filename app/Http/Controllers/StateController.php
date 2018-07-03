<?php

namespace App\Http\Controllers;

use App\State;
use App\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getStates(Country $id){
    	// echo $id;
    	// echo Country::find($id)->first()->state;
        return json_encode(Country::find($id)->first()->state);
    }   

}
