<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- when using the mode "code", it's important to specify charset utf-8 -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.10.1/jsoneditor.css" integrity="sha512-/JghmMAi5bleEgj1BT7h7Jm2+o4I4AbJYRVaY3eGGfdyTzV+yW3n0IedWH4ysbws5zpNK1beCqVJh0MSZxvNaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.10.1/jsoneditor.min.js" integrity="sha512-xxDp3Ld9M9MRpJknGWlnJNF71c7fSDVVYsZfkK5yIKeadYaeG7Fni2gQqOTZ93SMF7RsnxiBflh75LirV8dnvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div clas="row"> 
<div id="jsoneditor" style=" height: 800px;"></div>
</div>
<form method="post">
   <input type="hidden" id="json" name="json">
<hr/>
   <input type="submit" class="btn btn-lg btn-primary" value="Zapisz"  />
 
</form>
<?php
//zapisz plik scenes.json 
if (isset($_POST['json'])) {
    $json =stripcslashes($_POST['json']);
    $file = fopen('scenes.json','w+');
    fwrite($file, $json);
    fclose($file);
    echo '<script>window.location.href = "index.php";</script>';
    exit;
}
?>
</div>
<script>
        // create the editor
        const container = document.getElementById("jsoneditor")
        const options = {
        onChange: setData,
        mode: 'tree',
        modes: ['code', 'text', 'tree', 'view'], // allowed modes
    }
        const editor = new JSONEditor(container, options)

        // load json from scene.json
        const initialJson = <?php echo file_get_contents('scenes.json'); ?>;
        editor.set(initialJson)        
        document.getElementById("json").value = JSON.stringify(initialJson);


        function setData() {
        var j = editor.get()      
        document.getElementById("json").value = JSON.stringify(j);
    }
    </script>
</body>
</html>