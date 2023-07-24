<?php
    session_name('Carichupas');
    session_start();
    if ($_SESSION['idU'] == 0) {
        header('location: ./login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trellot</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap-min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery.js"></script>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>