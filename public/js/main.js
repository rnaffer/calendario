jQuery(document).ready(function($) {
	$('.pop').popover();

	$('.back').addClass('disabled');

	var month1 = $('.month1').html();
	var month2 = $('.month2').html();

	$('.next').click(function(event) {
		$('#month1').fadeOut('fast', function() {
			$('#month2').fadeIn('fast', function() {
				$('#month-change').text(month2);
				$('.next').addClass('disabled');
				$('.back').removeClass('disabled');
			});
		});	
	});

	$('.back').click(function(event) {
		$('#month2').fadeOut('fast', function() {
			$('#month1').fadeIn('fast', function() {
				$('#month-change').text(month1);
				$('.back').addClass('disabled');
				$('.next').removeClass('disabled');
			});
		});	
	});

	$('.shedule-btn').click(function(event) {
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('#shedule-box').fadeToggle('fast', function() {
				$('#calendar').fadeToggle('fast');
				$('.title h3:first-child').text('CALENDARIO DE ACTIVIDADES');
			});
		} else {
			$(this).addClass('active');
			$('#calendar').fadeToggle('fast', function() {
				$('.title h3:first-child').text('HORARIO DE CLASES');
				$('#shedule-box').fadeToggle('fast');
			});
		};
		
	});
});

$('#menu_btn').focusin(function(event) {
	$('.legend').fadeIn('fast');
});

$('#menu_btn').focusout(function(event) {
	$('.legend').fadeOut('fast');
});

$('#send').click(function(){
    $(location).attr('href', 'mailto:reyesnaffer@gmail.com?subject='
                             + encodeURIComponent("This is my subject")
                             + "&body=" 
                             + encodeURIComponent($('#feed').val())
    );

    alert('Gracias!');

});