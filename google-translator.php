<?php

/**
 * Translate
 *
 * $s - default source language ( English )
 * $d - Destination language ( French , Spanish ... )
 * Converted the string using google translate API.
 * @return	string
 */
if (!function_exists('translate')) {
	function translate($text, $d = '') {
		$s = 'en';
		if ($d == '') {$d = 'en';}
		if ($d != 'en') {
			$lang_pair = urlencode($s . '|' . $d);
			$q = rawurlencode($text);
			// Google's API translator URL
			$url = "http://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=" . $q . "&langpair=" . $lang_pair;
			// Make sure to set CURLOPT_REFERER because Google doesn't like if you leave the referrer out
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_REFERER, "http://www.yoursite.com/translate.php");
			$body = curl_exec($ch);
			curl_close($ch);
			$json = json_decode($body, true);
			$tranlate = $json['responseData']['translatedText'];
			echo $tranlate;

		} else {
			echo $text;
		}
	}
}
