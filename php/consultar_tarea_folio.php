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
        'NUMELEMENT'=> 1,
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
                $content .= "<input type='text' class='h1 sinBorder full-width' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 3, strlen($renglon[$i]))."'>";
            }
            if (strpos($renglon[$i], "/h2") !== false) {
                $content .= "<input type='text' class='h2 sinBorder full-width' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 3, strlen($renglon[$i]))."'>";
            }
            if (strpos($renglon[$i], "/h3") !== false) {
                $content .= "<input type='text' class='h3 sinBorder full-width' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 3, strlen($renglon[$i]))."'>";
            }
            if (strpos($renglon[$i], "/h4") !== false) {
                $content .= "<input type='text' class='h4 sinBorder full-width' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 3, strlen($renglon[$i]))."'>";
            }
            if (strpos($renglon[$i], "/h5") !== false) {
                $content .= "<input type='text' class='h5 sinBorder full-width' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 3, strlen($renglon[$i]))."'>";
            }
            if (strpos($renglon[$i], "/h6") !== false) {
                $content .= "<input type='text' class='h6 sinBorder full-width' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 3, strlen($renglon[$i]))."'>";
            }
            if (strpos($renglon[$i], "/p") !== false) {
                $content .= "<input type='text' class='p sinBorder full-width' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 4, strlen($renglon[$i]))."'>";
            }
            if (strpos($renglon[$i], "/lu") !== false) {
                $content .= "<lu>";
            }
            if (strpos($renglon[$i], "/luu") !== false) {
                $content .= "</lu>";
            }
            if (strpos($renglon[$i], "/li") !== false) {
                $content .= "<li class='full-width'><input type='text' class=' sinBorder width-90' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 4, strlen($renglon[$i]))."'></li>";
            }
            if (strpos($renglon[$i], "/br") !== false) {
                $content .= "<br>";
            }
            if(strpos($renglon[$i], "/ck") !== false){
                if(trim(substr($renglon[$i],4,6)) == "true" ){
                    $content .= "<input type='checkbox' class='sinBorder' name='check".$i."' checked ><label for='check".$i."' class='width-90' > <input type='text' class=' sinBorder width-90' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 10, strlen($renglon[$i]))."'></label>";
                }else{
                    $content .= "<input type='checkbox' class='sinBorder' name='check".$i."'><label for='check".$i."' class='width-90' > <input type='text' class=' sinBorder width-90' name='element-".$i."' id='element-".$i."' value='".substr($renglon[$i], 14, strlen($renglon[$i]))."'></label>";
                }
            }
            $GLOBALS['data']['NUMELEMENT'] ++;
        }
        return $content;
    }
    consultarTarea($id);
?>
