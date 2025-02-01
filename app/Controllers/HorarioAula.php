<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HorarioAulaModel;
use App\Models\DisciplinaModel;
use App\Models\PeriodoLetivoModel;
use App\Models\SalaModel;
use App\Models\TurmaModel;
use App\Models\UsuarioModel;
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
        $this->usuarioModel = new UsuarioModel();
        $this->periodoLetivoModel = new PeriodoLetivoModel();

        $this->session = session();
    }

    public function listaHorarioAula()
    {
        // Obtém os dados de horários de aula e as informações relacionadas às turmas, eliminando duplicatas
        $data['horarios_aulas'] = $this->horarioAulaModel
            ->distinct() // Garante que os resultados sejam distintos, eliminando duplicatas com base nos campos selecionados.
            ->select('horario_aula.*, turma.*') // Seleciona todas as colunas da tabela 'horario_aula' e 'turma'.
            ->join('turma', 'turma.codigo_turma = horario_aula.codigo_turma') // Realiza um JOIN entre 'horario_aula' e 'turma', relacionando pelo campo 'codigo_turma'.
            ->groupBy('horario_aula.id_horario_aula') // Agrupa os resultados pelo campo 'id_horario_aula', garantindo que cada ID apareça apenas uma vez.
            ->findAll();

        return view('lista_horario_aula', $data);
    }

    public function horarioAula()
    {
        $data['disciplinas'] = $this->disciplinaModel->findAll();
        $data['salas'] = $this->salaModel->findAll();
        $data['professores'] = $this->usuarioModel->where('tipo_usuario', 'professor')->findAll();

        // Buscar o registro onde a coluna 'ativo' é 1 no periodoLetivoModel
        $data['periodoAtivo'] = $this->periodoLetivoModel->where('ativo', 1)->first();

        // Obter todas as turmas que não têm registros na tabela horario_aula
        $data['turmas'] = $this->turmaModel
            ->whereNotIn('codigo_turma', function ($query) {
                $query->select('codigo_turma')->from('horario_aula');
            })
            ->findAll();

        return view('horario_aula', $data);
    }

    public function horarioProfessor()
    {
        $data['professores'] = $this->usuarioModel->where('tipo_usuario', 'professor')->findAll();

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
        $data['professores'] = $this->usuarioModel->where('tipo_usuario', 'professor')->findAll();
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
            // Tenta excluir a disciplina
            if ($this->horarioAulaModel->where('id_horario_aula', $idHorarioAula)->delete()) {

                $this->session->setFlashdata('success', 'Horário de aula apagado com sucesso');
            } else {

                $this->session->setFlashdata('error', 'Horário de aula não apagado');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            // Captura o erro de chave estrangeira ou qualquer outro erro do banco de dados
            log_message('error', 'Erro ao tentar excluir horário de aula: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Não é possível excluir este horário de aula');
        }

        return redirect()->route('listaHorarioAula');
    }

    public function carregarHorarios($codigoTurma)
    {
        $pesquisaHorarios = $this->horarioAulaModel->where('codigo_turma', $codigoTurma)->findAll();
        $horarios = [];



        // Itera sobre os dados para formatar os eventos
        foreach ($pesquisaHorarios as $horario) {

            $disciplina = $this->disciplinaModel->find($horario['id_disciplina']);
            $professor = $this->usuarioModel->find($horario['professor']);
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
        $pesquisaHorarios = $this->horarioAulaModel->where('professor', $idProfessor)->findAll();
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
        $pesquisaHorarios = $this->horarioAulaModel->where('id_sala', $idSala)->findAll();
        $horarios = [];

        // Itera sobre os dados para formatar os eventos
        foreach ($pesquisaHorarios as $horario) {

            $disciplina = $this->disciplinaModel->find($horario['id_disciplina']);
            $turma = $this->turmaModel->find($horario['codigo_turma']);
            $professor = $this->usuarioModel->find($horario['professor']);
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
            ->where('id_horario_aula !=', $evento['id_horario_aula'])
            ->groupStart() // Agrupa as condições para verificar sobreposição de horário
            ->where('horario_inicio <', $evento['horario_fim'])
            ->where('horario_fim >', $evento['horario_inicio'])
            ->groupEnd()
            ->countAllResults();

        // log_message('debug', json_encode($conflitoProfessor));
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
