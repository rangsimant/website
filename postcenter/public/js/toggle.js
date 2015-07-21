$(function() {

	$('#fb_status_check_all').on('change', function()
	{
		var fb_status = $('input[name="fb_status"]');
		var fb_status_all = $(this).prop('checked');
		var status = 'off';
		if (fb_status_all) 
		{
			status = 'on';
		}

		fb_status.each(function()
		{
			$(this).bootstrapToggle(status);
		})
	})

	$('input[name="fb_status"]').change(function() {

		var baseURL = $('#baseURL').val();
		var page_id = $(this).val();
		var csrf = $('#csrf').val();
		var status = 'off';

		if ($(this).prop('checked') == true) 
		{
			status = 'on';
		}
		$.ajax({
	  		url: baseURL+'/page/status',
	  		method: 'POST',
	  		data: {page_id:page_id,status:status},
	  		headers: { 'X-CSRF-TOKEN': csrf},
	  		success:function(result)
	  		{
	  			console.log(result);
	  			// toggleAll('#fb_status_check_all', 'input[name="fb_status"]');
	  		}
	  	})

	})

	function toggleAll(checkAll, check)
	{
		var count_element_check = $(check).length;
		var count_status_check = $(check+':checked').length;
		var status = 'off';

		if (count_element_check == count_status_check) 
		{
			status = 'on';
		}

		$(checkAll).bootstrapToggle(status);
	}
})