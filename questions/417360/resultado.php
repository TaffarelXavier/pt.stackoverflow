<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resultado</title>
</head>
<body>
<form method="POST">
<button>Enviar</button>
</form>
<?php
//include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_SESSION);
    echo $_SESSION['id'];
}

?>
</body>
</html>