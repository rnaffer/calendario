<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
* event class
*/
class Type extends Eloquent
{
	protected $fillable = [
		'link', 'name'
	];
}