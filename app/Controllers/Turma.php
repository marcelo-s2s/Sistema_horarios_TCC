<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TurmaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Turma extends BaseController
{

    private $session;
    private $turmaModel;

    public function __construct()
    {

        $this->session = session();
        $this->turmaModel = new TurmaModel();
    }

    public function listarTurma()
    {

        $data['turmas'] = $this->turmaModel->findAll();

        return view('turma', $data);
    }

    public function salvarTurma(){


        $dadosTurma = $this->request->getPost();

        if ($this->turmaModel->save($dadosTurma)) {

            $this->session->setFlashdata('success', 'Turma salva com sucesso');

        } else {

            $this->session->setFlashdata('error', 'Erro ao salvar turma');
        }
        
        return redirect()->to('/turma');
    }
    public function editarTurma($codigo_turma){

        $data['turma'] = $this->turmaModel->find($codigo_turma);
        $data['turmas'] = $this->turmaModel->findAll();

        return view('turma', $data);
    }

    public function deletarTurma($codigo_turma)
    {
        try {
            // Tenta excluir a turma
            if ($this->turmaModel->delete($codigo_turma)) {

                $this->session->setFlashdata('success', 'Turma apagada com sucesso');

            } else {

                $this->session->setFlashdata('error', 'Turma não apagada');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            // Captura o erro de chave estrangeira ou qualquer outro erro do banco de dados
            log_message('error', 'Erro ao tentar excluir turma: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Não é possível excluir esta turma, pois ela está associada a um horário.');
        }

        return redirect()->to('/turma');
    }

}

