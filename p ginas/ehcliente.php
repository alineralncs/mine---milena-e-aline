<?php
require('verificacao.php');

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
    <link rel="stylesheet" href="css/style_newAluguel.css">

    <title>Novo Aluguel</title>
  </head>
  <body>
  <header id="header">

<div class="container"> <!-- container -->
<div id="logo"> <!-- logo -->
             <a href="index.php">
                <h1>Mine.</h1>
            </a>
         </div>
    <nav id="nav-menu-container"> <!-- start nav -->
        <ul class="nav-menu"> <!-- menu -->
        <li>
            <a href="" class="sair2"><?php echo $name?></a>
        </li>
        <li>
            <a href="logout.php" class="sair">Sair</a>
        </li>
        </ul>
    </nav> <!-- end navegation -->
</div> <!-- end container -->

</header> <!-- end header-->
  <div class="content">
    <div class="container">
      <div class="row">
      <div class="col-md-6 contents">
          <div class="row justify-content-left">
          <div class="col-md-8">
          <img src="images/p-2.png" alt="Image" width="600px" class="float-left" id="pessoa">
          </div>
          </div>
        </div> 
        <div class="col-md-6 contents">
          <div class="row justify-content-left">
          <div class="col-md-8">
          <form action="consultar_cliente.php" method="post">
              <br><br><br><br><br><br><br><br><br><br><br>
              <button type="submit" class="btn text-white btn-block btn-primary">Consultar Cliente</button>
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

<?php
 else: header("Location: index.php"); 
 endif;
?>