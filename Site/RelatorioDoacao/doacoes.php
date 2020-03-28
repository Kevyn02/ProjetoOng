<?php
    include('../database/conn.php');
    if(isset($_POST['datainicial']) && $_POST['datainicial'] != ""){
        $datainicial = $_POST['datainicial'];
    }
    else{
        $datainicial = date('Y').'/'.date('m').'/1';
    }
    if(isset($_POST['datafinal']) && $_POST['datafinal'] != ""){
        $datafinal = $_POST['datafinal'];
    }
    else{
        $datafinal = date('Y/m/d');
    }

    $datainicial = new DateTime($datainicial);
    $datafinal = new DateTime($datafinal);

    $sql = "SELECT a.id_doacao, a.data, b.id_produto, b.categoria, b.nome, c.id_doacao, c.id_produto, c.quantidade 
    FROM doacoes a, produtos b, item_doacoes c
    WHERE a.id_doacao = c.id_doacao AND b.id_produto = c.id_produto AND a.data BETWEEN '".$datainicial->format('Y-m-d')." 00:00:00' AND '".$datafinal->format('Y-m-d')." 23:59:59'";
    $resultado = $conn->query($sql);
    if($resultado->num_rows > 0){
        while($row=$resultado->fetch_assoc()){
            $data = new DateTime($row['data']);
            echo "<tr>";
            echo "<td>".$row['categoria']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['quantidade']."</td>";
            echo "<td>".$data->format('d/m/Y')."</td>";
            echo "</tr>";
        }
    }
?>