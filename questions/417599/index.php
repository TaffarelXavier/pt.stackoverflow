<html>

<head>
    <title>PrePago</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/premium-icon/icons/svg/1361/1361253.svg" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <br />
    <div class="container" style="width:100%; max-width:600px">
        <h2 align="center">Pré-Pago</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Registrar</h4>
            </div>
            <div class="panel-body">
                <form method="post" id="register_form">
                    <?php /*echo $message;*/ ?>
                    <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" name="user_name" autofocus style="text-transform:uppercase" class="form-control" pattern="[a-zA-Z ]+" required />
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="user_email" style="text-transform:uppercase" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>CEP</label>
                        <input type="text" name="campob" id="cep" value="" maxlength="9" onblur="pesquisacep(this.value);" class="form-control">
                    </div>
                    <div class="form-group">
                        <table id="myTable" class="table table-dark">
                            <a class="btn btn-primary" onclick="myFunction()" href="#" role="button">Adicionar Autorizado</a>
                        </table>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" id="register" value="Validar" class="btn btn-info" />
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>SALDO</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //Pega o tamanho de uma das duas matrizes, visto, que, pelo menos, teoricamente
                    //ambas terão o mesmo tamanho.
                    $tamanho = count($_POST['name']);
                    //Aqui: intero pelo array
                    for ($i = 0; $i < $tamanho; $i++) {
                        echo '<tr>',
                            '<td>',
                            strtoupper($_POST['name'][$i]),
                            '</td>',
                            '<td>',
                            $_POST['saldo'][$i],
                            '</td>',
                            '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
    <script>
        var incremento = -1;

        function myFunction() {
            incremento++;
            var table = document.getElementById("myTable");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = "NOME";
            cell2.innerHTML = `<input type='text' name='name[${incremento}]' >`;
            cell3.innerHTML = "SALDO";
            cell4.innerHTML = `<input type='text' name='saldo[${incremento}]' size='15px' >`;
        }
    </script>
</body>

</html>