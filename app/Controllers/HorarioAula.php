<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HorarioAulaModel;
use App\Models\DisciplinaModel;
use App\Models\PeriodoLetivoModel;
use App\Models\SalaModel;
use App\Models\TurmaModel;
use CodeIgniter\HTTP\ResponseInterface;

class HorarioAula extends BaseController
{
    private $horarioAulaModel;
    private $disciplinaModel;
    private $salaModel;
    private $turmaModel;
    private $usuarioModel;
    private $periodoLetivoModel;

    private $session;

    public function __construct()
    {
        $this->horarioAulaModel = new HorarioAulaModel();
        $this->disciplinaModel = new DisciplinaModel();
        $this->salaModel = new SalaModel();
        $this->turmaModel = new TurmaModel();
        $this->usuarioModel = auth()->getProvider();
        $this->periodoLetivoModel = new PeriodoLetivoModel();

        $this->session = session();
    }

    public function buscarProfessor($idProfessor)
    {

        //retorna todos os professores
        $dadosProfessor = $this->usuarioModel->findById($idProfessor);

        // Inicializa o array de usuários
        $professor = [
            'id_usuario' => $dadosProfessor->id, // ID do usuário.
            'nome' => $dadosProfessor->username, // Nome de usuário.
            'data_cadastro' => $dadosProfessor->created_at->toDateTimeString(), // Data de cadastro formatada como string.
            'tipo_usuario' => $dadosProfessor->group, // Grupo ao qual o usuário pertence.
            'email' => $dadosProfessor->secret, // E-mail ou credencial armazenada em auth_identities.
        ];

        return $professor;
    }

