$(document).ready(function () {
    pesquisarDoacoes("", "");
    $('#datainicial').change(function () {
        var datainicial = "";
        if ($('#datainicial').val() != "") {
            datainicial = $('#datainicial').val();
        }
        pesquisarDoacoes(datainicial, $('#datafinal').val());
    });
    $('#datafinal').change(function () {
        var datafinal = "";
        if ($('#datafinal').val() != "") {
            datafinal = $('#datafinal').val();
        }
        pesquisarDoacoes($('#datainicial').val(), datafinal);
    });
    function pesquisarDoacoes(datainicial, datafinal) {
        $.ajax({
            type: 'POST',
            url: 'http://localhost/ProjetoOng/Site/RelatorioDoacao/doacoes.php',
            dataType: 'html',
            data: { 'datainicial': datainicial, 'datafinal': datafinal },
            // Após carregar, coloca a lista dentro do select de categorias.
            success: function (data) {
                $('#table_doacoes').empty();
                if(data != ""){
                    $('#table_doacoes').append(data);
                }
                else{
                    $('#table_doacoes').append("<tr><td colspan='3'>Sem Resultados</td><tr>");
                }
            }
        });
    }
});