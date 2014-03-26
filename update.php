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
    $mongo = new Mongo('mongodb://URL'); 
 
    // Choose DB
    $db = $mongo->selectDB('db_name'); 
} catch(MongoConnectionException $e) { 
    die('Baglanti Hatası : ' . $e->getMessage());  
}

// Choose Collection
$collection = new MongoCollection($db, 'collection_name'); 

$id = $_GET["id"];


// pull a cursor query  
$fruitQuery = array('_id' => new MongoId($id));

$cursor = $collection->find($fruitQuery);  

foreach($cursor as $document) {
}
?>

<form name="update" method="post" action="update_has.php?id=<?php echo $document['_id']; ?>"><br>
TIME: <?php echo($document['created_at']);?><br>
ID: <input type="text" class="id" name="id" size="23" value="<?php echo($document['_id']); ?>"></input><br>
<textarea name="tweet" class="id" rows="4" cols="50"><?php echo($document['tweet']); ?></textarea>
<br>
<input type="submit" value="Update">
</form>
<br> <a href="show.php">Show</a>
</body>
</html>






