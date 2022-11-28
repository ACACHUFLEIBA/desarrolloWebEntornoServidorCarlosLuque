<!doctype html>
<html lang="es">
    <head>
            <meta charset="UTF-8"/>
            <meta name="author" content="width=device-width"/> 
            <script type="text/javascript" src="js/players_fieldText.js"></script>
          
        
    </head>
<body>
        <h1>FORMULARIO EMPRESA N:N</h1>
        <p>ELIGE LA OPCIÓN QUE QUIERAS</p>

        <form method="POST" name="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

         <select name="departamentos">               
            <option  value="alta_dpto"> ALTA DEPARTAMENTO</option>
            <option  value="alta_emple"> ALTA EMPLEADO</option>
            <option  value="modifica_Salario"> MODIFICAR SALARIO</option>
            <option  value="lista_emple"> LISTAR EMPLEADO</option>
            <option  value="cambio_dpto"> CAMBIO DEPARTAMENTO</option>
         </select>   
            </br></br>
       
            <input type="submit" value="aceptar">

        </form>

</body>

 
