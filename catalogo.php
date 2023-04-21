<?php
session_start();
include_once "banco.php";
if(!$_SESSION["usuario"]){
    header("location:index.php");
}

$stmt = $pdo->prepare("SELECT count(1) qtd FROM usuario_produto WHERE usuario_id=:usuario and gostei='gostei' " );
    $stmt->execute(['usuario' => $_SESSION['usuario']["id"]]); 
    $dados = [];
    $data = $stmt->fetchAll();
    foreach ($data as $row) {
         $dados[] = $row;
    }

    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
</head>
  <body>

  <div class="row" style="text-align: left;width: 100%;padding-left: 25%;padding-bottom:10px;margin-top:20px;">
                    <img src="img/logo.png" style="width:200px;">
                    </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <span style="background-color: #ffc432; color:#000" class="badge">Saldo &nbsp; &nbsp; &nbsp; &nbsp; R$ <?php echo number_format($dados[0]['qtd'], 2, ',', ' ');?></span> <span class="badge bg-success sacar"> Sacar</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="catalogo.php">Home</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="progresso.php">Progresso</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="pix.php">Cadastrar PIX</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php">Sair</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>



  <div class="container" style="margin-top:20px">
    
  <div class="modal fade" id="modal-conteudo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h2>Limite de saque: R$2500</h2>
        <p>Caso você tenha o saldo mínimo, a transferencia pix foi realizada para a chave cadastrada. Caso não tenha a quantia, volte amanhã para avaliar mais fotos!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <div class="row">
  <div class="col-sm-4" style="">
        <div class="card" >
        <img src="img/1.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="1" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="1" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/3.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="3" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="3" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/4.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="4" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="4" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/5.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="5" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="5" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/6.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="6" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="6" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/7.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="7" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="7" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/8.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="8" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="8" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/9.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="9" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="9" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/10.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="10" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="10" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/11.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="11" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="11" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/12.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="12" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="12" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/10.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="10" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="10" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/13.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="13" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="13" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/14.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="14" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="14" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/15.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="15" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="15" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/16.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="16" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="16" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/17.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="17" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="17" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/18.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="18" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="18" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/19.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="19" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="19" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/20.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="20" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="20" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/21.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="21" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="21" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/22.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="22" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="22" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/23.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="23" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="23" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/25.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="25" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="25" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/26.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="26" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="26" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/27.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="27" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="27" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/28.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="28" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="28" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/5.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="31" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="31" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/30.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="30" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="30" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/32.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="32" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="32" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/33.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="33" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="33" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/34.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="34" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="34" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/35.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="35" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="35" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/6.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="36" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="36" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/25.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="37" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="37" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/38.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="38" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="38" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/39.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="39" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="39" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/40.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="40" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="40" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/10.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="41" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="41" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/42.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="42" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="42" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/22.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="43" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="43" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/44.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="44" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="44" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/12.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="45" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="45" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/15.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="46" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="46" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/7.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="47" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="47" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/48.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="48" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="48" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/49.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="49" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="49" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/3.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="50" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="50" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4" style="">
        <div class="card" >
        <img src="img/1.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="1" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="1" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/3.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="3" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="3" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/4.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="4" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="4" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/5.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="5" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="5" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/6.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="6" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="6" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/7.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="7" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="7" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/8.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="8" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="8" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/9.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="9" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="9" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/10.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="10" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="10" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/11.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="11" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="11" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/12.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="12" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="12" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/10.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="10" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="10" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/13.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="13" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="13" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/14.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="14" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="14" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/15.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="15" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="15" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/16.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="16" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="16" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/17.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="17" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="17" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/18.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="18" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="18" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/19.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="19" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="19" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/20.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="20" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="20" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/21.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="21" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="21" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/22.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="22" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="22" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/23.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="23" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="23" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/25.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="25" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="25" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/26.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="26" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="26" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/27.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="27" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="27" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/28.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="28" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="28" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/5.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="31" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="31" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/30.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="30" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="30" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/32.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="32" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="32" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/33.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="33" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="33" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/34.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="34" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="34" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/35.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="35" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="35" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/6.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="36" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="36" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/25.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="37" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="37" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/38.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="38" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="38" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/39.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="39" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="39" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/40.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="40" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="40" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/10.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="41" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="41" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/42.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="42" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="42" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/22.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="43" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="43" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/44.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="44" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="44" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/12.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="45" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="45" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/15.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="46" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="46" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/7.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="47" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="47" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/48.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="48" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="48" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/49.webp" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="49" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="49" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>

        <div class="col-sm-4 mt-5" style="">
        <div class="card" >
        <img src="img/3.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Você gostou desse look?.</p>
            <a href="#" class="btn btn-success acao" data-produto="50" data-value="gostei">
              <img style="width: 20px;" src="img/like.png">
            </a>
            <a href="#" class="btn btn-danger  acao" data-produto="50" data-value="nao gostei">
              <img style="width: 20px;" src="img/unlike.png">
            </a>

            <div class="alert alert-success mt-3" style="display:none" role="alert">
            OK! Obrigado pelo voto.
            </div>
        </div>
        </div>



        </div>

        
        
        
    </div>
  </div>  
    <script>

        $(function(){
            $("body").on("click",".acao",function(){
                var produto = $(this).attr("data-produto");
                var valor = $(this).attr("data-value");
                var dados = {
                    produto: produto,
                    valor: valor
                }
                
                $.post("acao.php",dados,function(retorno){
                    $(".alert").fadeIn();
                    setTimeout(function(){
                        $(".alert").fadeOut();
                        
                    },2000)
                })
            })

            $("body").on("click",".sacar",function(){
                
                $("#modal-conteudo").modal("show");
            })
        })

    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>