<?php

namespace App;

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
}
