<?php
require_once("archivo.class.php");
class directorio{
    public $recurso;
    
    public function __construct(){
        //$this->recurso = new archivo("C:\\xamppx\\htdocs\\crearDirectorios\\directorios.txt");
        $this->recurso = new archivo("directorios.txt");
    } 
    public function crearDirectorio(){
        try{
            
            $this->recurso->abrirArchivo();
            
            while(!feof($this->recurso->getArchivo())){
                
                $linea = fgets($this->recurso->getArchivo(),4096);
                
                //echo "linea: " . $linea . "<br/>";
                //mkdir($_SERVER['DOCUMENT_ROOT'].'/'.$linea);
                //echo "Ruta: " . $_SERVER['DOCUMENT_ROOT'] .'/'. $linea . '<br/>';
                //echo "Ruta: " . $_SERVER['SCRIPT_FILENAME'] .'/'. $linea . '<br/>';
                //echo "Ruta: " . $_SERVER['SCRIPT_NAME'] .'/'. $linea . '<br/>';
                //echo $this->getRuta($_SERVER['SCRIPT_NAME'],$linea);
                
                $rutaAbsoluta = $this->getRuta($_SERVER['SCRIPT_NAME'],$linea);
                //sleep(2);
                echo $rutaAbsoluta . "<br>";
                if (!(is_dir($rutaAbsoluta))) {
                       try{
                            //sleep(2);
                            mkdir($rutaAbsoluta, 0777, true);
                            echo "Directorio Creado Exitosamente<br>";
                       }catch(Exception $ex){
                            $ex->getMessage();
                       } 
                }else{
                            echo "Error al crear<br>";
                }
            }
        }catch(Exception $ex){
            $ex->getMessage();
        }
        fclose($this->recurso->getArchivo());//cerramos
    }
    public function getRuta($base,$linea){
        try{
            
            $rutainicial = $base; //tomamos el valor base
            $rutainicial = explode('/',$rutainicial);//cortamos y convertimos en arreglo
            $rutaMod = array_reverse($rutainicial);//volteamos el arreglo
            array_shift($rutaMod);//borramos el nombre del script
            $rutaFinal = array_reverse($rutaMod);//volteamos nuevamente
            $rutaFinal = implode('/',$rutaFinal);//pegamos el arreglo nuevamente con el '/'
            return (string)($_SERVER['DOCUMENT_ROOT'] . $rutaFinal . '/' . $linea);//devolvemos la ruta limpia y completa
            
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
}
?>