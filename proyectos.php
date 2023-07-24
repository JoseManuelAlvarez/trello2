<?php
include_once('./plantilla/header.php');
?>
<body class="displayflex">
    <nav class="menu">
        <h2>INICIO</h2>
        <ul>
            <?php include_once('./php/consultar_proyectos.php') ?>
        </ul>
    </nav>
    <div id="content-body">
        <div id="listas-content">
            <h1>contenido</h1>
            <div id="contendor-principal">
                <h2>Contenedor principal</h2>
            </div>
        </div>
        <div id="tarea-editar">
            <input type="text" name="idTarea" id="idTarea" hidden>
            <input type="text" name="titulo-tarea" id="titulo-tarea" placeholder="Titulo de la tarea">
            <button class="btn btn-primary" onclick="guardarEdicionTarea()">Guardar</button>
            <button class="btn btn-warning" onclick="cerrarEdicionTarea()">Cerrar</button>
            <table class="tabla-edicion">
                <tr>
                    <td>Autor</td>
                    <td><input type="text" id="nameAutor-tarea" name="nameAutor-tarea" class="tarea-option" placeholder="Autor"></td>
                </tr>
                <tr>
                    <td>Asigando</td>
                    <td>
                        <select name="selePerson-tarea" id="selePerson-tarea" class="tarea-option">
                            <option value="1">1 empleado</option>
                            <option value="2">2 empleado</option>
                            <option value="3">3 empleado</option>
                            <option value="4">4 empleado</option>
                            <option value="5">5 empleado</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>fecha</td>
                    <td><input type="date" name="fechaCreacion-tarea" id="fechaCreacion-tarea" class="tarea-option"></td>
                </tr>
                <tr>
                    <td>Fecha Vencimiento</td>
                    <td><input type="date" name="fechaVencimiento-tarea" id="fechaVencimiento-tarea" class="tarea-option"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php include('/php/consultar_status.php') ?></td>
                </tr>
            </table>
            <div id="content-body-tarea">

            </div>
        </div>
    </div>
    
<?php
include_once('./plantilla/footer.php');
?>