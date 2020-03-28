$(document).ready(function () {
    pesquisarDespesas("", "");
    pesquisarVendas("", "");
    $('#datainicial').change(function () {
        var datainicial = "";
        if ($('#datainicial').val() != "") {
            datainicial = $('#datainicial').val();
        }
        pesquisarDespesas(datainicial, $('#datafinal').val());
        pesquisarVendas(datainicial, $('#datafinal').val());
    });
    $('#datafinal').change(function () {
        var datafinal = "";
        if ($('#datafinal').val() != "") {
            datafinal = $('#datafinal').val();
        }
        pesquisarDespesas($('#datainicial').val(), datafinal);
        pesquisarVendas($('#datainicial').val(), datafinal);
    });
    function pesquisarDespesas(datainicial, datafinal) {
        $.ajax({
            type: 'POST',
            url: 'http://localhost/ProjetoOng/Site/RelatorioFinanceiro/despesas.php',
            dataType: 'html',
            data: { 'datainicial': datainicial, 'datafinal': datafinal },
            // Após carregar, coloca a lista dentro do select de categorias.
            success: function (data) {
                $('#table_invest').empty();
                if(data != ""){
                    $('#table_invest').append(data);
                }
                else{
                    $('#table_invest').append("<tr><td colspan='3'>Sem Resultados</td><tr>");
                }
            }
        });
    }
    function pesquisarVendas(datainicial, datafinal) {
        $.ajax({
            type: 'POST',
            url: 'http://localhost/ProjetoOng/Site/RelatorioFinanceiro/vendas.php',
            dataType: 'html',
            data: { 'datainicial': datainicial, 'datafinal': datafinal },
            // Após carregar, coloca a lista dentro do select de categorias.
            success: function (data) {
                $('#table_home').empty();
                if(data != ""){
                    $('#table_home').append(data);
                }
                else{
                    $('#table_home').append("<tr><td colspan='6'>Sem Resultados</td><tr>");
                }
            }
        });
    }
});