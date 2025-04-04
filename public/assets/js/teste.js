document.addEventListener('DOMContentLoaded', function () {

    horarios.forEach(horario => {

        const eventsUrl = '/horario-aula/carregar-horarios/' + horario.codigo_turma;

        // Cria uma instância do calendário para cada container com id "calendar-[id]"
        const calendarEl = document.getElementById('calendar-' + horario.id_horario_aula);


        console.log(calendarEl);

        // Configuração do calendário (ajuste conforme necessário)
        let calendar = new FullCalendar.Calendar(calendarEl, {

            initialView: 'timeGrid',
            duration: { days: 6 },
            initialDate: '2024-11-18',
            locale: 'pt-br',
            slotMinTime: '01:00:00', // Ajuste conforme sua preferência para começar em 1
            slotMaxTime: '18:00:00',  // Ajuste para terminar no horário desejado
            dayHeaderFormat: { weekday: 'long' },
            slotDuration: '01:00:00',
            allDaySlot: false,
            expandRows: true,
            headerToolbar: false,
            editable: true,
            droppable: true,
            // Você pode incluir dados específicos para cada horário, se aplicável
            events: eventsUrl, // Se cada horário tiver eventos associados
            height: 'auto',
            eventContent: function (arg) {
                return { html: `<div class="fc-event-title">${arg.event.title}</div>` };
            }
        });

        calendar.render();
    });
});