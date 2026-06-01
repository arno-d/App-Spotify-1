<?php
$id = $_GET['id'];
include "inc-conexao.php";

$sql = "SELECT * FROM tb_discografia WHERE id = {$id}";
$resultado = mysqli_query($conn, $sql);

$nome = $artista = $foto = $tipo = $ano = "";

while($linha = mysqli_fetch_assoc($resultado) ){
    $nome = $linha['nome'];
    $artista = $linha['artista'];
    $foto = $linha['foto'];
    $tipo = $linha['tipo'];
    $ano = $linha['ano'];
}

$titulo_da_pagina = "Editar Discografia";
include "inc-cabecalho.php";
?>
<body>
    <?php include "inc-menu.php"; ?>
    <main class='container'>
        <h1>Editar disco: <?=$nome?></h1>
        <form method="post" action="discografia-atualizar.php?id=<?=$id?>">
            Artista: <input name="artista" value="<?=$artista?>"> <br>
            Nome do disco: <input name="nome" value="<?=$nome?>"> <br>
            Ano: <input type="number" name="ano" value="<?=$ano?>"> <br>
            Foto: <input name="foto" value="<?=$foto?>"> <br>
            Tipo:
            <select name="tipo">
                <option value=""></option>
                <option value="album">Álbum</option>
                <option value="single">Single</option>
            </select>
            <br>
            <button type="submit">Atualizar disco</button>
        </form>
    </main> 

<?php

mysqli_close($conn);
include "inc-rodape.php";

?>