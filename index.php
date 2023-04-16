<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Sceny zdefiniowane w <a href="scenes.json">scenes.json</a></h1>
    <table>
    
    <tr>
        <th>Nazwa sceny</th>
        <th>Marker</th>       
      </tr>
      
<?php
//jesli parametr scene istneije przekieruj do stroncy scene.php jesli nie, wczytaj plik scenes.json i wyświetl listę scen
if (isset($_GET['scene'])) {
  //przekieruj do sceny przez javascript
    echo '<script>window.location.href = "scene.php?scene='.$_GET['scene'].'";</script>';
    exit;
} else {
    $json = file_get_contents('scenes.json');
    $scenes = json_decode($json, true);
    foreach ($scenes as $scene) {
        echo '<tr><td><a href="index.php?scene='.$scene['name'].'">'.$scene['name'].'</a></td><td>'.$scene['marker'].'</td></tr>';
    }
  }
?> 
    </table>
      </div>
    </div>
  </div>
  
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>
