<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_productdesc-1.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />
    <title>Document</title>
</head>
<body>

    <?php

    include "connection.php";
    $obj =  new connection();
    $conn = $obj->connection_db();
    $id = $_GET["id"];
    $sql  = "SELECT nombre, precio, foto, descripcion FROM productos WHERE id='".$id."'";
    $result = $conn->query($sql);  
    $data = $result->fetch_assoc();
    ?>
    <br>
        <form class="formbotonalindex" action="catalogo.php">
            <button class="botonalindex" type="submit">Catalogo</button>
        </form> 

    <main class="container">
 
        <!-- columna izquierda / fotografia del producto -->
        
        <div class="left-column">
            
            <img src="imagenes-productos/<?php echo $data["foto"]?>">
        </div>
        
       
       
        <!-- columna derecha -->
        <div class="right-column">
       
          <!-- descripcion de producto -->
          <div class="product-description">
            <span>Canasta basica</span>
            <h1><?php echo $data["nombre"]?></h1>
            <p><?php echo $data["descripcion"]?></p>
          </div>
       
          <!-- configuracion de producto -->
          <div class="product-configuration">
       
            
       
            <!-- seleccion de tarjetas de debito, solo se ve chido, no funcionan para nada -->
            <div class="config-debid">
              <span><bold>Seleccion de tarjeta de credito / debito</bold></span>
       
              <div class="debit-choose">
                <button><img src="imagenes-index/visa.png"></button>
                <button><img src="imagenes-index/mastercard.png"></button>
                <button><img src="imagenes-index/amExprss.png"></button>
              </div>
       
              
            </div>
          </div>
       
          <!-- precio del producto -->
          <div class="product-price">
            <span>$<?php echo $data["precio"]?></span>
            <a href="#" class="cart-btn">Agregar al carrito</a>
          </div>
        </div>
      </main>
      <!-- scripts de java que aun no uso -->
      
 

</body>
</html>