
      document.addEventListener('DOMContentLoaded', function() {

        let form = document.querySelector("form");

        var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
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
/*
        document.getElementById("btnGuardar").addEventListener("click",function(){
            const datos = new FormData(form);
            console.log(datos);

            axios.post("http://localhost/crud_pets/public/calendar/agregar", datos).
            then(
                (respuesta => {
                    $("#calendar").modal("hide");
                }).catch(
                    error=>{
                        if(error.response){
                            console.log(error.response.data);
                        }
                    }
                )
            );
        });*/
      });

