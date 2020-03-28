$(document).ready(function () {
  var canvas = "";
  $('#myTab').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
  
  $('#minhaAba a[href="#venda"]').tab('show');
  $('#minhaAba a[href="#invest"]').tab('show');
  $('#minhaAba a[href="#graficos"]').tab('show');

  mostrarVendas("", "");
  mostrarInvestimentos("", "");
  $('#datainicial').change(function () {
    var datainicial = "";
    if ($('#datainicial').val() != "") {
      datainicial = $('#datainicial').val();
    }
    mostrarVendas(datainicial, $('#datafinal').val());
    mostrarInvestimentos(datainicial, $('#datafinal').val());
  });
  $('#datafinal').change(function () {
    var datafinal = "";
    if ($('#datafinal').val() != "") {
      datafinal = $('#datafinal').val();
    }
    mostrarVendas($('#datainicial').val(), datafinal);
    mostrarInvestimentos($('#datainicial').val(), datafinal);
  });

  function mostrarVendas(datainicial, datafinal) {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/ProjetoOng/Site/RelatorioFinanceiro/grafico_vendas.php',
      dataType: 'json',
      data: { 'datainicial': datainicial, 'datafinal': datafinal },
      // Após carregar, coloca a lista dentro do select de categorias.
      success: function (data) {
        meses = [];
        valores = [];
        for (var i = 0; i < data.length; i++) {
          meses.push(data[i]['Mes'] + "/" + data[i]['Ano']);
          valor = parseFloat(data[i]['Valor']);
          valor = valor.toFixed(2);
          valores.push(valor);
        }
        desenhaGrafico("barChart", meses, valores);
      },
      error: function (xhr, status, error, data) {
        alert("Grafico 1:" + error);
      },
    });
  }
  function mostrarInvestimentos(datainicial, datafinal) {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/ProjetoOng/Site/RelatorioFinanceiro/grafico_despesas.php',
      dataType: 'json',
      data: { 'datainicial': datainicial, 'datafinal': datafinal },
      // Após carregar, coloca a lista dentro do select de categorias.
      success: function (data) {
        //$('#barChart').get(0).getContext('2d')
        meses = [];
        valores = [];
        for (var i = 0; i < data.length; i++) {
          meses.push(data[i]['Mes'] + "/" + data[i]['Ano']);
          valor = parseFloat(data[i]['Valor']);
          valor = valor.toFixed(2);
          valores.push(valor);
        }
        desenhaGrafico("barInvest", meses, valores);
      },
      error: function (xhr, status, error, data) {
        alert("Grafico 2:" + error);
      },
    });
  }
  function desenhaGrafico(id, meses, resultado) {
    if(canvas != ""){
      if (id == "barChart") {
        $('#bar').empty();
        $('#bar').append("<canvas id='barChart style='height: 400px; width: 650px;' class='img-fluid'></canvas>");
        canvas = "";
      }
      else {
        $('#invest').empty();
        $('#invest').append("<canvas id='barInvest style='height: 400px; width: 650px;' class='img-fluid'></canvas>");
        canvas = "";
      }
    }
    canvas = document.getElementById(id);

    var myChart = new Chart(canvas, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [{
          data: [],
          borderWidth: 1,
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          label: 'Valor Total',
        }]
      },
      options: {
        responsive: true,
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
    for (var i = 0; i < meses.length; i++) {
      myChart.data.labels.push(meses[i]);
      myChart.data.datasets[0].data.push(parseFloat(resultado[i]));
      myChart.update();
    }
  }
});