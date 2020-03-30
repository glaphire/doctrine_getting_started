<?php
//show_bug.php <id>
require_once "bootstrap.php";

$theBugId = $argv[1];

$bug = $entityManager->find("Bug", (int)$theBugId);

echo "Bug: " . $bug->getDescription() . PHP_EOL;
echo "Engineer: " . $bug->getEngineer()->getName() . PHP_EOL;