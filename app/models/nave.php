<?php

class nave
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function registrar($datos)
    {
        $this->db->query('INSERT INTO naves (nombre, tipo, pais, combustible, atr_especial, valor_atr_especial)	VALUES (:nombre, :tipo, :pais, :combustible, :atr_especial, :valor_atr_especial)');

        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':tipo', $datos['tipo']);
        $this->db->bind(':pais', $datos['pais']);
        $this->db->bind(':combustible', $datos['combustible']);
        $this->db->bind(':atr_especial', $datos['atr_especial']);
        $this->db->bind(':valor_atr_especial', $datos['valor_atr_especial']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function leer() {

        $this->db->query('SELECT id, nombre, tipo, pais, combustible, atr_especial, valor_atr_especial FROM naves');
        return $this->db->registers();
        
    }

    public function filtrarNaves($busqueda) {
        $this->db->query('SELECT id, nombre, tipo, pais, combustible, atr_especial, valor_atr_especial FROM naves WHERE nombre LIKE :buscar');
        $this->db->bind(':buscar', '%' . $busqueda . '%');
        return $this->db->registers();
    }
}


//Clase nave padre
abstract class NavePadre {

    protected $nombre;
    protected $pais;
    protected $combustible;
    

    public function __construct($nombre ,$pais ,$combustible){
        $this->nombre =$nombre;
        $this->pais = $pais;
        $this->combustible = $combustible;
        
    }

    abstract static function despegar();
    abstract static function aterrizar();
}

class NaveLanzadora extends NavePadre
{
    protected $empuje;
    
    public function __construct($nombre ,$pais ,$combustible, $empuje){
        parent::__construct($nombre, $pais, $combustible );
        $this->empuje = $empuje;
        
    }

    static function despegar() {
        return "Despegando la nave lanzadora";
    }

    static function aterrizar() {
        return "Aterrizando la nave lanzadora";
    }

}

class NaveTripulada extends NavePadre
{
    protected $numtripulantes;
    
    public function __construct($nombre ,$pais ,$combustible, $numtripulantes){
        parent::__construct($nombre, $pais, $combustible );
        $this->numtripulantes = $numtripulantes;
        
    }

    static function despegar() {
        return "Despegando la nave tripulada";
    }

    static function aterrizar() {
        return "Aterrizando la nave tripulada";
    }

}

class NaveNoTripulada extends NavePadre
{
    protected $mision;
    
    public function __construct($nombre ,$pais ,$combustible, $mision){
        parent::__construct($nombre, $pais, $combustible );
        $this->mision = $mision;
        
    }

    static function despegar() {
        return "Despegando la nave no tripulada";
    }

    static function aterrizar() {
        return "Aterrizando la nave no tripulada";
    }

}

class Estacion extends NavePadre
{
    protected $area;
    
    public function __construct($nombre ,$pais ,$combustible, $area){
        parent::__construct($nombre, $pais, $combustible );
        $this->area = $area;
        
    }

    static function despegar() {
        return "Despegando la estacion espacial";
    }

    static function aterrizar() {
        return "Aterrizando la estacion espacial";
    }

}
?>