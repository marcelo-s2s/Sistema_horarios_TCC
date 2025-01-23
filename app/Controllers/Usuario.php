<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class Usuario extends BaseController
{

    private $session;
    private $usuarioModel;

    public function __construct()
    {

        $this->session = session();
        $this->usuarioModel = new UsuarioModel();
    }

    public function listarUsuario()
    {

        $data['usuarios'] = $this->usuarioModel->findAll();

        return view('usuario', $data);
    }

    public function salvarUsuario()
    {

        $dadosUsuario = $this->request->getPost();

        if ($this->usuarioModel->save($dadosUsuario)) {

            $this->session->setFlashdata('success', 'Usuário salvo com sucesso');

        } else {

            $this->session->setFlashdata('error', 'Erro ao salvar usuário');
        }

        return redirect()->to('/usuario');
    }
    public function editarUsuario($id_usuario)
    {

        $data['usuario'] = $this->usuarioModel->find($id_usuario);
        $data['usuarios'] = $this->usuarioModel->findAll();

        return view('usuario', $data);
    }

    public function deletarUsuario($id_usuario)
    {
        try {
            // Tenta excluir o usuario
            if ($this->usuarioModel->delete($id_usuario)) {

                $this->session->setFlashdata('success', 'Usuário apagado com sucesso');

            } else {

                $this->session->setFlashdata('error', 'Usuário não apagado');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            // Captura o erro de chave estrangeira ou qualquer outro erro do banco de dados
            log_message('error', 'Erro ao tentar excluir usuário: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Não é possível excluir este usuário, pois ela está associada a um horário.');
        }

        return redirect()->to('/usuario');
    }
}
