<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Questionário</title>
</head>
<body>
<?php
//include("conecta.php");

$_SESSION['id'] = rand();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $st = $db->prepare("INSERT INTO usuarios (dt_resp) VALUES (NOW())");
    $st->execute();
    $_SESSION['id'] = $db->lastInsertId();

    for ($i = 1; $i <= 28; ++$i) {
        $chave = 'P'.$i;
        $stmt = $db->prepare("INSERT INTO respostas (RESPOSTA, IDPERGUNTA, IDUSUARIO) VALUES (:resp, :perg, :id)");
        $stmt->bindParam(":resp", $_POST[$chave]);
        $stmt->bindParam(":perg", $i);
        $stmt->bindParam(":id", $ident);
        $stmt->execute();
    }

}
?>
<form action="resultado.php" method="post">    <!-- resultado.php -->
    <legend id="titulo">Inteligências Múltiplas</legend>
    <?php
   /* try {
        foreach ($db->query("SELECT * FROM perguntas") as $perguntas) {
            echo "<h4> $perguntas[ID]. $perguntas[ENUNCIADO] </h4>";
            echo "<input type ='radio'  id='concordo' name='P$perguntas[ID]' value = 'C' >Concordo<br>";
            echo "<input type ='radio'  id='discordo' name='P$perguntas[ID]' value = 'D' checked=checked >Discordo <br>";
        }
        $db = null;
    } catch (PDOException $e) {
        echo "Erro!: ".$e->getMessage()."</br>";
    }*/
    ?>
    <br>
    <input type="submit" name="acao" value="ENVIAR">
</form>
</body>
</html>