<?php
//Obtengo el json de internet
$json = file_get_contents("https://api.coinmarketcap.com/v1/ticker/");
//Convierto el json en un array para manipularlo mas facil
$array=json_decode($json, true);

//Obtengo el tamaño del array
//$longitud=count($array);
/*CON ESTE IMPRIMO EN PANTALLA
//recorro el array
for($i=0; $i<$longitud; $i++){
    //imprimo elementos especificos del array
    echo $array[$i]['id']." ".$array[$i]['name']." ".$array[$i]['symbol']."<br>";
    //conexion con base de datos
    //insert para ingresar los nombres directamente a la base de datos
}
**/

//CON ESTE DESCARGO UN ARCHIVO CSV DE TODO EL JSON
//cabeceras para descarga
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"my_csv_file.csv\""); 

//preparar el wrapper de salida
$outputBuffer = fopen("php://output", 'w');

//volcamos el contenido del array en formato csv
foreach($array as $val) {
    fputcsv($outputBuffer, $val);
}
//cerramos el wrapper
fclose($outputBuffer);
exit;
?>
