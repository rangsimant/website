  $('#datetime').html("Today | "+moment().format('DD MM YYYY'));

 $('#datetime').daterangepicker({
	 	format: 'YYYY-MM-DD',
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        

    });