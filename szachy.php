<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>KOŁO SZACHOWE</title>
</head>
<body>
    <header>
        <h2>Koło szachowe <em>gambit piona</em></h2>
    </header>
    <div class="srodek">
    <section id="lewy">
        <h4>Polecane linki</h4>
        <ol>
            <li><a href="Kwerendy/kw1.png">kwerenda1</a></li>
            <li><a href="Kwerendy/kw2.png">kwerenda2</a></li>
            <li><a href="Kwerendy/kw3.png">kwerenda3</a></li>
            <li><a href="Kwerendy/kw4.png">kwerenda4</a></li>
        </ol>
        <img src="logo.png" alt="Logo koła">
    </section>
    <section id="prawy">
        <h3>Najlepsi gracze naszego koła</h3>
        <?php
        $con = mysqli_connect("localhost", "root", "", "szachy");
        $zapytanie = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
        $wynik = mysqli_query($con,$zapytanie);
        echo'<table>';
            echo'<tr>';
            echo'<th>Pozycja</th>';
            echo'<th>Pseudonim</th>';
            echo'<th>Tytuł</th>';
            echo'<th>Ranking</th>';
            echo'<th>Klasa</th>';
            echo'</tr>';
            $pozycja = 1;
            while ($wiersz = mysqli_fetch_array($wynik)) {
                echo'<tr>';
                echo'<td>'.$pozycja++.'</td>';
                echo'<td>'.$wiersz[0].'</td>';
                echo'<td>'.$wiersz[1].'</td>';
                echo'<td>'.$wiersz[2].'</td>';
                echo'<td>'.$wiersz[3].'</td>';
                echo'</tr>';
            }
            echo '</table>';
            ?>
            <form action="szachy.php" method="post">
               <button type="submit">Losuj nową parę graczy</button>
            </form>
        <?php       
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con1 = mysqli_connect("localhost", "root", "", "szachy");
    $zapytanie1 = "SELECT pseudonim FROM zawodnicy ORDER BY RAND() LIMIT 2;";
    $wynik1 = mysqli_query($con1, $zapytanie1);
    while ($wiersz1 = mysqli_fetch_array($wynik1)) {
        echo '<h4 class="obok">' . $wiersz1['pseudonim'] . '</h4>';
    }
}
?>
        ?>
    </section>
    </div>
    <footer>
        <p>Stronę wykonał: Mikołaj Sobolewski</p>
    </footer>
</body>
</html>