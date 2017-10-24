<?php
$routes = [
    'metadata',
    'addImage', //1
    'createCatalog', //1
    'getAllCatalogs', //1
    'getCatalog', //1
    'deleteCatalog', //1
    'addObjectToCatalog', //1
    'getObjectFromCatalog', //1
    'deleteObjectFromCatalog',
    'getAllObjectsFromCatalog', //1
    'predictTagsForImage', //1
    'predictTagsForImages', //1
    'getTagPrediction', //1
    'getAllTagPredictions', //1
    'detectItemsOnImage', //1
    'detectItemsOnImages', //1
    'getDetectPrediction', //1
    'getAllDetectPredictions', //1
    'getProductByPredictedKeywords',
    'getProductByImage',
    'getHistoricalUsage'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

