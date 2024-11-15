<?php

$animals = [ 'turtle', 'seagull', 'octopus', 'shark', 'whale', 'dolphin', 'walrus', 'penguin', 'seahorse'];
$adjectives = [ 'ludicrous', 'mischievous', 'graceful', 'fortuitous', 'charming', 'ravishing', 'gregarious'];

$chosenAdjective = $adjectives[array_rand($adjectives)];
$chosenAnimal = $_GET['animal'] ?? $animals[array_rand($animals)];

echo json_encode(['animal' => $chosenAnimal, 'adjective' => $chosenAdjective]);
