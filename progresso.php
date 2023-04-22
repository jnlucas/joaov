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

    $tamanho = ($dados[0]['qtd'] * 10) * 100 / 2500;

    

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progresso</title>
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



  <div class="container" style="margin-top:25%">
    
  <div class="modal fade" id="modal-conteudo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h2>Saque mínimo: R$2500</h2>
        <p>Você não atingiu o valor mínimo. Tente novamente assim que alcançar a meta de saldo</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <div class="row">
        <div class="col-sm-12">
            <div class="card" style="border-radius:25px;border-color:#292929" >
                <div style="background-color:#292929;border-radius:20px"class="card-body">
                    <p style="color:#ffc432" class="card-text"><b>Seu progresso atual:</b></p>
                    <span style="background-color: #ffc432; color:#000" class="badge">R$ <?php echo number_format(($dados[0]['qtd'] * 10), 2, ',', ' ');?></span>
                    <span style="background-color: green; color:#fff; margin-left:45%" class="badge">R$2500,00</span>
                    
                    <div method="post">
                    <div class="progress" style="margin-top:10px;height:30px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $tamanho .'%';?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="2500"></div>
                    </div>

                        <input style="background-color:#2df20f;color:#fff;margin-top:10px;border-radius:20px;font-weight:bold" type="submit" class="btn btn-success w-100 sacar" style="margin-top:10px" value="RESGATAR RECOMPENSA" />
                        
                        
                    </div>
                         
                </div>
            </div>


            <a href="https://go.perfectpay.com.br/PPU38CLUDDP" class="w-100" style=""><button style="background-color:#000;border-color:#ffc432;border-width:3px;border-radius:15px;color:#fff;margin-top:20px;height:60px;font-weight:bold;font-size:27px;margin-left:8%">INDIQUE E GANHE</button></a>
            <p class="" style="color:#ffc432;margin-left:14%;margin-top:10px"><i>Ganhe R$100 para cada indicação!</i></p>
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