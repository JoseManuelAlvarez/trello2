<?php
session_name('Carichupas');
session_start();
if (isset($_SESSION['idU']) && $_SESSION['idU'] > 0) {
    header('location: ./proyectos.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="position-relative " style=" height: 94vh; width: 97vw;">
        <div class="caja position-absolute top-50 start-50 translate-middle">
            <form method="post" action="./php/login_user.php">
                <div class="mb-3">
                    <label for="emailUser" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="emailUser" name="emailUser" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="passwordUser" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordUser" name="passwordUser">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>