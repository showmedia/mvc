<?php

use App\Core\Model;

class User extends Model {

    public $nome, $email, $senha;

    public function getAll() {

        $sql = 'SELECT * FROM users';
        $stmt = Model::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;

    }

    public function findId($id){
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;
    }

    public function save(){

        $sql = "INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->nome);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->senha);

        if($stmt->execute()):
            return "Usuário cadastrado com sucesso!";
        else:
            return "Erro ao cadastrar";
        endif;

    }

    public function update($id){
        $sql = "UPDATE users SET nome = ?, email = ? , senha = ? WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->nome);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->senha);
        $stmt->bindValue(4, $id);

        if($stmt->execute()):
                return "Atualizado com sucesso!";
        else:
                return "Erro ao Atualizar!";
        endif;
    }

    public function delete($id){
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        if($stmt->execute()):
            return "Usuário excluido com sucesso";
        else:
            return "Não foi possível excluir!";
        endif;
    }

}