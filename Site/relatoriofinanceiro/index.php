<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
    header('Location: ../Login');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/adminlte.min.css" />
    <link rel="stylesheet" href="../Menu/menu.css" />
    <link rel="icon" href="../Menu/logoigreja.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/estilos.css" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Relatório Financeiro</title>
</head>

<body>
    <?php require "../Menu/menu.php"; ?>
    <main class="container primary text-left">
        <div class="text-left display-4 my-2">
            <h1>Relatório Financeiro</h1>
            <hr />
        </div>
        <form class="form-inline mb-4">
            <div class="form-group ">
                <label for="datainicial" class="mx-2">Data Inicial: </label>
                <input type="date" name="datainicial" class="mx-1 form-control" id="datainicial">
            </div>
            <div class="form-group ">
                <label for="datafinal" class="mx-2">Data Final: </label>
                <input type="date" name="datafinal" class="mx-1 form-control" id="datafinal">
            </div>
            <button onclick="impressao();" class="btn btn-lg btn-outline-info mx-2">Imprimir</button>
        </form>
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Vendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#invest" role="tab"
                        aria-controls="profile" aria-selected="false">Investimentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="grafico-tab" data-toggle="tab" href="#graficos" role="tab"
                        aria-controls="grafico" aria-selected="false">Gráficos</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-bordered table-hover rounded shadow">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor Por Peça</th>
                                <th scope="col">Valor Total da Compra</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody id="table_home">
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="invest" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-bordered table-hover rounded shadow">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody id="table_invest">
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="graficos" role="tabpanel" aria-labelledby="grafico-tab">
                    <?php include('graficos.html'); ?>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="js/tabela.js"></script>
    <script type="text/javascript" src="chart.js/Chart.min.js"></script>
    <script type="text/javascript" src="js/abas.js"></script>
    <script type="text/javascript" src="js/impressao.js"></script>
</body>

</html>