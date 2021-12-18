<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="assets-catalogo/style.css">
</head>

<body>
    <br>
        <form class="formbotonalindex" action="index.html">
            <button class="botonalindex" type="submit">Index</button>
        </form> 

        <br>

        <?php
            include "connection.php";
            $obj =  new connection();
            $conn = $obj->connection_db();
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);
        ?>

        <div class="contenedor-dashboard">
            <?php while($row = $result->fetch_assoc()) { ?>

            <div>
                <form>
                    <div class="form-group">
                        <h4>NOMBRE</h4>
                        <label class="form-control" id="nombre"><?php echo $row["nombre"] ?></label>
                    </div>
                    <div class="form-group">
                        <h4>PRECIO</h4>
                        <label class="form-control" id="precio"><?php echo $row["precio"] ?></label>
                    </div>
                    <div class="form-group">
                        <h4>FOTO</h4>
                        <img src="imagenes-productos/<?php echo $row["foto"]?>" height="100px" width="100px">
                    </div>

                    <a href="masinfocatalogo.php?id=<?php echo $row['id']?>" class="btn btn-primary">Ver mas</a>
                </form>
            </div>

            <?php } ?>
        </div>
    
</body>

<footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</footer>

</html>