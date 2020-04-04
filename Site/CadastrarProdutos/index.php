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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="../Mascaras/js/jquery.mask.min.js"></script>
    <script src="../CadastrarProdutos/js/mask-val.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Menu/menu.css" />
    <link rel="icon" href="../Menu/logoigreja.png" type="image/png" sizes="16x16">
    <title>Cadastro de produtos</title>
</head>

<body>
    <?php require "../Menu/menu.php";?>
    <main class="container d-flex justify-content-start primary">
        <div class="row">
            <div class="text-left display-4 my-2 col-12">
                <h1>Cadastro de produtos</h1>
                <hr />
            </div>
            <form action="insertProdutos.php" class="col-12" method="POST" enctype=multipart/form-data>
                <div class="form-group text-left col-md-5">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo" class="form-control codigo"
                        placeholder="Digite apenas números..." required>
                </div>
                <div class="form-group text-left col-md-4">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control" required>
                    </select>
                </div>
                <div class="form-group col-auto text-left">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                <div class="text-left col-md-5">
                    <label for="valor" class="d-inline">Preço</label>
                </div>
                <div class="input-group text-left col-md-7">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>R$</strong></span>
                    </div>
                    <input type="text" id="valor" name="valor" class="form-control dinheiro"
                        placeholder="Digite apenas números..." required>
                </div>
                <div class="form-group col-auto text-left">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" class="form-control">
                </div>
                <div class="container form-group">
                    <div class="col-auto custom-file">
                        <input class="form-control custom-file-input" id="customFile" type="file" name="imagem"
                            accept="image/png, image/jpeg">
                        <label class="custom-file-label text-left" for="customFile">Insira uma imagem...</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-outline-success m-2">Cadastrar</button>
                <button type="reset" class="btn btn-lg btn-outline-danger m-2">Cancelar</button>
                <a href="../AdicionarCategoria/index.php" class="btn btn-lg btn-outline-primary m-2">Categorias</a>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="../Mascaras/js/jquery.mask.min.js"></script>
    <script src="../CadastrarProdutos/js/mask-val.js"></script>
    <script src="js/categoria.js"></script>
</body>

</html>