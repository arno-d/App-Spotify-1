<?php

$id = $_GET['id'];

include "inc-conexao.php";

$sql = "DELETE FROM tb_discografia WHERE id = {$id}";
$resultado = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location:discografia-listagem.php');

?>