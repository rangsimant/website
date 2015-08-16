$(function()
{
	
	selectPage();

	$('input[type="checkbox"]').Check({
	    checkboxClass: 'icheckbox_flat-blue',
	    radioClass: 'iradio_square-blue',
	    increaseArea: '20%' // optional
	  });

	$(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }          
      $(this).data("clicks", !clicks);
    });

    $('.subject_page').click(function()
    {
    	if($('input[type="checkbox"]',this).prop( "checked" ) == true)
    	{
    		$(this).iCheck("uncheck");
        $(this).removeClass('subject_active');
    	}
    	else
    	{
    		$(this).iCheck("check");
        $('.subject_page').removeClass('subject_active');
        $(this).addClass('subject_active');
    	}
    })

    function selectPage()
    {
    	$('li[name="page"]').click(function()
		{
			// feedLoading();
            var page_id = $(this).attr('data-page-id');
            $('li[name="page"]').removeClass('active');
            $(this).toggleClass('active');
            alert(page_id);

			setTimeout(function()
			{
				feedLoaded();
			},1000)
		})
    }

    function feedLoading()
    {
    	$('#page-loading').show();
    }

    function feedLoaded()
    {	
    	$('#page-loading').hide();
    }
    
})