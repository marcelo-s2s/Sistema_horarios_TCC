<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Entities\User;

class Usuario extends BaseController
{

    private $session;
    private $usuarioModel;

    public function __construct()
    {

        $this->session = session();
        $this->usuarioModel = auth()->getProvider();
    }

    public function buscarUsuario()
    {
        // Busca os dados dos usuários
        $dadosUsuarios = $this->usuarioModel->findAll();

        // Inicializa o array de usuários
        $usuarios = [];

        // Itera sobre os resultados para formatar os dados antes de passar para a view.
        foreach ($dadosUsuarios as $dadosUsuario) {
            $usuarios[] = [
                'id_usuario' => $dadosUsuario->id, // ID do usuário.
                'nome' => $dadosUsuario->username, // Nome de usuário.
                'data_cadastro' => $dadosUsuario->created_at->toDateTimeString(), // Data de cadastro formatada como string.
                'tipo_usuario' => $dadosUsuario->groups[0], // Grupo ao qual o usuário pertence.
                'email' => $dadosUsuario->email, // E-mail ou credencial armazenada em auth_identities.
            ];
        }

        return $usuarios;
    }

    public function listarUsuario()
    {
        //Prepara as informações para serem mandadas para a view
        $data['usuarios'] = $this->buscarUsuario();

        // Retorna a view 'usuario' com os dados formatados.
        return view('usuario', $data);
    }

    public function salvarUsuario()
    {

        $dadosUsuario = $this->request->getPost();

        // Criar entidade User
        $user = new User();
        $user->fill($dadosUsuario);

        // Salvar usuário
        if ($this->usuarioModel->save($user)) {

            $this->session->setFlashdata('success', 'Usuário salva com sucesso');

            //Se o usuário já existe, pega o id, se não (caso de novo usuário), pega o ID gerado
            $userId = $user->id ?? $this->usuarioModel->getInsertID();

            $user = $this->usuarioModel->findById($userId);

            $user->activate();

            // Verifica se um grupo foi selecionado e adiciona o usuário ao grupo escolhido
            $group = $dadosUsuario['tipo_usuario'] ?? 'user'; // Padrão: usuário comum

            $user->syncGroups($group);
        } else {

            $this->session->setFlashdata('error', 'Erro ao salvar usuário');
        }


        return redirect()->route('listarUsuario');
    }

    public function editarUsuario($id_usuario)
    {

        $data['usuario'] = $this->usuarioModel->findById($id_usuario);
        $data['usuarios'] = $this->buscarUsuario();

        return view('usuario', $data);
    }

    public function deletarUsuario($id_usuario)
    {
        try {
            // Tenta excluir o usuario
            if ($this->usuarioModel->delete($id_usuario, true)) {

                $this->session->setFlashdata('success', 'Usuário apagado com sucesso');
            } else {

                $this->session->setFlashdata('error', 'Usuário não apagado');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            // Captura o erro de chave estrangeira ou qualquer outro erro do banco de dados
            log_message('error', 'Erro ao tentar excluir usuário: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Não é possível excluir este usuário, pois ela está associada a um horário.');
        }

        return redirect()->route('listarUsuario');
    }
}
