<?php
    /**
     *
     * Date: 24/07/23
     * create for: Jose Manuel Alvarez Bucio
     * contact: josemanuel.alvarezbucio@gmail.com
     *
    */
    $data = array(
        'STATUS'    => '0',
        'AUTOR'     => '',
        'ASIGNADO'  => 0,
        'TITULO'    => 0,
        'CREATEAT'  => '',
        'UPDATEAT'  => '',
        'BODYTAREA' => '',
    );
    /*if(!isset($_POST['idTarea'])){
        echo json_encode($data);
    }*/
    include_once('connect.php');
    $id = $_POST['idTarea'];

    function consultarTarea($id) {
        $sql = $GLOBALS['conn']->query('SELECT * FROM tareas WHERE idTarea ='.$id);
        $rows = $sql->fetchAll();
        foreach($rows as $row) {
            $CREATED = explode(' ',trim($row['createdAt']));
            $UPDATED = explode(' ',trim($row['updatedAt']));
            $GLOBALS['data']['AUTOR']       = consultarUsuario(trim($row['idCreador']));
            $GLOBALS['data']['ASIGNADO']    = trim($row['idAsignado']);
            $GLOBALS['data']['TITULO']      = trim($row['nombre']);
            //$GLOBALS['data']['BODY']        = trim($row['body']);
            $GLOBALS['data']['STATUS']      = trim($row['status']);
            $GLOBALS['data']['CREATEAT']    = $CREATED[0];
            $GLOBALS['data']['UPDATEAT']    = $UPDATED[0];
            $GLOBALS['data']['BODYTAREA']   = convertirContenido(trim($row['body']));
            
            echo json_encode($GLOBALS['data']);
        }
    }

    function consultarUsuario($id) {
        $name = '';
        $sql = $GLOBALS['conn']->query('SELECT * FROM usuarios WHERE idUser ='.$id);
        $rows = $sql->fetchAll();
        foreach($rows as $row) {
            $name = trim($row['name']);
        }
        return $name;
    }
    function convertirContenido($body) {
        $content = "";
        $renglon = explode("/n", $body);
        for ($i=0; $i < count($renglon); $i++) { 
            if (strpos($renglon[$i], "/h1") !== false) {
                $content .= "<h1>".substr($renglon[$i], 3, strlen($renglon[$i]))."</h1>";
            }
            if (strpos($renglon[$i], "/h2") !== false) {
                $content .= "<h2>".substr($renglon[$i], 3, strlen($renglon[$i]))."</h2>";
            }
            if (strpos($renglon[$i], "/h3") !== false) {
                $content .= "<h3>".substr($renglon[$i], 3, strlen($renglon[$i]))."</h3>";
            }
            if (strpos($renglon[$i], "/h4") !== false) {
                $content .= "<h4>".substr($renglon[$i], 3, strlen($renglon[$i]))."</h4>";
            }
            if (strpos($renglon[$i], "/h5") !== false) {
                $content .= "<h5>".substr($renglon[$i], 3, strlen($renglon[$i]))."</h5>";
            }
            if (strpos($renglon[$i], "/h6") !== false) {
                $content .= "<h6>".substr($renglon[$i], 3, strlen($renglon[$i]))."</h6>";
            }
            if (strpos($renglon[$i], "/p") !== false) {
                $content .= "<p>".substr($renglon[$i], 3, strlen($renglon[$i]))."</p>";
            }
            if (strpos($renglon[$i], "/lu") !== false) {
                $content .= "<lu>";
            }
            if (strpos($renglon[$i], "/luu") !== false) {
                $content .= "</lu>";
            }
            if (strpos($renglon[$i], "/li") !== false) {
                $content .= "<li>".substr($renglon[$i], 4, strlen($renglon[$i]))."</li>";
            }
            if (strpos($renglon[$i], "/br") !== false) {
                $content .= "<br>";
            }
            if(strpos($renglon[$i], "/ck") !== false){
                if(trim(substr($renglon[$i],4,6)) == "true" ){
                    $content .= "<input type='checkbox' name='check".$i."' checked ><label for='check".$i."'> ".substr($renglon[$i], 10, strlen($renglon[$i]))."</label>";
                }else{
                    $content .= "<input type='checkbox' name='check".$i."'><label for='check".$i."'> ".substr($renglon[$i], 14, strlen($renglon[$i]))."</label>";
                }
                
            }
        }
        return $content;
    }
    consultarTarea($id);
?>
