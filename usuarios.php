<?php

Class Usuario
{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    
    {
        global $msgErro;
        global $pdo;
        try
        {

        
        $pdo = new PDO("mysql:dbname". $nome. ";host=". $host, $usuario, $senha);

        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");

        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;

        }
        else{
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) values (:n, :t, :e, :s)");
            $sql ->bindValue(":n", $nome);
            $sql ->bindValue(":t", $telefone);
            $sql ->bindValue(":e", $email);
            $sql ->bindValue(":s", md5($senha));
            $sql -> execute();
            return true;
        }

    }

    public function logar($email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario from usuarios WHERE email = :e and senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrar na sessao, fetch pega oq vem do banco de dados e faz um array com os nome da coluna
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;

        }
        else
        {
            return false;
        }


    }




}














?>