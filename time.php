<?php
header('Content-Type: application/json');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

$audioFiles = glob(__DIR__ . DIRECTORY_SEPARATOR . '*.mp3') ?: [];
$audioFiles = array_map('basename', $audioFiles);
sort($audioFiles, SORT_NATURAL | SORT_FLAG_CASE);

echo json_encode([
    'serverTime' => microtime(true) * 1000,
    'audioFiles' => $audioFiles
]);
?>