<?php
    /**
     *
     * Date: 24/07/23
     * create for: Jose Manuel Alvarez Bucio
     * contact: josemanuel.alvarezbucio@gmail.com
     *
    */

    $body = '/h1 Crear lista /n /p esto es un nuevo parrafo /n /lu /n /li elemento 1 /n /li elemento 2 /n /li elemento 3 /n /luu /n /ck true Esto es un check /n /br /ck false Desactivado /n';
    function convertirContenido($body) {
        echo 'El contenido es: '.$body.'<br>';
        $content = '';
        $renglon = explode('/n', $body);
        echo 'cantidad de elementos: '.count($renglon).'<br>';
        for ($i=0; $i < count($renglon); $i++) { 
            echo 'Renglon: '.$i.' contenido: '.$renglon[$i].'<br>';
            if (strpos($renglon[$i], '/h1') !== false) {
                $content .= '<h1>'.substr($renglon[$i], 3, strlen($renglon[$i])).'</h1>';
            }
            if (strpos($renglon[$i], '/h2') !== false) {
                $content .= '<h2>'.substr($renglon[$i], 3, strlen($renglon[$i])).'</h2>';
            }
            if (strpos($renglon[$i], '/h3') !== false) {
                $content .= '<h3>'.substr($renglon[$i], 3, strlen($renglon[$i])).'</h3>';
            }
            if (strpos($renglon[$i], '/h4') !== false) {
                $content .= '<h4>'.substr($renglon[$i], 3, strlen($renglon[$i])).'</h4>';
            }
            if (strpos($renglon[$i], '/h5') !== false) {
                $content .= '<h5>'.substr($renglon[$i], 3, strlen($renglon[$i])).'</h5>';
            }
            if (strpos($renglon[$i], '/h6') !== false) {
                $content .= '<h6>'.substr($renglon[$i], 3, strlen($renglon[$i])).'</h6>';
            }
            if (strpos($renglon[$i], '/p') !== false) {
                $content .= '<p>'.substr($renglon[$i], 3, strlen($renglon[$i])).'</p>';
            }
            if (strpos($renglon[$i], '/lu') !== false) {
                $content .= '<lu>';
            }
            if (strpos($renglon[$i], '/luu') !== false) {
                $content .= '</lu>';
            }
            if (strpos($renglon[$i], '/li') !== false) {
                $content .= '<li>'.substr($renglon[$i], 4, strlen($renglon[$i])).'</li>';
            }
            if (strpos($renglon[$i], '/br') !== false) {
                $content .= '<br>';
            }
            if(strpos($renglon[$i], '/ck') !== false){
                echo 'substring: '.substr($renglon[$i],4,6).'<br>';
                if(trim(substr($renglon[$i],4,6)) == 'true' ){
                    $content .= '<input type="checkbox" name="check'.$i.'" checked ><label for="check'.$i.'">'.substr($renglon[$i], 9, strlen($renglon[$i])).'</label>';
                }else{
                    $content .= '<input type="checkbox" name="check'.$i.'"><label for="check'.$i.'">'.substr($renglon[$i], 9, strlen($renglon[$i])).'</label>';
                }
                
            }
        }
        return $content;
    }

    echo convertirContenido($body);


?>
