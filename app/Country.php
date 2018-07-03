<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    protected $fillable = [
		'name',
	];

    public function phonebook(){
    	return $this->hasMany('App\Phonebook');
    }

    public function state(){
        return $this->hasMany('App\State');
    }
}
