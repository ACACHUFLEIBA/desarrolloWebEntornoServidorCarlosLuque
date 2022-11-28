
<?php
//creamos una funcion para establecer la conexion entre nuestra bbdd y nuestro php que nos valdra para todas las funcionalidades//
function conexion()
{
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "empleadosnn";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: no se ha podido establecer la conexión ";
    }

    return $conn;
}

//creamos una funcion que pasando la conexion y la select, nos creará la query y su resultado//
function crearSelect($conn, $selecQuery)
{
    $stmt = $conn->prepare($selecQuery);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();

    return $resultado;
}

//creamos una funcion que dándole por parámetro los datos de la query cre un select en html//
function crearSelectDpto($resultado)
{

    echo "<select name='departamentos'>";
    foreach ($resultado as $asociativo => $nombre) {

        echo "<option>" . $nombre['NOMBRE'] . "</option>";
    }
    echo "</select>";
}



function crearInsertEmple($conn, $selecQuery)
{

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $salario = $_POST['salario'];
    $fecha_nac = $_POST['fecha'];
    try {
        $stmt = $conn->prepare($selecQuery);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':fecha_nac', $fecha_nac);
        $stmt->execute();
        echo " se ha creado satisfactoriamente el empleado";
    } catch (PDOException $e) {
        echo "Error: no se ha podido insertar el empleado " . $e->getMessage();
    }
    $conn = null;
}

