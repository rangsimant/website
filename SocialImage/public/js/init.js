
var i=1;
var post;
var ajax_getPost;

var channel = $('#channel').val();

$('a.logout').click(function()
{
	clearSession();
});

function clearSession()
{
	var i = sessionStorage.length;
	while(i--) {
		var key = sessionStorage.key(i);
		sessionStorage.removeItem(key);
	}
}