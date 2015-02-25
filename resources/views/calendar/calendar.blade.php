@extends('calendar.layout')

@section('header')
	<div class="menu">
		<button id="menu_btn" class="btn btn-default">Leyenda</button>
	</div>
@stop

<?php 
/**
* Data class
*/
class DataCalendar
{
	public $day;
	public $count;
	public $month;
	public $year;
	public $actualDay;

	function __construct()
	{
		$this->day = 0;
		$this->count = 0;
		$this->month = date('n'); // CHANGE THIS TO date('n');
		$this->year = date('Y');
		$this->actualDay = date('j');
	}

	public function getWeekDay()
	{
		$result = date("w", mktime(0, 0, 0, $this->month, 1, $this->year));
		if ($result == 0) {
			$result = 7;
		}

		return $result;
	}

	public function getLastMonthDay()
	{
		return date("d", (mktime(0, 0, 0, $this->month+1, 1, $this->year)-1));
	}
}

$data = new DataCalendar();
$weekDay = $data->getWeekDay();
$lastMonthDay = $data->getLastMonthDay();

$months = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 

$days = array(1=>"Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

?>

@section('content')		

	<div class="col-md-12 col-lg-10 rightfix">
		<div class="title">
			<h3>CALENDARIO DE ACTIVIDADES -</h3>
			<h3><span id='month-change'>{{ $months[$data->month] }}</span><span> {{ $data->year }}</span></h3>
			<div class="navigation">
				<button class="btn btn-default shedule-btn">Horario</button>
				<button class="btn btn-default back">Mes Anterior</button>
				<button class="btn btn-default next">Mes Siguiente</button>
			</div>
		</div>

		<div id="calendar">
			@include('calendar.calendar_layout')
		</div>
		
		<div id="shedule-box" style="display: none">
			@include('shedule.shedule')
		</div>
	</div>

@include('calendar.sidebar_layout')

@stop

