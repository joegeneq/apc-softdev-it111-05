<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>

<script>

    $(document).ready(function() {

        /*$('#calendar').fullCalendar({
            defaultDate: '2015-02-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                  "title": "Presentation at the temple",
                  "url": "/",
                  "start": "2015-02-02"
                },
                {
                  "title": "Saint Blaise",
                  "url": "/",
                  "start": "2015-02-03"
                }
            ]
        });*/

        //Code that calls php file

        $('#calendar').fullCalendar({
            defaultDate: '2015-01-01',
            header: {
                left:   'prev, ',
                center: 'title',
                right:  'next',
            },
            eventSources: [
                //'json/events.json',
                'AshWednesday.php',
                'sundayReadings.php'
            ]
        });

        $('#calendar').fullCalendar('option', 'aspectRatio', 1.2);
    });

</script>
<style>

    body {
        background-color: #CCFF99;
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        background-color: #CCFFCC;
        max-width: 900px;
        margin: 0 auto;
    }

    .fc-time{
    display : none;
    }

</style>
</head>
<body>
<center>    
    <h1>Ang Salita Ng Diyos Calendar Site</h1>
</center>

    <div id='calendar'></div>

</body>
</html>
