<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>140Journos | Verileri Listele</title>
<style>
@import url(style.css)
</style>
</head>
<body>
<?php

try { 
    // Connect MongoDB server
    $mongo = new Mongo('URL'); 
 
    // Choose DB
    $db = $mongo->selectDB('db_name'); 
} catch(MongoConnectionException $e) { 
    die('Baglanti Hatası : ' . $e->getMessage());  
}

// Choose Collection
$collection = new MongoCollection($db, 'tweetstoverify'); 



if(!empty($_POST)){
 
    $id = $_POST['id'];
    $tweet = $_POST['tweet'];

    $query = array('_id'=>new MongoId($id));
    $update = $collection->findOne($query);

    $update['tweet'] = $tweet;
    $collection->save($update);
 
    echo 'Güncelleme İşlemi Başarılı!';
echo "<br>", $id;

}
 ?>

<br>
<a href="update_vrfy.php?id=<?php echo $id ?>">Geri</a>
