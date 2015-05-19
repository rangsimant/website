$(window).scroll(function()
{
    if($(window).scrollTop() == $(document).height() - $(window).height())
    {
    	console.log($(window).scrollTop() +" "+ $(document).height() +"-"+ $(window).height())
    	var dateStart = sessionStorage.getItem('dateStart');
		var dateEnd = sessionStorage.getItem('dateEnd');
		var subject = sessionStorage.getItem('subject');

		if (post != false) 
		{
	    	getImage(dateStart, dateEnd, subject, i);
	    	i++;
		}
 
    }
});