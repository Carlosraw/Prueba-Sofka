<?php

class Home extends Controller
{
    public $naves;

    public function __construct() 
    {
        $this->naves = $this->model('nave');
    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $getNaves = $this->naves->filtrarNaves($_POST['buscar']);
        
            $datos = [
                'naves' => $getNaves
            ];

        } else {
            $getNaves = $this->naves->leer();
        
            $datos = [
                'naves' => $getNaves
            ];
        }

        $this->view('/pages/home', $datos);
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosNave = [
                'nombre' => trim($_POST['nombre']),
                'tipo' => trim($_POST['tipo']),
                'pais' => trim($_POST['pais']),
                'combustible' => trim($_POST['combustible']),
                'atr_especial' => trim($_POST['atr_especial']),
                'valor_atr_especial' => trim($_POST['valor_atr_especial'])
            ];

            if ($this->naves->registrar($datosNave)) {
                redirection('/home');
            } else {
                redirection('/home');
            }
        } else {
            redirection('/home');
        }
    }
}