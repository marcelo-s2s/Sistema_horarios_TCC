document.addEventListener('DOMContentLoaded', function () {

    // Define uma URL padrão para eventsUrl
    var eventsUrl = '/horario-aula/carregar-horarios-professor/default';

    // Listener para mudanças no campo professor
    document.getElementById('professor').addEventListener('change', function () {

        const professor = this.value; // Novo valor do professor
        eventsUrl = '/horario-aula/carregar-horarios-professor/' + professor; // Atualiza a URL
        calendar.refetchEvents(); // Recarrega os eventos do calendário

        // Remove a opção "Selecione um professor" após a mudança
        const defaultOption = this.querySelector('option[value=""]');
        if (defaultOption) {
            defaultOption.remove();
        }

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

            const elementoProfessor = document.getElementById("professor");
            const professor = elementoProfessor.options[elementoProfessor.selectedIndex].text;

            const titulo = "Horário do professor: " + professor;
            const larguraTitulo = pdf.getTextWidth(titulo);
            const posicaoInicialTitulo = (larguraOriginalPDF - larguraTitulo) / 2;


            // Adiciona o título ao PDF
            pdf.setFontSize(18);
            pdf.setFont("helvetica", "bold");
            pdf.text(titulo, posicaoInicialTitulo, margem + 5);



            // Adiciona a imagem ao PDF abaixo do título
            pdf.addImage(imagemDados, 'PNG', posicaoInicialCalendario, margem + alturaTitulo, larguraFinal, alturaFinal);

            // Salva o PDF
            pdf.save(professor + '.pdf');
        });
    }

    function ajustarTamanhoFonte() {
        const eventos = document.querySelectorAll('.fc-event-main');

        eventos.forEach(evento => {
            const titulo = evento.querySelector('.event-title');
            // const detalhe = evento.querySelector('.detail-value');
            const detalhes = evento.querySelectorAll('.detail-value');


            const parentHeight = evento.clientHeight;
            let tituloFontSize = parseInt(window.getComputedStyle(evento).fontSize);

            while (evento.scrollHeight > parentHeight) {
                let alterado = false;

                detalhes.forEach(detalhe => {
                    let detalheFontSize = parseInt(window.getComputedStyle(detalhe).fontSize);
                    if (detalheFontSize > 15) {
                        detalheFontSize--;
                        detalhe.style.fontSize = `${detalheFontSize}px`;
                        alterado = true;
                    }
                });

                if (!alterado) break;
            }
            while (evento.scrollHeight > parentHeight && tituloFontSize > 15) {
                tituloFontSize--;
                titulo.style.fontSize = `${tituloFontSize}px`;
                titulo.style.marginBottom = "0";
            }


            //Se mesmo assim não couber, adiciona reticências no título
            if (evento.scrollHeight > parentHeight) {
                titulo.style.whiteSpace = "nowrap";
                titulo.style.overflow = "hidden";
                titulo.style.textOverflow = "ellipsis";
            }
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
            ajustarTamanhoFonte();
        },

        eventContent: function (arg) {

            // Criar título com classe Bootstrap
            let titleEl = document.createElement('div');
            titleEl.textContent = arg.event.title;
            titleEl.classList.add('event-title'); // Classe para o título

            let turmaEl = document.createElement('div');
            let nomeTurma = arg.event.extendedProps.turma;

            turmaEl.innerHTML = `<span class="detail-label">Turma:</span> <span class="detail-value">${nomeTurma || "Indefinido"}</span>`;
            turmaEl.classList.add('event-detail'); // Classe para detalhes

            // Criar sala com classe Bootstrap
            let salaEl = document.createElement('div');
            let nomeSala = arg.event.extendedProps.sala; // O ID da sala

            salaEl.innerHTML = `<span class="detail-label">Sala:</span> <span class="detail-value">${nomeSala || "Indefinido"}</span>`;
            salaEl.classList.add('event-detail'); // Classe para detalhes

            // Retornar os elementos como um array
            return { domNodes: [titleEl, turmaEl, salaEl] };
        },


    });
    calendar.render();

});