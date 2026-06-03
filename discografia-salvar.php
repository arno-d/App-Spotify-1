<?php

$artista = $_POST['artista'];
$nome = $_POST['nome'];
$ano = $_POST['ano'];
$tipo = $_POST['tipo'];
$foto = $_POST['foto'];

echo "Artista: $artista - Nome: $nome - Ano de lançamento: $ano - Tipo: $tipo - URL da Capa: $foto";

include "inc-conexao.php";

$resultado = mysqli_execute_query($conn, "INSERT INTO tb_discografia_2(artista, nome, ano, tipo, foto) VALUES(?, ?, ?, ?, ?)", 
[$artista, $nome, $ano, $tipo, $foto]);

echo '<br><br>';

if($resultado){
    echo "Cadastrado com sucesso!";
}
else{
    echo "Houve algum problema.";
}

mysqli_close($conn);

?>