@extends('layouts.app')

@section('template_title')
Calendario
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">
        <div id="calendar">

        </div>




    </main>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locales: 'es',
            
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            
        });
        calendar.render();
    });

    



    $(document).ready(function() {
    $('#calendar').fullCalendar({
        events: JSON.parse('{!! htmlspecialchars(json_encode($orders)) !!}'),
      eventClick: function(event) {
        alert(event.title);
      }
    });
  });
</script>



@endsection