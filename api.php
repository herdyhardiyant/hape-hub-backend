<?php
// api.php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");


// Endpoint to handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $strJsonFileContents = file_get_contents("data/data-hape.json");
    $products  = json_decode($strJsonFileContents, true);

    // Check if an ID parameter is provided
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $product = null;

        foreach ($products as $item) {
            if ($item['id'] == $productId) {
                $product = $item;
                break;
            }
        }
        if ($product) {
            echo json_encode($product);
        } else {
            echo json_encode(['error' => 'Product not found']);
        }

    } else {
        echo json_encode($products);
        exit();
    } 

}
