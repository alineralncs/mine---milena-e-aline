<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 require 'conexao02.php';
 require 'Aluguel.class.php';
$idaluguel = $_GET['idaluguel'];
$pgsql = "SELECT * FROM aluguel WHERE idaluguel = :idaluguel";
        $pgsql = $pdo->prepare($pgsql);
        $pgsql->bindvalue('idaluguel',$idaluguel);
        $pgsql->execute();

  $locacao = $pgsql->fetch();
  $idcliente = $locacao['idcliente'];
  //echo $idcliente;
  //if(isset($_SESSION['idcadastro'])) {
      $pgsql = "SELECT nome, email FROM cliente WHERE idcliente = :idcliente";
          $pgsql = $pdo->prepare($pgsql);
          $pgsql->bindvalue('idcliente',$idcliente);
          $pgsql->execute();
          $nome = "";
          $email = "";
      if($pgsql->rowCount() > 0) {
      $dados = $pgsql->fetch();
      $nome = $dados['nome'];
      $email = $dados['email'];       
      //echo $email;
      //echo $nome;
      //echo $idcliente;
      //echo $idaluguel;
echo '<!DOCTYPE html>
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
    <script>
    function geek() {
        var doc;
        var result = confirm("Alterações salvas");
        if (result == true) {
           window.open("clientecadastrado.php");
        } else {
            doc = "Cancel was pressed.";
        }
        document.getElementById("g").innerHTML = doc;
    }
</script>
    <title>Controle</title>
  </head>';
  

  echo '<body>

  <header id="header">

<div class="container">
<div id="logo"> <!-- logo -->
             <a href="">
                <h1>Mine.</h1>
            </a>
         </div>
    <nav id="nav-menu-container"> <!-- start nav -->
        <ul class="nav-menu"> <!-- menu -->
        <li>
            <a href="index.php" class="sair">Sair</a>
        </li>
        </ul>
    </nav> <!-- end navegation -->
</div> <!-- end container -->
  </header>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 contents">
        <div class="row justify-content-left">
        <div class="col-md-8">
        <img src="images/elemento-carro.png" alt="Image" id="imagem" width="510px">
        </div>
        </div>
      </div>
      <div class="col-md-6 contents">
      <div class="row justify-content-left">
      <div class="col-md-8">
        <br><br><br><br><br><br><br><br><br>
        <button onclick="geek()" class="btn text-white btn-block btn-primary"><strong>Confirmar alterações</strong></button>
        
        <p id="g"></p>
        </div>';
        
            //echo 'Aluguel realizado com sucesso!';
echo '
            
        
        
    </div>
  </div>
 
  </body>
 </html>';  

      //use PHPMailer\PHPMailer\PHPMailer;
      //use PHPMailer\PHPMailer\Exception;
              
      //require 'PHPMailer/PHPMailerAutoload.php';
      //include 'class.phpmailer.php';
      
      $mail = new PHPMailer\PHPMailer\PHPMailer(true);
      $mail->isSMTP();
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->Username = 'mineveiculos@gmail.com';
      $mail->Password = 'mineloc0986';
      //$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
      //$mail->SMTPDebug = 2;
      $mail->From = 'mineveiculos@gmail.com';
      $mail->FromName = 'Mine Veículos';
      $mail->Subject = 'Locação Realizada';
      $contexto = '<strong>Parabéns!</strong><br>'.$nome.', sua locação foi alterada com sucesso!<br> Reserva modificada para ';
      $data = date("d/m/Y", strtotime($locacao['datainicio']));
      //$data = substr($locacao['datainicio'], 8, 2)."/".substr($locacao['datainicio'], 5, 2)."/".substr($locacao['datainicio'], 0, 4);
      $contexto.= 'o dia '.$data.' em '.$locacao['cidade'];
      $mail->Body =  $contexto;
      $mail->AltBody = 'Chegou o email da Mine! Locação de Veículos';
      $mail->addAddress($email,$nome);
      $enviado = $mail->Send();
      if ($enviado) { 
          //echo "Seu email foi enviado com sucesso!"; 
      } else { 
          //echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
      } 
  }


?>