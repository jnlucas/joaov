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
  <body style="background-color:#000">

  <div class="row" style="text-align: left;width: 100%;padding-left: 25%;padding-bottom:10px;margin-top:20px;">
                    <img src="img/white-logo.png" style="width:200px;">
                    </div>

  <nav style="background-color:#000" class="navbar navbar-expand-lg bg-body-black">
  <div style="background-color:#000" class="container-fluid">
    <a class="navbar-brand" href="#"> <span style="background-color: #292929; color:#ffc432; border-radius:20px" class="badge"><b>Progresso &nbsp; &nbsp; &nbsp; &nbsp;</b> <i style="margin-left:30px;color:grey"> R$ <?php echo number_format($dados[0]['qtd'], 2, ',', ' ');?></i></span> </a>
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
        <div class="card" style="border:none">
          <div style="background-color:#000;" class="card-body">
            
              <form method="post"> 

                <img src="img/account.png" style="width:75px;margin-left:38%">
              
                <input style="background-color:#292929; border:none; color:white; margin-top:15px" type="button" name="pix" class="form-control" value="<?php echo $_SESSION['usuario']['email']?>" />
 
              </form>
          </div>
        </div>

        <div style="margin-top:50px" class="col-sm-12">
        <div class="card" style="border:none">
        <div style="background-color:#000" class="card-body">
           
            <form method="post">
            <div>    
            <input placeholder="Minha chave" style="background-color:#292929; border:none; color:white" type="text" name="pix" class="form-control" value="<?php echo $user[0]["pix"]?>" />
            
                <select style="margin-top:10px;background-color:#292929;color:#ffc432;border-color:grey" class="w-100">
                  <option value="">Email</option>
                  <option value="">Telefone</option>
                  <option value="">CPF</option>
                </select>
                <input style="background-color:#000;color:#ffc432;margin-top:10px;border-radius:20px;border-color:#ffc432;border-width:3px; font-size:20px" type="submit" class="btn btn-success w-100" style="margin-top:10px" value="SALVAR" />
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