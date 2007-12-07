<?php
//----------------------------------------------------------------------
// Persian Log2Vis version 1 RC3
//----------------------------------------------------------------------
// Copyright (c) 2005 Oxygen Web Solutions <http://oxygenws.com>
//----------------------------------------------------------------------
// This function is NOT optimized for other RTL languages (like hebrew)
// This function is developed for Persian and Arabic languages.
//----------------------------------------------------------------------
// This program is under the terms of the GENERAL PUBLIC LICENSE (GPL)
// as published by the FREE SOFTWARE FOUNDATION. The GPL is available
// through the world-wide-web at http://www.gnu.org/copyleft/gpl.html
//----------------------------------------------------------------------
// Authors: Omid Mottaghi Rad <webmaster@oxygenws.com>
//----------------------------------------------------------------------

/**
 * A function to change persian or arabic text from its logical condition to visual
 *
 * @author	Omid Mottaghi Rad 
 * @param		string	Main text you want to change it
 * @param		boolean	Apply e'raab characters or not? default is true
 * @param		boolean	Which encoding? default it "utf8"
 * @param		boolean	Do you want to change special characters like "allah" or "lam+alef" or "lam+hamza", default is true
 */
function persian_log2vis(&$str, $eraab = true, $encoding = 'utf8', $change_specials = true){
    
    // encoding could be one of the following phrases
    // 'utf8', 'iso8859_6'
    // the following encodings are not supported in PHP MB functions
    // 'ibm864', 'macfarsi', 'macarabic', 'cp1256', 'isiri3342'
    // so we could not support them.
    // if you add any other encoding, please inform me :)
    
    switch($encoding){
        case 'iso8859_6':
            mb_internal_encoding('ISO-8859-6');
            include 'encoding/'.$encoding.'.php';
            $fbd = FRIBIDI_CHARSET_8859_6;
            break;
        case 'utf8':
        default:
            mb_internal_encoding('UTF-8');
            $encoding = 'utf8';
            include 'encoding/'.$encoding.'.php';
            $fbd = FRIBIDI_CHARSET_UTF8;
            break;
    }
    
    $text = mb_split('\n', $str);
    $text = array_reverse($text);
    $text = implode("\n", $text);
    
    $str='';
    $ch='';
    
    for($i=0; $i < mb_strlen($text); $i++){

        $ch_prev = $ch;
        
        // check if it is the LAST character or NOT.
        if($i == mb_strlen($text) - 1){
            $ch_next = '';
        }else{
            $ch_next = mb_substr($text, $i+1, 1);
				}
        
        // omit eraab characters for next char, if user wants ;)
        if(in_array($ch_next, $eb_chars)){
            $ch_next = mb_substr($text, $i+2, 1);
        }
        
        // omit eraab characters for next char, if user wants ;)
        if(in_array($ch_prev, $eb_chars)){
            $ch_prev = mb_substr($text, $i-2, 1);
        }
        
        $ch = mb_substr($text, $i, 1);
        
        // omit non printable characters
        if(in_array($ch, $non_printable)){
        	continue;
				}
        
        // ignore ignorable(!) characters
        if(in_array($ch, $ignore_chars)){
        	$ch = $ch_prev;
        	continue;
				}
				
        if(array_key_exists($ch_prev, $chars) && array_key_exists($ch_next, $chars) && array_key_exists($ch, $chars)){
            // attached from back and front
            
            // replace special characters, like alaah and lam-alef
            if($change_specials){
            	change_specials($allah1, $allah2, $text, $i, $allah1_char, $allah2_char,
            		$allah_chars, $ch, $lam_char, $lam_alef_chars, $ch_next, $alef_chars);
						}
						
            if(in_array($ch_prev, $sp_chars)){
                $str .= $chars[$ch][2];
            }else{
                $str .= $chars[$ch][1];
            }
            
        }elseif(!array_key_exists($ch_prev, $chars) && array_key_exists($ch_next, $chars) && array_key_exists($ch, $chars)){
            // only attached from front
            
            // replace special characters, like alaah and lam-alef
            if($change_specials){
            	change_specials($allah1, $allah2, $text, $i, $allah1_char, $allah2_char,
            		$allah_chars, $ch, $lam_char, $lam_alef_chars, $ch_next, $alef_chars);
						}
						
            $str .= $chars[$ch][2];
            
        }elseif(array_key_exists($ch_prev, $chars) && !array_key_exists($ch_next, $chars) && array_key_exists($ch, $chars)){
            // only attached from back
            
            if(in_array($ch_prev, $sp_chars)){
                $str .= $ch;
            }else{
                $str .= $chars[$ch][0];
            }
            
        }else{
            // there is NO attach OR an unknown/undefined charachter!
            // omit eraab to add to output string.
            if($eraab || !in_array($ch, $eb_chars)){
                $str .= $ch;
            }
        }
    }
    $str = fribidi_log2vis($str, FRIBIDI_RTL, $fbd);
}

function change_specials(&$allah1, &$allah2, &$text, &$i, &$allah1_char, &$allah2_char,
		&$allah_chars, &$ch, &$lam_char, &$lam_alef_chars, &$ch_next, &$alef_chars){
	// change allah characters
	$allah1 = mb_substr($text, $i, 4);
	$allah2 = mb_substr($text, $i, 3);
	
	if(mb_strlen($allah1) == 4 && in_array($allah1, $allah_chars)){
		$ch = $allah1_char;
		$i += 3;
	}elseif(mb_strlen($allah2) == 3 && in_array($allah2, $allah_chars)){
		$ch = $allah2_char;
		$i += 2;
	}
	
	// change alef-lam characters
	if($ch == $lam_char && in_array($ch_next, $alef_chars)){
		$ch .= $ch_next;
		$ch = $lam_alef_chars[$ch];
		$i++;
	}
}
?>
