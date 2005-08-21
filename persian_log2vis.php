<?php

//----------------------------------------------------------------------
// Persian Log2Vis version 1 beta 1
//----------------------------------------------------------------------
// Copyright (c) 2005 Oxygen Web Solutions <http://oxygenws.com>
//----------------------------------------------------------------------
// This program is under the terms of the GENERAL PUBLIC LICENSE (GPL)
// as published by the FREE SOFTWARE FOUNDATION. The GPL is available
// through the world-wide-web at http://www.gnu.org/copyleft/gpl.html
//----------------------------------------------------------------------
// Authors: Omid Mottaghi Rad <webmaster@oxygenws.com>
//----------------------------------------------------------------------

function persian_log2vis(&$str){
    
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
        'ة' => array ('ﺔ', 'ﺘ', 'ﺗ')
    );
    
    $sp_chars = array ('آ', 'ا', 'د', 'ذ', 'ر', 'ز', 'ژ', 'و', 'أ', 'إ', 'ؤ');
    $sj_chars = array ('ً', 'ٌ', 'ٍ', 'َ', 'ُ', 'ِ', 'ّ', 'ٔ', 'ٕ');
    
    $text = fribidi_log2vis($str, FRIBIDI_RTL, FRIBIDI_CHARSET_UTF8);
    mb_internal_encoding("UTF-8");
    
    $str='';
    $ch='';
    
    for($i=0; $i < mb_strlen($text); $i++){

        $ch_prev = $ch;
        
        if($i == mb_strlen($text) - 1) $ch_next = '';
        else $ch_next = mb_substr($text, $i+1, 1);
        
        $ch = mb_substr($text, $i, 1);
        
        if(array_key_exists($ch_prev, $chars) && array_key_exists($ch_next, $chars) && array_key_exists($ch, $chars)){
            // attached from back and front
            if(in_array($ch_next, $sp_chars)){
                $str .= $chars[$ch][2];
            }else{
                $str .= $chars[$ch][1];
            }
        }elseif(array_key_exists($ch_prev, $chars) && !array_key_exists($ch_next, $chars) && array_key_exists($ch, $chars)){
            // only attached from front
            $str .= $chars[$ch][2];
        }elseif(!array_key_exists($ch_prev, $chars) && array_key_exists($ch_next, $chars) && array_key_exists($ch, $chars)){
            // only attached from back
            if(in_array($ch_next, $sp_chars)){
                $str .= $ch;
            }else{
                $str .= $chars[$ch][0];
            }
        }else{
            // there is NO attach OR an unknown/undefined charachter!
            $str .= $ch;
        }
    }
}
?>