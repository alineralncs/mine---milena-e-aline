<?php
require('verificacao02.php');

if(isset($_SESSION['icliente']) && !empty($_SESSION['icliente'])):?>


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

    <title>Controle</title>
  </head>
  <body>
  <?php 
   $idcliente = $_SESSION['idcliente'];
   echo $idcliente;
   $pgsql = "SELECT * FROM cliente WHERE idcliente = :idcliente";
   $pgsql = $pdo->prepare($pgsql);
   $pgsql->bindvalue('idcliente',$idcliente);
   $pgsql->execute();

   if($pgsql->rowCount() > 0) {
       $dados = $pgsql->fetch();
       $idcliente = $dados['idcliente'];
       
   }

  ?>

  <header id="header">

<div class="container"> <!-- container -->
<div id="logo"> <!-- logo -->
             <a href="">
                <h1>Mine.</h1>
            </a>
         </div>
    <nav id="nav-menu-container"> <!-- start nav -->
        <ul class="nav-menu"> <!-- menu -->
        <li>
            <a href="newAluguel.php" class="sair">Voltar</a>
        </li>
        </ul>
    </nav> <!-- end navegation -->
</div> <!-- end container -->
  </header>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <!--<img src="images/elemento-mao.png" alt="Image" width="400px">-->
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <?php
                echo "<h3>Cliente ".$dados['nome']. "cadastrado<strong> in Mine</strong></h3>";
                ?>
            </div>
            <form action="alugar.php" method="post">
            <input type="submit" value="Realizar novo Aluguel" class="btn text-white btn-block btn-primary">
            <br><br><br>
            <?php
                echo '<input type="hidden" name="idcliente" id="idcliente" value="'.$dados['idcliente'].'">';
                $vara = $dados['idcliente'];
                $pgsql = "SELECT ALU.*, VEI.modelo || ' ' || VEI.marca || ' ' || VEI.placa as nomevei FROM aluguel ALU inner join veiculo VEI on (ALU.idveiculo = VEI.idveiculo) WHERE ALU.idcliente = :vara AND ALU.status = 'A'";
                
                $pgsql = $pdo->prepare($pgsql);
                $pgsql->bindvalue('vara',$vara);
                $pgsql->execute();
        
                if($pgsql->rowCount() > 0) {
                    $dados = $pgsql->fetch();
                    $idcliente = $dados['idcliente'];
                    
                    $texto = '<table><h1 style="color: #F8C346"><strong>Reservas Abertas</strong></h1>
                    <table border="2" width="1000px" height="100px" ALIGN=center>
                    
                    
                    <tr height="20%">
                      <td align=center bgcolor=#F8C346><strong>Data prevista</strong></td>
                      <td align=center bgcolor=#F8C346><strong>Cidade</strong></td>
                      <td align=center bgcolor=#F8C346><strong>Estado</strong></td>
                      <td align=center bgcolor=#F8C346><strong>Veículo<strong></td>
                      <td align=center bgcolor=#F8C346><strong>Opção<strong></td>
                      </tr>
                      '; 
                      echo $texto;
                      while($row = $pgsql->fetch(PDO::FETCH_ASSOC)) {
                        echo '"<tr height="20%""><td align=center width="100">';
                        echo date("d/m/Y",strtotime($row['datainicio']));
                        echo '</td><td align=center width="300">';
                        echo $row['cidade'];
                        echo '</td><td align=center width="300">';
                        echo $row['estado'];
                        echo '</td><td align=center width="300">';
                        echo $row['nomevei'];
                        echo "</td><td align=center>";
                        //echo '<button type="button" class="btn text-white btn-block btn-primary"><a target="_blank" href="editar_alugar.php?idaluguel=';
                        //echo $row['idaluguel'].'">Editar</a></button>';
                        echo '<a target="_blank" href="editar_alugar.php?idaluguel=';
                        echo $row['idaluguel'].'">Editar</a>';
                        echo "</td></tr>";
                        
  
                      }
                      echo "</table>";
                }
                ?>
                <script>
                function receberMatricula(e) {
                  alert(e.value);
                }
                </script>
                <br><br>
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  <!--<section id="#naMe">
  <h5>php aqui echo $nomecliente php aqui</h5>
</section>-->
 
  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>


<?php
 else: header("Location: index.php"); 
 endif;
?>
