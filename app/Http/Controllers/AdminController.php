<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Event;
use App\Type;

class AdminController extends Controller {
	
	public function __construct()
		{
			$this->middleware('auth');
		}

	public function index()
	{	
		$initial_date = date("Y-m-d", (mktime(0, 0, 0, date('n'), 1, date('Y'))));

		$events = Event::select('events.id', 'events.date', 'events.title', 'events.grade',
										  'events.description', 'types.name', 'types.link')
			->join('types', function($join) use ($initial_date)
				{
					$join->on('events.type_id', '=', 'types.id')
						 ->where('events.date', '>=', $initial_date);
				})
			->orderBy('events.date')
			->get();

		$types = Type::get();

		return view("admin.dashboard", compact('events', 'types'));
	}

	public function add()
	{
		return view("admin.add");
	}

}
