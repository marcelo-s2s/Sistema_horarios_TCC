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

    function ajustarTamanhoFonte() {
        const eventos = document.querySelectorAll('.fc-event-main');

        eventos.forEach(evento => {
            const titulo = evento.querySelector('.event-title');
            const detalhes = evento.querySelectorAll('.event-detail');


            const parentHeight = evento.clientHeight;
            let tituloFontSize = parseInt(window.getComputedStyle(evento).fontSize);

            while (evento.scrollHeight > parentHeight && tituloFontSize > 15) {
                tituloFontSize--;
                titulo.style.fontSize = `${tituloFontSize}px`;
                titulo.style.marginBottom = "0";
            }

            while (evento.scrollHeight > parentHeight) {
                let alterado = false;

                detalhes.forEach(detalhe => {
                    let detalheFontSize = parseInt(window.getComputedStyle(detalhe).fontSize);
                    if (detalheFontSize > 15) {
                        detalheFontSize--;
                        detalhe.style.fontSize = `${detalheFontSize}px`;
                        evento.style.lineHeight = '1';
                        alterado = true;
                    }
                });

                if (!alterado) break;
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

            // Criar professor com classe Bootstrap
            let professorEl = document.createElement('div');
            let nomeProfessor = arg.event.extendedProps.professor; // O ID da professor
            // professorEl.textContent = 'Professor: ' + (nomeProfessor || 'Sem professor');

            professorEl.innerHTML = `<span class="detail-label">Professor:</span> <span class="detail-value">${nomeProfessor || "Indefinido"}</span>`;
            professorEl.classList.add('event-detail'); // Classe para detalhes

            // Retornar os elementos como um array
            return { domNodes: [titleEl, professorEl] };
        },

    });
    calendar.render();

});


