<?php
/* PROJETO EM DESENVOLVIMENTO */
/* Objetivo: Criar um mini sistema resposável pelo controle de entrada e saída de veículos dentro de um estacionamento */
    require './Projeto.php';

    $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    

    if(!empty($post['modelo'])){
        
        $modelo = $post ['modelo'];
        $cor = $post ['cor'];
        $placa = $post ['placa'];
        $ano = $post ['ano'];
        $sql = "INSERT INTO `carro` (`modelo`, `cor`, `placa`, `ano`) VALUES (NULL, '$modelo', '$cor', '$placa', '$ano');";

        $db->query($sql);
    }

    $select = $db->query("SELECT * FROM cadastro");

    if($get ['edit] == 1']){
    $id = $get['id'];
    $select_edit = $db->query("SELECT * FROM carro WHERE id = $id");
    $list = $select_edit->fetch_assoc();
    print_r($list);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de estacionamento</title>

</head>

<body>
    <h1>Parking Manager</h1>

    <form action="" method="post">
        <label for="modelo">Modelo</label><br>
        <input type = "text" name="modelo" id="modelo" value="">
        <br>
        <label for="cor">Cor</label><br>
        <input type = "text" name="cor" id="cor" value="">
        <br>
        <label for="placa">Placa</label><br>
        <input type = "text" name="placa" id="placa" value="">
        <br>
        <label for="ano">Ano</label><br>
        <input type = "text" name="ano" id="ano" value="">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <table border ='1' width="100%">
        <tr>
            
            <th>Modelo</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Ano</th>
            <th>Opções</th>

        </tr>
        <?php
            while($linhas = $select->fetch_assoc()){

           
        ?>
        <tr>
                
                <td><?= $linhas['modelo'] ?></td>
                <td><?= $linhas['cor'] ?></td>
                <td><?= $linhas['placa'] ?></td>
                <td><?= $linhas['ano'] ?></td>
                <td>
                    <a href="index.php?edit=l&id=<?= $linhas['modelo']?>">Editar</a>
                    <a href="#">Apagar</a>  
                </td>
        </tr>
        <?php  } ?>
    </table>


</body>


</html>