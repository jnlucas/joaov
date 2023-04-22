<?php
session_start();
include_once "banco.php";


if($_POST){

    if($_POST['novologin']){
        try{
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?,?,?)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute(["", $_POST["email"], $_POST["senha"]]);
            
        }catch(Exception $e){
            print_r($e->getMessage());
        }
    }


    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email=:email and senha =:senha");
    $stmt->execute(['email' => $_POST['email'], 'senha' => $_POST['senha']]); 
    $dados = [];
    $data = $stmt->fetchAll();
    foreach ($data as $row) {
         $dados[] = $row;
    }

    if($dados){
        $_SESSION["usuario"] = $dados[0];
    }else{
        echo "<script>alert('Usuário ou senha estão errados'); window.location='index.php'</script>";
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
  <body style="background-color:#000">
  <div class="container" style="padding-top:25%">
    <div class="row" style="margin-top:50px">
        <div class="col-sm-3"></div>

        <div class="row" style="text-align: left;width: 100%;padding-left: 25%;padding-bottom:10px">
                    <img src="img/white-logo.png" style="width:200px;">
                    </div>

        <div class="col-sm-6">
            <div style="border:none"  class="card">

                <div class="card-body bg-black">
                    
                    <form method="post">
                    <div class="form-group">
                        
                        <input placeholder="Email" style="background-color:grey; border:none" type="text" name="email" class="form-control" />
                    </div>
                    <div style="margin-top:20px" class="form-group">
                        
                        <input placeholder="Senha" style="background-color:grey; border:none" type="password" name="senha" class="form-control" />
                    </div>
                    <div class="row form-group " style="margin-top:8px">
                        <label style="color:white" > 
                        <input type="checkbox" class="form-checkbox" name="novologin" value="1" /> <i>Não tem cadastro? Marque aqui para se cadastrar.</i> </label>
                    </div>
                    <div class="row" style="margin-top:10px">
                        <div class="form-group" style="">
                            <input style="border-radius:20px; font-size:30px"  type="submit" name="enviar" value="LOGIN" class="btn btn-warning w-100" />
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