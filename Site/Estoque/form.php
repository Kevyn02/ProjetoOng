<?php
    $pesquisar = $_GET['pesquisar'];
    if(isset($_GET['colunas'])){
        $colunas = $_GET['colunas'];
    }else{
        $colunas = "nome";
    }
    
    $json = file_get_contents("http://localhost/ProjetoOng/Site/Estoque/encode.php?pesquisar=".$pesquisar."&colunas=".$colunas);
    $dados = json_decode($json, true);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cantinho Fraterno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../menu.css">
    <link rel="stylesheet" href="css/estoque.css">
</head>
<body>
    <?php include '../menu.php';?>
    <br/>
    <div class="container primary">
        <form class="form-inline my-5 my-lg-0" action="" method="GET">
            <div class="display-4 my-5 text-left">
                <h1>Estoque</h1>
                <hr/>
            </div>
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            <select name="colunas">
                <option value="nome" selected>Nome</option>
                <option value="categoria">Categoria</option>
            </select>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                <p>
                <?php
                if($dados == null){
                    echo "NENHUM RESULTADO FOI ENCONTRADO PARA A SUA PESQUISA<br>";
                    echo "Caso queira limpar sua pesquisa, basta pesquisar com a barra vazia";
                }
                else{
                    foreach($dados as $row){
                    ?>
                        <tr>
                        <td scope="row"><?php echo $row['nome'] ?></td>
                        <td><?php echo $row['categoria'] ?></td>
                        <td><?php echo $row['quantidade'] ?></td>
                        <td><?php echo $row['valor_unitario'] ?></td>
                        </tr>
                    <?php
                    }
                }
                ?>
                </p>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>