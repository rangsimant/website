$('.dropdown-menu>li>a').click(function()
{
	var subject = $(this).text();

	$('.content').html('');
	$('a.dropdown-toggle').html(subject+" <span class='caret'></span>");
	
	sessionStorage.setItem('subject',subject);

	var dateStart = sessionStorage.getItem('dateStart');
	var dateEnd = sessionStorage.getItem('dateEnd');
	var subject = sessionStorage.getItem('subject');

	getImage(dateStart, dateEnd, subject, 0);
	i=1;
})