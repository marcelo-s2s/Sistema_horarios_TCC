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
        // $data['periodos'] = $this->periodoLetivoModel->findAll();
        $data['periodos'] = $this->periodoLetivoModel
            ->orderBy('ativo', 'DESC')
            ->findAll();

        return view('periodo', $data);
    }

    public function salvarPeriodo()
    {

        $dadosPeriodo = $this->request->getPost();

        if ($this->periodoLetivoModel->save($dadosPeriodo)) {

            $this->session->setFlashdata('success', 'Período letivo salvo com sucesso');
        } else {

            $this->session->setFlashdata('error', 'Erro ao salvar período letivo');
        }

        return redirect()->route('listarPeriodo');
    }
    public function editarPeriodo($periodo)
    {

        $data['periodo'] = $this->periodoLetivoModel->find($periodo);
        $data['periodos'] = $this->periodoLetivoModel->findAll();

        return view('periodo', $data);
    }

    public function deletarPeriodo($periodo)
    {

        try {
            // Tenta excluir o período
            if ($this->periodoLetivoModel->delete($periodo)) {
                $this->session->setFlashdata('success', 'Período letivo apagado com sucesso');
            } else {
                $this->session->setFlashdata('error', 'Período letivo não apagado');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Captura o erro de chave estrangeira ou qualquer outro erro do banco de dados
            log_message('error', 'Erro ao tentar excluir sala: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Não é possível excluir este período letivo, pois ele está associado a um horário.');
        }

        return redirect()->route('listarPeriodo');
    }

    public function ativarPeriodo($periodo)
    {

        // Desativa todos os períodos
        $this->periodoLetivoModel->where('ativo', 1)->set('ativo', 0)->update();

        // Ativa o período selecionado
        $this->periodoLetivoModel->update($periodo, ['ativo' => 1]);

        return redirect()->route('listarPeriodo');
    }
}
