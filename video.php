<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div class="banerlewy">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div class="banerprawy">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <?php
            $con = mysqli_connect('localhost', 'root', '', 'dane3');
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $res3 = "DELETE FROM produkty WHERE id = $id";
                $wynik2 = mysqli_query($con, $res3);
            }
            
        ?>
    <div class="listypolecamy">
        <h3>Polecamy</h3>
        <?php
            
            $res1 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18,22,23,25)";
            $cos1 = mysqli_query($con,$res1);
            while($wiersz1 = mysqli_fetch_array($cos1)){
                echo "<div class='film'>
                    <h4>$wiersz1[0]. $wiersz1[1]</h4>
                    <div class='zdjecie' style='background-image: url($wiersz1[3]);'> </div>
                    <p>$wiersz1[2]</p>
                    </div>";
            }
            ?>
    </div>
    <div class="listyfantastyczne">
        <h3>Filme fantastyczne</h3>
        <?php
            $res1 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12";
            $cos2 = mysqli_query($con,$res1);
            while($wiersz2 = mysqli_fetch_array($cos2)){
                echo "<div class='film'>
                    <h4>$wiersz2[0]. $wiersz2[1]</h4>
                    <img src='$wiersz2[3]' alt='film'>
                    <p>$wiersz2[2]</p>
                    </div>";
            }mysqli_close($con);
            ?>
    </div>
    <div class="stopka">
        <form action="video.php" method="post">
            Usuń film nr: <input type="number" name="id">
            <input type="submit" value="Usuń film">
        <br>
        Stronę wykonał: <a href="kozlowskip@gmail.com">Paweł Kozłowski</a>
    </div>
</body>
</html>