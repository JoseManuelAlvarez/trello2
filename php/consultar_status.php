<?php
    /**
     *
     * Date: 24/07/23
     * create for: Jose Manuel Alvarez Bucio
     * contact: josemanuel.alvarezbucio@gmail.com
     *
    */
    include_once('connect.php');
    $sql = $GLOBALS['conn']->query('SELECT * FROM categoria ORDER BY secno ASC');
    $rows = $sql->fetchAll();
    echo '<select name="categoria-tarea" id="categoria-tarea" style="width: 100%; text-align: center; ">';
    foreach($rows as $row) {
        echo '<option value="'.trim($row['secno']).'">'.trim($row['NOMBRE']).'</option>';
    }
    echo '</select>';
?>
