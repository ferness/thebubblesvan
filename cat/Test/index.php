<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Random Cat Images</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

<?php
// Cesta k souboru pro ukládání dat
$filePath = 'click_data.txt';

// Načtení existujících dat
$data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

// Získání aktuální IP adresy
$ip = $_SERVER['REMOTE_ADDR'];

// Kontrola, zda $data není null a zda IP adresa již existuje v datech
if ($data !== null && array_key_exists($ip, $data)) {
    // IP adresa již existuje, zvýšíme počítadlo
    $data[$ip] += 1;
} else {
    // IP adresa není v datech, přidáme ji s počáteční hodnotou 1
    $data[$ip] = 1;
}

// Uložení aktualizovaných dat zpět do souboru
file_put_contents($filePath, json_encode($data));

// Odpověď pro klienta
echo "Kliknuto: {$data[$ip]} krát z IP adresy: $ip";
?>


    <section class="header-content">
        <h1></h1>
        <button id="clickButton" class="btn">Vygeneruj si číču</button>
    </section>

    <div class="container"></div>

    <script src="app.js"></script>


    <script>
        document.getElementById('clickButton').addEventListener('click', function() {
            // Odeslat žádost na server pomocí AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Zobrazit odpověď od serveru
                }
            };
            xhr.send();
        });
    </script>

</body>

</html>