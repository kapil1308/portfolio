<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("sql303.epizy.com", "epiz_20559923", "FoT6n5sh", "epiz_20559923_dict");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$word = mysqli_real_escape_string($link, $_REQUEST['word']);
$definition = mysqli_real_escape_string($link, $_REQUEST['definition']);
$example = mysqli_real_escape_string($link, $_REQUEST['example']);
$category = $_POST['category'];

$cat = "";
if (!empty($category)) {
	foreach ($category as $cat1) {
    	$cat .= $cat1.",";
    }

}


// attempt insert query execution
$sql = "INSERT INTO glossary (Term, Definition, Example, Category) VALUES ('$word', '$definition', '$example', '$cat')";
if(mysqli_query($link, $sql)){
    echo "Term added successfully";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>