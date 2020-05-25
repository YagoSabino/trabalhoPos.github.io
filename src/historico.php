<!DOCTYPE html>
<html lang="pt">

<?php include "topo.php"; 
    require_once "modelos/conector.php";
?>
<body>

  <!-- Navigation -->
  <?php include "menu.php"; ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
     
      <div class="col-lg-3">
        <h1 class="my-4">Histórico de Compras</h1> 

        

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
      </div>

      <div class="row my-5">
        <br>
        <div class="col-lg-2">Codigo Compra</div>
        <div class="col-lg-2">Data da Compra</div>
        <div class="col-lg-2">Produto</div>
        <div class="col-lg-2">Valor</div>
        <div class="col-lg-2">Quantidade</div>
        <div class="col-lg-2">Total</div>
        
        <div class="col-lg-12"> <hr> </div>


        <?php 
          $idUsuario = $_SESSION['ID_USUARIO'];
          $sql = "SELECT C.CODIGO CODCOMPRA,
                        C.DATACOMPRA,
                        P.VALOR,
                        P.NOME,
                        IT.QUANTIDADE,
                        P.VALOR * IT.QUANTIDADE VALTOTAL
                FROM CARRINHO C,
                    ITEMCARRINHO IT,
                    PRODUTO P,
                    CLIENTE CLI
                WHERE 	C.CODIGO = IT.CODCARRINHO
                    AND	C.CODCLIENTE = CLI.CODIGO
                    AND IT.CODPRODUTO = P.CODIGO
                    AND C.CODCLIENTE = $idUsuario
                    AND C.ESTADO = 2
                ORDER BY C.CODIGO";

          if($rs = conector::sqlQuery($sql)){
            //$codCarrinho = $rs[0]['CODIGO'] ;
            $totalGeral = 0;
            $codCompra = 0;
            foreach($rs as $value){
              $total = $value['VALOR'] * $value['QUANTIDADE'];
              $totalGeral += $total;
              
        ?>
        <div class="col-lg-2"> <?php 
                                    if($codCompra <> $value['CODCOMPRA']){
                                        echo $value['CODCOMPRA'];
                                    }
                                ?> 
        </div>
        <div class="col-lg-2"> <?php echo $value['DATACOMPRA'] ?> </div>
        <div class="col-lg-2"> <?php echo $value['NOME'] ?> </div>
        <div class="col-lg-2">R$ <?php echo number_format ( $value['VALOR'] , 2 , ',' , '.' ) ?></div>
        <div class="col-lg-2"> <?php echo $value['QUANTIDADE'] ?> </div>
        <div class="col-lg-2">R$ <?php echo number_format ( $value['VALTOTAL'] , 2 , ',' , '.' ) ?></div>

        <?php
                $codCompra = $value['CODCOMPRA'];
            }
          }
        ?>

        <div class="col-lg-12"> <hr> </div>
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
