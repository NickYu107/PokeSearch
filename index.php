<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Api test</title>
  </head>
  <body>
    <form class="" action="index.php" method="get">
      <input type="text" name="id">
      <input type="submit" value="submit">
    </form>
    <?php
      $id = $_GET["id"];
      if ($id<1||$id>802) {
        echo "Pokemon not found";
      } else {
        $data = file_get_contents("http://pokeapi.co/api/v2/pokemon/".$id);
        $r = json_decode($data, true);
        echo "<h1>".$id.". ".$r['name']."</h1><br>";
        $pictures = $r["sprites"];
        foreach ($pictures as $img) {
          if ($img != null) {
            echo "<img src='$img' alt=alt>";
          }
        }
      }
    ?>
  </body>
</html>
