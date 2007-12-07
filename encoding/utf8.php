<?php
    $chars = array (
        'آ' => array ('ﺂ', 'ﺂ', 'آ'),
        'ا' => array ('ﺎ', 'ﺎ', 'ا'),
        'ب' => array ('ﺐ', 'ﺒ', 'ﺑ'),
        'پ' => array ('ﭗ', 'ﭙ', 'ﭘ'),
        'ت' => array ('ﺖ', 'ﺘ', 'ﺗ'),
        'ث' => array ('ﺚ', 'ﺜ', 'ﺛ'),
        'ج' => array ('ﺞ', 'ﺠ', 'ﺟ'),
        'چ' => array ('ﭻ', 'ﭽ', 'ﭼ'),
        'ح' => array ('ﺢ', 'ﺤ', 'ﺣ'),
        'خ' => array ('ﺦ', 'ﺨ', 'ﺧ'),
        'د' => array ('ﺪ', 'ﺪ', 'ﺩ'),
        'ذ' => array ('ﺬ', 'ﺬ', 'ﺫ'),
        'ر' => array ('ﺮ', 'ﺮ', 'ﺭ'),
        'ز' => array ('ﺰ', 'ﺰ', 'ﺯ'),
        'ژ' => array ('ﮋ', 'ﮋ', 'ﮊ'),
        'س' => array ('ﺲ', 'ﺴ', 'ﺳ'),
        'ش' => array ('ﺶ', 'ﺸ', 'ﺷ'),
        'ص' => array ('ﺺ', 'ﺼ', 'ﺻ'),
        'ض' => array ('ﺾ', 'ﻀ', 'ﺿ'),
        'ط' => array ('ﻂ', 'ﻄ', 'ﻃ'),
        'ظ' => array ('ﻆ', 'ﻈ', 'ﻇ'),
        'ع' => array ('ﻊ', 'ﻌ', 'ﻋ'),
        'غ' => array ('ﻎ', 'ﻐ', 'ﻏ'),
        'ف' => array ('ﻒ', 'ﻔ', 'ﻓ'),
        'ق' => array ('ﻖ', 'ﻘ', 'ﻗ'),
        'ک' => array ('ﮏ', 'ﮑ', 'ﮐ'),
        'گ' => array ('ﮓ', 'ﮕ', 'ﮔ'),
        'ل' => array ('ﻞ', 'ﻠ', 'ﻟ'),
        'م' => array ('ﻢ', 'ﻤ', 'ﻣ'),
        'ن' => array ('ﻦ', 'ﻨ', 'ﻧ'),
        'و' => array ('ﻮ', 'ﻮ', 'ﻭ'),
        'ه' => array ('ﻪ', 'ﻬ', 'ﻫ'),
        'ی' => array ('ﯽ', 'ﯿ', 'ﯾ'),
        'ك' => array ('ﻚ', 'ﻜ', 'ﻛ'),
        'ي' => array ('ﻲ', 'ﻴ', 'ﻳ'),
        'أ' => array ('ﺄ', 'ﺄ', 'ﺃ'),
        'ؤ' => array ('ﺆ', 'ﺆ', 'ﺅ'),
        'إ' => array ('ﺈ', 'ﺈ', 'ﺇ'),
        'ئ' => array ('ﺊ', 'ﺌ', 'ﺋ'),
        'ة' => array ('ﺔ', 'ﺘ', 'ﺗ'),
        'ﻻ' => array ('ﻼ', 'ﻼ', 'ﻻ'),
        'ﻵ' => array ('ﻶ', 'ﻶ', 'ﻵ'),
        'ﻹ' => array ('ﻺ', 'ﻺ', 'ﻹ'),
        'ﻷ' => array ('ﻸ', 'ﻸ', 'ﻷ'),
        'اﷲ' => array ('اﷲ', 'اﷲ', 'اﷲ'),
        'ﷲ' => array ('ﷲ', 'ﷲ', 'ﷲ')
    );
    
    $sp_chars = array ('آ', 'ا', 'د', 'ذ', 'ر', 'ز', 'ژ', 'و', 'أ', 'إ', 'ؤ', 'ﻻ', 'ﻵ', 'ﻹ', 'ﻷ', 'ﷲ', 'ﷲ', '‌' /*zwnj*/);
    $eb_chars = array ('ً', 'ٌ', 'ٍ', 'َ', 'ُ', 'ِ', 'ّ', 'ٴ');
    
    // allah characters
    $allah_chars = array ('الله', 'لله');
    
    $allah1_char = 'اﷲ';
    $allah2_char = 'ﷲ';
    
    // alef-lam characters
    $lam_char = 'ل';
    $alef_chars = array ('آ', 'ا', 'أ', 'إ');
    
    $lam_alef_chars = array(
    	'لا' => 'ﻻ',
    	'لآ' => 'ﻵ',
    	'لأ' => 'ﻷ',
    	'لإ' => 'ﻹ'
    );
    
    // non printable but efficient characters
    $non_printable = array ('‌' /*zwnj*/);
    
    // non printible and not efficient characters
    // if you want to ignore some characters from output, add them here
		$ignore_chars = array();
?>
