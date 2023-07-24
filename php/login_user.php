<?php
include_once('./connect.php');
session_name('Carichupas');
session_start();

$email = $_POST['emailUser'];
$password = md5($_POST['passwordUser']);
$sql = $conn->query('SELECT * FROM usuarios WHERE correo ="'.$email.'" AND password ="'.$password.'" ');
$rows = $sql->fetchAll();
foreach($rows as $row) {
    $_SESSION['idU'] = $row['idUser'];
    $_SESSION['nombre'] = $row['name'];
    $_SESSION['correo'] = $row['correo'];
    $current_session_id = session_id();
    $_SESSION['ident'] = $current_session_id;
    session_commit();
    header('location: ../proyectos.php');
}
?>