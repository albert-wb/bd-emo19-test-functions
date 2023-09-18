<?php
include "conectar.php"; /* chama o arquivo conectar.php */
?>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$email = $_POST["email"]; /* Cria uma variavel para receber o campo email enviado pelo POST */

$sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email LIKE '%" . $email . "%' "); /* Procura na tabela usuarios por um campo de email igual a variavel $email */



$row = mysqli_num_rows($sql);
if ($row > 0) {
	while ($linha = mysqli_fetch_array($sql)) {
		echo "<p>";
		$username = $linha['username'];
		$email = $linha['email'];
		$login = $linha['login'];
		$password = $linha['password'];
		echo "<strong>username:</strong>" . @$username;
		echo "<p>";
		echo "<strong>Email:</strong>" . @$email;
		echo "<p>";
		echo "<strong>Login:</strong>" . @$login;
		echo "<p>";
		echo "<strong>password:</strong>" . @$password;
		echo "<p>";

	}
	?>
	<form name='dados' action='?a=ok' method='POST'>
		<input type="submit" name="Deletar" title="Deletar" value="Deletar" />
	</form>
	<?php
	if (isset($_GET['a']) && $_GET['a'] == 'ok') {

		$sql1 = mysqli_query($conexao, "DELETE FROM usuarios WHERE email LIKE '%" . $email . "%' ") or die("Registro não deletado!");


		if ($sql1) { //se $sql1 receber um verdadeiro

			?>
			<script language="JavaScript"> // fecha o php, abre um java e chama um alert
				alert("Registro deletado!");
				window.history.go(-2);  // Volta duas páginas que foram carregadas no navegador

			</script>
			<?php

		}
	}

} else {
	echo "Usuário não encontrado!";
	?>
	<script language="JavaScript">
		alert("Registro não encontrado!");
		window.history.go(-1);   // Volta para a página anterior

	</script>
	<?php
}

//fecha conexão
mysqli_close($conexao);
?>