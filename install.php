#!/usr/bin/php
<?php
$project = $argv[1];

replaceTextInFile('skeletonSimpleProject', $project, 'src/skeletonSimpleProject/skeletonSimpleProject.php');
rename('src/skeletonSimpleProject/skeletonSimpleProject.php', 'src/skeletonSimpleProject/' . $project . '.php');
rename('src/skeletonSimpleProject', 'src/' . $project);
replaceTextInFile('skeletonSimpleProject', $project, 'tests/skeletonSimpleProject/Tests/sleketonSimpleProjectTest.php');
rename('tests/skeletonSimpleProject/Tests/sleketonSimpleProjectTest.php', 'tests/skeletonSimpleProject/Tests/' . $project . 'Test.php');
rename('tests/skeletonSimpleProject', 'tests/' . $project);
replaceTextInFile('skeletonSimpleProject', $project, 'composer.json');
replaceTextInFile('skeletonSimpleProject', $project, 'phpunit.xml.dist');

function replaceTextInFile($oldValue, $newValue, $file) {
    $text = file_get_contents($file);
    $newText = str_replace($oldValue, $newValue, $text);
    file_put_contents($file, $newText);
}