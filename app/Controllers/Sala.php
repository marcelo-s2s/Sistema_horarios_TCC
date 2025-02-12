<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SalaModel;
use CodeIgniter\HTTP\ResponseInterface;


class Sala extends BaseController
{

    private $session;
    private $salaModel;

    public function __construct()
    {

        $this->session = session();
        $this->salaModel = new SalaModel();
    }

    public function listarSala()
    {

        $data['salas'] = $this->salaModel->findAll();

        return view('sala', $data);
    }

    public function salvarSala(){


        $dadosSala = $this->request->getPost();

        if ($this->salaModel->save($dadosSala)) {

            $this->session->setFlashdata('success', 'Sala salva com sucesso');

        } else {

            $this->session->setFlashdata('error', 'Erro ao salvar Sala');
        }
        
        return redirect()->route('listarSala');
    }
    public function editarSala($id_sala){

        $data['sala'] = $this->salaModel->find($id_sala);
        $data['salas'] = $this->salaModel->findAll();

        return view('sala', $data);
    }

    public function deletarSala($id_sala)
    {
        try {
            // Tenta excluir a sala
            if ($this->salaModel->delete($id_sala)) {
                $this->session->setFlashdata('success', 'Sala apagada com sucesso');
            } else {
                $this->session->setFlashdata('error', 'Sala não apagada');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Captura o erro de chave estrangeira ou qualquer outro erro do banco de dados
            log_message('error', 'Erro ao tentar excluir sala: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Não é possível excluir esta sala, pois ela está associada a um horário.');
        }

        return redirect()->route('listarSala');
    }

}