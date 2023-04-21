<?php
session_start();
include_once "banco.php";
if(!$_SESSION["usuario"]){
    header("location:index.php");
}

if($_POST){
    try{
        $sql = "update usuario set pix=? where id=".$_SESSION["usuario"]["id"];
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_POST["pix"]]);
        
    }catch(Exception $e){
        print_r($e->getMessage());
    }
}


$stmt = $pdo->prepare("SELECT * FROM usuario WHERE id=:usuario  " );
    $stmt->execute(['usuario' => $_SESSION['usuario']["id"]]); 
    $user = [];
    $data = $stmt->fetchAll();
    foreach ($data as $row) {
         $user[] = $row;
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
    <title>Pix</title>
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
        <li class="nav-item">
          <a class="nav-link" href="pix.php">Cadastrar PIX</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="progresso.php">Progresso</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php">Sair</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>



<div class="container" style="margin-top:20%">
    
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
        <div class="col-sm-12">
        <div class="card" >
        <div class="card-body">
            <p class="card-text">Cadastre sua chave PIX</p>
            <form method="post">
            <div>    
            <input type="text" name="pix" class="form-control" placeholder="cadastre sua chave pix" value="<?php echo $user[0]["pix"]?>" />
                <select style="margin-top:10px" class="w-100">
                  <option value="">Email</option>
                  <option value="">Telefone</option>
                  <option value="">CPF</option>
                </select>
                <input style="background-color:#ffc432;color:#000;margin-top:10px" type="submit" class="btn btn-success w-100" style="margin-top:10px" value="Salvar" />
            </form>
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