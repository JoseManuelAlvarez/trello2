<?php
include_once('connect.php');
$sql = $conn->query('SELECT * FROM proyuectos WHERE idPropietario ='.$_SESSION['idU']);
$rows = $sql->fetchAll();
foreach($rows as $row) {
    echo '<li class="nav-item">
    <p class="nav-link" onclick="showProyect('.$row['idProyecto'].')">
    <i class="fas fa-fw fa-chart-area"></i>
        <span>'.$row['name'].'</span></a>        
    </p>
    </li>';
}



?>
