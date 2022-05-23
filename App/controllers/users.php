<?php

use App\Core\Controller;
use App\Auth;

class Users extends Controller {

    public function listar($nome = ''){

        Auth::checkLogin();
        $users = $this->model('User');
        $dados = $users->getAll();

        $this->view('users/listar', $dados = ['registros' => $dados]);
    }

    public function editar($id = ''){

        Auth::checkLogin();
        $mensagem = array();

            $user = $this->model('User');

            if(isset($_POST['atualizar'])):
                if(empty($_POST['nome'])):
                    $mensagem[] = "O campo nome não pode ficar em branco";
                elseif(empty($_POST['email'])):
                    $mensagem[] = "O campo email não pode ficar em branco";
                elseif(empty($_POST['senha'])):
                    $mensagem[] = "O campo senha não pode ficar em branco";
                else:
                    $user->nome = $_POST['nome'];
                    $user->email = $_POST['email'];
                    $user->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                    $mensagem[] = $user->update($id);
                endif;
            endif;

            $dados = $user->findId($id);
            $this->view('users/editar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);
    }

    public function cadastrar(){

        Auth::checkLogin();
        $mensagem = array();
        
        if(isset($_POST['cadastrar'])):

            if(empty($_POST['nome'])):
                $mensagem[] = "O campo nome não pode ser em branco";
            elseif(empty($_POST['email'])):
                $mensagem[] = "O campo email não pode ser em branco";
            elseif(empty($_POST['senha'])):
                $mensagem[] = "O campo senha não pode ser em branco";
            else:           
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

                $user = $this->model('User');
                $user->nome = $nome;
                $user->email = $email;
                $user->senha = $senha;
                $mensagem[] = $user->save();   
            endif;
        endif;

        $this->view('users/cadastrar', $dados = ['mensagem' => $mensagem]);
    }

    public function excluir($id = ''){
        Auth::checkLogin();
        $mensagem = array();
        $user = $this->model('User');
        $mensagem[] = $user->delete($id);
        $dados = $user->getAll();

        $this->view('users/listar', $dados = ['registros' => $dados,'mensagem' => $mensagem]);
    }

}