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
        <div class="d-flex flex-column align-items-center">
            <div class="card p-4">
                <form method="post" action="discografia-atualizar.php?id=<?=$id?>">
                    Artista: <input name="artista" value="<?=$artista?>"> <br><br>
                    Nome do disco: <input name="nome" value="<?=$nome?>"> <br><br>
                    Ano: <input type="number" name="ano" value="<?=$ano?>"> <br><br>
                    Foto: <input name="foto" value="<?=$foto?>"> <br><br>
                    Tipo:
                    <select name="tipo">
                        <option value="album" <?php if($tipo == 'album'){echo "selected";} ?> >Álbum</option>
                        <option value="single" <?php if($tipo == 'single'){echo "selected";} ?> >Single</option>
                    </select>
                    <br><br>
                    <button type="submit">Atualizar disco</button>
                </form>
            </div>
        </div>
    </main> 

<?php

mysqli_close($conn);
include "inc-rodape.php";

?>