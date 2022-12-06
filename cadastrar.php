<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;

?>


<html lang="pt-br">
<head>
    <meta charset = "utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
<div id="corpo-form">
    <h1>cadastrar</h1>
    <form method = "POST" >

        <input type="text" nome="nome" placeholder="Nome" maxlength="30">
        <input type="text" nome="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" nome="email" placeholder="Email" maxlength="30">
        <input type="passaword" nome="senha" placeholder="senha" maxlength="20">
        <input type="passaword" nome="confSenha" placeholder="Confirmar senha">
        <input type="submit" value="Cadastrar">
</form>
</div>
<?php
if (isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);

    //verificação se está preenchido tudo no cadastro
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("Projeto_login","localhost", "root", "");
        if($u->msgErro == "")
        {
            if($senha == $confirmarSenha)
            {
               if ($u->cadastrar($nome,$telefone,$email,$senha))
                {
                    ?>
                    <div id="msg-sucesso">
                    cadastrado com sucesso! Acesse para entrar!
                    </div>
                   <?php
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                    email já cadastrado!
                    </div>
                   <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                Senha e confirmar senha não correspodem!   
                </div>
               <?php
              
               
            }

        }
        else
        {
            ?>
                <div class="msg-erro">
                "erro: ".$u->msgErro; 
                </div>
               <?php 
        }
    }else
    {
        ?>
                <div class="msg-erro">
                preencher todo os campos!
                </div>
               <?php 
        
        
    }





}





?>

</body>
