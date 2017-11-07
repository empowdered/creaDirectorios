<?php
/**
 * creado por: juan pablo muñoz leiva
 * fecha creacion: 31-10-2017
 * funcionalidad: archivo php, que puede ser invocado como un script 
 con la opción => php.exe -q "ruta del archivo.php", para windows
 */
define('RUTA_SCRIPT',$_SERVER['DOCUMENT_ROOT']);
$nombreArchivo ="listado.txt";
$modoApertura ="r";
define('ARCHIVO',$nombreArchivo);
define('APERTURA',$modoApertura);

if(!($archivo=fopen(ARCHIVO,APERTURA))){
    echo "Abierto";
}else{
    //while($dato = fgets($archivo,4096))){
    while(!feof($archivo)){
        //printf("%s<br/>",fgets($archivo,4096));
        $linea = fgets($archivo,4096);
        if(strpos($linea,"/")){
            $directorio = explode("/",$directorio);
            if(is_dir($directorio[0])){
                printf("Directorio %s, ya existe",$directorio[0])
            }else{
                mkdir($directorio[0]);
                printf("Directorio %s, creado",$directorio[0])
            }
        }else{
            
        }
    }
}
?>
