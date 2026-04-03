<?php

function enableGZip() {
    if (!ob_start('ob_gzhandler')) {
        ob_start();
    }
}

function setCacheHeaders($maxAge = 3600) {
    header('Cache-Control: public, max-age=' . $maxAge);
    header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $maxAge));
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s \G\M\T', filemtime(__FILE__)));
}

// Enable compression and caching
enableGZip();
setCacheHeaders(3600); // 1 hour cache

// Error Reporting Turn On
ini_set('error_reporting', E_ALL);

// Setting up the time zone
date_default_timezone_set('Asia/Dhaka');

// Host Name
$dbhost = '193.203.184.230';

// Database Name
$dbname = 'u991936209_Concert_Circle';

// Database Username
$dbuser = 'u991936209_first';

// Database Password
$dbpass = 'Concertcircle1705';

function getCachedData($key, $query, $pdo, $ttl = 300) {
    $cacheFile = "cache/{$key}.json";
    
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $ttl) {
        return json_decode(file_get_contents($cacheFile), true);
    }
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (!is_dir('cache')) mkdir('cache', 0755, true);
    file_put_contents($cacheFile, json_encode($data));
    
    return $data;
}

// ADD THIS FUNCTION AFTER getCachedData()
function getOptimizedImage($imagePath, $width = null, $height = null, $quality = 85) {
    $pathInfo = pathinfo($imagePath);
    $optimizedPath = $pathInfo['dirname'] . '/optimized_' . $pathInfo['filename'] . '.webp';
    
    if (!file_exists($optimizedPath) || filemtime($imagePath) > filemtime($optimizedPath)) {
        $image = null;
        switch (strtolower($pathInfo['extension'])) {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($imagePath);
                break;
            case 'png':
                $image = imagecreatefrompng($imagePath);
                break;
        }
        
        if ($image && function_exists('imagewebp')) {
            if ($width && $height) {
                $resized = imagecreatetruecolor($width, $height);
                imagecopyresampled($resized, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
                imagewebp($resized, $optimizedPath, $quality);
                imagedestroy($resized);
            } else {
                imagewebp($image, $optimizedPath, $quality);
            }
            imagedestroy($image);
        }
    }
    
    return file_exists($optimizedPath) ? $optimizedPath : $imagePath;
}
// Defining base url
define("BASE_URL", "http://localhost/user/");

// Getting Admin url
define("ADMIN_URL", BASE_URL . "admin" . "/");

try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}