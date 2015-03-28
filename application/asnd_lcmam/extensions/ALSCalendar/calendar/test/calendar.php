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

        $('#calendar').fullCalendar({
            header: {
                left:   'prev',
                center: 'title',
                right:  'next',
            },
            eventSources: [
                'sundayReadings.php',
                'specialEvents.php',
                'weekdayReadings.php',
                'solemnitiesOrFeasts.php',
                'majorEvents.php',
                'adventWeekdays.php',
                'adventSundays.php',
                'preLent.php',
                'lentSundays.php',
                'lentWeekdays.php',
                'easterWeekdays.php',
                'easterSundays.php',
            ],
            eventRender: function(event, element) {
            element.attr('title', event.tip);
        }
        });


        $('#calendar').fullCalendar('option', 'aspectRatio', 1.5);
    });

</script>
<style>

    body {
        background-color: #75A319;
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        background-color: #99CC66;
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
