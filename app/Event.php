<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $table = 'events';
    protected $fillable = ['title', 'description', 'startDate', 'endDate', 'organizerID'];
    protected $hidden = ['remember_token'];


}
