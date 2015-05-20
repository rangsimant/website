$(function() {
    var dateStart;
    var dateEnd;
    var subject;

    $('#reportrange span').html('Today | '+moment().format('DD MMMM YYYY'));
    if (sessionStorage.getItem('dateStart') != null && sessionStorage.getItem('dateEnd') != null)
    {
        dateStart = moment(sessionStorage.getItem('dateStart'));
        dateEnd = moment(sessionStorage.getItem('dateEnd'));   
    }
    else
    {
        dateStart = moment();
        dateEnd = moment();
    }
 
    $('#reportrange').daterangepicker({
        format: 'MM/DD/YYYY',
        startDate: dateStart,
        endDate: dateEnd,
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: { days: 60 },
        showDropdowns: true,
        showWeekNumbers: false,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        drops: 'down',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-primary',
        cancelClass: 'btn-default',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Cancel',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    }, function(start, end, label) {
        // console.log(start.toISOString(), end.toISOString(), label);
        $('.content').html('');

        dateStart = start.format('YYYY-MM-DD');
        dateEnd = end.format('YYYY-MM-DD');
        subject = $.trim($('a.dropdown-toggle').text());

        sessionStorage.setItem('dateStart',dateStart);
        sessionStorage.setItem('dateEnd',dateEnd);

        getImage(dateStart, dateEnd, subject, 0);
        i=1;
        label = labelDatepicker(start, end, label);

        sessionStorage.setItem('label',label);

        $('#reportrange span').html(label);
    });

    function labelDatepicker(start, end, label)
    {
        if (label == 'Today' || label == "Yesterday") 
        {
            label = label+" | "+start.format('DD MMMM YYYY');
        }
        else if (label == 'This Month' || label == "Last Month")
        {
            label = start.format('MMMM');
        }
        else
        {
            label = label+" | "+start.format('DD MMMM YYYY')+ " - " +end.format('DD MMMM YYYY');
        }
        return label;
    }

});