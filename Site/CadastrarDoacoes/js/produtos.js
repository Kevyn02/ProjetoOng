$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: 'http://localhost/ProjetoOng/Site/Caixa/produtoPreco.php',
        dataType: 'html',
        beforeSend: function () {
            $('#produto').append("<option value='hint'>Carregando...</option>");
        },
        success: function (data) {
            $('#produto').empty();
            $('#produto').append(data);
        }
    });
});