<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
* event class
*/
class Event extends Eloquent
{
	protected $fillable = [
		'title', 'date', 'grade', 'type_id', 'description'
	];
}