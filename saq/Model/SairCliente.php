<?php
	session_start();
	unset($_SESSION['ID_Cliente']);
	header("location: ../View/TelaLoginCliente.php");
?>