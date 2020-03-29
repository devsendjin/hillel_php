<?php

require_once 'vendor/autoload.php';

use App\QueryCreator;

echo QueryCreator::findById(4);
echo '<br><br>';

echo QueryCreator::findByEmailAndByStatus('test@gmail.com', 'active');
echo '<br><br>';

echo QueryCreator::findBetweenCreatedAt('29.02.2020', '31.03.2020');
echo '<br><br>';

echo QueryCreator::findBetweenCreatedAtAndByStatus('29.02.2020', '31.03.2020', 'active');
echo '<br><br>';

echo QueryCreator::findBetweenCreatedAtAndInStatus('29.02.2020', '31.03.2020', ['active', 'passive']);
echo '<br><br>';
