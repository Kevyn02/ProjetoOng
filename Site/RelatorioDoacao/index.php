<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header('Location: ../Login');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminlte.min.css" />
    <link rel="stylesheet" href="../menu.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <title>Relatório de Doações</title>
</head>

<body>
    <?php include '../menu.php';?>
    <div class="container">
        <div>
            <div class="container text-center col primary">
                <div class="display-4 mt-5 text-left">
                    <h1>Relatório de Doações</h1>
                    <hr />
                </div>
            </div>
        </div>
        <form action="" class="form-inline mb-4">
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
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#doacoes" role="tab"
                        aria-controls="home" aria-selected="true">Doações</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#graficos" role="tab"
                        aria-controls="profile" aria-selected="false">Gráficos</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="doacoes" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-bordered table-hover rounded shadow">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody id="table_doacoes">
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="graficos" role="tabpanel" aria-labelledby="profile-tab">
                    <?php require('graficos.html'); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="js/tabela.js"></script>
    <script type="text/javascript" src="js/abas.js"></script>
    <script type="text/javascript" src="js/impressao.js"></script>
</body>

</html>