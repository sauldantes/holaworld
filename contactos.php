<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

        function busqueda(){
            var busqueda = $(":input[name='busqueda']").val();
            var categoria = $("input[name='categoria']:checked").val();
            //alert(busqueda + " " + categoria);
            var posting = $.get( "ctrlBusContactos.php", {busqueda:busqueda, categoria:categoria, peticion: "buscar"});
            posting.done(function( data ) {
                $("#respuesta").show().html(data);
            });
        }

        $(document).ready(function(){
             $("#busqueda").keyup(busqueda);
             $(".rbCategoria").click(busqueda);
             $("#agregar").click(function(){

                 $("fmAgregar").show();

             });
        });

        
        </script>
    </head>
    <body>
        <?php
            session_start(); 
            if(!isset($_SESSION['logged_in']))
                header("Location: index.php");  
        ?>

        <h1> Contactos </h1>

        Buscar contacto : <input type="text" name="busqueda" id="busqueda"> </input> <br> <br>
       
       Buscar por: <br>
        <input type="radio" class="rbCategoria" name="categoria" value="nombre" checked> Nombre<br>
        <input type="radio" class="rbCategoria" name="categoria" value="email"> Correo electrónico <br>
        <input type="radio" class="rbCategoria" name="categoria" value="cel"> Celular
        <div id="respuesta" style="display: none"> </div>

        <br>
        <br>
        <button id="agregar"> Agregar contacto </button>
        <div style="display: none;" id="fmAgregar"> 
            Hola
            <form>
                Nombre: <input type="text"> </input>
            </form>
        </div>
    </body>
</html>