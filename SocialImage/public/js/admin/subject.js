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
				html = "<tr>"+
							"<td>"+(key+1)+"</td>" +
							"<td>"+account[key].account_id_user+"</td>" +
							"<td>"+account[key].account_username+"</td>" +
							"<td>"+account[key].account_channel+"</td>" +
							"<td>"+account[key].account_available+"</td>" +
						"</tr>";

				tbody.append(html);
			})
		}
	})

})