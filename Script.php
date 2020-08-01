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
    $cpf = $_POST["cpf"];
    $cep = $_POST["cep"];
    $endereco = $_POST["endereço_queixa"];
    $descricao = $_POST["descrição"];
    $foto = $_POST["foto"];
    ?>
    <?php
    echo "Ola " .$nome;
    echo "<br>";
    echo "Seu email: " . $email;
    echo "<br>";
    echo "CPF: " . $cpf;
    echo "<br>";
    echo "CEP: " . $cep;
    echo "<br>";
    echo "Endereço da queixa: " . $endereco;
    echo "<br>";
    echo "Descrição: " . $descricao;
    echo "<br>";
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

        $sql = "INSERT INTO formulario (Nome, Email, cpf, CEP, Endereco_queixa, Descricao, foto)
        VALUES ( '$nome', '$email', '$cpf', '$cep', '$endereco', '$descricao', '$foto')";

        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>
</body>
</html>
