//Personalização do Select2

$(document).ready(function () {
    $('#filtroHorarios').select2({
        placeholder: "Selecione turmas",
        allowClear: true,
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            },
        }
    });
    $('#professor').select2({
        placeholder: "Selecione um professor",
        theme: 'bootstrap-5',
        width: '300px',
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            },
        }
    });
    $('#sala').select2({
        placeholder: "Selecione uma sala",
        theme: 'bootstrap-5',
        width: '300px',
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            },
        }
    });
    $('#turma').select2({
        placeholder: "Selecione uma turma",
        theme: 'bootstrap-5',
        width: '300px',
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            },
        }
    });
});


$('#offcanvasDisciplina').on('shown.bs.offcanvas', function () {
    $('#sala, #professor').select2({
        theme: 'bootstrap-5',
        dropdownParent: $('#offcanvasDisciplina'),
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            },
        }
    });
});

$('#modalSalvarHorario').on('shown.bs.modal', function () {
    $('#turma').select2({
        theme: "bootstrap-5",
        placeholder: "Selecione uma turma",
        dropdownParent: $('#modalSalvarHorario'),
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            },
        }
    });

    if (!isEditing) {
        $('#turma').val(null).trigger('change');
    }
});