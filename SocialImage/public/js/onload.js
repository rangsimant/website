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
	var baseURL = $('#baseURL').val();
	$('div.loading, div.loading-bg').show();
	ajax_getPost = $.ajax({
		url: baseURL+"/getImage",
		type: "POST",
		data: {dateStart:dateStart, dateEnd:dateEnd, subject:subject, offset:offset, channel:channel},
		dataType: "json",
		success: function(image)
		{
			post = image;
			if (post.length > 0) 
			{
				$.each(post, function(key)
				{	
					var post_created_time = moment(post[key].post_created_time).format("DD MMMM YYYY (HH:mm)");
					var title = post[key].author_displayname;
					if (title.length > 20) 
						title = jQuery.trim(title).substring(0, 20).split(" ").slice(0, 20).join(" ") + "...";

					if (post[key].post_channel == 'facebook')
						var channel = '<img src="'+baseURL+'/image/facebook.png" class="channel">';
					else if(post[key].post_channel == 'instagram')
						var channel = '<img src="'+baseURL+'/image/instagram.png" class="channel">';

					var html = '<div class="col-md-2 col-sm-2 col-xs-2 thumbnail" title="'+moment(post[key].post_created_time).format("HH:mm")+'">' +
								'<div class="text-center">'+channel+' <span>'+title+'</span></div>'+
											'<a href="'+post[key].post_link+'" target="_blank">' +
												'<img src="'+post[key].post_url_image+'">' +
											 '</a>' +
										 '<span class="">'+
										 	''+post_created_time+''+
											 '<a href="'+post[key].post_url_image+'" class="download text-right" target="_blank" download="'+post[key].author_displayname+'.jpeg">' +
												 '<i class="fa fa-cloud-download" data-toggle="tooltip" data-placement="top" title="Download"></i>' +
											 '</a>'+
										 '</span>'+
									'</div>';
					$('div.nodata').hide();
					$('.content').append(html);
					$('[data-toggle="tooltip"]').tooltip();
				})
			}
			else if ($('.content > div').length <= 0)
				$('div.nodata').show();
			
			console.log($('.content > div').length);
			$('div.loading, div.loading-bg').hide();
		}
	});
}