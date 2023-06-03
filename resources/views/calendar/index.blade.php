@extends('layout')

@section('content')

<div id="calendar"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [dayGridPlugin],
        selectable: true,
        select: function(info) {
            var startDate = info.startStr;
            var endDate = info.endStr;
            // Aquí puedes hacer lo que necesites con las fechas seleccionadas, por ejemplo, enviarlas a tu controlador mediante una solicitud AJAX.
        }
    });
    calendar.render();
});
</script>
@endsection