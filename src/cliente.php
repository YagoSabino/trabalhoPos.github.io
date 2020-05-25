<!DOCTYPE html>
<html lang="pt">

<?php include "topo.php"; 
      require_once "modelos/conector.php"

?>
<body>

  <!-- Navigation -->
  <?php include "menu.php"; ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
     
      <div class="col-lg-3">
        <h1 class="my-4">Fit Store</h1> 

        <div class="list-group">
          <a href="historico.php?p=" class="list-group-item">Histórico de Compras</a>
        </div>
        <div class="list-group">
          <a href="login.php?p=99" class="list-group-item">Sair</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <?php
          $idUsuario = $_SESSION["ID_USUARIO"];
          $sql = "SELECT CODIGO, NOME
                  FROM CLIENTE
                  WHERE CODIGO = $idUsuario";
          $rs = conector::sqlQuery($sql);
        ?>
          <h1 class="my-4">Olá, <?php echo $rs[0]['NOME']?></h1> 
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
