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

    <title>Cadastrar Cliente</title>
  </head>
  <script type="text/javascript">
function validaCampo(){
  var campo = document.getElementById('nome');
  var txt   = document.getElementById('nome').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('telefone');
  var txt   = document.getElementById('telefone').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('celular');
  var txt   = document.getElementById('celular').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('logradouro');
  var txt   = document.getElementById('logradouro').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('numero');
  var txt   = document.getElementById('numero').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('bairro');
  var txt   = document.getElementById('bairro').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('cidade');
  var txt   = document.getElementById('cidade').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('estado');
  var txt   = document.getElementById('estado').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('datanascimento');
  var txt   = document.getElementById('datanascimento').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('cpfcnpj');
  var txt   = document.getElementById('cpfcnpj').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('numcnh');
  var txt   = document.getElementById('numcnh').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('validadecnh');
  var txt   = document.getElementById('validadecnh').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
  var campo = document.getElementById('email');
  var txt   = document.getElementById('email').value;
  var n     = txt.length;
  if(n == 0){
    alert("Campo Obrigatório");
    return false;
    campo.focus();
  }
return true;

}
</script>
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
            <a href="consultar_cliente.php" class="sair">Voltar</a>
        </li>
        </ul>
    </nav> <!-- end navegation -->
</div> <!-- end container -->

</header> <!-- end header-->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="images/elemento-tela.png" alt="Image" class="img-fluid float-right" width="1000px">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3><strong>Cliente não encontrado</strong></h3>
              <p class="mb-4">Cadastro</p>
            </div>
            <form action="cadastrar.php" method="post" onSubmit="return validaCampo()">
              <div class="form-group first">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" class="form-control" id="nome" maxlength="65">
              </div>
              <div class="form-group last mb-4">
                <label for="password">Telefone</label>
                <input type="tel" name="telefone" class="form-control" id="telefone" maxlength="10">
              </div>
              <div class="form-group last mb-4">
                <label for="password">celular</label>
                <input type="tel" name="celular" class="form-control" id="celular" maxlength="11">
              </div>
              <p>¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨</p>
              <div class="form-group last mb-4">
              <div class="mb-4">
              <p class="mb-4">Endereço</p>
              </div>
                <label for="password">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" id="password" maxlength="60">
              </div>
              <div class="form-group last mb-4">
                <label for="password">Numero</label>
                <input type="text" name="numero" class="form-control" id="numero" maxlength="6">
              </div>
              <div class="form-group last mb-4">
                <label for="password">Bairro</label>
                <input type="text" name="bairro" class="form-control" id="bairro" maxlength="30">
              </div>
              <div class="form-group last mb-4">
                <label for="password">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="cidade" maxlength="30">
              </div>
              <div class="form-group last mb-4">
                <div class="row">
                    <div class="col">
                        <br>
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
                </div>
            </div>
              <br>
              <p>¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨</p>
              <div class="form-group last mb-4">
                <label for="datanascimento">Data de Nascimento</label>
                <br><br>
                <input type="date" name="datanascimento" class="form-control" id="datanascimento" maxlength="10">
              </div>
              <div class="form-group last mb-4">
                <label for="cpfcnpj">CPF/CNPJ</label>
                <br><br>
                <?php
                echo '<input type="readonly" name="cpfcnpj_cliente" class="form-control" id="cpfcnpj_cliente" value="';
                echo $_SESSION['cnpj'];
                
                echo '">';
                ?>

              </div>
              <div class="form-group last mb-4">
                <label for="numcnh">Numero Carteira Nacional de Habilitação</label>
                <input type="text" name="numcnh" class="form-control" id="numcnh" maxlength="11">
              </div>
              <div class="form-group last mb-4">
                <label for="validadecnh">Data de validade Carteira Nacional de Habilitação</label>
                <br><br>
                <input type="date" name="validadecnh" class="form-control" id="validadecnh" maxlength="10">
              </div>
              <div class="form-group last mb-4">
                <label for="email">Email</label>
                <br><br>
                <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" maxlength="120">
              </div>
              <input type="submit" value="Cadastrar" class="btn text-white btn-block btn-primary">
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
