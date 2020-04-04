<?php
    require_once('../database/conn.php');
    
    $texto = "";
    if(isset($_POST['texto'])){
        $texto = $_POST['texto'];
    }
    $pagina = "";
    if(isset($_POST['pagina'])){
        $pagina = $_POST['pagina'];
    }
    $codigo = "";
    if(isset($_POST['codigo'])){
        $codigo = $_POST['codigo'];
    }
    if($codigo != ""){
        $sql = "SELECT * FROM produtos WHERE codigo = $codigo";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            while($linha = $resultado->fetch_assoc()){
                $categoria = $linha['categoria']; 
            }
        }
    }
    if($texto == ""){
        $sql = "SELECT * FROM categorias";
    }
    else if($texto != ""){
        $sql = "SELECT * FROM categorias WHERE categoria LIKE '%$texto%'";
    }
    $resultado = $conn->query($sql);
    if($resultado->num_rows > 0){
        if($pagina == 0){
            while($linha = $resultado->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$linha['id']."</td>";
                echo "<td>".$linha['categoria']."</td>";
                echo "<td> <a href='deletecat.php?id=".$linha['id']."'>Remover</a> </td>";
                echo "</tr>";
            }
        }
        else if($pagina == 1 && $codigo == ""){
            while($linha = $resultado->fetch_assoc()){
                echo "<option value=".$linha['categoria'].">".$linha['categoria']."</option>";
            }
        }
        else if($pagina == 1 && $codigo != ""){
            while($linha = $resultado->fetch_assoc()){
                if($categoria == $linha['categoria']){
                    $selected = "selected";
                }
                else{
                    $selected = null;
                }
                echo "<option value=".$linha['categoria']." $selected>".$linha['categoria']."</option>";
            }
        }
    }
?>