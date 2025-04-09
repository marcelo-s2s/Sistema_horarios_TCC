<?php

namespace App\Controllers;

use App\Models\DisciplinaModel;
use App\Models\HorarioAulaModel;
use App\Models\PeriodoLetivoModel;
use App\Models\SalaModel;
use App\Models\TurmaModel;

class Home extends BaseController
{

    private $session;
    private $disciplinaModel;
    private $usuarioModel;
    private $salaModel;
    private $turmaModel;
    private $periodoLetivoModel;
    private $horarioAulaModel;

    public function __construct()
    {

        $this->disciplinaModel = new DisciplinaModel();
        $this->usuarioModel = auth()->getProvider();
        $this->salaModel = new SalaModel();
        $this->turmaModel = new TurmaModel();
        $this->horarioAulaModel = new HorarioAulaModel();
        $this->periodoLetivoModel = new PeriodoLetivoModel();
    }

    public function buscarProfessores()
    {
        //retorna todos os professores
        $dadosProfessores = $this->usuarioModel->whereIn('id', function ($query) {
            $query->select('user_id')
                ->from('auth_groups_users')
                ->where('group', 'professor');
        })
            ->orderBy('username', 'ASC') // Adicionando ordenação pelo nome
            ->findAll();

        // Inicializa o array de usuários
        $professores = [];

        // Itera sobre os resultados para formatar os dados antes de passar para a view.
        foreach ($dadosProfessores as $dadosProfessor) {
            $professores[] = [
                'id_usuario' => $dadosProfessor->id, // ID do usuário.
                'nome' => $dadosProfessor->username, // Nome de usuário.
                'data_cadastro' => $dadosProfessor->created_at->toDateTimeString(), // Data de cadastro formatada como string.
                'tipo_usuario' => $dadosProfessor->group, // Grupo ao qual o usuário pertence.
                'email' => $dadosProfessor->secret, // E-mail ou credencial armazenada em auth_identities.
            ];
        }

        return $professores;
    }

    public function index()
    {
        $turmas = $this->request->getPost('turmas');

        $data['totalRegistros'] = $this->totalRegistros();
        $data['salas'] = $this->salaModel->orderBy('nome_sala', 'ASC')->findAll();
        $data['professores'] = $this->buscarProfessores();

        $data['horarios'] = $this->horarioAulaModel
            ->distinct()
            ->select('horario_aula.*, turma.*')
            ->join('turma', 'turma.codigo_turma = horario_aula.codigo_turma')
            ->where('periodo_letivo', $this->periodoLetivoModel->verificarPeriodoAtivo())
            ->groupBy('horario_aula.id_horario_aula')
            ->findAll();

        if (!empty($turmas)) {
            $data['horarios'] = $this->horarioAulaModel
                ->distinct()
                ->select('horario_aula.*, turma.*')
                ->join('turma', 'turma.codigo_turma = horario_aula.codigo_turma')
                ->where('periodo_letivo', $this->periodoLetivoModel->verificarPeriodoAtivo())
                ->whereIn('horario_aula.codigo_turma', $turmas)
                ->groupBy('horario_aula.id_horario_aula')
                ->findAll();
        }

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
