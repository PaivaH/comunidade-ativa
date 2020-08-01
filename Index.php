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
                <a href="Index.php">
                <img src="Comunidade_Ativa_v1.png" width="300px" height="170px"> 
                </a>
                
                    <button type="button" id="Bform" class="bform"><a href="formulario.html"><b><h1>Faça sua queixa</h1></b></a></button>
              
            </div>
        </header>
        <main class="main">
            <h1>What is Lorem Ipsum?</h1>
            <p class="p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <h3>Consulta da tabela mais reclações</h3>
            <table>
                <tr>
                    <th>
                        Endereço da queixa
                    </th>
                    <th>
                        Numero
                    </th>
                    <th>
                        Descrição
                    </th>
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

                $sql = "SELECT tipo,Endereco_queixa,num_endereco,Descricao,foto FROM formulario";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<td> Tipo: " . $row["tipo"] . " |Endereço: " . $row["Endereco_queixa"] . "| Numero: ". $row["num_endereco"] . "| Descrição: " . $row["Descricao"] . 
                        '<img src="data:image/jpeg;base64,'.base64_encode( $row['foto'] ).'"/>' .
                        "<br></td>";
                }
                } else {
                echo "0 results";
                }
                mysqli_close($conn);
                ?>
                </tr>
            </table>
            <h3>Consultar ultimas queixas</h3>
            <table>
                <tr>
                    <th>
                        Endereço da queixa
                    </th>
                    <th>
                        Numero
                    </th>
                    <th>
                        Descrição
                    </th>
                </tr>
            </table>
        </main>
        <footer>
            <section class="titulos">
                <h3>Ranking de problemas mais recorrentes</h3>
                <h3>Gráfico de problemas</h3>
            </section>
        </footer>
    </body>
</html>