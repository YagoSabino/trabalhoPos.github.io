<!DOCTYPE html>
<html lang="pt">

<?php include "topo.php"; 
?>
<body>

  <!-- Navigation -->
  <?php include "menu.php"  ?>
  
  <!-- Page Content -->
  <div class="container">

    <div class="row">
     
      <div class="col-lg-3">
        <h1 class="my-4">Fit Store</h1> 

        <div class="list-group">
          <a href="#" class="list-group-item">Equipamentos</a>
          <a href="#" class="list-group-item">Suplementos</a>
          <a href="#" class="list-group-item">Moda Fitness</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carrocelDestaques" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carrocelDestaques" data-slide-to="0" class="active"></li>
            <li data-target="#carrocelDestaques" data-slide-to="1"></li>
            <li data-target="#carrocelDestaques" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox"> 
            <div class="carousel-item active">
              <img class="d-block img-fluid" style="height: 350px; width: 900px" src="../img/banner1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" style="height: 350px; width: 900px" src="../img/banner2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" style="height: 350px; width: 900px" src="../img/banner3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carrocelDestaques" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carrocelDestaques" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php
            require_once 'modelos/conector.php';

            $rs = conector::sqlQuery('SELECT CODIGO, NOME, VALOR, URLIMAGEM, DESCRICAO FROM PRODUTO');
            foreach($rs as $value){
                        
          ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="detailProduto.php?p=<?php echo $value['CODIGO']?>"><img class="card-img-top" src="../img/<?php echo $value['URLIMAGEM'] ?>.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="detailProduto.php?p=<?php echo $value['CODIGO']?>"><?php echo $value['NOME'] ?></a>
                </h4>
                <h5>R$ <?php echo number_format ( $value['VALOR'] , 2 , ',' , '.' ) ?></h5>
                <p class="card-text"><?php echo $value['DESCRICAO'] ?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <?php 
            }
          ?>

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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
