<?php

require_once('persian_log2vis.php');

if(!isset($_GET['submit'])){
    echo '<html dir="rtl">
        <head><title>Persian_log2vis Example</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head><body>
        <form method="get">
        <input type="text" name="text" value="پروژه persian_log2vis نسخه 1">
        <input type="submit" name="submit" value="submit">            
        </body></html>';
}else{
    $text = $_GET['text'];
    persian_log2vis($text, 0);
    
    // Set the content-type
    header("Content-type: image/png");
    
    // Create the image
    $im = imagecreatetruecolor(400, 50);
    
    // Create some colors
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    
    // Replace path by your own font path
    $font = 'arial.ttf';
    
    // Add the text
    imagettftext($im, 20, 0, 10, 30, $white, $font, $text);
    
    // Using imagepng() results in clearer text compared with imagejpeg()
    imagepng($im);
    imagedestroy($im);
}
?>