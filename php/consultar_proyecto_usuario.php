<?php
    /**
     *
     * Date: 22/07/23
     * create for: Jose Manuel Alvarez Bucio
     * contact: josemanuel.alvarezbucio@gmail.com
     *
    */
    $data = array(
        'STATUS'    => '0',
        'columns'   => '',
        'numColumn' => 0,
    );
    if(!isset($_POST['idProyect'])){
        echo json_encode($data);
    }
    include_once('connect.php');
    $id = $_POST['idProyect'];

    function name_function($id) {
        $sql = $GLOBALS['conn']->query('SELECT * FROM columnas WHERE idProyecto ='.$id.' ORDER BY ORDEN');
        $rows = $sql->fetchAll();
        $numColumns = 0;
        foreach($rows as $row) {
            $GLOBALS['data']['columns'] .= '<div id="column-'.trim($row['idColumna']).'" class="column-tareas">';
            $GLOBALS['data']['columns'] .= '<h3 id="title-column-'.trim($row['idColumna']).'">'.$row['name'].'</h3>';
            consultarTareasColumna($row['idColumna']);
            $GLOBALS['data']['columns'] .= '</div>';
            $numColumns = $row['idColumna'];
        }
        $GLOBALS['data']['numColumn'] = $numColumns;
        echo json_encode($GLOBALS['data']);
    }
    function consultarTareasColumna( $idColumna) {
        $sql = $GLOBALS['conn']->query('SELECT * FROM tareas WHERE idColum ='.$idColumna.' ORDER BY ORDEN');
        $rows = $sql->fetchAll();
        foreach($rows as $row) {
            $titulo = '';
            if(strlen(trim($row['nombre'])) > 16){
                $titulo = substr(trim($row['nombre']),0,16).'...';
            }else{
                $titulo = trim($row['nombre']);
            }
            $GLOBALS['data']['columns'] .=  '<div class="cardT">
                                                <div class="card-status"></div>
                                                <div class="cardt-body">
                                                    <h5 class="cardt-title">'.$titulo.'</h5>
                                                    <p class="card-text">'.$row['body'].'</p>
                                                    <button class="btn btn-primary" onclick="editarTarea('.$row['idTarea'].')">Editar</button>
                                                </div>
                                            </div>';
        }
    }
    name_function($id);