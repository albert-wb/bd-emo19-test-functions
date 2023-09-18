<?php
include "conectar.php"; /* chama o arquivo conectar.php */
?>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/*Recuperamos as informações do formulario */
$username = $_POST["username"]; //variavel $nome recebe o campo nome enviado através do metodo Post
$email = $_POST["email"];
$login = $_POST["login"];
$password = MD5($_POST["password"]);

/*Inserindo as informações na tabela usuario */

mysqli_query($conexao, "INSERT INTO usuarios(username, email, login, password) VALUES ('$username','$email','$login','$password')") or die("Usuário não cadastrado!");

//fecha conexão
mysqli_close($conexao);
/*exibindo mensagem de usuário cadastrado com sucesso */
echo "<script language='javascript' type='text/javascript'>
         alert('USUÁRIO CADASTRADO COM SUCESSO!!!');
         window.location.href='index.html';<html/script>";
?>