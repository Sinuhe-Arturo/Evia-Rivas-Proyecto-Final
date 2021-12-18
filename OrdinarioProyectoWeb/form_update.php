<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos-formulario.css">
    <title>Formulario</title>
</head>
<body>
    <br><br>
    <?php
    include "connection.php";
    $id = $_GET["id"];
    $obj =  new connection();
    $conn = $obj->connection_db(); 

    $sql = "SELECT * FROM productos WHERE id =".$id;  
    $result = $conn->query($sql);  
    $data = $result->fetch_assoc();
    ?>
    <form class="formbotonalindex" action="formulario.php">
            <button class="botonalindex" type="submit">Formulario</button>
    </form> 
    <div class="container">
        <h1 class="text-center">Actualización de productos</h1>
        <br><br>
        <h4 class="text-center" id="message_update"></h4>
        <p class="text-center" id="message_redirect"></p>
        <form action="update.php" method="POST" class="form_ajax_update" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Nombre del producto</label>
                <input type="text" class="form-control" name="product_name" id="" value="<?php echo $data['nombre'] ?>" reuired autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_price">Precio del producto</label>
                <input type="text" class="form-control" name="product_price" id="" value="<?php echo $data['precio'] ?>" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_description">Descripcion del producto</label>
                <input type="text" class="form-control" name="product_description" id="" value="<?php echo $data['descripcion'] ?>" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_img">Foto del producto</label>
                <input type="file" accept="image/*" class="form-control" name="product_img" id="imagen" value="<?php echo $data['foto'] ?>" required autocomplete= off>
            </div>

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div>
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </form>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="script.app.js"></script>

</html>