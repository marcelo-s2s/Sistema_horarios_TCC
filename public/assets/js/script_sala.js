document.addEventListener('DOMContentLoaded', function () {

    // Define uma URL padrão para eventsUrl
    var eventsUrl = '/horario-aula/carregar-horarios-sala/default';

    // Listener para mudanças no campo sala
    document.getElementById('sala').addEventListener('change', function () {

        const sala = this.value; // Novo valor do sala
        eventsUrl = '/horario-aula/carregar-horarios-sala/' + sala; // Atualiza a URL
        calendar.refetchEvents(); // Recarrega os eventos do calendário

        // Remove a opção "Selecione um sala" após a mudança
        const defaultOption = this.querySelector('option[value=""]');
        if (defaultOption) {
            defaultOption.remove();
        }

    });

    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {

        themeSystem: 'bootstrap5',
        initialView: 'timeGrid',
        duration: { days: 6 },
        initialDate: '2024-11-18',
        locale: 'pt-br',
        slotMinTime: '01:00:00', // Ajuste conforme sua preferência para começar em 1
        slotMaxTime: '7:00:00',  // Ajuste para terminar no horário desejado
        dayHeaderFormat: { weekday: 'long' },
        slotDuration: '01:00:00',
        allDaySlot: false,
        expandRows: true,
        headerToolbar: false,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        events: function (info, successCallback, failureCallback) {
            // Função para carregar eventos dinamicamente
            fetch(eventsUrl)
                .then(response => response.json())
                .then(data => successCallback(data))
                .catch(error => failureCallback(error));
        },

        eventDidMount: function (info) {
            // Adiciona um tooltip ao evento
            info.el.setAttribute('title', info.event.title);
        },

        eventContent: function (arg) {
            // Criar título com classe Bootstrap
            let titleEl = document.createElement('div');
            titleEl.textContent = arg.event.title;
            // titleEl.classList.add('fw-bold', 'text-primary', 'mb-1'); // Negrito e azul

            // Criar sala com classe Bootstrap
            let salaEl = document.createElement('div');
            let nomeProfessor = arg.event.extendedProps.professor; // O ID da sala
            salaEl.textContent = 'Professor: ' + (nomeProfessor || 'Sem professor');

            let turmaEl = document.createElement('div');
            let nomeTurma = arg.event.extendedProps.turma;
            turmaEl.textContent = 'Turma: ' + (nomeTurma || 'Sem turma');

            // Retornar os elementos como um array
            return { domNodes: [titleEl, salaEl, turmaEl] };
        }

    });
    calendar.render();

});


