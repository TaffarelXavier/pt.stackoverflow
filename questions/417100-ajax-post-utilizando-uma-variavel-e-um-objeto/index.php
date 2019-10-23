<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <input type="text" id="nome" autofocus>
    <input type="text" id="email">
    <input type="text" id="formacao">
    <button id="enviar">Enviar</button>

    <pre id="resultado"></pre>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script>
        $(document).ready(function() {

            $("#enviar").click(function() {

                var vNome = $("#nome").val();
                var vEmail = $("#email").val();
                var vFormacao = $("#formacao").val();

                //Um arquivo de servidor em php, somente para teste:
                var vUrl = "teste.php";

                //Sintaxe correta:
                var vData = {
                    name: vNome,
                    contents: {
                        email: vEmail,
                        formacao: vFormacao
                    }
                };

                $.ajax({
                        method: "POST",
                        url: vUrl,
                        data: vData
                    })
                    .done(function(msg) {
                        $("#resultado").html(msg);
                    })
                    .fail(function(jqXHR, textStatus, msg) {
                        alert(jqXHR);
                    });
            });


        })
    </script>
</body>

</html>