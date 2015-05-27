  $('.since, #ig_datetime').html("Today | "+moment().format('DD MM YYYY'));

 $('.since, #ig_datetime').daterangepicker({
	 	format: 'YYYY-MM-DD',
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        

    });