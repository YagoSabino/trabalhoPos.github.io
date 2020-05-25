<!DOCTYPE html>
<html lang="pt">

<?php include "topo.php"; ?>
<body>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../js/detailProduto.js"></script>
<?php 
    require_once "modelos/conector.php";
    $CODIGO = $_REQUEST['p'];

    $rs = conector::sqlQuery("SELECT CODIGO, NOME, VALOR, URLIMAGEM, DESCRICAO FROM PRODUTO WHERE CODIGO = $CODIGO");

?>

  <!-- Navigation -->
  <?php include "menu.php"; ?>
  
  <!-- Page Content -->
  <div class="container">

    <div class="row my-4">
     
      <div class="col-lg-7 my-4">
        
        <img style="height: 500px; width: 650px" src="../img/<?php echo $rs[0]['URLIMAGEM']; ?>.jpg">
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-md-5">

        <h1 class="my-4"><?php echo $rs[0]['NOME']?></h1> 
        
        <div class="row my-4" >
            <p>
                <?php 
                    echo $rs[0]['DESCRICAO'];
                ?>
            </p>
            <div class="col-lg-12">
                <h4 class="text-center">R$ <?php echo number_format ( $rs[0]['VALOR'] , 2 , ',' , '.' )?></h4>
            </div>

            <br>
            <form id="frmProduto" method="POST" action="carrinho.php">
                <input type="hidden" name="CODIGO" id="CODIGO" value="<?php echo $rs[0]['CODIGO']; ?>">
            </form>
            <button type="button" name="btnSubmit" id="btnSubmit" class="btn btn-secondary btn-lg btn-block">Comprar</button>
            
            

        </div>
        <!-- /.row -->

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
  

</body>

</html>
