 <?php
// index.php

spl_autoload_register(function ($class) {
     $sources = [
        'app/models/',
        'config/'
    ];

    foreach ($sources as $source) {
        $file = $source . $class . '.php';
        if (file_exists($file)) {
            include $file;
            return;     
        }
    }
});

 $pdo = Database::getInstance();
$catManager = new CategoryManager($pdo);
$categories = $catManager->getAllWithVehicules();

var_dump($categories);