<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $CPF = $_POST["cpf"];
    $cep = $_POST["cep"];
    $tipo = $_POST["queixa"];
    $endereco = $_POST["endereço_queixa"];
    $numend = $_POST["numero"];
    $descricao = $_POST["descrição"];
    $foto = $_POST["foto"];
    ?>

    <?php
       $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comunidadeativa";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO formulario (Nome, Email, cpf, CEP,tipo, Endereco_queixa,num_endereco, Descricao, foto)
        VALUES ( '$nome', '$email', '$CPF', '$cep', '$tipo', '$endereco', '$numend', '$descricao', '$foto')";

        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>
</body>
</html>
