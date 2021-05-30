<?php
function read_all_products() {
    $file_name = 'data/products.csv';
    $fp = fopen($file_name, 'r');
    $first = fgetcsv($fp);
    $products = [];
    while ($row = fgetcsv($fp)) {
        $i = 0;
        $product = [];
        foreach ($first as $col_name) {
            $product[$col_name] = $row[$i];
            $i++;
        }
        $products[] = $product;
    }
    return $products;
}

// echo "<pre>";
// print_r(read_all_products($products));
// echo "</pre>";

function get_featured_product($product_id) {
    $products = read_all_products();
    foreach ($products as $p) {
        if ($p['id'] == $product_id) {
            return $p;
        }
    }
    return false;
}
?>

