@for ($c = 1; $c < 3; $c++)
	{{-- Two loops for Month 1 and 2 --}}
	<div id="<?php if ($c == 1) echo 'month1'; else echo 'month2'; ?>" class="calendar" <?php if ($c == 2) echo 'style="display: none"'; ?>>
		{{-- Span save the month string --}}
		<span class="month{{$c}}" style="display: none">{{ $months[$data->month] }}</span>
		{{--  --}}
		<div class="row clear">
			<div class="col-md-2 col-sm-2 col-xs-2 block head">
				Lunes
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2 block head">
				Martes
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2 block head">
				Miercoles
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2 block head">
				Jueves
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2 block head">
				Viernes
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2 block head">
				Sabado
			</div>
		</div>
		{{-- It represent the number of rows needed and substract the amount --}}
		<?php $last_cell = ($weekDay + $lastMonthDay);
			if ($last_cell < 36) {
			 	$last_cell -= 4;
			 } else {
			 	$last_cell -=5;
			 }?>
		{{-- Six loop for Six rows --}}
		@for ($i = 1; $i < 7; $i++)

			<div class="row clear"> {{-- Start Row --}}
				{{-- Six loops for Six days --}}
				@for ($j = 1; $j < 7; $j++)
					{{-- Count is used as day, start at 0 so now is 1 --}}
					<?php $data->count++; ?> 
					{{-- First week day cant be sunday - 7 --}}
					@if ($data->count == $weekDay && $weekDay != 7)
						<?php $data->day = 1; ?>
					@elseif ($data->count == 7 && $weekDay == 7)
						<?php $data->day = 2; ?>
					@endif
					{{-- Print only in month days --}}
					@if ($data->count < $weekDay || $data->count >= $last_cell)
						{{-- Valid is used for advice if will be printed full or not --}}
						<?php $valid=false; ?>
						@include('calendar._day')
					@else
						<?php $valid=true; ?>
						@include('calendar._day')
						{{-- In the six day jump 2 days --}}
						<?php 
							$data->day++;
							if ($j == 6) {
								$data->day++;
							}
						?>
					@endif
				@endfor
			</div> {{-- Close Row --}}
		@endfor
	</div>
	{{-- RESTART ALL VARIABLES FOR THE NEXT LOOP --}}
	<?php
		$data = new DataCalendar();
		$data->month += 1;
		$weekDay = $data->getWeekDay();
		$lastMonthDay = $data->getLastMonthDay();
		$month_events = $next_month_events;
	 ?>
	{{-- !!! --}}
@endfor
