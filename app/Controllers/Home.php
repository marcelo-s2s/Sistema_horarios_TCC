<?php

namespace App\Controllers;

use App\Models\DisciplinaModel;
use App\Models\HorarioAulaModel;
use App\Models\SalaModel;
use App\Models\TurmaModel;

class Home extends BaseController
{

    private $session;
    private $disciplinaModel;
    private $usuarioModel;
    private $salaModel;
    private $turmaModel;

    private $horarioAulaModel;

    public function __construct()
    {

        $this->disciplinaModel = new DisciplinaModel();
        $this->usuarioModel = auth()->getProvider();
        $this->salaModel = new SalaModel();
        $this->turmaModel = new TurmaModel();

        $this->horarioAulaModel = new HorarioAulaModel();
    }

    public function index()
    {
        $data['totalRegistros'] = $this->totalRegistros();

        if (auth()->loggedIn()) {
            return view('index', $data); // Página para admins
        }

        return redirect()->route('horarioAulaPublico');
    }

    public function teste()
    {

        $data['horarios'] = $this->horarioAulaModel
            ->distinct()
            ->select('horario_aula.*, turma.*')
            ->join('turma', 'turma.codigo_turma = horario_aula.codigo_turma')
            ->groupBy('horario_aula.id_horario_aula')
            ->findAll();

        return view('teste', $data);
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
