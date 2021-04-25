<?php
include('conexao02.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
     <!-- Style -->
     <link rel="stylesheet" href="css/style.css">

    <title>Login #8</title>
  </head>
  <body>
  <?php 
   $idaluguel = $_GET['idaluguel'];
   $pgsql = "SELECT ALU.*,cli.nome as nomecli, cli.cpfcnpj, VEI.modelo || ' ' || VEI.marca || ' ' || VEI.placa as nomevei FROM aluguel ALU
   join cliente cli on (ALU.idcliente = cli.idcliente)
   join veiculo vei on (ALU.idveiculo = vei.idveiculo)
   WHERE idaluguel = :idaluguel";
   $pgsql = $pdo->prepare($pgsql);
   $pgsql->bindvalue('idaluguel',$idaluguel);
   $pgsql->execute();
   
   
   if($pgsql->rowCount() > 0) {
       $dados = $pgsql->fetch();
       $idaluguel = $dados['idaluguel'];
    
       
   }

  ?>

    <div class="container"> <!-- container -->
      <div id="logo"> <!-- logo -->
                   <a href="index.php">
                      <h1>Mine.</h1>
                  </a>
               </div>
          <nav id="nav-menu-container"> <!-- start nav -->
              <ul class="nav-menu"> <!-- menu -->
              
              </ul>
          </nav> <!-- end navegation -->
      </div> <!-- end container -->
 
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="images/elemento-d.png" alt="Image" class="img-fluid float-right" width="1000px">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Aluguel <strong>Mine.</strong></h3>
            <!--   <p class="mb-4">Bem vindo funcionário</p> -->
            </div>
            <form action="aluguelsalvar.php" method="post">
            <div class="form-group first-">
              <?php
                echo '<input type="text" name="idaluguel" class="form-control" id="idaluguel" value="';
                echo $dados['idaluguel'];
                
                echo '" readonly>';
                ?>

              </div>
            <div class="form-group first-">
                <label for="dateInicio">Resumo do Cliente:</label>
                <br><br>
                <?php
                echo '<input type="text" name="nome" class="form-control" id="nome" value="';
                echo $dados['nomecli'];
                
                echo '" readonly>';
                ?>

              </div>
              <div class="form-group first-">
              <?php
                echo '<input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj" value="';
                echo $dados['cpfcnpj'];
                
                echo '" readonly>';
                ?>

              </div>
              <div class="form-group first-">
              <?php
                echo '<input type="hidden" name="idcliente" class="form-control" id="idcliente" value="';
                echo $dados['idcliente'];
                
                echo '">';
                ?>

              </div>
              <div class="form-group first-">
              <?php
                echo '<input type="hidden" name="idfuncionario" class="form-control" id="idfuncionario" value="';
                echo $_SESSION['idfunc'];
                
                echo '">';
                ?>

              </div>
              <div class="form-group first-">
                <label for="datainicio">Data Início</label>
                <br><br>
                <?php
                echo '<input type="date" name="datainicio" class="form-control" id="datainicio" value="';
                echo $dados['datainicio'];
                echo '">';
                ?>
                
              </div>

              <div class="form-group second-">
                <label for="datdevolucao">Data Devolução</label>
                <br><br>
                <?php
                echo '<input type="date" name="datadevolucao" class="form-control" id="datadevolucao" value="';
                echo $dados['datadevolucao'];
                echo '">';
                ?>
              </div>

              <div class="form-group">
              <label for="veiculo">Veículo:</label>

              <br><br>
                    <select name="idveiculo" id="idveiculo">
                    <?php
                        echo '<option value="';
                        echo $dados['idveiculo'];
                        echo '">';
                        echo $dados['nomevei'];
                        echo '</option>';               
                ?>                        
                        
                        
                    </select>
                    </div>
            <div class="form-group fifth">
                <label for="estado">Estado</label>
                <br><br>
                <select name="estado" id="estado">
                <?php
                        echo '<option>';
                        echo $dados['estado'];
                        echo '</option>';
                ?>  
                    </select>
              </div>

              <div class="form-group fourth-">
                <label for="cidade">Cidade</label>
                <?php
                echo '<input type="text" name="cidade" class="form-control" id="cidade" value="';
                echo $dados['cidade'];
                echo '" readonly>';
                ?>
                <br>
              </div>   
              <div id="botoes">  
              <input type="submit" value="Salvar Alterações" class="btn text-white btn-block btn-primary" >
              <input type="reset" value="Cancelar" class="btn text-white btn-block btn-primary">
            </div>  
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
