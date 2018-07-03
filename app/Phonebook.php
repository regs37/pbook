<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phonebooks';


    protected $fillable = [
		'user_id',
		'first_name',
		'last_name',
		'phone_number',
		'mobile_number',
		'street',
		'city',
		'country_id',
		'state_id',
	];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function country(){
		return $this->belongsTo('App\Country');
	}

	public function state(){
		return $this->belongsTo('App\State');
	}
	

	public function getFirstNameAttribute($value){
        return ucfirst($value);
    }

    public function getLastNameAttribute($value){
        return ucfirst($value);
    }

    public function updatePhonebook($request,$id)
	{
        $phonebook = $this->find($id);
        $phonebook->user_id = Auth::id();
        $phonebook->first_name = $request['first_name'];
        $phonebook->last_name = $request['last_name'];
        $phonebook->phone_number = $request['phone_number'];
        $phonebook->mobile_number = $request['mobile_number'];
        $phonebook->street = $request['street'];
        $phonebook->city = $request['city'];
        $phonebook->country_id = $request['country'];
        $phonebook->state_id = $request['state'];
        $phonebook->save();
        return 1;
	}
}
