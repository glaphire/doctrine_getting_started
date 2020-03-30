<?php

require_once "bootstrap.php";

$dql = "SELECT b, e, r, p FROM Bug b JOIN b.engineer e "
        . "JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getArrayResult();

foreach ($bugs as $bug) {
    echo $bug['description'] . " - " . $bug['created']->format('d.m.Y') . PHP_EOL;
    echo "  Reported by: " . $bug['reporter']['name'] . PHP_EOL;
    echo "  Assigned to: " . $bug['engineer']['name'] . PHP_EOL;
    foreach ($bug['products'] as $product) {
        echo "  Platform: " . $product['name'] . PHP_EOL;
    }
    echo PHP_EOL;
}