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

    $sql = "SELECT * FROM despesas WHERE data BETWEEN '".$datainicial->format('Y-m-d')." 00:00:00' AND '".$datafinal->format('Y-m-d')." 23:59:59'";
    $resultado = $conn->query($sql);
    $preco_vendas = 0;
    if($resultado->num_rows > 0){
        while($row=$resultado->fetch_assoc()){
            $data = new DateTime($row['data']);
            echo "<tr>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>"."R$ ".number_format($row['valor'], 2, ',', '.')."</td>";
            echo "<td>".$data->format('d/m/Y')."</td>";
            echo "</tr>";
            $preco_vendas += $row['valor'];
        }
        echo "</tr><td colspan='6'>Valor total: R$" . number_format($preco_vendas, 2, ',', '.') ."</td></tr>";
    }
?>