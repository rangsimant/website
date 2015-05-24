$('#subject').change(function()
{
	var subject = $(this).val();
	var tbody = $('#page_list > tbody');
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
			var status;
			var channel_image;
			$.each(account, function(key)
			{
				if (account[key].account_available == 'open')
					status = 'status-open';
				else
					status = 'status-close';

				if (account[key].account_channel == 'facebook')
					channel_image = '<img src="'+baseURL+'/image/facebook.png" class="channel">';
				else if(account[key].account_channel == 'instagram')
					channel_image = '<img src="'+baseURL+'/image/instagram.png" class="channel">';

				var html = "<tr class='text-center'>"+
							"<td>"+(key+1)+"</td>" +
							"<td class='text-left'>"+account[key].account_id_user+"</td>" +
							"<td class='text-left'>"+account[key].account_username+"</td>" +
							"<td class='text-center'>"+channel_image+"</td>" +
							"<td class='text-center "+status+"'>"+account[key].account_available+"</td>" +
						"</tr>";

				tbody.append(html);
			})
		}
	})

})