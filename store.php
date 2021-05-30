<?php
session_start();
require 'store_functions.php';

$id = $_GET['id'];

$_SESSION['visited_stores'][] = $id;

$store = get_store($id);

echo '<pre>';
print_r($store);
echo '</pre>';
?>