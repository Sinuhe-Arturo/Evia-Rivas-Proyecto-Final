<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos-formulario.css">
    <title>Formulario</title>
</head>
<body>
    <br><br>

    <div class="container">
        <h4 class="text-center" id="user_message"></h4>
        <h1 class="titulo">FORMULARIO</h1>
        <br><br>
        <form action="guardar.php" method="POST" class="form_ajax">
            <div class="form-group">
                <label for="product_name">Nombre del producto</label>
                <input type="text" class="form-control" name="product_name" id="" reuired autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_price">Precio del producto</label>
                <input type="text" class="form-control" name="product_price" id="" required autocomplete= off>
            </div>
            <div class="form-group">
                <label for="product_img">Foto del producto</label>
                <div class="card border-primary">
                    <div class="card-body">
                        <label id="icon-image" for="imagen" class="btn btn-primary"><i class="fas fa-image"></i></label>
                        <span id="icon-cerrar"></span>
                        <input type="file" class="d-none" name="product_img" onchange="preview(event)" id="imagen" required autocomplete= off>
                        <img class="img-thumbnail" id="img-preview">
                    </div>
                </div>
            </div>

            <div>
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </form>
    </div>
    
    <br><br><br>.
    <?php
    
    include "connection.php";
    $obj =  new connection();
    $conn = $obj->connection_db();
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);      
    ?>
    <table class="container table-dark table-productos">
      <thead>
        <tr>
            <th>Nombre del producto</th>
            <th>Precio del producto</th>
            <th>Foto del producto</th>
            <th>Acciones</th>
        </tr>
        <?php 
            while($row = $result->fetch_assoc()) {

        ?>
            <tr id="fila-<?php echo $row['id'] ?>">
                <td><?php echo $row["nombre"] ?></td>
                <td><?php echo $row["precio"] ?></td>
                <td><?php echo $row["foto"] ?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $row['id']?>" class="btn btn-primary">Actualizar</a>
                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Eliminar</a>
                    <!--<button class="btn btn-danger" onclick="eliminar(<?php echo $row['id']?>)"  >Eliminar</button>-->
                </td>
            </tr>
        <?php
        
            }
        ?>
      </thead>
    </table>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="script.app.js"></script>
<script src="funciones.js"></script>

</html>