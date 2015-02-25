<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use App\Event;

class CalendarController extends Controller {

	public function index()
	{
		$month = date('n'); // CHANGE THIS TO date('n');
		$year = date("Y");

		function getMonthEvents($mymonth, $myyear)
		{
			$lastMonthDay = date("d", (mktime(0, 0, 0, $mymonth+1, 1, $myyear) - 1));

			$first_date = date("Y-m-d", (mktime(0, 0, 0, $mymonth, 1, $myyear)));
			$last_date = date("Y-m-d", (mktime(0, 0, 0, $mymonth, $lastMonthDay, $myyear)));

			$results = Event::select('events.id', 'events.date', 'events.title', 'events.grade',
										  'events.description', 'types.name', 'types.link')
				->join('types', function($join) use ($first_date, $last_date)
					{
						$join->on('events.type_id', '=', 'types.id')
							 ->where('events.date', '>=', $first_date)
						 	 ->where('events.date', '<=', $last_date);
					})
				->orderBy('events.date')
				->get();

			return $results;
		}

		$month_events = getMonthEvents($month, $year);

		$month+=1;

		$next_month_events = getMonthEvents($month, $year);

		return view("calendar.calendar", compact('month_events', 'next_month_events'));
	}

	public function redirect()
	{
		return redirect('calendar');
	}
}
