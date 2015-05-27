var baseURL = $('#baseURL').val();


$('#addAccount').click(function()
{
	
	var count_input = $('.account').length;
	if (count_input < 10) 
	{
		var html = 	'<div class="form-inline" style="margin-top:5px;">' +
					'<div class="form-group">' +
						'<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>' +
						'<div class="input-group">' +
							'<div class="input-group-addon"><i class="fa fa-facebook"></i></div>' +
							'<input type="text" class="form-control account" id="account" name="account[]" placeholder="ID or Name">' +
						'</div>' +
					'</div> ' +

					'<div class="form-group">' +
						'<label class="sr-only" for="datetime">Amount (in dollars)</label>' +
						'<div class="input-group">' +
							'<div class="input-group-addon"><i class="fa fa-calendar"></i></div>' +
							'<input type="text" class="form-control since" id="since" name="since[]" placeholder="YYYY-MM-DD">' +
						'</div>' +
					'</div>' +
				'</div>';
		$('#facebook_page .group').append(html);
		$('.since').daterangepicker({
		 	format: 'YYYY-MM-DD',
	        singleDatePicker: true,
	        showDropdowns: true
	    });
	}

})