<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../menu.css"/>
    <title>Meu perfil</title>
</head>
<body>
    <main>
        <?php include '../menu.php'; ?>
        <div class="container primary">
            <div class="display-4 text-left">
                <h1>Meu perfil</h1>
                <hr/>
            </div>
            
            <div class="col-12 col-lg-6">
                <div class="my-3 text-left">
                    <img src="user.png" id="user" class="img-fluid card-img-top" alt="">
                </div>
                
                <div class="form-group text-left">
                    <label for="">Nome: </label>
                    <span>ADMIN CANTINHO</span>
                </div>

                <div class="form-group text-left">
                    <label for="">E-mail: </label>
                    <span>admin.cantinho@email.com</span>
                </div>

                <div class="form-group text-left">
                    <label for="">Tipo de usuário: </label>
                    <span>Admin</span>
                </div>
            </div>
            
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>