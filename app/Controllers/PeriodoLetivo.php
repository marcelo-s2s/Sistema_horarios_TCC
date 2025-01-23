<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeriodoLetivoModel;
use CodeIgniter\HTTP\ResponseInterface;


class PeriodoLetivo extends BaseController
{
    private $session;
    private $periodoLetivoModel;

    public function __construct()
    {

        $this->session = session();
        $this->periodoLetivoModel = new PeriodoLetivoModel();
    }

    public function listarPeriodo()
    {

        $data['periodos'] = $this->periodoLetivoModel->findAll();

        return view('periodo', $data);
    }

    public function salvarPeriodo()
    {


        $dadosPeriodo = $this->request->getPost();

        if (isset($dadosPeriodo['periodo'])) {
            $situacao = 'atualizada';
        } else {
            $situacao = 'adicionada';
        }

        if ($this->periodoLetivoModel->save($dadosPeriodo)) {
            $this->session->setFlashdata('alerta', [
                'tipo' => 'success',
                'titulo' => 'Sucesso!',
                'mensagem' => 'Periodo ' . $situacao . ' com sucesso.'
            ]);
        } else {
            $this->session->setFlashdata('alerta', [
                'tipo' => 'danger',
                'titulo' => 'Erro!',
                'mensagem' => 'Erro, diciplina não ' . $situacao . ' .'
            ]);
        }

        return redirect()->to('/periodo');
    }
    public function editarPeriodo($periodo)
    {

        $data['periodo'] = $this->periodoLetivoModel->find($periodo);
        $data['periodos'] = $this->periodoLetivoModel->findAll();

        return view('periodo', $data);
    }

    public function deletarPeriodo($periodo)
    {

        if ($this->periodoLetivoModel->delete($periodo)) {
            $this->session->setFlashdata('alerta', [
                'tipo' => 'success',
                'titulo' => 'Sucesso!',
                'mensagem' => 'Periodo apagada com sucesso.'
            ]);
        } else {
            $this->session->setFlashdata('alerta', [
                'tipo' => 'danger',
                'titulo' => 'Erro!',
                'mensagem' => 'Erro, periodo não apagado.'
            ]);
        }

        return redirect()->to('/periodo');
    }
}
