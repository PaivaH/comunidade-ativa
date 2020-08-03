<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    date_default_timezone_set("America/Sao_Paulo");
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $cep = $_POST["cep"];
    $tipo = $_POST["queixa"];
    $endereco = $_POST["endereço_queixa"];
    $numend = $_POST["numero"];
    $image = $_FILES['image']['tmp_name'];
    $tamanho = $_FILES['image']['size'];
    $descricao = $_POST["descrição"];
    $dia = date("Y-m-d h:i:sa");
    if ( $image != "none" ){
        $fp = fopen($image, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);
    }else{
        echo "Sem arquivo enviado";
    }
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

    $sql = "INSERT INTO formulario (Nome, Email, cpf, CEP,tipo, Endereco_queixa,num_endereco, Descricao, `image` , data)
    VALUES ( '$nome', '$email', '$cpf', '$cep', '$tipo', '$endereco', '$numend', '$descricao', '$conteudo' ,'$dia')";

    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    header('Refresh: 2; URL=index.php');
    exit();
    ?>
</body>
</html>