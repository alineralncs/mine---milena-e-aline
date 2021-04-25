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
   $idcliente = $_POST['idcliente'];
   $pgsql = "SELECT * FROM cliente WHERE idcliente = :idcliente";
   $pgsql = $pdo->prepare($pgsql);
   $pgsql->bindvalue('idcliente',$idcliente);
   $pgsql->execute();

   if($pgsql->rowCount() > 0) {
       $dados = $pgsql->fetch();
       $idcliente = $dados['idcliente'];
       
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
            <form action="aluguel.php" method="post">
              
            <div class="form-group first-">
                <label for="dateInicio">Resumo do Cliente:</label>
                <br><br>
                <?php
                echo '<input type="readonly" name="nome" class="form-control" id="nome" value="';
                echo $dados['nome'];
                
                echo '">';
                ?>

              </div>
              <div class="form-group first-">
              <?php
                echo '<input type="readonly" name="cpfcnpj" class="form-control" id="cpfcnpj" value="';
                echo $dados['cpfcnpj'];
                
                echo '">';
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
                <input type="date" name="datainicio" class="form-control" id="datainicio" value="<?php date("Y-m-d");?>">
                
                
              </div>

              <div class="form-group second-">
                <label for="datdevolucao">Data Devolução</label>
                <br><br>
                <input type="date" name="datadevolucao" class="form-control" id="datadevolucao">
              </div>

              <div class="form-group">
              <label for="veiculo">Veículo:</label>

              <br><br>
                    <select name="idveiculo" id="idveiculo">
                        <?php
                        $pgsql = "SELECT *,modelo || ' ' || marca || ' ' || placa as nome FROM veiculo";
                            $pgsql = $pdo->prepare($pgsql);
                            $pgsql->execute();

                                $dados = array();
                                $dados = $pgsql->fetchALL();
                                $total = $pgsql->rowCount();
                            
                                for($i = 0; $i < $total; $i++):
                                   echo '<option value="';
                                   $campo = $dados[$i]['idveiculo'];
                                   echo $campo;
                                   echo '">';
                                   $campo = $dados[$i]['nome'];
                                   echo $campo;
                                   echo '</option>';
                            endfor
                        ?>
                            
                        
                        
                    </select>
                    </div>
            <div class="form-group fifth">
                <label for="estado">Estado</label>
                <br><br>
                <select name="estado" id="estado">
                <option>Acre</option>
                        <option>Alagoas</option>
                        <option>Amapá</option>
                        <option>Amazonas</option>
                        <option>Bahia</option>
                        <option>Ceará</option>
                        <option>Distrito Federal</option>
                        <option>Espirito Santo</option>
                        <option>Goiás</option>
                        <option>Maranhão</option>
                        <option>Mato Grosso</option>
                        <option>Mato Grosso do Sul</option>
                        <option>Minas Gerais</option>
                        <option>Pará</option>
                        <option>Paraíba</option>
                        <option>Paraná</option>
                        <option>Pernambuco</option>
                        <option>Piauí</option>
                        <option>Rio de Janeiro</option>
                        <option>Rio Grande do Norta</option>
                        <option>Rio Grande do Sul</option>
                        <option>Rondônia</option>
                        <option>Roraima</option>
                        <option>Santa Catarina</option>
                        <option>São Paulo</option>
                        <option>Sergipe</option>
                        <option>Tocantins</option>
                    </select>
              </div>

              <div class="form-group fourth-">
                <label for="cidade">Cidade</label>
                <input type="string" name="cidade" class="form-control" id="cidade">
                <br>
              </div>   
              <div id="botoes">  
              <input type="submit" value="Alugar" class="btn text-white btn-block btn-primary" >
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
