$(document).ready(function () {
  var myChart;
  var meses;
  var vendas;
  var investimentos;
  $('#myTab').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  });

  $('#minhaAba a[href="#venda"]').tab('show');
  $('#minhaAba a[href="#invest"]').tab('show');
  $('#minhaAba a[href="#graficos"]').tab('show');

  /*
  pegaVendas("", "");
  pegaInvestimentos("", "");
  */
  pegaValores("", "");
  $('#datainicial').change(function () {
    var datainicial = "";
    if ($('#datainicial').val() != "") {
      datainicial = $('#datainicial').val();
    }
    /*
    pegaVendas(datainicial, $('#datafinal').val());
    pegaInvestimentos(datainicial, $('#datafinal').val());
    */
    pegaValores(datainicial, $('#datafinal').val());
  });
  $('#datafinal').change(function () {
    var datafinal = "";
    if ($('#datafinal').val() != "") {
      datafinal = $('#datafinal').val();
    }
    /*
    pegaVendas($('#datainicial').val(), datafinal);
    pegaInvestimentos($('#datainicial').val(), datafinal);
    */
    pegaValores($('#datainicial').val(), datafinal);
  });

  /*
  function pegaVendas(datainicial, datafinal) {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/ProjetoOng/Site/RelatorioFinanceiro/grafico_vendas.php',
      dataType: 'json',
      data: { 'datainicial': datainicial, 'datafinal': datafinal },
      // Após carregar, coloca a lista dentro do select de categorias.
      success: function (data) {
        meses = [];
        vendas = [];
        for (var i = 0; i < data.length; i++) {
          meses.push(data[i]['Mes'] + "/" + data[i]['Ano']);
          valor = parseFloat(data[i]['Valor']);
          valor = valor.toFixed(2);
          vendas.push(valor);
        }
        desenhaGrafico("grafico", meses, vendas, investimentos);
      },
      error: function (xhr, status, error, data) {
        alert("Grafico 1:" + error);
      },
    });
  }
  function pegaInvestimentos(datainicial, datafinal) {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/ProjetoOng/Site/RelatorioFinanceiro/grafico_despesas.php',
      dataType: 'json',
      data: { 'datainicial': datainicial, 'datafinal': datafinal },
      // Após carregar, coloca a lista dentro do select de categorias.
      success: function (data) {
        //$('#barChart').get(0).getContext('2d')
        investimentos = [];
        for (var i = 0; i < data['Valor'].length; i++) {
          meses.push(data[i]['Mes'] + "/" + data[i]['Ano']);
        }
        for (var i = 0; i < data['Valor'].length; i++) {
          meses.push(data[i]['Mes'] + "/" + data[i]['Ano']);
          valor = parseFloat(data[i]['Valor']);
          valor = valor.toFixed(2);
          investimentos.push(valor);
        }
        desenhaGrafico("grafico", meses, vendas, investimentos);
      },
      error: function (xhr, status, error, data) {
        alert("Grafico 2:" + error);
      },
    });
  }
  */

  function pegaValores(datainicial, datafinal) {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/ProjetoOng/Site/RelatorioFinanceiro/graficos_bd.php',
      dataType: 'json',
      data: { 'datainicial': datainicial, 'datafinal': datafinal },
      // Após carregar, coloca a lista dentro do select de categorias.
      success: function (data) {
        var bd_vendas = data[0];
        var bd_investimentos = data[1];
        meses = [];
        for (var i = 0; i < bd_vendas.length; i++) {
          meses.push(bd_vendas[i]['Mes'] + "/" + bd_vendas[i]['Ano']);
        }
        for (var i = 0; i < bd_investimentos.length; i++) {
          if (meses.find(element => element == bd_investimentos[i]['Mes'] + "/" + bd_investimentos[i]['Ano']) == null) {
            meses.push(bd_investimentos[i]['Mes'] + "/" + bd_investimentos[i]['Ano']);
          }
        }
        //console.log(meses);
        var valor;
        vendas = [];
        for (var i = 0; i < bd_vendas.length; i++) {
          valor = parseFloat(bd_vendas[i]['Valor']);
          valor = valor.toFixed(2);
          vendas.push(valor);
        }
        //console.log(vendas);

        investimentos = [];
        for (var i = 0; i < bd_investimentos.length; i++) {
          valor = parseFloat(bd_investimentos[i]['Valor']);
          valor = valor.toFixed(2);
          investimentos.push(valor);
        }
        //console.log(investimentos);

        for(var i=0;i<meses.length;i++){
          if(vendas[i] == null){
            valor = parseFloat(0);
            valor = valor.toFixed(2);
            vendas.push(valor)
          }
          if(investimentos[i] == null){
            valor = parseFloat(0);
            valor = valor.toFixed(2);
            investimentos.push(valor)
          }
        }
        //console.log(vendas);
        //console.log(investimentos);
        desenhaGrafico('grafico', meses, vendas, investimentos);
      },
      error: function (xhr, status, error, data) {
        alert(error);
      },
    });
  }

  function desenhaGrafico(id, meses, vendas, investimentos) {
    if (vendas != null && investimentos != null) {
      var canvas = document.getElementById(id).getContext('2d');
      if (myChart) {
        myChart.destroy();
      }
      myChart = new Chart(canvas, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            data: [],
            borderWidth: 1,
            backgroundColor: 'rgba(0,150,0,0.9)',
            borderColor: 'rgba(0,150,0,0.8)',
            label: 'Valor Total em Vendas',
          }, {
            data: [],
            borderWidth: 1,
            backgroundColor: 'rgba(0,0,150,0.9)',
            borderColor: 'rgba(0,0,150,0.8)',
            label: 'Valor Total em Despesas',
          }]
        },
        options: {
          responsive: false,
          maintainAspectRatio: false,
          datasetFill: false,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
      addData();
      function addData() {
        for (var i = 0; i < vendas.length; i++) {
          myChart.data.labels.push(meses[i]);
          myChart.update();
        }
        for (var i = 0; i < vendas.length; i++) {
          myChart.data.datasets[0].data.push(parseFloat(vendas[i]));
          myChart.update();
        }
        for (var i = 0; i < investimentos.length; i++) {
          myChart.data.datasets[1].data.push(parseFloat(investimentos[i]));
          myChart.update();
        }
      }
    }
  }
});