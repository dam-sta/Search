<!DOCTYPE html>
<html lang="pl-PL">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wyszukiwanie</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  <form action="#" method="GET">
    <div class="wrapper">
      <div class="header">
        <h1>Wyszukiwanie</h1>
      </div>
      <div class="search">
        <input type="text" name="szukaj" id="szukaj" placeholder="Szukaj..." autocomplete="off">
        <button type="submit"><ion-icon name="search-sharp"></ion-icon></button><br> 
        <input type="checkbox" name="tytuly" id="tytuly" value="1">
        <label for="tytuly">Szukaj w tytułach</label><br>
        <input type="checkbox" name="frazy" id="frazy" value="2">
        <label for="frazy">frazy</label><br>
      </div>
    </div>
  </form>

  <h1>wyniki: </h1>

  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'staszek');

  if(!$conn) {
    die('Could not connect: '. mysqli_connect_error());
  }

  $search = @$_GET['szukaj'];
  $tytuly = @$_GET['tytuly'];
  $frazy = @$_GET['frazy'];
  
  echo "<div class=tresc>";
  if ($frazy != '2' && $search != null) {
    echo "<h2>Treść: </h2>";
    $searchExplode = explode(' ', $search);
    $selectFrazyOr = "SELECT tresc, tytul, strona from artykuly where tresc like '%$searchExplode[0]%'";
    if (isset($searchExplode['1'])){
      for ($i = 1; $i < count($searchExplode); $i++) {
          $selectFrazyOr = $selectFrazyOr . " OR tresc like '%$searchExplode[$i]%'";
        }
    }
      $selectFrazyOr = $selectFrazyOr . ";";
      $queryFrazyOr = mysqli_query($conn, $selectFrazyOr);
       while ($row = mysqli_fetch_array($queryFrazyOr)) {
        echo "<h3><a href=$row[strona] target=_blank>$row[tytul]</a></h3><br>$row[tresc]<br>";
       }
       if (mysqli_num_rows($queryFrazyOr) <= 0){
        echo "Brak wyników<br>";
       }
  }

  if ($frazy == '2') {
    $selectFrazy = "SELECT tresc, tytul, strona from artykuly where tresc like '%$search%';";
    $queryFrazy = mysqli_query($conn, $selectFrazy);
    echo "<h2>Treść: </h2>"; 
      while ($row = mysqli_fetch_array($queryFrazy)) {
        echo "<h3><a href=$row[strona] target=_blank>$row[tytul]</a></h3><br>$row[tresc]\n";
      }
      if (mysqli_num_rows($queryFrazy) <= 0){
        echo "Brak wyników<br>";
      }
  }
  echo "</div>";

  echo "<div class=tytul>";
  if ($tytuly == '1') {
    $selectTytuly = "SELECT tytul, strona from artykuly where tytul like '%$search%';";
    $queryTytuly = mysqli_query($conn, $selectTytuly);
    echo "<h2>Tytuły: </h2>"; 
      while ($row = mysqli_fetch_array($queryTytuly)) {
        echo "<h3><a href=$row[strona] target=_blank>$row[tytul]</a></h3>";
      }
      if (mysqli_num_rows($queryTytuly) <= 0){
        echo "Brak wyników<br>";
       }
  }
  echo "</div>";

  mysqli_close($conn);
  ?>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>