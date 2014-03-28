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
$collection = new MongoCollection($db, 'logtest1'); // stream - seçilmemişler
$tweetstoverify = new MongoCollection($db, 'tweetstoverify');  // seçilmiş tweetler

$id = $_GET["id"];

// pull a cursor query  
$fruitQuery = array('_id' => new MongoId($id));

$cursor = $collection->find($fruitQuery); 

foreach($cursor as $document) { 

$id  = $document['_id'];
$addr = $document['addr'];
$created_at = $document['created_at'];
$coords = $document['coords'];
$id_str = $document['id_str'];
$tweet = $document['tweet'];
}
 
 
    $add = array('_id'=>$id, 'addr'=>$addr, 'created_at'=>$created_at,'coords'=>$coords,'id_str'=>$id_str,'tweet'=>$tweet);
 
$tweetstoverify->insert($add);

echo 'Tweet, seçilmiş tweetlere eklendi.';

?>

<br> <a href="stream.php">Stream</a>
<br> <a href="verify.php">Verify</a>
</body>
</html>
