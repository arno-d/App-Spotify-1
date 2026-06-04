<?php

$titulo_da_pagina = "Discos";
include "inc-cabecalho.php";

?>
<body>
    <main class="container">
        <h1 class="text-center fs-2 mt-2 mb-4">Discografia</h1>

        <div class="row mb-4">

        <?php
        include "inc-conexao.php";
        $sql = "SELECT * FROM tb_discografia_2 ORDER BY artista, ano";
        $resultado = mysqli_query($conn, $sql);
        while($linha = mysqli_fetch_assoc($resultado) ){
            ?>
            <div class="col-3">
                <div class="cartao" style="background-image: url('<?= $linha['foto'];?>');">
                    <div class="cor-cartao">
                        <div class="texto-cartao p-3">
                            <h1 class="fs-4"><?= $linha['nome'];?></h1>
                            <h2 class="fs-5"><?= $linha['artista'];?></h2>
                            <h3 class="fs-6"><?= $linha['tipo'];?> - <?=$linha['ano'];?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        mysqli_close($conn);
        ?>
        </div>
    </main>
</body>
<?php
include "inc-rodape.php";
?>