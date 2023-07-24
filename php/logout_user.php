<?php
    /**
     *
     * Date: 22/07/23
     * create for: Jose Manuel Alvarez Bucio
     * contact: josemanuel.alvarezbucio@gmail.com
     *
    */
    session_name('Carichupas');
    session_start();
    $_SESSION['idU'] = 0;
    $_SESSION['nombre'] = '';
    $_SESSION['correo'] = '';
    unset($_SESSION['idU']);
    unset($_SESSION['nombre']);
    unset($_SESSION['correo']);
    session_id($_SESSION['ident']);
    session_destroy();
    session_commit();
    header('Location: ../login.php');
    ?>
