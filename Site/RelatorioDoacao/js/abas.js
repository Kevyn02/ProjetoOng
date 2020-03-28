$(document).ready(function () {
  var canvas = "";
  $('#myTab a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  });

  $('#minhaAba a[href="#doacao"]').tab('show');
  $('#minhaAba a[href="#graficos"]').tab('show');

  mostrarDoacao("", "");
  $('#datainicial').change(function () {
    var datainicial = "";
    if ($('#datainicial').val() != "") {
      datainicial = $('#datainicial').val();
    }
    mostrarDoacao(datainicial, $('#datafinal').val());
  });
  $('#datafinal').change(function () {
    var datafinal = "";
    if ($('#datafinal').val() != "") {
      datafinal = $('#datafinal').val();
    }
    mostrarDoacao($('#datainicial').val(), datafinal);
  });

  function mostrarDoacao(datainicial, datafinal) {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/ProjetoOng/Site/RelatorioDoacao/grafico_doacoes.php',
      dataType: 'json',
      data: { 'datainicial': datainicial, 'datafinal': datafinal },
      // Após carregar, coloca a lista dentro do select de categorias.
      success: function (data) {
        //$('#barChart').get(0).getContext('2d')
        meses = [];
        valores = [];
        for (var i = 0; i < data.length; i++) {
          meses.push(data[i]['Mes'] + "/" + data[i]['Ano']);
          valores.push(data[i]['Quantidade']);
        }
        desenhaGrafico("doacao", meses, valores);
      },
      error: function (xhr, status, error, data) {
        alert("Grafico 1:" + error);
      },
    });
  }
  function desenhaGrafico(id, meses, resultado) {
    if(canvas != ""){
      if (id == "doacao") {
        $('#chart').empty();
        $('#chart').append("<canvas id='doacao style='height: 400px; width: 650px;' class='img-fluid'></canvas>");
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
          label: 'Quantidade Total',
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
      myChart.data.datasets[0].data.push(resultado[i]);
      myChart.update();
    }
  }
});