    public function buscarProfessores()
    {

        //retorna todos os professores
        $dadosProfessores = $this->usuarioModel->whereIn('id', function ($query) {
            $query->select('user_id')
                ->from('auth_groups_users')
                ->where('group', 'professor');
        })->findAll();

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

    public function verificarPeriodoAtivo()
    {

        // Busca o período letivo onde 'ativo' é 1
        $periodo = $this->periodoLetivoModel->where('ativo', 1)->first();

        // Se encontrar um período ativo, retorna a identificação (exemplo: "25.1")
        return $periodo ? $periodo['periodo'] : 'erro';
    }


    public function listaHorarioAula()
    {
        // Obtém o período letivo ativo
        $periodoAtivo = $this->verificarPeriodoAtivo();

        // Obtém os dados de horários de aula e as informações relacionadas às turmas, eliminando duplicatas
        $data['horarios_aulas'] = $this->horarioAulaModel
            ->distinct()
            ->select('horario_aula.*, turma.*')
            ->join('turma', 'turma.codigo_turma = horario_aula.codigo_turma')
            ->where('horario_aula.periodo_letivo', $periodoAtivo)
            ->groupBy('horario_aula.id_horario_aula')
            ->findAll();

        return view('lista_horario_aula', $data);
    }

    public function horarioAula()
    {
        $data['disciplinas'] = $this->disciplinaModel->findAll();
        $data['salas'] = $this->salaModel->findAll();

        //retorna todos os professores
        $data['professores'] = $this->buscarProfessores();

        // Buscar o registro onde a coluna 'ativo' é 1 no periodoLetivoModel
        $data['periodoAtivo'] = $this->periodoLetivoModel->where('ativo', 1)->first();

        // Obter todas as turmas que não têm registros na tabela horario_aula
        $data['turmas'] = $this->turmaModel->whereNotIn('codigo_turma', function ($query) {
            $query->select('codigo_turma')
                ->from('horario_aula');
        })->findAll();

        return view('horario_aula', $data);
    }

    public function horarioProfessor()
    {
        //retorna todos os professores
        $data['professores'] = $this->buscarProfessores();

        return view('horario_professor', $data);
    }

    public function horarioSala()
    {
        $data['salas'] = $this->salaModel->findAll();

        return view('horario_sala', $data);
    }

    public function editarHorarioAula($codigoTurma)
    {
        $data['disciplinas'] = $this->disciplinaModel->findAll();
        $data['salas'] = $this->salaModel->findAll();
        $data['turmas'] = $this->turmaModel->where('codigo_turma', $codigoTurma)->findAll();
        $data['professores'] = $this->buscarProfessores();
        $data['editando'] = $data['turmas'][0]['codigo_turma'];
        $idHorarioAula = $this->horarioAulaModel->distinct()->where('codigo_turma', $codigoTurma)->findColumn('id_horario_aula');
        $data['idHorarioAula'] = $idHorarioAula[0];
        $data['periodoLetivo'] = $this->horarioAulaModel->distinct()->where('codigo_turma', $codigoTurma)->findColumn('periodo_letivo');

        return view('horario_aula', $data);
    }

    public function salvarHorarioAula()
    {
        $data = $this->request->getJSON(true);

        try {

            $idHorarioAula = date('YmdHis');
            foreach ($data['eventData'] as $event) {

                $this->horarioAulaModel->save([
                    'id_horario_aula' => $idHorarioAula,
                    'id_sala' => $event['id_sala'],
                    'codigo_turma' => $event['codigo_turma'],
                    'status' => $event['status'],
                    'periodo_letivo' => $event['periodo_letivo'],
                    'id_disciplina' => $event['id_disciplina'],
                    'dia_semana' => $event['dia_semana'],
                    'horario_inicio' => $event['horario_inicio'],
                    'horario_fim' => $event['horario_fim'],
                    'cor' => $event['cor'],
                    'professor' => $event['professor']
                ]);
            }

            return $this->response->setJSON(['success' => true, 'message' => 'Eventos processados e registrados no log.']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Erro ao processar os eventos.', 'error' => $e->getMessage()]);
        }
    }

    public function deletarHorarioAula($idHorarioAula)
    {
        try {
            if ($this->horarioAulaModel->where('id_horario_aula', $idHorarioAula)->delete()) {
                $response = ['status' => 'success', 'message' => 'Horário de aula apagado com sucesso'];
            } else {
                $response = ['status' => 'error', 'message' => 'Horário de aula não apagado'];
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            $response = ['status' => 'error', 'message' => 'Erro: ' . $e->getMessage()];
        }

        // Se for a requisição AJAX, retorna JSON
        if ($this->request->isAJAX()) {
            return $this->response->setJSON($response);
        }

        // Caso contrário, redireciona para a lista
        $this->session->setFlashdata($response['status'], $response['message']);
        return redirect()->route('listaHorarioAula');
    }

    public function carregarHorarios($codigoTurma)
    {
        // Pesquisa os horários da turma apenas no período letivo ativo
        $pesquisaHorarios = $this->horarioAulaModel
            ->where('codigo_turma', $codigoTurma)
            ->where('periodo_letivo', $this->verificarPeriodoAtivo())
            ->findAll();

        $horarios = [];

        // Itera sobre os dados para formatar os eventos
        foreach ($pesquisaHorarios as $horario) {

            $disciplina = $this->disciplinaModel->find($horario['id_disciplina']);
            $professor = $this->buscarProfessor($horario['professor']);
            $sala = $this->salaModel->find($horario['id_sala']);
            $inicio = str_pad($horario['horario_inicio'], 2, '0', STR_PAD_LEFT);
            $fim = str_pad($horario['horario_fim'], 2, '0', STR_PAD_LEFT);

            $horarios[] = [
                'id' => $horario['id_disciplina'],
                'title' => $disciplina['nome_disciplina'],
                'start' => '2024-11-' . $horario['dia_semana'] + 17 . 'T' . $inicio . ':00:00',
                'end' => '2024-11-' . $horario['dia_semana'] + 17 . 'T' . $fim . ':00:00',
                'backgroundColor' => $horario['cor'],
                'borderColor' => $horario['cor'],
                'extendedProps' => [
                    'id_disciplina' => $horario['id_disciplina'],
                    'professor' => $professor['id_usuario'],
                    'sala' => $sala['id_sala']
                ]
            ];
        }

        // log_message('debug', json_encode($horarios));
        // console.log($horarios);
        return $this->response->setJSON($horarios);
    }

    public function carregarHorariosProfessor($idProfessor)
    {
        $pesquisaHorarios = $this->horarioAulaModel
            ->where('professor', $idProfessor)
            ->where('periodo_letivo', $this->verificarPeriodoAtivo())
            ->findAll();

        $horarios = [];

        // Itera sobre os dados para formatar os eventos
        foreach ($pesquisaHorarios as $horario) {

            $disciplina = $this->disciplinaModel->find($horario['id_disciplina']);
            $turma = $this->turmaModel->find($horario['codigo_turma']);
            $sala = $this->salaModel->find($horario['id_sala']);
            $inicio = str_pad($horario['horario_inicio'], 2, '0', STR_PAD_LEFT);
            $fim = str_pad($horario['horario_fim'], 2, '0', STR_PAD_LEFT);

            $horarios[] = [
                'id' => $horario['id_disciplina'],
                'title' => $disciplina['nome_disciplina'],
                'start' => '2024-11-' . $horario['dia_semana'] + 17 . 'T' . $inicio . ':00:00',
                'end' => '2024-11-' . $horario['dia_semana'] + 17 . 'T' . $fim . ':00:00',
                'backgroundColor' => $horario['cor'],
                'borderColor' => $horario['cor'],
                'extendedProps' => [
                    'id_disciplina' => $horario['id_disciplina'],
                    'sala' => $sala['nome_sala'],
                    'turma' => $turma['nome_turma']
                ]
            ];
        }
        return $this->response->setJSON($horarios);
    }
    public function carregarHorariosSala($idSala)
    {
        $pesquisaHorarios = $this->horarioAulaModel
        ->where('id_sala', $idSala)
        ->where('periodo_letivo', $this->verificarPeriodoAtivo())
        ->findAll();
        
        $horarios = [];

        // Itera sobre os dados para formatar os eventos
        foreach ($pesquisaHorarios as $horario) {

            $disciplina = $this->disciplinaModel->find($horario['id_disciplina']);
            $turma = $this->turmaModel->find($horario['codigo_turma']);
            $professor = $this->buscarProfessor($horario['professor']);
            $inicio = str_pad($horario['horario_inicio'], 2, '0', STR_PAD_LEFT);
            $fim = str_pad($horario['horario_fim'], 2, '0', STR_PAD_LEFT);

            $horarios[] = [
                'id' => $horario['id_disciplina'],
                'title' => $disciplina['nome_disciplina'],
                'start' => '2024-11-' . $horario['dia_semana'] + 17 . 'T' . $inicio . ':00:00',
                'end' => '2024-11-' . $horario['dia_semana'] + 17 . 'T' . $fim . ':00:00',
                'backgroundColor' => $horario['cor'],
                'borderColor' => $horario['cor'],
                'extendedProps' => [
                    'id_disciplina' => $horario['id_disciplina'],
                    'professor' => $professor['nome'],
                    'turma' => $turma['nome_turma']
                ]
            ];
        }
        return $this->response->setJSON($horarios);
    }

    public function verificarConflitos()
    {
        $evento = $this->request->getJSON(true);

        // Verifica conflitos de professor
        $conflitoProfessor = $this->horarioAulaModel
            ->where('professor', $evento['professor'])
            ->where('dia_semana', $evento['dia_semana'])
            ->where('periodo_letivo', $this->verificarPeriodoAtivo())
            ->where('id_horario_aula !=', $evento['id_horario_aula'])
            ->groupStart() // Agrupa as condições para verificar sobreposição de horário
            ->where('horario_inicio <', $evento['horario_fim'])
            ->where('horario_fim >', $evento['horario_inicio'])
            ->groupEnd()
            ->countAllResults();

        if ($conflitoProfessor > 0) {
            return $this->response->setJSON([
                'conflito' => true,
                'tipo' => 'professor',
                'mensagem' => 'O professor já possui um evento nesse horário.'
            ]);
        }

        // Verifica conflitos de sala
        $conflitoSala = $this->horarioAulaModel
            ->where('id_sala', $evento['id_sala'])
            ->where('dia_semana', $evento['dia_semana'])
            ->where('periodo_letivo', $this->verificarPeriodoAtivo())
            ->where('id_horario_aula !=', $evento['id_horario_aula'])
            ->groupStart() // Agrupa as condições para verificar sobreposição de horário
            ->where('horario_inicio <', $evento['horario_fim'])
            ->where('horario_fim >', $evento['horario_inicio'])
            ->groupEnd()
            ->countAllResults();

        if ($conflitoSala > 0) {
            return $this->response->setJSON([
                'conflito' => true,
                'tipo' => 'sala',
                'mensagem' => 'A sala já está ocupada nesse horário.'
            ]);
        }

        // Sem conflitos
        return $this->response->setJSON([
            'conflito' => false,
            'mensagem' => 'Nenhum conflito detectado.'
        ]);
    }
}
