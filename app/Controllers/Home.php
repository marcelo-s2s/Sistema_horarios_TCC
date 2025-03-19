<?php

namespace App\Controllers;

use App\Models\DisciplinaModel;
use App\Models\SalaModel;
use App\Models\TurmaModel;

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
        $this->usuarioModel = auth()->getProvider();
        $this->salaModel = new SalaModel();
        $this->turmaModel = new TurmaModel();
    }

    public function index()
    {
        $data['totalRegistros'] = $this->totalRegistros();

        if (auth()->loggedIn()) {
            return view('index', $data); // Página para admins
        }

        return redirect()->route('horarioAulaPublico');       
    }

    public function teste(){

        return view('teste');
    }

    public function totalRegistros()
    {
        
        $totalDisciplinas = $this->disciplinaModel->countAll();
        $totalUsuarios = $this->usuarioModel->countAll();
        $totalSalas = $this->salaModel->countAll();
        $totalTurmas = $this->turmaModel->countAll();
        

        return [
            'totalDisciplinas' => $totalDisciplinas,
            'totalUsuarios' => $totalUsuarios,
            'totalSalas' => $totalSalas,
            'totalTurmas' => $totalTurmas
        ];
    }

}
