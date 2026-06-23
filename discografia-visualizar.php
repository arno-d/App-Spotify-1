<?php

$titulo_da_pagina = "Visualizar Discografia";
include "inc-cabecalho.php";

?>
<body>
    <header>
        <?php include "inc-menu.php"; ?>
    </header>

    <main class="container">
        <?php

        include "inc-conexao.php";

        $id = $_GET['id'] ?? 0;
        $artista_get = $_GET['artista'] ?? "";

        $artista = $nome = $ano = $tipo = $foto = "";
        $i = 0;

        $sql = "";

        if($id > 0 && $artista_get == ""){
            $sql = "SELECT * FROM tb_discografia WHERE id = $id";
        }
        else if($id <= 0 && $artista_get == ""){
            $sql = "SELECT * FROM tb_discografia ORDER BY artista, ano DESC";
        }
        else{
            $sql = "SELECT * FROM tb_discografia WHERE artista = '$artista_get' ORDER BY ano DESC";
        }

        $resultado = mysqli_query($conn, $sql);

        if($artista_get == ""){
            echo "<h1>Visualizar Discografia</h1>";
        }
        else{
            echo "<h1>Discografia de: $artista_get</h1>";
        }

        while($linha = mysqli_fetch_assoc($resultado) ){
            $artista = $linha['artista'];
            $nome = $linha['nome'];
            $ano = $linha['ano'];
            $tipo = $linha['tipo'];
            $foto = $linha['foto'];

            if($tipo == 'album'){
                $tipo = 'Álbum';
            }
            else{
                $tipo = 'Single';
            }

            if($i % 4 == 0){
                echo "<div class='row mb-4'>";
            }

            echo "
                <div class='col-3'>
                    <div class='card' style='width: 16rem;'>
                        <img src='$foto' class='card-img-top' alt='$nome'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nome</h5>
                            <p class='card-text'>Artista: <a href='discografia-visualizar.php?artista=$artista'>$artista</a></p>
                        </div>
                        <ul class='list-group list-group-flush'>
                            <li class='list-group-item bg-light-subtle'>Categoria: $tipo</li>
                            <li class='list-group-item'>Ano de lançamento: $ano</li>
                        </ul>
                    </div>
                </div>
            ";

            if( ($i + 1) % 4 == 0){
                echo "</div>";
            }

            $i++;
        }

        if($i % 4 != 0){
            echo "</div>";
        }

        ?>

    </main>

<?php 

mysqli_close($conn);
include "inc-rodape.php";

=======
include "inc-conexao.php";

$id= $_GET['id'];

$sql = "SELECT * from tb_discografia_2 where id = $id";
$resultado = mysqli_query($conn, $sql);

$foto = $artista = $nome = $ano = $tipo = "";

while($linha = mysqli_fetch_assoc($resultado)){
    $artista = $linha['artista'];
    $nome = $linha['nome'];
    $foto = $linha['foto'];
    $ano = $linha['ano'];
    $tipo = $linha['tipo'];
}
?>

<body>
    <?php include "inc-menu.php";?>
    <main class="container mt-5">
        <h1>Visualizar Discografia</h1>
        Foto: <img src="<?=$foto; ?>" alt="<?=$nome?>"> <br>
        Artista: <?=$artista?> <br>
        Nome do álbum: <?=$nome?> <br>
        Ano de lançamento: <?=$ano?> <br>
        Tipo: <?=$tipo?> <br>
    </main>
</body>

<?php
mysqli_close($conn); 
include "inc-rodape.php" 

?>
