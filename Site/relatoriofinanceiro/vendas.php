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

    $sql = "SELECT a.id_venda, a.valor_total, a.data, b.id_produto, b.id_venda, b.quantidade, c.id_produto, c.nome, c.categoria, c.valor_unitario
    FROM vendas a, item_vendas b, produtos c
    WHERE a.id_venda = b.id_venda AND b.id_produto = c.id_produto AND a.data BETWEEN '".$datainicial->format('Y-m-d')." 00:00:00' AND '".$datafinal->format('Y-m-d')." 23:59:59' ORDER BY data ASC";

    $resultado = $conn->query($sql);
    $preco_vendas = 0;

    if($resultado->num_rows > 0){
        while($row=$resultado->fetch_assoc()){
            $data = new DateTime($row['data']);
            echo "<tr>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['categoria']."</td>";
            echo "<td>".$row['quantidade']."</td>";
            echo "<td>"."R$ ".number_format($row['valor_unitario'], 2, ',', '.')."</td>";
            echo "<td>"."R$ ".number_format($row['valor_unitario']*$row['quantidade'], 2, ',', '.')."</td>";
            echo "<td>".$data->format('d/m/Y')."</td>";
            echo "</tr>"; 
            $preco_vendas += $row['valor_unitario']*$row['quantidade'];
        }
        echo "</tr><td colspan='6'>Valor total: R$" . number_format($preco_vendas, 2, ',', '.') ."</td></tr>";
    }
?>