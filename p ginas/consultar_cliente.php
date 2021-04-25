<?php
//require('verificacao02.php');
require('verificacao02.php');

if(isset($_SESSION['idfunc']) && !empty($_SESSION['idfunc'])):?>


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

    <title>Consultar Cliente</title>
  </head>
  <script type="text/javascript">
    function validaCampo(){
      var campo = document.getElementById('cpfcnpj');
      var txt   = document.getElementById('cpfcnpj').value;
      var n     = txt.length;
      if(n < 11 || n <= 14){
        if(n < 11) {
        alert("CPF inválido, não deve ser menor que 11 digítos");
        return false;
        } else if(n > 11 && n < 14) {
          alert("CNPJ inválido, não deve ser menor que 14 digítos");
          return false;
        } else {
          return true;
        }
        campo.focus();
      }
    return true;
    }
    </script>
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
  <body>
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
              <h3>Consultar<strong> Cliente</strong></h3>
              <p class="mb-4">Digite o CPF ou CNPJ do cliente</p>
            </div>
            <form action="consult.php" method="post" onSubmit="return validaCampo()">
              <div class="form-group first">
                <label for="cpf">CPF</label>
                <input name="cpfcnpj_cliente" id="cpfcnpj" type="text" class="form-control" maxlength="14"/>
              </div>
              <input type="submit" value="Consultar" class="btn text-white btn-block btn-primary">
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  <section id="#naMe">
  <h5><?php echo $nomecliente?></h5>
</section>
 
  
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