function altaTablann($conn, $idSeleccionado)
{

    $dni_emple = $_POST['dni'];
    $fecha = date("y-m-d");  //hay una cosa que no me cuadra si creo el alta con la fecha de hoy, como voy a hacer, no se puede crear un alta en otro día que no sea el actual, habria que crear una caja feha de alta para poder crearlo con antelación o con posterioridad
    //  echo $fecha;
    try {

        $stmt = $conn->prepare("INSERT INTO emple_dpto (DNI_EMPLE,ID_DPTO,FECHA_INICIO,FECHA_FIN) VALUES (:dni_emple,:id_dpto,:fecha_inicio,null)");
        $stmt->bindParam(':dni_emple', $dni_emple);
        $stmt->bindParam(':id_dpto', $idSeleccionado);
        $stmt->bindParam(':fecha_inicio', $fecha);
        $stmt->execute();

        echo "<br> se ha creado el empleado en la tabla nn <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
    $conn = null;
}

function crearSelectEmpleDpto($array_dptos)
{

    var_dump($array_dptos);
    echo "<select name='departamentos'>";
    foreach ($array_dptos as $clave => $nombre) {

        echo "<option >" . $nombre['NOMBRE'] . "</option>";
    }
    echo "</select>";
}


function obtenerIdSeleccionado($conn)
{

    $nombre_dpto = $_POST['departamentos'];
    try { // esto es necesaro???????
        //sacamos el id que corresponde con el departamento seleccionado en el desplegable//
        $stmt = $conn->prepare("SELECT ID FROM dpto WHERE dpto.NOMBRE=:nombre_dpto");
        $stmt->bindParam(':nombre_dpto', $nombre_dpto);
        $stmt->execute(); //ejecutamos el códico anterior//
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //esto no se que hace pero siempre se pone, creo que tiene que ver con la gestión de errores
        $result = $stmt->fetchAll(); //guardamos el resultado de la select en una variable con el nombre que queramos//
        //  var_dump($result);//lo que tiene es un array asociativo con la id con lo que tenemos coger el resultado que esté en la poscion 0, clave ID valor numero de id
        $idSeleccionado = "";
        foreach ($result as $key => $ids) {
            $idSeleccionado = $ids['ID']; //alamcenamos el id en una variable para poder pasarlo a la tabla nn
        }
        //  echo  $idSeleccionado;

    } catch (PDOException $e) {
        echo  $e->getMessage();
    }

    return $idSeleccionado;
}

function crearSelectDni($todos)
{
    // var_dump($todos);
    echo "<select name='todos'>";
    echo "<option value=''>";
    foreach ($todos as $asociativo => $dnis) {

        echo "<option>" . $dnis['DNI'] . "</option>";
    }
    echo "</select>";
}


function obtenerDniSeleccionado($conn)
{

    $numero_dni = $_POST['todos'];

    try {

        $stmt = $conn->prepare("SELECT DNI FROM emple WHERE emple.DNI=:numero_dni");
        $stmt->bindParam(':numero_dni', $numero_dni);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $dniSeleccionado = "";
        foreach ($result as $key => $dnis) {
            $dniSeleccionado = $dnis['DNI'];
        }
    } catch (PDOException $e) {
        echo  $e->getMessage();
    }

    return $dniSeleccionado;
}

//-----modificar Salario------//


function salarioActual($conn)
{

    $numero_dni = $_POST['todos'];
    try {

        $stmt = $conn->prepare("SELECT SALARIO FROM emple WHERE emple.DNI=:numero_dni");
        $stmt->bindParam(':numero_dni', $numero_dni);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        $salarioActual = "";
        foreach ($result as $key => $salario) {
            $salarioActual = $salario['SALARIO'];
        }
    } catch (PDOException $e) {
        echo  $e->getMessage();
    }
    return $salarioActual;
}

function modificarSalario($conn)
{


    try {
        $dni = $_POST['todos'];
        $nuevo_salario = floatval($_POST['nuevo_salario']);
        // echo $nuevo_salario;
        $stmt = $conn->prepare("UPDATE emple SET SALARIO=:nuevo_salario WHERE DNI=:dni_seleccionado");
        $stmt->bindParam('nuevo_salario', $nuevo_salario);
        $stmt->bindParam('dni_seleccionado', $dni);
        $stmt->execute();
        echo "se ha realizado el cambio de salario";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//-----------crear listado---------------//
function crearListado($conn)
{

    $nombre_dpto = $_POST['departamentos'];
    try {
        $stmt = $conn->prepare("SELECT emple.NOMBRE FROM emple,dpto,emple_dpto WHERE emple_dpto.ID_DPTO = dpto.ID AND emple_dpto.DNI_EMPLE=emple.DNI AND  dpto.NOMBRE=:nombre_dpto");
        $stmt->bindParam(':nombre_dpto', $nombre_dpto);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        foreach ($result as $key => $nombres) {
            echo "<br>" . $nombres["NOMBRE"];
        }
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}

function dptoActual($conn)
{
    $dni_emple = $_POST['todos'];
    try {

        $stmt = $conn->prepare("SELECT dpto.NOMBRE FROM dpto,emple,emple_dpto 
        WHERE emple_dpto.ID_DPTO = dpto.ID 
        AND emple_dpto.DNI_EMPLE=emple.DNI
        AND emple.DNI=:dni_emple and FECHA_FIN IS NULL");

        $stmt->bindParam(':dni_emple', $dni_emple);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);//hace que devuelva la select en un array asociativo
        $result = $stmt->fetchAll();
        foreach ($result as $key => $dptos) {
            echo  $dptos["NOMBRE"];
        }
    } catch (PDOException $e) {
        echo  $e->getMessage();
    }
}


function cambioDpto($conn)
{
    //creamos la fecha de fin
    $dni= $_POST['todos'];
    $fecha_fin= date("y-m-d"); 
    $nombre_dpto=$_POST['departamentos'];
    echo "variables";
    echo $dni;
    echo $fecha_fin;
    
    try{
        echo " <br>update";
    $stmt = $conn->prepare("UPDATE emple_dpto SET emple_dpto.FECHA_FIN=:fecha_fin WHERE emple_dpto.DNI_EMPLE=:numero_dni AND emple_dpto.FECHA_FIN is null");  
    $stmt->bindParam(':fecha_fin',$fecha_fin);
    $stmt->bindParam(':numero_dni',$dni);
    $stmt->execute();
    echo $fecha_fin." ".$dni; 
     

    $stmt = $conn->prepare("SELECT dpto.ID FROM dpto WHERE dpto.NOMBRE=:nombre_dpto");
    $stmt->bindParam(':nombre_dpto',$nombre_dpto);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//hace que devuelva la select en un array asociativo
    $result = $stmt->fetchAll();
    var_dump($result);
    $id_dpto="";
    foreach ($result as $key => $ids_dptos) {
        $id_dpto= $ids_dptos["ID"];
    }
    echo $id_dpto;

    $stmt = $conn->prepare("INSERT INTO emple_dpto (DNI_EMPLE,ID_DPTO,FECHA_INICIO,FECHA_FIN) VALUES (:numero_dni,:id_dpto,:fecha_fin,null)");
    $stmt->bindParam(':fecha_fin',$fecha_fin);
    $stmt->bindParam(':id_dpto',$id_dpto);  
    $stmt->bindParam(':numero_dni',$dni);   
    $stmt->execute();
    }catch(PDOException $e){
        echo  $e->getMessage();
    }

}
?>


   
