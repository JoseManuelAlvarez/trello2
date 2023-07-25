<?php
    /**
     *
     * Date: 25/07/23
     * create for: Jose Manuel Alvarez Bucio
     * contact: josemanuel.alvarezbucio@gmail.com
     *
    */
    $data = array(
        'CONTENT' => '',
    );
    $elementos = $_POST['content'];
    $numNext = $_POST['numNext'];
    $numNext++;

    if (strpos($elementos, "/h1") !== false) {
        $GLOBALS['data']['CONTENT'] = "<input type='text' class='h1 sinBorder full-width' name='element-".$numNext."' id='element-".$numNext."' value='".substr($elementos, 3, strlen($elementos))."'>";
    }
    if (strpos($elementos, "/h2") !== false) {
        $GLOBALS['data']['CONTENT'] = "<input type='text' class='h2 sinBorder full-width' name='element-".$numNext."' id='element-".$numNext."' value='".substr($elementos, 3, strlen($elementos))."'>";
    }
    if (strpos($elementos, "/h3") !== false) {
        $GLOBALS['data']['CONTENT'] = "<input type='text' class='h3 sinBorder full-width' name='element-".$numNext."' id='element-".$numNext."' value='".substr($elementos, 3, strlen($elementos))."'>";
    }
    if (strpos($elementos, "/h4") !== false) {
        $GLOBALS['data']['CONTENT'] = "<input type='text' class='h4 sinBorder full-width' name='element-".$numNext."' id='element-".$numNext."' value='".substr($elementos, 3, strlen($elementos))."'>";
    }
    if (strpos($elementos, "/h5") !== false) {
        $GLOBALS['data']['CONTENT'] = "<input type='text' class='h5 sinBorder full-width' name='element-".$numNext."' id='element-".$numNext."' value='".substr($elementos, 3, strlen($elementos))."'>";
    }
    if (strpos($elementos, "/h6") !== false) {
        $GLOBALS['data']['CONTENT'] = "<input type='text' class='h6 sinBorder full-width' name='element-".$numNext."' id='element-".$numNext."' value='".substr($elementos, 3, strlen($elementos))."'>";
    }
    echo json_encode($GLOBALS['data']);

?>
