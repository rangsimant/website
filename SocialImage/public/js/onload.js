$(function()
{
	var dateStart = moment().format('YYYY-MM-DD');
	var dateEnd = moment().format('YYYY-MM-DD');

	if (sessionStorage.getItem('label') != null) 
	{
		label = sessionStorage.getItem('label');
		$('#reportrange > span').html(label);
	}
	else
	{
		sessionStorage.setItem('label','Today | '+moment().format('DD MMMM YYYY'));
	}

	if (sessionStorage.getItem('dateStart') == null && sessionStorage.getItem('dateEnd') == null)
	{
		sessionStorage.setItem('dateStart',dateStart);
		sessionStorage.setItem('dateEnd',dateEnd);
	}
	else
	{
		dateStart = sessionStorage.getItem('dateStart');
		dateEnd = sessionStorage.getItem('dateEnd');	
	}

	if (sessionStorage.getItem('subject') != null)
	{
		var subject = sessionStorage.getItem('subject');
		$('a.dropdown-toggle').html(subject+" <span class='caret'></span>");
	}
	else
	{
		var subject = $.trim($('a.dropdown-toggle').text());
		sessionStorage.setItem('subject',subject);
	}

	getImage(dateStart, dateEnd, subject, 0)
})

function getImage(dateStart, dateEnd, subject, offset)
{
	$('div.loading').show();
	$.ajax({
		url: dateStart+"/"+dateEnd+"/"+subject+"/"+offset+"/getImage",
		type: "GET",
		dataType: "json",
		success: function(image)
		{
			if (image.length > 0) 
			{
				$.each(image, function(key)
				{	
					var post_created_time = moment(image[key].post_created_time).format("DD MMMM YYYY (HH:mm)");

					var html = '<div class="col-md-2 col-sm-2 col-xs-2 thumbnail" title="'+moment(image[key].post_created_time).format("HH:mm")+'">' +
								'<div class="text-center"><span>'+image[key].author_displayname+'</span></div>'+
										'<a href="'+image[key].post_link+'" target="_blank">' +
											'<img src="'+image[key].post_url_image+'">' +
										 '</a>' +
										 '<span class="">'+
										 	''+post_created_time+''+
											 '<a href="'+image[key].post_url_image+'" class="download text-right" target="_blank" download="'+image[key].author_displayname+'.jpeg">' +
												 '<i class="fa fa-cloud-download" title="Download"></i>' +
											 '</a>'+
										 '</span>'+
									'</div>';
					$('div.content').append(html);
				})
			}
			else
			{
				$('div.content').append('No Data!');
			}
			$('div.loading').hide();
		}
	});
}