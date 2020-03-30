<?php

require_once "bootstrap.php";

$dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

foreach ($bugs as $bug) {
    echo $bug->getDescription() . " - " . $bug->getCreated()->format('d.m.Y') . PHP_EOL;
    echo "  Reported by: " . $bug->getReporter()->getName() . PHP_EOL;
    echo "  Assigned to: " . $bug->getEngineer()->getName() . PHP_EOL;
    foreach ($bug->getProducts() as $product) {
        echo "  Platform: " . $product->getName() . PHP_EOL;
    }
    echo PHP_EOL;
}