$(function()
{
	removeSocial($('#btn-remove-facebook'));

	function removeSocial(btn)
	{
		var baseURL = $('#baseURL').val();
		var csrf = $('#csrf').val();
		var channel = btn.attr('channel');

		btn.click(function()
		{
			$.ajax({
		  		url: baseURL+'/social/remove',
		  		method: 'DELETE',
		  		data: {channel:channel},
		  		headers: { 'X-CSRF-TOKEN': csrf},
		  		success:function(result)
		  		{
		  			console.log(result);
		  		}
		  	})
		})
	}
})