<?php

namespace App\Controllers;

use App\Models\DisciplinaModel;
use App\Models\SalaModel;
use App\Models\TurmaModel;
use App\Models\UsuarioModel;

class Home extends BaseController
{

    private $session;
    private $disciplinaModel;
    private $usuarioModel;
    private $salaModel;
    private $turmaModel;

    public function __construct()
    {

        $this->disciplinaModel = new DisciplinaModel();
        $this->usuarioModel = new UsuarioModel();
        $this->salaModel = new SalaModel();
        $this->turmaModel = new TurmaModel();
    }

    public function index()
    {

        $data['totalRegistros'] = $this->totalRegistros();

        return view('index', $data);
    }

    public function teste(){
        $data['usuarios'] = $this->usuarioModel->findAll();

        return view('teste', $data);
    }

    public function listarTodasTabelas(){

        $data['disciplinas'] = $this->disciplinaModel->findAll();
        $data['usuarios'] = $this->usuarioModel->findAll();
        $data['salas'] = $this->salaModel->findAll();
        $data['turmas'] = $this->turmaModel->findAll();

        return $data;
    }

    public function totalRegistros()
    {

        $data = $this->listarTodasTabelas();


        // Conta o número de registros em cada item do array
        $totalDisciplinas = count($data['disciplinas']);
        $totalUsuarios = count($data['usuarios']);
        $totalSalas = count($data['salas']);
        $totalTurmas = count($data['turmas']);

        return [
            'totalDisciplinas' => $totalDisciplinas,
            'totalUsuarios' => $totalUsuarios,
            'totalSalas' => $totalSalas,
            'totalTurmas' => $totalTurmas
        ];
    }

}
