// Função de busca para filtrar as disciplinas

$(document).ready(function () {
    $('#busca-disciplinas').on('input', function () {
        var termo = $(this).val().toLowerCase();
        $('#external-events-list .fc-event').each(function () {
            var nome = $(this).data('nome').toLowerCase();
            if (nome.indexOf(termo) > -1) {
                $(this).show();
                console.log(nome);
            } else {
                $(this).hide();
            }
        });
    });
});
