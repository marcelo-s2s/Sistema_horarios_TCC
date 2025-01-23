<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DisciplinaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Disciplina extends BaseController
{

    private $session;
    private $disciplinaModel;

    public function __construct()
    {

        $this->session = session();
        $this->disciplinaModel = new DisciplinaModel();
    }

    public function listarDisciplina()
    {

        $data['disciplinas'] = $this->disciplinaModel->findAll();

        return view('disciplina', $data);
    }

    public function salvarDisciplina()
    {
        $dadosDisciplina = $this->request->getPost();

        if ($this->disciplinaModel->save($dadosDisciplina)) {

            $this->session->setFlashdata('success', 'Disciplina salva com sucesso');

        } else {

            $this->session->setFlashdata('error', 'Erro ao salvar disciplina');
        }

        return redirect()->to('/disciplina');
    }

    public function editarDisciplina($id_disciplina)
    {

        $data['disciplina'] = $this->disciplinaModel->find($id_disciplina);
        $data['disciplinas'] = $this->disciplinaModel->findAll();

        return view('disciplina', $data);
    }

    public function deletarDisciplina($id_disciplina)
    {
        try {
            // Tenta excluir a disciplina
            if ($this->disciplinaModel->delete($id_disciplina)) {

                $this->session->setFlashdata('success', 'Disciplina apagada com sucesso');

            } else {

                $this->session->setFlashdata('error', 'Disciplina não apagada');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            // Captura o erro de chave estrangeira ou qualquer outro erro do banco de dados
            log_message('error', 'Erro ao tentar excluir disciplina: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Não é possível excluir esta disciplina, pois ela está associada a um horário.');
        }

        return redirect()->to('/disciplina');
    }
}
