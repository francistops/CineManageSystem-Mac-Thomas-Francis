<?php

const BASE_URL = "/macaronix/api/";

require_once("db.php");  
require_once("models/MenuModel.php");  

$menuModel = new MenuModel($db);  

function sendResponse($code, $body = null)
{
    $statusCodes = [
        200 => "200 OK",
        400 => "400 Bad Request",
        401 => "401 Unauthorized",
        403 => "403 Forbidden",
        404 => "404 Not found",
        500 => "500 Internal Server Error",
    ];

    header("HTTP/1.1 " . $statusCodes[$code]);
    header("Content-Type: application/json; charset=utf-8");

    if ($body) {
        echo json_encode($body);
    }

    exit();
}

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$route = str_replace(BASE_URL, "", $url);
$routeParts = explode("/", $route);

$method = $_SERVER["REQUEST_METHOD"];
$jsonBody = file_get_contents("php://input");
$body = json_decode($jsonBody, true);

try {
    if ($routeParts[0] == 'products') {
        if (isset($routeParts[1]) && $routeParts[1] !== '') {
            $productId = intval($routeParts[1]);
            $product = $menuModel->getById($productId);

            if (!$product) {
                sendResponse(404, ["error" => "Product not found."]);
            }

            switch ($method) {
                case "GET":
                    //http://localhost/macaronix/api/products/2
                    sendResponse(200, $product);
                    break;
                case "POST":
                    sendResponse(400, ["error" => "Bad Request"]);
                    break;
                case "PUT" :
                        //http://localhost/macaronix/api/products/2
                        /*
                    {
                        "name": "Pappardelle",
                        "ingredients": "Crevettes nordiques fraîches, Citron, beurre, crème de cuisson, aneth",
                        "prix": 16.99,
                        "id_category": 1,
                        "available": 1,
                        "image_path": null
                    }


                    */
                    if (
                        !isset($body['name']) || empty($body['name']) ||
                        !isset($body['prix']) || !is_numeric($body['prix']) ||
                        !isset($body['id_category']) || !is_int($body['id_category']) ||
                        !isset($body['available']) || !is_int($body['available'])
                        ) {
                            sendResponse(400, ["error" => "Invalid input data"]);
                    } else {
                        $ingredients = !empty($body['ingredients']) ? $body['ingredients'] : null;
                        $imagePath = !empty($body['image_path']) ? $body['image_path'] : null;
        
                        $menuModel->update(
                            $productId,
                            $body['name'],
                            $ingredients,
                            (float)$body['prix'],
                            $body['id_category'],
                            $body['available'],
                            $imagePath
                            );
                            sendResponse(200);
                        }
                        break;
    

                case "DELETE":
                    //http://localhost/macaronix/api/products/2
                    $menuModel->delete($productId);
                    sendResponse(200);
                    break;
                    
                default:
                    sendResponse(405, ["error" => "Method not allowed"]);
                    break;
            }
        } else {
            switch ($method) {
                case "GET":
                    //http://localhost/macaronix/api/products
                    $products = $menuModel->getAll();
                    sendResponse(200, $products);
                    break;
                case "POST":
                    //http://localhost/macaronix/api/products
                    /*
                    {
                        "name": "Pappardelle",
                        "ingredients": "Crevettes nordiques fraîches, Citron, beurre, crème de cuisson, aneth",
                        "prix": 16.99,
                        "id_category": 1,
                        "available": 1,
                        "image_path": null
                    }


                    */
                    if (
                        !isset($body['name']) || empty($body['name']) ||
                        !isset($body['prix']) || !is_numeric($body['prix']) ||
                        !isset($body['id_category']) || !is_numeric($body['id_category']) ||
                        !isset($body['available']) || !is_numeric($body['available'])
                    ) {
                        sendResponse(400, ["error" => "Invalid data"]);
                    } else {
                        $ingredients = !empty($body['ingredients']) ? $body['ingredients'] : null;
                        $imagePath = !empty($body['image_path']) ? $body['image_path'] : null;
    
                        $product= $menuModel->insert(
                            $body['name'],
                            $ingredients,
                            (float)$body['prix'],
                            (int)$body['id_category'],
                            (int)$body['available'],
                            $imagePath
                        ); 
    
                        if ($product) {
                            sendResponse(200, ["id" => $product]);
                        } else {
                            sendResponse(500, ["error" => "Failed to insert product"]);
                        }
                    }
                    
                    break;
                
                default:
                sendResponse(405, ["error" => "Method not allowed"]);
                    break;
            }
        }
            
    } else {
        sendResponse(404, ["error" => "Route not found"]);
    }
} catch (Exception $e) {
    sendResponse(500, ["error" => $e->getMessage()]);
}

?>
