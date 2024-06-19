<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ClienteController;
use App\Controllers\ItemVendaController;
use App\Controllers\ProdutoController;
use App\Controllers\VendaController;

$url = isset($_GET['url']) ? $_GET['url'] : '';
$urlParts = explode('/', rtrim($url, '/'));

$controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'ClienteController';
$action = !empty($urlParts[1]) ? $urlParts[1] : 'index';

$controllerPaths = [
    'ClienteController' => __DIR__ . '/../app/Controllers/ClienteController.php',
    'ItemVendaController' => __DIR__ . '/../app/Controllers/ItemVendaController.php',
    'ProdutoController' => __DIR__ . '/../app/Controllers/ProdutoController.php',
    'VendaController' => __DIR__ . '/../app/Controllers/VendaController.php',
];

if (array_key_exists($controllerName, $controllerPaths) && file_exists($controllerPaths[$controllerName])) {
    require_once $controllerPaths[$controllerName];

    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        if (method_exists($controller, $action)) {
            $params = array_slice($urlParts, 2);
            
            call_user_func_array([$controller, $action], $params);
        } else {
            echo "404 - Ação não encontrada";
        }
    } else {
        echo "404 - Classe do controlador não encontrada";
    }
} else {
    echo "404 - Arquivo do controlador não encontrado";
}
?>
