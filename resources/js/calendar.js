
      document.addEventListener('DOMContentLoaded', function() {

        let form = document.querySelector("form");

        const calendarEl = document.getElementById('agenda');
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:"es",

          headerToolbar:{
            left:'prev,next today',
            center:'title',
            right:'dayGridMonth, timeGridWeek, listWeek'
          },

          dateClick:function(info){
            $("#calendar").modal("toggle");
          }

        });
        calendar.render();
      });

