<?php


$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '12345';
$dbName = 'hoteles';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from nombre table

//------------------ SENTENCIA SQL -------------------\\ 
$query = $db->query("SELECT * FROM ciudad WHERE nombre LIKE '%".$searchTerm."%' ORDER BY nombre ASC");
//------------------ SENTENCIA SQL -------------------\\ 

while ($row = $query->fetch_assoc()) {
    $data[] = $row['nombre'];
}
//return json data
echo json_encode($data);
?>