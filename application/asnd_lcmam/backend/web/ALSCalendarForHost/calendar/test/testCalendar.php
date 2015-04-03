<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../../fullcalendar.css' rel='stylesheet' />
<link href='../../fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='../../lib/moment.min.js'></script>
<script src='../../lib/jquery.min.js'></script>
<script src='../../fullcalendar.min.js'></script>

<script src="../../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<script src="../../bootstrap-3.3.4-dist/js/bootstrap.js"></script>
<link rel="stylesheet" href="../../bootstrap-3.3.4-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">

<script>

$(document).ready(function () {
    $('#cal').fullCalendar({
        eventSources: [
                'sundayReadings.php',
                'ashWednesday.php',
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
                'specialSolemnities.php',
                /*'../Year Y/sundayReadings.php',
                '../Year Y/ashWednesday.php',
                '../Year Y/weekdayReadings.php',
                '../Year Y/solemnitiesOrFeasts.php',
                '../Year Y/majorEvents.php',
                '../Year Y/adventWeekdays.php',
                '../Year Y/adventSundays.php',
                '../Year Y/preLent.php',
                '../Year Y/lentSundays.php',
                '../Year Y/lentWeekdays.php',
                '../Year Y/easterWeekdays.php',
                '../Year Y/easterSundays.php',
                '../Year Y/specialSolemnities.php',
                '../Year X/sundayReadings.php',
                '../Year X/ashWednesday.php',
                '../Year X/weekdayReadings.php',
                '../Year X/solemnitiesOrFeasts.php',
                '../Year X/majorEvents.php',
                '../Year X/adventWeekdays.php',
                '../Year X/adventSundays.php',
                '../Year X/preLent.php',
                '../Year X/lentSundays.php',
                '../Year X/lentWeekdays.php',
                '../Year X/easterWeekdays.php',
                '../Year X/easterSundays.php',
                '../Year X/specialSolemnities.php',
                */
            ],
        header: {
            left: 'title',
            center: '',
            right: 'prev, today, next'
        },
        
        eventClick: function (event, jsEvent, view) {
            if (!event.url){event.url = ""};
            if (!event.description){event.description = ""};
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href', event.url);
            $('#fullCalModal').modal();
            return false;
        },

        eventRender: function(event, element) {
            $(element).tooltip({title: event.title});             
        },

            loading: function(bool) {
                if (bool) {
                    $('#loading').show();
                }else{
                    $('#loading').hide();
                }
            }

    });
});

</script>
<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Trebuchet MS",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
    }

    .fc-time{
        display : none;
    }

    .modal {
        text-align: center;
    }

    .modal:before {
        display: inline-block;
        vertical-align: middle;
        content: "";
        height: 100%;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }


</style>
</head>
<body>

<div id="cal"></div>
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>  <span class="sr-only">close</span>

                </button>
                 <h4 id="modalTitle" class="modal-title"></h4>

            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-success"><a id="eventUrl" target="_blank" style="color: white;">Reading Link</a>

                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
