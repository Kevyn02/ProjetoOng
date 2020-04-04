$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: 'http://localhost/ProjetoOng/Site/AdicionarCategoria/categoria.php',
        dataType: 'html',
        data: { 'texto': "", 'pagina': 1 ,'codigo': ""},
        success: function (data) {
            $('#categoria').empty();
            $('#categoria').append(data);
        }
    });
});