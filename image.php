<?php
require_once  'C:\xampp\htdocs\lbl1\Modele\Modele1.php';


echo 'salut';
if(isset($_GET["image_id"])){ $image_asked = $_GET["image_id"];
}else{ $image_asked = 1;

    $stmt = SGBDConnect()->prepare("SELECT * FROM images WHERE id = 1 ");
if ($stmt->execute(array($_GET["image_id"]))) {
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
}
}

//if(isset($_GET["image_id"])) $image_asked = $_GET["image_id"];
//else $image_asked = 1;
//$stmt = $mysqli->prepare("SELECT * FROM ref_images WHERE id = ? ");
//$stmt->bind_param('i', $image_asked);
//$stmt->execute();
//$stmt->bind_result($image_id , $image_file_name);
//$stmt->fetch();
//// ici, la variable $image_file_name a été remplie avec le nom de fichier sélectionné venant de la base de données.
//$stmt->close();
?>

<img src="http://localhost/lbl1/Image/dgl.jpg"/>

