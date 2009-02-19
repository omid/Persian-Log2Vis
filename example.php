<?php

require_once('persian_log2vis.php');

if(!isset($_GET['submit'])){
    echo '<html dir="rtl">
        <head><title>Persian_log2vis Example</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head><body>
        <form method="get">
        <textarea name="text">ایــن متن برای تست می‌باشد:
بالا
فَعّال
الف abc ب
۲۰ و 20 - ۳۰ و 30
</textarea>
        <input type="submit" name="submit" value="submit">            
        </body></html>';
}else{
    $text = $_GET['text'];
    persian_log2vis($text);
    
    // Create the image
    $im = imagecreatetruecolor(400, 200);
    
    // Create some colors
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    
    // Replace path by your own font path
    $font = './DejaVuSans.ttf';
    
    // Add the text
    @imagettftext($im, 20, 0, 10, 30, $white, $font, $text);
    
    // Set the content-type
    header("Content-type: image/png");
    
    // Using imagepng() results in clearer text compared with imagejpeg()
    imagepng($im);
    imagedestroy($im);
}
?>
