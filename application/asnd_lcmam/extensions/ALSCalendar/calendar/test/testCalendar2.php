<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>

<script src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-3.3.4-dist/js/bootstrap.js"></script>
<link rel="stylesheet" href="../bootstrap-3.3.4-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">

<script type='text/javascript'>

    $(document).ready(function() {
    
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        
        $('#calendar').fullCalendar({
            eventSources: [
                'sundayReadings.php',
                'specialEvents.php',
                'weekdayReadings.php',
            ],
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'today'
        },
        
        eventClick: function (event, jsEvent, view) {
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
    #calendar {
        width: 100%;
        margin: 0 auto;
        }
        
    #responsive-wrapper {
        width:100%;
        margin 0 auto;
    }

</style>
</head>
<body>
    <!-- The Modal Markup -->
    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">Luk</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
                    <button type="button" class="btn btn-default"><a id="eventUrl" target="_blank">Gå til begivenhed</a></button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- The Calendar -->
    <div id='calendar'></div>
    
</body>
<footer>
</footer>

</html>
