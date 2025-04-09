document.addEventListener('DOMContentLoaded', function () {

    const salaMap = {};
    salas.forEach(sala => {
        salaMap[sala.id_sala] = sala.nome_sala;
    });

    const professorMap = {};
    professores.forEach(professor => {
        professorMap[professor.id_usuario] = professor.nome;
    });

    horarios.forEach(horario => {

        const eventsUrl = '/horario-aula/carregar-horarios/' + horario.codigo_turma;

        // Cria uma instância do calendário para cada container com id "calendar-[id]"
        const calendarEl = document.getElementById('calendar-' + horario.id_horario_aula);

        // Configuração do calendário
        let calendar = new FullCalendar.Calendar(calendarEl, {

            themeSystem: 'bootstrap5',
            initialView: 'timeGrid',
            duration: { days: 6 },
            initialDate: '2024-11-18',
            locale: 'pt-br',
            slotMinTime: '01:00:00',
            slotMaxTime: '18:00:00',
            dayHeaderFormat: { weekday: 'long' },
            slotDuration: '01:00:00',
            allDaySlot: false,
            expandRows: true,
            headerToolbar: false,
            events: eventsUrl,
            eventContent: function (arg) {

                // Criar o container principal
                let containerEl = document.createElement('div');
                containerEl.classList.add('event-container');

                // Criar título
                let titleEl = document.createElement('div');
                titleEl.textContent = arg.event.title;
                titleEl.classList.add('event-title');

                // Criar professor
                let professorEl = document.createElement('div');
                let idProfessor = arg.event.extendedProps.professor;
                let nomeProfessor = professorMap[idProfessor];
                professorEl.innerHTML = `<span class="detail-label">Professor:</span> <span class="detail-value">${nomeProfessor || "Indefinido"}</span>`;
                professorEl.classList.add('event-detail');

                // Criar sala
                let salaEl = document.createElement('div');
                let idSala = arg.event.extendedProps.sala;
                let nomeSala = salaMap[idSala];
                salaEl.innerHTML = `<span class="detail-label">Sala:</span> <span class="detail-value">${nomeSala || "Indefinido"}</span>`;
                salaEl.classList.add('event-detail');

                // Adicionar tudo ao container
                containerEl.appendChild(titleEl);
                containerEl.appendChild(professorEl);
                containerEl.appendChild(salaEl);

                setTimeout(() => {
                    textFit(containerEl, {
                        multiLine: true
                    });
                }, 0);

                // Retornar a estrutura
                return { domNodes: [containerEl] };
            },
        });

        calendar.render();
    });

    document.getElementById('exportarPDF').addEventListener('click', exportarCalendariosParaPDF);

    function exportarCalendariosParaPDF() {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({
            orientation: "landscape",
            unit: "mm",
            format: "a4"
        });

        const margens = 10;
        const alturaTitulo = 10;
        const larguraPagina = pdf.internal.pageSize.getWidth();
        const alturaPagina = pdf.internal.pageSize.getHeight();

        const elementosCalendario = document.querySelectorAll('[id^="calendar-"]');

        elementosCalendario.forEach((elementoCalendario, index) => {
            html2canvas(elementoCalendario, { scale: 2 }).then(canvas => {
                const imagemDados = canvas.toDataURL('image/png');

                const larguraImagem = canvas.width;
                const alturaImagem = canvas.height;
                const fatorEscala = Math.min((larguraPagina - 2 * margens) / larguraImagem, (alturaPagina - 2 * margens - alturaTitulo) / alturaImagem);
                const larguraFinal = larguraImagem * fatorEscala;
                const alturaFinal = alturaImagem * fatorEscala;
                const posicaoX = (larguraPagina - larguraFinal) / 2;
                const posicaoY = margens + alturaTitulo;

                const nomeTurma = elementoCalendario.previousElementSibling.textContent.trim();
                const titulo = `Horário da turma: ${nomeTurma}`;
                const larguraTitulo = pdf.getTextWidth(titulo);
                const posicaoTituloX = (larguraPagina - larguraTitulo) / 2;

                if (index !== 0) {
                    pdf.addPage();
                }

                pdf.setFontSize(18);
                pdf.setFont("helvetica", "bold");
                pdf.text(titulo, posicaoTituloX, margens + 5);
                pdf.addImage(imagemDados, 'PNG', posicaoX, posicaoY, larguraFinal, alturaFinal);

                if (index === elementosCalendario.length - 1) {
                    pdf.save('Horarios_Turmas.pdf');
                }
            });
        });
    }
});