<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Página de apoio a queixar da comunidade">
        <title>Site modelo</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body class="body">
        <header class="header">
            <div class="img">
                <a href="index.php">
                <img src="ComunidadeAtiva.png" width="300px" height="170px"> 
                </a>
                
                    <button type="button" id="Bform" class="bform"><a href="formulario.html"><b><h1>Registre sua reclamação</h1></b></a></button>
              
            </div>
        </header>
        <main class="main">
            <h1>A comunidade ajudando a comunidade</h1>
            <h3 class="p">O comunidade ativa é uma plataforma interativa, onde qualquer pessoa pode, não só monitorar a situação no quesito saneamento básico na sua região, mas também fazer denuncias de adversidades que ocorrem em sua região, ou que qualquer outra enfrenta. Sendo então, um meio do cidadão praticar sua cidadania com voz ativa na comunidade, e fiscalizar o papel do poder publico em seu meio.</h3>
            <h2 style="padding:2%">Consulta dos ultimos registros </h2>
            <table class="consulta">
                <tr >
                    <th style="text-align: center;">Data | Tipo de registro | Endereço | Número | Foto</th>
                </tr>
                <tr>
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

                $sql = "SELECT data,tipo,Endereco_queixa,num_endereco,Descricao,image FROM formulario
                order by data desc";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<td>" . "<div> " . " Data: " . $row["data"] . "<br>Tipo: " . $row["tipo"] . "<br>Endereço: " . $row["Endereco_queixa"] . "<br>Numero: ". $row["num_endereco"] . "<br>Descrição: " . $row["Descricao"] . "<div>" .
                        '<img style="width: 400px;height: 300px;" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>' . 
                        "<br></td>";
                }
                } else {
                echo "0 results";
                }
                mysqli_close($conn);
                ?>
                </tr>
            </table>
        </main>
    </body>
</html>