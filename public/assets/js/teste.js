document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    // Dados de exemplo (substituir por dados reais)
    const turmas = [
        { id: 1, title: 'Turma A' },
        { id: 2, title: 'Turma B' }
    ];

    const calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['resourceTimeline', 'interaction'],
        timeZone: 'UTC',
        initialView: 'resourceTimelineWeek',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'resourceTimelineDay,resourceTimelineWeek'
        },
        resourceAreaHeaderContent: 'Turmas',
        resources: turmas,
        views: {
            resourceTimelineWeek: {
                type: 'resourceTimeline',
                duration: { weeks: 1 },
                slotDuration: { hours: 1 },
                slotLabelFormat: [
                    { weekday: 'short' }, // Dias
                    { hour: 'numeric', meridiem: 'short' } // Horários
                ],
                dayHeaderFormat: { weekday: 'long' }
            }
        },
        editable: true,
        droppable: true,
        eventOverlap: false,
        slotMinTime: '06:00',
        slotMaxTime: '23:00',
        resourceAreaWidth: '200px',
        resourceGroupField: 'title',
        events: '/api/horarios',

        // Customização da grade
        resourceRender: function (info) {
            // Adiciona linha de divisão entre turmas
            info.el.style.borderBottom = '2px solid #666';
        },

        eventDidMount: function (info) {
            // Estilização dos eventos
            info.el.style.cursor = 'move';
            info.el.style.borderRadius = '4px';
        },

        eventDrop: async function (info) {
            // Lógica de atualização no backend
            const response = await fetch('/api/atualizar-horario', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    turma: info.event.resource.id,
                    disciplina: info.event.title,
                    start: info.event.start,
                    end: info.event.end
                })
            });

            if (!response.ok) {
                info.revert();
                alert('Conflito de horário!');
            }
        }
    });

    // Habilitar arrastar de disciplinas externas
    new FullCalendar.Draggable(document.getElementById('external-events'), {
        itemSelector: '.fc-event',
        eventData: function (eventEl) {
            return {
                title: eventEl.innerText,
                duration: eventEl.dataset.duration + ' hours'
            };
        }
    });

    calendar.render();
});