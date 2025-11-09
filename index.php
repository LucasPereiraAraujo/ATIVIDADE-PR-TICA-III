<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Países</title>
</head>

<body>

    <?php
    $url = "https://restcountries.com/v3.1/all?fields=name,capital,region,population,flags";

    $resposta = file_get_contents($url);

    $paises = json_decode($resposta, true);

    foreach ($paises as $pais) {
        $nome = $pais['name']['common'];
        $capital = $pais['capital'][0];
        $regiao = $pais['region'];
        $populacao = $pais['population'];
        $bandeira = $pais['flags']['png'];


        echo "<div>
            <h2>Informações sobre: $nome</h2>
            <strong>Capital:</strong> $capital<br>
            <br>
            <strong>Região:</strong> $regiao<br>
            <br>
            <strong>População:</strong> " .  number_format($populacao, 0, ',', '.') . " habitantes <br>
            <img src='$bandeira' width='100'>
          </div>";
    }
    ?>

</body>

</html>