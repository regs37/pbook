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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::check()){
            $countries = Country::orderBy('name','ASC')->get();
            return view('home')
            ->with('phonebooks',User::find(Auth::id())->phonebook)
            ->with('countries',$countries);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect('phonebook');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phonebook $phonebook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        //
    }
}
