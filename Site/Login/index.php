<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="../Menu/logoigreja.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/estilo1.css">
    <script type="text/javascript" src="valida.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="container text-center fundo">
        <form action="verifica.php" id="quickForm" method="POST"
            class="col-12 col-lg-5 my-2 mx-auto border rounded-top shadow" onsubmit="return validaLogin();">
            <div class="text-center rounded my-4">
                <h1 class="display-4">Login</h1>
                <div class="dropdown-divider"></div>
            </div>

            <div class="form-group text-left">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>

            <div class="form-group text-left">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" id="senha">
            </div>

            <div class="my-2">
                <button type="submit" class="btn btn-lg btn-outline-success">ENTRAR</button>
            </div>

            <div class="nav-item my-3 text-right">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#myModal">Esqueceu sua senha? Clique
                    aqui</a>
            </div>

            <div id="logocan" class="my-2 text-center">
                <picture>
                    <img class="img-fluid" width="200px" src="logocantinho.png" alt="Logo Cantinho Fraterno">
                </picture>
            </div>
        </form>

        <div class="modal fade modal-centered" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header text-left">
                        <h4 class="modal-title">Insira o seu e-mail para mudar de senha</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="email/enviar.php" method="POST" id="quickForm">
                            <div class="form-group text-left">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="emailmodal" class="form-control" require>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-outline-success">Enviar</button>
                            </div>
                        </form>
                    </div>

                    <!-- Mensagens de erro. Deixarei comentado para que o BackEnd possa fazer o php -->
                    <!--
                            <div class='alert alert-danger alert-dismissible fade show'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <p>E-mail não cadastrado, tente novamente.</p>
                            </div>

                            <div class='alert alert-danger alert-dismissible fade show'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <p>E-mail enviado com sucesso!</p>
                            </div>
                        -->

                    <!-- Modal footer -->


                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>