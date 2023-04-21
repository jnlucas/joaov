<?php
session_start();
include_once "banco.php";


if($_POST){


    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email=:email and senha =:senha");
    $stmt->execute(['email' => $_POST['email'], 'senha' => $_POST['senha']]); 
    $dados = [];
    $data = $stmt->fetchAll();
    foreach ($data as $row) {
         $dados[] = $row;
    }

    if($dados){
        $_SESSION["usuario"] = $dados[0];
    }
    header("location:catalogo.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
</head>
  <body>
  <div class="container">
    <div class="row">
        <div class="col-sm-3"></div>

        <div class="col-sm-6">
            <div class="card">

                <div class="card-body">
                    <form method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" />
                    </div>
                    <div class="row" style="margin-top:10px">
                        <div class="form-group">
                            <input type="submit" name="enviar" value="Logar" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
                </div>


            </div>
        </div>
        <div class="col-sm-3"></div>
        
    </div>
  </div>  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>