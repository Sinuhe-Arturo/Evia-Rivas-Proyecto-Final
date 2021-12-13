
$(".form_ajax").submit(function (e) {
    let datos  =  $(this).serialize();
    e.preventDefault();
    console.log(datos);
    let user_message =  document.querySelector("#user_message");

    $.ajax({
        type:"POST",
        url:"guardar.php",
        data:{
            "form":datos
        },
        beforeSend:function () {
            user_message.textContent = "Enviando datos...";
        },
        success:function (response) {
            let data = JSON.parse(response);

            if (data.status == "success") {
                user_message.classList.add("text-success");
            }else{
                user_message.classList.add("text-danger");
            }
            user_message.textContent = data.message;

            setTimeout(() => {
                user_message.textContent="";
            }, 2000);

            let tr = `<tr id="fila-`+data.data_productos.id+`">
            <td>${data.data_productos.nombre}</td>
            <td>${data.data_productos.precio}</td>
            <td>${data.data_productos.foto}</td>
            <td>
                <a href="form_update.php?id=${data.data_productos.id}" class="btn btn-primary">Actualizar</a>
                <a href="delete.php?id=${data.data_productos.id}" class="btn btn-danger">Eliminar</a>
            </td>
            </tr>`;
            $(".table-productos").append(tr)
            
        },
        error:function (err) {
            console.log(err);
        }
    })
})

const message_update =  document.querySelector("#message_update")
$(".form_ajax_update").submit(function (e) {
    let data =  $(this).serialize();
    e.preventDefault();
    $.ajax({
        "type":"POST",
        "url":"update.php",
        "data":{
            "form":data
        },
        beforeSend:function () {
            message_update.textContent = "Actualizando producto...";
        },
        success:function (response) {
            response = JSON.parse(response)
            if (response.status == "success") {
                message_update.classList.add("text-success")
                document.querySelector("#message_redirect").textContent ="Redireccionando..."
                setTimeout(function () {
                    location.href="formulario.php"
                }, 2000);
            }else{
                message_update.classList.add("text-danger")
            }
            message_update.textContent  =  response.message
        },
        error:function (err) {
            console.log(err);
        } 
    })
})

$(".btn-danger").click(function() {
    alert("Eliminar");
})

function eliminar(id) {
    $.ajax({
        "type":"POST",
        "url":"delete.php",
        "data":{
            "id":id
        },
        beforeSend:function (params) {

        },
        success:function (response) {
            response =  JSON.parse(response)
            if (response.status == "success") {
                $("#fila-"+id).addClass("d-none")
            }
            alert(response.message)
        },
        error:function (err) {
            console.log(err)
        } 
    })
}