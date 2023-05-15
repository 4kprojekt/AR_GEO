<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="lib/aframe/aframe.min.js"></script>
   
    <script src="lib/aframe/mindar-image-aframe.prod.js"></script>
    
  </head>
  <body>

<?php
// zadeklaruj zmienne $scene_name, $images i gltf_models i $marker
$scene_name = '';
$images =array();
$gltf_models = '';
$marker='';
// jeśli parametr scene istnieje wczytaj plik scenes.json, przeiteruj po wszystkich scenach i jeśli nazwa sceny jest równa parametrowi scene przypisz do zmiennych $scene_name, $images, $gltf_models  odpowiednie wartości
if (isset($_GET['scene'])) {
    $json = file_get_contents('scenes.json');
    $scenes = json_decode($json, true);
    foreach ($scenes as $scene) {
        if ($scene['name'] == $_GET['scene']) {
            $scene_name = $scene['name'];
            $images = $scene['images'];
            $gltf_models = $scene['gltf_models'];
            $marker = $scene['marker'];
        }
    }

    // jesli nie udało się przypisać zmiennych przekieruj do index.php z komunikatem
    if ($scene_name == '') {
        header("Location: index.php?error=scene_not_found");
        exit;
    }
}
?>

<a-scene mindar-image="missTolerance: 10;filterMinCF:0.001; filterBeta: 1000; imageTargetSrc: <?=$marker?>;" color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights" vr-mode-ui="enabled: false" device-orientation-permission-ui="enabled: false">
      <a-assets>

<?php
// lista obrazków zapisanych w zmiennej $images
foreach ($images as $image) {
    echo '<img id="'.$image['id'].'" src="'.$image['src'].'">';
}
// lista modeli zapisanych w zmiennej $gltf_models
foreach ($gltf_models as $gltf_model) {
    echo '<a-asset-item id="'.$gltf_model['id'].'" src="'.$gltf_model['src'].'">';
}
?>

     </a-assets>

      <a-camera position="0 0 0" look-controls="enabled: false"></a-camera>

      <a-entity mindar-image-target="targetIndex: 0">
      
      <?php
// lista obrazków zapisanych w zmiennej $images jako a-plane z odpowiednimi parametrami
foreach ($images as $image) {
    echo '<a-plane src="#'.$image['id'].'" position="'.$image['position'].'" height="'.$image['height'].'" width="'.$image['width'].'" rotation="'.$image['rotation'].'" material="transparent:true; alphaTest:0;" animation="'.$image['animation'].'" ></a-plane>';
}
    // lista modeli zapisanych w zmiennej $gltf_models jako a-gltf-model z odpowiednimi parametrami
    foreach ($gltf_models as $gltf_model) {
        echo '<a-gltf-model src="#'.$gltf_model['id'].'" position="'.$gltf_model['position'].'" scale="'.$gltf_model['scale'].'" rotation="'.$gltf_model['rotation'].'" animation="'.$gltf_model['animation'].'"></a-gltf-model>';
    }
      ?>

      </a-entity>
    </a-scene>
</body>
</html>