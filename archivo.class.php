<?php
class archivo{
    public $ruta;
    public $archivo;
    
    function __construct($ruta){
        $this->ruta = $ruta;
    }
    public function abrirArchivo(){
        try{
            $this->archivo = fopen($this->ruta,"r");
            //rewind($this->archivo);
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
    public function getArchivo(){
        return $this->archivo;
    }
}
?>