<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>140Journos | Tweet Managament</title>
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

// pull a cursor query  
$cursor = $collection->find();  

?>

<table class="main_table">
<tr class="title">
<td>ID</td><td>ID_str</td><td>Created_at</td><td class="tweet">Tweet</td><td class="addr">ADDR</td><td class="update">Update</td>
</tr>
<?php foreach($cursor as $document) { ?>
<tr><td><?php echo $document['_id']; ?></td>
<td><?php print_r($document['id_str']);  ?></td><td><?php print_r($document['created_at']);  ?></td><td class="tweet"><?php print_r($document['tweet']);  ?></td><td class="addr"><?php print_r($document['addr']);  ?></td><td class="update"><a href="update_vrfy.php?id=<?php echo $document['_id']; ?>">Edit</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>
