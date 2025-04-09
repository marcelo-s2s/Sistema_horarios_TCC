document.addEventListener('DOMContentLoaded', function () {

    // Define uma URL padrão para eventsUrl
    var eventsUrl = '/horario-aula/carregar-horarios-sala/default';

    // Listener para mudanças no campo sala
    $(document).on('change.select2', '#sala', function () {

        const sala = this.value; // Novo valor do sala
        eventsUrl = '/horario-aula/carregar-horarios-sala/' + sala; // Atualiza a URL
        calendar.refetchEvents(); // Recarrega os eventos do calendário
    });

    function exportarCalendarioParaPDF() {
        const elementoCalendario = document.querySelector('#calendar');

        html2canvas(elementoCalendario, { scale: 2 }).then(canvas => {
            const imagemDados = canvas.toDataURL('image/png');
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF({
                orientation: "landscape",
                unit: "mm",
                format: "a4"
            });

            // Definir margens
            const margem = 10; // Margem de 10mm em todos os lados
            const alturaTitulo = 10; // Altura do título
            const larguraOriginalPDF = pdf.internal.pageSize.getWidth()
            const larguraPDF = larguraOriginalPDF - 2 * margem;
            const alturaPDF = pdf.internal.pageSize.getHeight() - 2 * margem - alturaTitulo;

            // Dimensões da imagem original
            const larguraImagem = canvas.width;
            const alturaImagem = canvas.height;

            // Redimensionar mantendo a proporção
            const fatorEscala = Math.min(larguraPDF / larguraImagem, alturaPDF / alturaImagem);
            const larguraFinal = larguraImagem * fatorEscala;
            const alturaFinal = alturaImagem * fatorEscala;

            const posicaoInicialCalendario = (larguraOriginalPDF - larguraFinal) / 2;

            const elementoSala = document.getElementById("sala");
            const sala = elementoSala.options[elementoSala.selectedIndex].text;

            const titulo = "Horário da " + sala;
            const larguraTitulo = pdf.getTextWidth(titulo);
            const posicaoInicialTitulo = (larguraOriginalPDF - larguraTitulo) / 2;

            // Adiciona o título ao PDF
            pdf.setFontSize(18);
            pdf.setFont("helvetica", "bold");
            pdf.text(titulo, posicaoInicialTitulo, margem + 5);

            // Adiciona a imagem ao PDF abaixo do título
            pdf.addImage(imagemDados, 'PNG', posicaoInicialCalendario, margem + alturaTitulo, larguraFinal, alturaFinal);

            // Salva o PDF
            pdf.save(sala + '.pdf');
        });
    }

    document.getElementById('exportarPDF').addEventListener('click', exportarCalendarioParaPDF);

    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {

        themeSystem: 'bootstrap5',
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

            // Criar o container principal
            let containerEl = document.createElement('div');
            containerEl.classList.add('event-container');

            // Criar título
            let titleEl = document.createElement('div');
            titleEl.textContent = arg.event.title;
            titleEl.classList.add('event-title');

            // Criar turma
            let turmaEl = document.createElement('div');
            let nomeTurma = arg.event.extendedProps.turma;
            turmaEl.innerHTML = `<span class="detail-label">Turma:</span> <span class="detail-value">${nomeTurma || "Indefinido"}</span>`;
            turmaEl.classList.add('event-detail');

            // Criar professor
            let professorEl = document.createElement('div');
            let nomeProfessor = arg.event.extendedProps.professor;
            professorEl.innerHTML = `<span class="detail-label">Professor:</span> <span class="detail-value">${nomeProfessor || "Indefinido"}</span>`;
            professorEl.classList.add('event-detail');

            // Adicionar tudo ao container
            containerEl.appendChild(titleEl);
            containerEl.appendChild(professorEl);
            containerEl.appendChild(turmaEl);

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