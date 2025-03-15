document.addEventListener('DOMContentLoaded', function () {

  // Observa mudanças na área do calendário
  const observer = new MutationObserver(() => ajustarTamanhoFonte());
  observer.observe(document.querySelector('#calendar'), { childList: true, subtree: true });

  const trashEl = document.getElementById('external-events');


  const salaMap = {};
  salas.forEach(sala => {
    salaMap[sala.id_sala] = sala.nome_sala;
  });

  const professorMap = {};
  professores.forEach(professor => {
    professorMap[professor.id_usuario] = professor.nome;
  });

  const eventsUrl = isEditing
    ? '/horario-aula/carregar-horarios/' + isEditing
    : '';
  const offcanvasDisciplina = document.getElementById('offcanvasDisciplina');


  // Eventos externos
  var containerEl = document.getElementById('external-events-list');
  new FullCalendar.Draggable(containerEl, {
    itemSelector: '.fc-event',
    eventData: function (eventEl) {
      // Extrai a cor do atributo data-color ou define uma cor padrão
      var eventColor = eventEl.getAttribute('data-color') || '8FFE09';

      // Extrai o id
      var idDisciplina = eventEl.getAttribute('id-disciplina');

      var professor = 'Sem professor';

      var sala = 'Sem sala';

      // Extrai a duração do atributo data-duration
      var eventDuration = eventEl.getAttribute('data-duration') || '1';  // duração padrão de 1 hora
      var defaultDuration = { hours: eventDuration }; // Definindo a duração a partir do atributo

      return {
        id: Date.now(),
        title: eventEl.innerText.trim(),
        backgroundColor: eventColor, // Define a cor de fundo do evento
        borderColor: eventColor, // Define a cor da borda do evento (opcional)
        duration: defaultDuration,  // Define a duração a partir do atributo
        extendedProps: {
          id_disciplina: idDisciplina, // Adiciona o ID da disciplina como propriedade estendida
          professor: professor,
          sala: sala
        }
      }
    },
    dragRevert: true,
  });

  async function verificarConflitos(evento) {

    const eventoInfo = {
      id_sala: evento.extendedProps.sala,
      dia_semana: new Date(evento.start).getDay(),
      horario_inicio: new Date(evento.start).getHours(),
      horario_fim: new Date(evento.end).getHours(),
      professor: evento.extendedProps.professor, // Inclui o professor
      id_horario_aula: idHorarioAula || 0
    };

    try {
      const response = await fetch('/horario-aula/verificar-conflitos', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(eventoInfo)
      });

      if (!response.ok) {
        throw new Error('Erro na requisição: ' + response.status);
      }

      const data = await response.json();

      if (data.conflito) {

        showToast(data.mensagem, "error"); // Mostra a mensagem de conflito
        return true; // Retorna true se houver conflito
      } else {
        showToast(data.mensagem, "success"); // Mostra a mensagem de sucesso
        return false; // Retorna false se não houver conflito
      }
    } catch (error) {
      console.error('Erro ao processar a requisição:', error);
      return false; // Em caso de erro, retorna false como padrão
    }
  }


  // Interface do Full Calendar
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
    events: eventsUrl, // Define a URL de eventos dinamicamente

    eventClick: function (info) {

      // Captura os dados do evento clicado
      const event = info.event;

      // Se já existir uma instância do offcanvas, feche-a
      const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasDisciplina);
      if (offcanvasInstance) {
        offcanvasInstance.hide();
      }

      // Preenche os campos do Offcanvas
      document.getElementById('offcanvasNomeDisciplina').innerText = event.title || 'Evento sem título';
      document.getElementById('eventDateStart').innerText = event.start ? new Date(event.start).getHours() : 'Não informado';
      document.getElementById('eventDateEnd').innerText = event.end ? new Date(event.end).getHours() : 'Não informado';
      document.getElementById('eventColor').value = event.backgroundColor || 'Sem cor';
      document.getElementById('professor').value = event.extendedProps.professor || 'Sem professor';
      document.getElementById('sala').value = event.extendedProps.sala || 'Sem sala';

      // Adiciona ID do evento como atributo no botão
      document.getElementById('idDisciplina').setAttribute('id-disciplina', event.id);

      // Abre o Offcanvas
      new bootstrap.Offcanvas(offcanvasDisciplina).show();
    },
    eventOverlap: function (stillEvent, movingEvent) {
      return false; // Impede que eventos sejam sobrepostos
    },
    eventDidMount: function (info) {
      // Adiciona um tooltip ao evento
      info.el.setAttribute('title', info.event.title);
    },

    drop: function (arg) {

      eventEnd = parseInt(arg.date.getHours()) + parseInt(arg.draggedEl.getAttribute('data-duration'));

      const maxEndTime = 18;

      // Verifica se o evento solto ultrapassa o horário limite
      if (eventEnd > maxEndTime) {

        // Impede o drop e exibe um alerta
        showToast("O horário da disciplina ultrapassou o limite", "error");
        arg.event.remove();

      }

    },
    // Evento disparado ao soltar um evento
    eventDrop: function (info) {

      const maxEndTime = new Date(info.event.start);
      maxEndTime.setHours(18, 0, 0, 0); // Define o limite de 18:00

      // Verifica se o fim do evento ultrapassa o limite
      if (info.event.end && info.event.end.getTime() > maxEndTime.getTime()) {
        info.revert(); // Reverte o evento para a posição original
        showToast("O horário da disciplina não pode ultrapassar o limite", "error");
      }
      const resposta = verificarConflitos(info.event);

      resposta.then((resultado) => {
        if (resultado) {
          info.revert(); // Reverte o evento para a posição original
        }
      });
    },

    eventContent: function (arg) {

      // Criar título com classe Bootstrap
      let titleEl = document.createElement('div');
      titleEl.textContent = arg.event.title;
      titleEl.classList.add('event-title'); // Classe para o título

      // Criar professor com classe Bootstrap
      let professorEl = document.createElement('div');
      let idProfessor = arg.event.extendedProps.professor; // O ID da professor
      let nomeProfessor = professorMap[idProfessor]
      // professorEl.textContent = 'Professor: ' + (nomeProfessor || 'Sem professor');

      professorEl.innerHTML = `<span class="detail-label">Professor:</span> <span class="detail-value">${nomeProfessor || "Indefinido"}</span>`;
      professorEl.classList.add('event-detail'); // Classe para detalhes


      // Criar sala com classe Bootstrap

      let salaEl = document.createElement('div');
      let idSala = arg.event.extendedProps.sala; // O ID da sala
      let nomeSala = salaMap[idSala]

      salaEl.innerHTML = `<span class="detail-label">Sala:</span> <span class="detail-value">${nomeSala || "Indefinido"}</span>`;
      salaEl.classList.add('event-detail'); // Classe para detalhes

      // Criar o elemento principal do evento
      let eventElement = document.createElement('a');
      eventElement.setAttribute('data-event-id', arg.event.id); // Atributo de identificação único

      // Retornar os elementos como um array
      return { domNodes: [titleEl, professorEl, salaEl, eventElement] };
    },

    eventDragStop: function (info) {
      // Verifica se o evento foi arrastado até a lixeira
      const trashBounds = trashEl.getBoundingClientRect();
      const eventBounds = info.jsEvent;

      if (
        eventBounds.clientX >= trashBounds.left &&
        eventBounds.clientX <= trashBounds.right &&
        eventBounds.clientY >= trashBounds.top &&
        eventBounds.clientY <= trashBounds.bottom
      ) {
        // Remove o evento do calendário
        calendar.getEventById(info.event.id).remove();
      }
    }

  });
  calendar.render();

  document.getElementById('professor').addEventListener('change', function () {
    const professor = this.value; // Novo valor do professor
    const idEvent = document.getElementById('idDisciplina').getAttribute('id-disciplina');

    // Localiza o evento no calendário pelo ID
    const event = calendar.getEventById(idEvent);

    if (event) {
      // Atualiza a propriedade 'professor' do evento com o novo valor
      event.setExtendedProp('professor', professor);

    }
    const resposta = verificarConflitos(event);

    resposta.then((resultado) => {
      if (resultado) {
        document.getElementById('professor').value = 'Sem professor';
        event.setExtendedProp('professor', 'Sem professor');
      }
    });

  });

  document.getElementById('sala').addEventListener('change', function () {
    const sala = this.value; // Novo valor do sala
    const idEvent = document.getElementById('idDisciplina').getAttribute('id-disciplina');

    // Localiza o evento no calendário pelo ID
    const event = calendar.getEventById(idEvent);

    if (event) {
      // Atualiza a propriedade 'sala' do evento com o novo valor
      event.setExtendedProp('sala', sala);
    }

    const resposta = verificarConflitos(event);

    resposta.then((resultado) => {
      if (resultado) {
        document.getElementById('sala').value = 'Sem sala';
        event.setExtendedProp('sala', 'Sem sala');
      }
    });

  });

  function apagarRegistro(id) {
    fetch(`/horario-aula/deletar/${id}`, {
      method: 'DELETE', // Define o método HTTP DELETE
      headers: {
        'Content-Type': 'application/json', // Define o tipo do conteúdo
      },
    })
      .then(response => {
        if (response.ok) {
          // Atualize a interface, se necessário
          location.reload(); // Recarrega a página
        } else {
          throw new Error('Erro ao apagar o registro');
        }
      })
      .catch(error => {
        console.error('Erro:', error);
        showToast("Ocorreu um erro ao atualizar o horário", "error");
      });
  }

  function recarregarPagina(tempo) {
    setTimeout(() => location.reload(), tempo);
  }


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

      const elementoTurma = document.getElementById("turma");
      const turma = elementoTurma.options[elementoTurma.selectedIndex].text;

      const titulo = "Horário da turma: " + turma;
      const larguraTitulo = pdf.getTextWidth(titulo);
      const posicaoInicialTitulo = (larguraOriginalPDF - larguraTitulo) / 2;


      // Adiciona o título ao PDF
      pdf.setFontSize(18);
      pdf.setFont("helvetica", "bold");
      pdf.text(titulo, posicaoInicialTitulo, margem + 5);



      // Adiciona a imagem ao PDF abaixo do título
      pdf.addImage(imagemDados, 'PNG', posicaoInicialCalendario, margem + alturaTitulo, larguraFinal, alturaFinal);

      // Salva o PDF
      pdf.save(turma + '.pdf');
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

  document.getElementById('save-events').addEventListener('click', function () {

    // Obtém todos os eventos do calendário
    var events = calendar.getEvents();
    let hasIssues = false; // Flag para verificar se há problemas

    // Verifica os eventos
    events.forEach(evento => {

      const { sala, professor } = evento.extendedProps;

      if (sala === 'Sem sala' || professor === 'Sem professor') {

        hasIssues = true;

      }
    });

    // Impede o salvamento se houver problemas
    if (hasIssues) {
      showToast("Existem eventos com campos obrigatórios não preenchidos", "error");
      return;
    }

    // Se tudo estiver correto, proceda com o salvamento
    showToast("Todos os eventos estão preenchidos corretamente! Salvando...", "success");

    // Extrair dados dos eventos
    const eventData = events.map(event => ({
      id_sala: event.extendedProps.sala,
      codigo_turma: document.getElementById('turma').value,
      status: document.getElementById('status').value,
      periodo_letivo: document.getElementById('periodo_letivo').value,
      id_disciplina: event.extendedProps.id_disciplina,
      dia_semana: new Date(event.start).getDay(),
      horario_inicio: new Date(event.start).getHours(),
      horario_fim: new Date(event.end).getHours(),
      cor: event.backgroundColor,
      professor: event.extendedProps.professor // Inclui o professor
    }));

    // Em caso de atualização do horário de aula, apaga os dados antigos
    if (idHorarioAula) {
      apagarRegistro(idHorarioAula);
    }

    // Envia os dados via AJAX para o backend
    fetch('/horario-aula/salvar', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json', // Apenas informa que o corpo da requisição é JSON
      },
      body: JSON.stringify({ eventData })
    })
      .then(response => {
        if (!response.ok) {
          return response.json().then(err => {
            throw new Error(err.error || 'Erro desconhecido');
          });
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {

          showSweetAlert("Horário salvo com sucesso", "success");
          recarregarPagina(3000);

        } else {
          showSweetAlert("Erro ao salvar horários", "error");
        }
      })
      .catch(error => {
        console.error('Erro ao salvar os horários:', error);
        alert('Erro: ' + error.message);
      });
  });

});


