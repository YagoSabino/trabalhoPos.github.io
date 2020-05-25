<!DOCTYPE html>
<html lang="pt">

<?php include "topo.php"; 
?>
<body>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/carrinho.js"></script>
    <?php
        require_once "modelos/conector.php";
        $idUsuario ="0";
        isset($_SESSION['ID_USUARIO'] ) ? $idUsuario = $_SESSION['ID_USUARIO'] : false ; 

        if(isset($_REQUEST['codCarrinho'])){
          $C = $_REQUEST['codCarrinho'];
          $sql = "UPDATE CARRINHO SET ESTADO = 2, DATACOMPRA = CURDATE()
                    WHERE CODIGO = $C";
            $rs = conector::sql($sql);

    ?>
    <script >
        alert("Compra Realizada");
    </script>
    <?php

        }

        if(isset($_REQUEST['CODIGO'])){ 
          $CODIGO = $_REQUEST['CODIGO'];  
          $sql = "SELECT C.CODIGO,
                         P.NOME,
                         P.VALOR,
                         IT.QUANTIDADE
                  FROM CARRINHO C,
                      ITEMCARRINHO IT,
                      PRODUTO P,
                      CLIENTE CLI
                  WHERE 	C.CODIGO = IT.CODCARRINHO
                    AND	C.CODCLIENTE = CLI.CODIGO
                    AND IT.CODPRODUTO = P.CODIGO
                    AND C.CODCLIENTE = $idUsuario
                    AND C.ESTADO = 1";

          if(!$rs = conector::sqlQuery($sql) ){
            $sql = "INSERT INTO CARRINHO(ESTADO, CODCLIENTE)
                    VALUES (1, '$idUsuario' )";

            $rs = conector::sql($sql);

            $sql = "INSERT INTO ITEMCARRINHO(CODPRODUTO, CODCARRINHO, QUANTIDADE)
                    VALUES($CODIGO , $rs, 1)";
            $rs = conector::sql($sql);

          }else{
              $CODCARRINHO = $rs[0]['CODIGO'];
              $sql = "SELECT IT.CODIGO, IT.CODCARRINHO
                      FROM ITEMCARRINHO IT
                      WHERE IT.CODCARRINHO = $CODCARRINHO AND IT.CODPRODUTO = $CODIGO";
              
              if(!$rs = conector::sqlQuery($sql)){
        
                $sql = "INSERT INTO ITEMCARRINHO(CODPRODUTO, CODCARRINHO, QUANTIDADE)
                        VALUES($CODIGO , $CODCARRINHO, 1)";

                $rs = conector::sql($sql);
              }
          }
        }
    
    ?>
  <!-- Navigation -->
  <?php include "menu.php"; ?>
  
  <!-- Page Content -->
  <div class="container">

    <div class="row my-5">
        <br>
        <div class="col-lg-6">Itens</div>
        <div class="col-lg-2">Preço</div>
        <div class="col-lg-2">Quantidade</div>
        <div class="col-lg-2">Total</div>
        
        <div class="col-lg-12"> <hr> </div>


        <?php 
          $sql = "SELECT C.CODIGO,
                          P.NOME,
                          P.VALOR,
                          P.URLIMAGEM,
                          IT.QUANTIDADE
                  FROM CARRINHO C,
                      ITEMCARRINHO IT,
                      PRODUTO P,
                      CLIENTE CLI
                  WHERE 	C.CODIGO = IT.CODCARRINHO
                    AND	C.CODCLIENTE = CLI.CODIGO
                    AND IT.CODPRODUTO = P.CODIGO
                    AND C.CODCLIENTE = $idUsuario
                    AND C.ESTADO = 1";

          if($rs = conector::sqlQuery($sql)){
            $codCarrinho = $rs[0]['CODIGO'] ;
            $totalGeral = 0;
            foreach($rs as $value){
              $total = $value['VALOR'] * $value['QUANTIDADE'];
              $totalGeral += $total;
        ?>
        <div class="col-lg-2"> <img style="height: 100px; width: 125px" src="../img/<?php echo $value['URLIMAGEM'] ?>.jpg"> </div>
        <div class="col-lg-4"> 
            <div class="col-lg-12"><strong><?php echo $value['NOME'] ?></strong></div>
            <div class="col-lg-12"><button type="button" class="btn btn-secondary btn-sm">Remover Item</button></div>
        </div>
        <div class="col-lg-2">R$ <?php echo number_format ( $value['VALOR'] , 2 , ',' , '.' ) ?></div>
        <div class="col-lg-2"> <input type="number" value="<?php echo $value['QUANTIDADE'] ?>" class="form-control" id="exampleFormControlInput1"> </div>
        <div class="col-lg-2">R$ <?php echo number_format ( $total , 2 , ',' , '.' ) ?></div>

        <?php
            }
          }
        ?>

        <div class="col-lg-12"> <hr> </div>

        <div class="col-lg-10 text-right"> Total : </div>
        <div class="col-lg-2"> R$ <?php echo isset($totalGeral) ?  number_format ( $totalGeral , 2 , ',' , '.' ) : false ?>  </div>
        <form name="frmCarrinho" id="frmCarrinho" action="carrinho.php" method="POST"> 
          <input type="hidden" name="codCarrinho" id="codCarrinho" value="<?php echo $codCarrinho?>">
        </form>
        <div class="col-lg-12"><button id="finalizar" name="finalizar" type="button" class="btn btn-secondary btn-lg btn-block">Finalizar Compra</button></div>
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
