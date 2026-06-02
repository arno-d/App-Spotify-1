<?php

$id = $_GET['id'];
$nome = $_POST['nome'];
$artista = $_POST['artista'];
$ano = $_POST['ano'];
$tipo = $_POST['tipo'];
$foto = $_POST['foto'];

include "inc-conexao.php";
$resultado = mysqli_execute_query($conn, "UPDATE tb_discografia SET artista = ?, nome = ?, ano = ?, tipo = ?, foto = ? WHERE id = ?", 
[$artista, $nome, $ano, $tipo, $foto, $id]);

mysqli_close($conn);
header('Location:discografia-listagem.php');

?>