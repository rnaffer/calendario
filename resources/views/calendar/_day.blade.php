@if ($valid == true)

<?php  
	$today_events = new  Illuminate\Database\Eloquent\Collection;
	// Extract the events of the day
	foreach ($month_events as $month_event) {
		if (date('j', strtotime($month_event->date)) == $data->day) {
			$today_events->add($month_event);
		}
	}
	// Take the week number of the month
	$wday = date("w", mktime(0, 0, 0, $data->month, $data->day, $data->year));
	// Cant be sunday
	if ($wday == 0) {
		$day_string = "";
	} else {
		$day_string = $days[$wday] . ' ' . $data->day . ' de '. $months[$data->month]. ' de ' . $data->year;
	}
?>
	<div class="col-md-2 col-sm-2 col-xs-2 block">
		<a href="#" tabindex="0" class="pop" role="button" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="<?php if ($wday == 6) echo 'left'; elseif ($wday == 1) echo 'right'; else echo 'top'; ?>" title="<p>{{ $day_string }}</p> " data-content="<div class='detail'>
			@if ($today_events)
				<ul>
					@foreach ($today_events as $event)
						<li><img src='img/{{ $event->link }}'' alt=''><a href='#' data-toggle='modal' data-target='.detail-info-{{ $event->id }}'>{{ $event->title }}</a></li>
					@endforeach
				</ul>
			@endif
		</div>">
			<div class="day">
				<div class="number">
					<p>{{ $data->day }}</p>
				</div>
				<div class="info">
					@if ($today_events)
						<ul>
							@foreach ($today_events as $event)
								<li><img src="img/{{ $event->link }}" alt=""></li>
							@endforeach
						</ul>
					@endif
				</div>
			</div>
		</a>
		@if ($today_events)
			@foreach ($today_events as $event)
				<div class="modal fade detail-info-{{ $event->id }}">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<img src="/img/{{ $event->link }}"><h4 class="modal-title">{{ $event->title }}</h4>
							</div>
							<div class="modal-body">
								<h4>Fecha:</h4>
								<ul>
									<li>{{ $day_string }}</li>
								</ul>
								<h4>Contenido:</h4>
								{!! $event->description !!}
								<h4>Ponderacion:</h4>
								<ul>
									<li>{{ $event->grade }}%</li>
								</ul>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			@endforeach
		@endif
	</div>
@else
	<div class="col-md-2 col-sm-2 col-xs-2 block">
		<div class="day"></div>
	</div>
@endif