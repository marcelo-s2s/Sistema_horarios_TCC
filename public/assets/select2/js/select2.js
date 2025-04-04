//Personalização do Select2

$(document).ready(function () {
    $('#turma').select2({
        theme: "bootstrap-5",
        placeholder: "Selecione uma disciplina",
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            },
        }
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

    $('#turma').val(null).trigger('change');
});