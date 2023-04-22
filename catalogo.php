<?php
session_start();
include_once "banco.php";
if(!$_SESSION["usuario"]){
    header("location:index.php");
}

$stmt = $pdo->prepare("SELECT count(10) qtd FROM usuario_produto WHERE usuario_id=:usuario and gostei='gostei' " );
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
  <body style="background-color:#000">

  <div class="row" style="text-align: left;width: 100%;padding-left: 25%;padding-bottom:10px;margin-top:20px;">
                    <img src="img/white-logo.png" style="width:200px;">
                    </div>

  <nav style="background-color:#000" class="navbar navbar-expand-lg bg-body-black">
  <div style="background-color:#000" class="container-fluid">
    <a class="navbar-brand" href="#"> <span style="background-color: #292929; color:#ffc432; border-radius:20px" class="badge"><b>Progresso &nbsp; &nbsp; &nbsp; &nbsp;</b> <i style="margin-left:30px;color:grey"> R$ <?php echo number_format(($dados[0]['qtd'] * 10), 2, ',', ' ');?></i></span> </a>
    <button style="background-color:grey;margin-right:10px" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span style="background-color:grey" class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a style="color:grey;" class="nav-link active" aria-current="page" href="catalogo.php">Home</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="progresso.php">Progresso</a>
        </li>-->
        <li class="nav-item">
          <a style="color:grey;" class="nav-link" href="pix.php">Cadastrar PIX</a>
        </li>
        <li class="nav-item">
          <a style="color:grey;" class="nav-link" href="progresso.php">Progresso</a>
        </li>
        <li class="nav-item">
          <a style="color:grey;" class="nav-link" href="sair.php">Sair</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<style>
    .alerta2{
        position: absolute;
        margin-top:20px;
    }
</style>

  <div class="container" style="margin-top:20px">
  <div class="alert alert-success mt-3 alerta2" style="display:none;z-index: 10000;position: fixed;" role="alert">
    OK! Obrigado pelo voto.
   </div>

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
        <div class="col-sm-4" >
          <div class="card" style="background-color:#000" >
              <img src="img/1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="1" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="1" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/3.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="2" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="2" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/4.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="3" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="3" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/5.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="4" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="4" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/6.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="5" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="5" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/7.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="6" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="6" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/8.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="7" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="7" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/9.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="8" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="8" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/10.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="9" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="9" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/11.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="10" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="10" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/12.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="11" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="11" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/13.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="12" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="12" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/15.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="14" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="14" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/16.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="15" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="15" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/17.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="16" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="16" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/18.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="17" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="17" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>
        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/19.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="18" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="18" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/20.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="19" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="19" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/5.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="20" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="20" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/21.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="21" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="21" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/22.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="22" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="22" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/23.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="23" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="23" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/42.webp" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="24" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="24" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/25.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="25" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="25" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/26.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="26" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="26" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/27.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="27" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="27" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/28.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="28" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="28" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/40.webp" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="29" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="29" data-value="nao gostei">
                    <img style="width: 20px;" src="img/unlike.png">
                  </a>

                  <div class="alert alert-success mt-3" style="display:none" role="alert">
                  OK! Obrigado pelo voto.
                  </div>
                </div>
          </div>

        </div>

        <div class="col-sm-4" style="margin-top:30px" >
          <div class="card" style="background-color:#000" >
              <img src="img/30.png" class="card-img-top" alt="...">
                <div class="card-body">
                
                  <a style="border-radius:15px" href="#" class="btn btn-success acao" data-produto="30" data-value="gostei">
                    <img style="width: 20px;" src="img/like.png">
                  </a>
                  <a style="margin-left:10px;border-radius:15px" href="#" class="btn btn-danger  acao" data-produto="30" data-value="nao gostei">
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
                    $(".alerta2").fadeIn();
                    setTimeout(function(){
                        $(".alerta2").fadeOut();
                        
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