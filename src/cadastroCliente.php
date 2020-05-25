<!DOCTYPE html>
<html lang="pt">

<?php 
    require_once "modelos/conector.php";
    if($_REQUEST){

        $nome = $_REQUEST['nome'];
        $endereco = $_REQUEST['endereco'];
        $login = $_REQUEST['login'];
        $senha = $_REQUEST['senha'];

        $sql = "INSERT INTO CLIENTE(NOME, ENDERECO, LOGIN, SENHA)
                VALUES ('$nome', '$endereco', '$login', '$senha')";

        $rs = conector::sql($sql);

        $_SESSION['ID_USUARIO'] = $rs;

        header("Location: cliente.php?p=$rs");
        
    }

?>

<?php include "topo.php"; ?>
<body>

  <!-- Navigation -->
  <?php include "menu.php"; ?>
  
  <!-- Page Content -->
  <div class="container">

    <div class="row">
     
      <div class="col-lg-12">
        <h1 class="my-4">Cadasto de Cliente</h1> 
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-3"></div>
      <div class="col-lg-9">
            <form method="POST" action="cadastroCliente.php">
                <div class="row form-group">
                    <div class="col-lg-6">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>

                    <div class="col-lg-6">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                    </div>

                    <div class="col-lg-6">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Login">
                    </div>

                    <div class="col-lg-6">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    </div>

                    <div class="col-lg-12 my-4"><button type="submit" class="btn btn-secondary btn-lg btn-block">Cadastrar</button></div>

                   
                </div>
            </form>
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
