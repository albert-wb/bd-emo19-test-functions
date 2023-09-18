<?php
include "conectar.php"; /* chama o arquivo conectar.php */
?>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$password = MD5($_POST['senha']);

if (isset($entrar)) {

   $verifica = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login ='$login' AND senha = '$password'") or die("erro");
   if (mysqli_num_rows($verifica) <= 0) {
      echo "<script language='javascript' type='text/javascript'>
         alert('LOGIN E SENHA INCORRETOS OU USUÁRIO NÃO CADASTRADO');
         window.location.href='index.html';</script>";
   } else {

      echo "<script language='javascript' type='text/javascript'>
         alert('LOGIN EFETUADO COM SUCESSO!');
         window.location.href='page2.html';</script>";

   }
}
?>