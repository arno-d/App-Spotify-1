<?php

$titulo_da_pagina = "Listagem de Discografias";
include "inc-cabecalho.php";

?>
<body>
    <main class="container">
        <?php include "inc-menu.php"; ?>
        <h1 class="mb-3 text-dark">Listagem de Discografias</h1>

        <div class="row mb-3">
            <div class="col">
                <a href="discografia-formulario.php" class="btn btn-success">Nova discografia</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Artista</th>
                            <th>Nome</th>
                            <th>Ano</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <?php

                    include "inc-conexao.php";
                    
                    $sql = "SELECT * FROM tb_discografia ORDER BY artista, ano";
                    $resultado = mysqli_query($conn, $sql);

                    while($linha_resultado = mysqli_fetch_assoc($resultado) ){
                        echo '<tr>';

                        echo "<td> {$linha_resultado['id']} </td>";
                        echo "<td> {$linha_resultado['artista']} </td>";
                        echo "<td> <a href='discografia-visualizar.php?id={$linha_resultado['id']}'> {$linha_resultado['nome']} </a> </td>";
                        echo "<td> {$linha_resultado['ano']} </td>";
                        if($linha_resultado['tipo'] == 'album'){
                            echo "<td> Álbum </td>";
                        }
                        else{
                            echo "<td> Single </td>";
                        }
                        echo "<td>

                        <a href='discografia-excluir.php?id={$linha_resultado['id']}'>
                            <i class='bi bi-trash-fill'></i>
                        </a>

                        <a href='discografia-editar.php?id={$linha_resultado['id']}'>
                            <i class='bi bi-pencil-square'></i>
                        </a>
                        
                        </td>";

                        echo '</tr>';
                    }

                    mysqli_close($conn)

                    ?>
                </table>
            </div>
        </div>

    </main>

<?php include "inc-rodape.php"; ?>