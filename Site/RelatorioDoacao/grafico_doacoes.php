<?php
    include('../database/conn.php');

    if(isset($_POST['datainicial']) && $_POST['datainicial'] != ""){
        $datainicial = $_POST['datainicial'];
    }
    else{
        $datainicial = date('2000/01/01');
    }
    if(isset($_POST['datafinal']) && $_POST['datafinal'] != ""){
        $datafinal = $_POST['datafinal'];
    }
    else{
        $datafinal = date('Y/m/d');
    }

    $datainicial = new DateTime($datainicial);
    $datafinal = new DateTime($datafinal);

    $sql = "SELECT d.id_doacao, d.data, i.id_doacao, i.quantidade 
    FROM doacoes d, item_doacoes i 
    WHERE d.id_doacao = i.id_doacao 
    AND d.data BETWEEN '".$datainicial->format('Y-m-d')."' AND '".$datafinal->format('Y-m-d')."' ORDER BY d.data ASC";

    $resultado = $conn->query($sql);
    $quantidade = 0;

    $grafico = array();
    $bd = array();
    $meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
    if($resultado->num_rows > 0){
        while($row=$resultado->fetch_assoc()){
            $data = new DateTime($row['data']);
            $quantidade = $row['quantidade'];
            $lista = array('Ano'=> $data->format('Y'), 'Mes' => $data->format('m'), 'Quantidade' => $quantidade);
            array_push($bd, $lista);
        }
        //print_r($bd);
        for($i=0;$i<count($bd);$i++){
            $mes_bd = $bd[$i]['Mes']-1;
            $ano = $bd[$i]['Ano'];
            $verifica = true;
            if(count($grafico) >= 1){
                for($b=0;$b<count($grafico);$b++){
                    if($ano == $grafico[$b]['Ano'] && $grafico[$b]['Mes'] == $meses[(int)$mes_bd]){
                        $grafico[$b]['Quantidade'] += $bd[$i]['Quantidade'];
                        $verifica = false;
                    }
                }
                if($verifica){
                    $lista = array('Ano'=> $bd[$i]['Ano'], 'Mes' => $meses[(int)$mes_bd], 'Quantidade' => $bd[$i]['Quantidade']);
                    array_push($grafico, $lista);
                }
            }
            else{
                $lista = array('Ano'=> $bd[$i]['Ano'], 'Mes' => $meses[(int)$mes_bd], 'Quantidade' => $bd[$i]['Quantidade']);
                array_push($grafico, $lista);
            }
        }
    }
    else{
        array_push($grafico, array('Ano'=> date('Y'), 'Mes' => $meses[(int)date('m') -1], 'Quantidade' => 0));
    }
    echo json_encode($grafico);
?>