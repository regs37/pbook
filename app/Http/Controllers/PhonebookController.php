<?php

namespace App\Http\Controllers;

use App\Phonebook;
use App\Country;
use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    
    public function index() {
        if (Auth::check()){
            $countries = Country::orderBy('name','ASC')->get();
            return view('home')
            ->with('phonebooks',User::find(Auth::id())->phonebook)
            ->with('countries',$countries);
        }
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number'  => 'required|numeric',
            'street'        => 'required',
            'city'          => 'required',
            'country'       => 'required',
            'state'         => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('phonebook')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            if (Auth::check()){
                $c = Phonebook::create([
                    'user_id'       => Auth::id(),
                    'first_name'    => $request['first_name'],
                    'last_name'     => $request['last_name'],
                    'mobile_number' => $request['mobile_number'],
                    'phone_number'  => $request['phone_number'],
                    'street'        => $request['street'],
                    'city'          => $request['city'],
                    'country_id'    => $request['country'],
                    'state_id'      => $request['state']
                ]);
            }
        }
        return redirect('phonebook')->with('success', 'Successfully created a new contact');
    }

    public function edit($id){
        $phonebook = Phonebook::find($id)->first();
        return view('edit-phonebook')
        ->with("phonebook",$phonebook)
        ->with("id",$id)
        ->with("countries",Country::orderBy('name','ASC')->get());
    }

    public function update(Request $request,$id){
        $phonebook = new Phonebook();
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number'  => 'required|numeric',
            'street'        => 'required',
            'city'          => 'required',
            'country'       => 'required',
            'state'         => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('edit/phonebook/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $phonebook->updatePhonebook($request,$id);
        }
        return redirect('edit/phonebook/'.$id)->with('success', 'New support ticket has been updated!!');
    }
}
