<?php
session_start();
require 'product_functions.php';
require 'store_functions.php';

$products = read_all_products();
$stores = read_all_stores();

$count = 0;
$count2 = 0;

echo '<ul>';
foreach ($products as $p) {
  $id = $p['id'];
  $name = $p['name'];
  echo "<li><a href=\"product.php?id=$id\">$name</a></li>";
  $count++;
  if ($count == 10) {
    break;
  }
}
echo '</ul>';

echo '<ul>';
foreach ($stores as $s) {
  $id = $s['id'];
  $name = $s['name'];
  echo "<li><a href=\"store.php?id=$id\">$name</a></li>";
  $count2++;
  if ($count2 == 10) {
    break;
  }
}
echo '</ul>';

if (isset($_SESSION['visited_products']) && is_array($_SESSION['visited_products'])) {
  echo 'Visited products';
  echo '<ul>';
  foreach ($_SESSION['visited_products'] as $id) {
    echo "<li>$id</li>";
  }
  echo '</ul>';
}