index.php
<?php
require_once 'usuarios.php';
$u = new Usuarios;




?>


<html lang="pt-br">
<head>
    <meta charset = "utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
<div id="corpo-form">
    <h1>Entrar</h1>
    <form method = "POST" action="processa.php">
        <input type="email" placeholder="Usuario" nome="nome">
        <input type="passaword" placeholder="senha" nome="senha">
        <input type="submit" value="Acessar">
        <a href="cadastrar.php" >ainda não é inscrito?<strong>Cadastre-se<strong></a>
</form>
</div>

<?php
if (isset($_POST['nome']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($email) && !empty($senha))
    {
        

    }else{
        echo "Preencha todos os campos!";
    }







?>


</body>
