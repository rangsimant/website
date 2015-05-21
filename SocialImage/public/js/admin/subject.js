$('#subject').change(function()
{
	var subject = $(this).val();
	var tbody = $('table > tbody');
	var title_page = $('#page_txt');
	var total_page = $('#total_page');

	title_page.text("PAGE "+ subject.toUpperCase());
	tbody.html('');

	$.ajax({
		method: "POST",
		url: baseURL+"/getPageList",
		data: { subject: subject.toLowerCase() },
		dataType: 'json',
		success: function( account )
		{
			total_page.text("Page total = "+ account.length);
			$.each(account, function(key)
			{
				if (account[key].account_channel == 'facebook')
					var channel_image = '<img src="'+baseURL+'/image/facebook.png" class="channel">';
				else if(account[key].account_channel == 'instagram')
					var channel_image = '<img src="'+baseURL+'/image/instagram.png" class="channel">';

				var html = "<tr>"+
							"<td>"+(key+1)+"</td>" +
							"<td>"+account[key].account_id_user+"</td>" +
							"<td>"+account[key].account_username+"</td>" +
							"<td class='text-center'>"+channel_image+" "+account[key].account_channel+"</td>" +
							"<td class='text-center'>"+account[key].account_available+"</td>" +
						"</tr>";

				tbody.append(html);
			})
		}
	})

})