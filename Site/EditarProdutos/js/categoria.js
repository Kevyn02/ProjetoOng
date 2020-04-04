$(document).ready(function () {
    var codigo = $('#codigo').val()
    $.ajax({
        type: 'POST',
        url: 'http://localhost/ProjetoOng/Site/AdicionarCategoria/categoria.php',
        dataType: 'html',
        data: { 'texto': "", 'pagina': 1 ,'codigo': codigo},
        success: function (data) {
            $('#categoria').empty();
            $('#categoria').append(data);
        }
    });
});