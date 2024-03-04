<?php
/** 
Plugin Name: ManhwaClan.com Scraper
Plugin URI: //1.envato.market/coderevolution
Description: This plugin will scrape manga for you, day and night
Author: CodeRevolution
Version: 1.0.0
Author URI: //coderevolution.ro
License: Commercial. For personal use only. Not to give away or resell.
Text Domain: ultimate-manga-scraper
*/
/*  
Copyright 2016 - 2023 CodeRevolution
*/
defined('ABSPATH') or die();
require_once (dirname(__FILE__) . "/res/other/plugin-dash.php"); 

function manhwaclan_load_textdomain() {
    if(!function_exists('ot_get_option'))
    {
        function ot_get_option($nname)
        {
            return get_option($nname);
        }
    }
    load_plugin_textdomain( 'ultimate-manga-scraper', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'manhwaclan_load_textdomain' );

function manhwaclan_isSecure() {
    return
      (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
      || $_SERVER['SERVER_PORT'] == 443;
}
function manhwaclan_redirect($url, $statusCode = 301)
{
   if(!function_exists('wp_redirect'))
   {
       include_once( ABSPATH . 'wp-includes/pluggable.php' );
   }
   wp_redirect($url, $statusCode);
   die();
}
$language_names = array(
    esc_html__("Disabled", 'ultimate-manga-scraper'),
    esc_html__("Afrikaans (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Albanian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Arabic (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Amharic (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Armenian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Belarusian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Bulgarian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Catalan (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Chinese Simplified (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Croatian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Czech (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Danish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Dutch (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("English (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Estonian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Filipino (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Finnish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("French (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Galician (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("German (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Greek (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Hebrew (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Hindi (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Hungarian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Icelandic (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Indonesian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Irish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Italian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Japanese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Korean (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Latvian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Lithuanian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Norwegian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Macedonian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Malay (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Maltese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Persian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Polish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Portuguese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Romanian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Russian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Serbian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Slovak (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Slovenian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Spanish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Swahili (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Swedish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Thai (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Turkish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Ukrainian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Vietnamese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Welsh (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Yiddish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Tamil (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Azerbaijani (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Kannada (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Basque (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Bengali (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Latin (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Chinese Traditional (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Esperanto (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Georgian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Telugu (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Gujarati (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Haitian Creole (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Urdu (Google Translate)", 'ultimate-manga-scraper'),
    
    esc_html__("Burmese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Bosnian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Cebuano (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Chichewa (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Corsican (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Frisian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Scottish Gaelic (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Hausa (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Hawaian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Hmong (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Igbo (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Javanese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Kazakh (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Khmer (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Kurdish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Kyrgyz (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Lao (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Luxembourgish (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Malagasy (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Malayalam (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Maori (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Marathi (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Mongolian (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Nepali (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Pashto (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Punjabi (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Samoan (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Sesotho (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Shona (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Sindhi (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Sinhala (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Somali (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Sundanese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Swahili (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Tajik (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Uzbek (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Xhosa (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Yoruba (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Zulu (Google Translate)", 'ultimate-manga-scraper'),

    esc_html__("Assammese (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Aymara (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Bambara (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Bhojpuri (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Dhivehi (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Dogri (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Ewe (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Guarani (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Ilocano (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Kinyarwanda (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Konkani (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Krio (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Kurdish - Sorani (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Lingala (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Luganda (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Maithili (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Meiteilon (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Mizo (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Odia (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Oromo (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Quechua (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Sanskrit (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Sepedi (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Tatar (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Tigrinya (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Tsonga (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Turkmen (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Twi (Google Translate)", 'ultimate-manga-scraper'),
    esc_html__("Uyghur (Google Translate)", 'ultimate-manga-scraper')
);
$language_codes = array(
    "disabled",
    "af",
    "sq",
    "ar",
    "am",
    "hy",
    "be",
    "bg",
    "ca",
    "zh-CN",
    "hr",
    "cs",
    "da",
    "nl",
    "en",
    "et",
    "tl",
    "fi",
    "fr",
    "gl",
    "de",
    "el",
    "iw",
    "hi",
    "hu",
    "is",
    "id",
    "ga",
    "it",
    "ja",
    "ko",
    "lv",
    "lt",
    "no",
    "mk",
    "ms",
    "mt",
    "fa",
    "pl",
    "pt",
    "ro",
    "ru",
    "sr",
    "sk",
    "sl",
    "es",
    "sw",
    "sv",   
    "th",
    "tr",
    "uk",
    "vi",
    "cy",
    "yi",
    "ta",
    "az",
    "kn",
    "eu",
    "bn",
    "la",
    "zh-TW",
    "eo",
    "ka",
    "te",
    "gu",
    "ht",
    "ur",
    
    "my",
    "bs",
    "ceb",
    "ny",
    "co",
    "fy",
    "gd",
    "ha",
    "haw",
    "hmn",
    "ig",
    "jw",
    "kk",
    "km",
    "ku",
    "ky",
    "lo",
    "lb",
    "mg",
    "ml",
    "mi",
    "mr",
    "mn",
    "ne",
    "ps",
    "pa",
    "sm",
    "st",
    "sn",
    "sd",
    "si",
    "so",
    "su",
    "sw",
    "tg",
    "uz",
    "xh",
    "yo",
    "zu",

    "as",
    "ay",
    "bm",
    "bho",
    "dv",
    "doi",
    "ee",
    "gn",
    "ilo",
    "rw",
    "gom",
    "kri",
    "ckb",
    "ln",
    "lg",
    "mai",
    "mni-Mtei",
    "lus",
    "or",
    "om",
    "qu",
    "sa",
    "nso",
    "tt",
    "ti",
    "ts",
    "tk",
    "ak",
    "ug"
);
$language_names_deepl = array(
    "English (DeepL)",
    "German (DeepL)",
    "French (DeepL)",
    "Spanish (DeepL)",
    "Italian (DeepL)",
    "Dutch (DeepL)",
    "Polish (DeepL)",
    "Russian (DeepL)",
    "Portuguese (DeepL)",
    "Chinese (DeepL)",
    "Japanese (DeepL)",
    "Bulgarian (DeepL)",
    "Czech (DeepL)",
    "Danish (DeepL)",
    "Greek (DeepL)",
    "Estonian (DeepL)",
    "Finnish (DeepL)",
    "Hungarian (DeepL)",
    "Lithuanian (DeepL)",
    "Latvian (DeepL)",
    "Romanian (DeepL)",
    "Slovak (DeepL)",
    "Slovenian (DeepL)",
    "Swedish (DeepL)",
    "Indonesian (DeepL)",
    "Turkish (DeepL)"
    );
    $language_codes_deepl = array(
        "EN-",
        "DE-",
        "FR-",
        "ES-",
        "IT-",
        "NL-",
        "PL-",
        "RU-",
        "PT-",
        "ZH-",
        "JA-",
        "BG-",
        "CS-",
        "DA-",
        "EL-",
        "ET-",
        "FI-",
        "HU-",
        "LT-",
        "LV-",
        "RO-",
        "SK-",
        "SL-",
        "SV-",
        "ID-",
        "TR-"
    );
 $language_names_bing = array(
    "English (Microsoft Translator)",
    "Arabic (Microsoft Translator)",
    "Bosnian (Latin) (Microsoft Translator)",
    "Bulgarian (Microsoft Translator)",
    "Catalan (Microsoft Translator)",
    "Chinese Simplified (Microsoft Translator)",
    "Chinese Traditional (Microsoft Translator)",
    "Croatian (Microsoft Translator)",
    "Czech (Microsoft Translator)",
    "Danish (Microsoft Translator)",
    "Dutch (Microsoft Translator)",
    "Estonian (Microsoft Translator)",
    "Finnish (Microsoft Translator)",
    "French (Microsoft Translator)",
    "German (Microsoft Translator)",
    "Greek (Microsoft Translator)",
    "Haitian Creole (Microsoft Translator)",
    "Hebrew (Microsoft Translator)",
    "Hindi (Microsoft Translator)",
    "Hmong Daw (Microsoft Translator)",
    "Hungarian (Microsoft Translator)",
    "Indonesian (Microsoft Translator)",
    "Italian (Microsoft Translator)",
    "Japanese (Microsoft Translator)",
    "Kiswahili (Microsoft Translator)",
    "Klingon (Microsoft Translator)",
    "Klingon (pIqaD) (Microsoft Translator)",
    "Korean (Microsoft Translator)",
    "Latvian (Microsoft Translator)",
    "Lithuanian (Microsoft Translator)",
    "Malay (Microsoft Translator)",
    "Maltese (Microsoft Translator)",
    "Norwegian (Microsoft Translator)",
    "Persian (Microsoft Translator)",
    "Polish (Microsoft Translator)",
    "Portuguese (Microsoft Translator)",
    "Queretaro Otomi (Microsoft Translator)",
    "Romanian (Microsoft Translator)",
    "Russian (Microsoft Translator)",
    "Serbian (Cyrillic) (Microsoft Translator)",
    "Serbian (Latin) (Microsoft Translator)",
    "Slovak (Microsoft Translator)",
    "Slovenian (Microsoft Translator)",
    "Spanish (Microsoft Translator)",
    "Swedish (Microsoft Translator)",
    "Thai (Microsoft Translator)",
    "Turkish (Microsoft Translator)",
    "Ukrainian (Microsoft Translator)",
    "Urdu (Microsoft Translator)",
    "Vietnamese (Microsoft Translator)",
    "Welsh (Microsoft Translator)",
    "Yucatec Maya (Microsoft Translator)",
  
    "Afrikaans (Microsoft Translator)",
    "Albanian (Microsoft Translator)",
    "Amharic (Microsoft Translator)",
    "Armenian (Microsoft Translator)",
    "Assamese (Microsoft Translator)",
    "Azerbaijani (Microsoft Translator)",
    "Bangla (Microsoft Translator)", 
    "Bashkir (Microsoft Translator)",
    "Basque (Microsoft Translator)",
    "Cantonese (Microsoft Translator)",
    "Chinese (Literary) (Microsoft Translator)",
    "Dari (Microsoft Translator)",
    "Divehi (Microsoft Translator)",
    "Faroese (Microsoft Translator)",
    "Fijian (Microsoft Translator)",
    "Filipino (Microsoft Translator)",
    "French (Canada) (Microsoft Translator)",
    "Galician (Microsoft Translator)",
    "Georgian (Microsoft Translator)",
    "Gujarati (Microsoft Translator)",
    "Icelandic (Microsoft Translator)",
    "Inuinnaqtun (Microsoft Translator)",
    "Inuktitut (Microsoft Translator)",
    "Inuktitut (Latin) (Microsoft Translator)",
    "Irish (Microsoft Translator)",
    "Kannada (Microsoft Translator)",
    "Kazakh (Microsoft Translator)",
    "Khmer (Microsoft Translator)",
    "Kurdish (Central) (Microsoft Translator)",
    "Kurdish (Northern) (Microsoft Translator)",
    "Kyrgyz (Cyrillic) (Microsoft Translator)",
    "Lao (Microsoft Translator)",
    "Macedonian (Microsoft Translator)",
    "Malagasy (Microsoft Translator)",
    "Malayalam (Microsoft Translator)",
    "Maori (Microsoft Translator)",
    "Marathi (Microsoft Translator)",
    "Mongolian (Cyrillic) (Microsoft Translator)",
    "Mongolian (Traditional) (Microsoft Translator)",
    "Myanmar (Microsoft Translator)",
    "Nepali (Microsoft Translator)",
    "Odia (Microsoft Translator)",
    "Pashto (Microsoft Translator)",
    "Portuguese (Portugal) (Microsoft Translator)",
    "Punjabi (Microsoft Translator)",
    "Samoan (Microsoft Translator)",
    "Somali (Arabic) (Microsoft Translator)",
    "Swahili (Latin) (Microsoft Translator)",
    "Tahitian (Microsoft Translator)",
    "Tamil (Microsoft Translator)",
    "Tatar (Latin) (Microsoft Translator)",
    "Telugu (Microsoft Translator)",
    "Tibetan (Microsoft Translator)",
    "Tigrinya (Microsoft Translator)",
    "Tongan (Microsoft Translator)",
    "Turkmen (Latin) (Microsoft Translator)",
    "Upper Sorbian (Microsoft Translator)",
    "Uyghur (Arabic) (Microsoft Translator)",
    "Uzbek (Microsoft Translator)",
    "Zulu (Microsoft Translator)"
    );

    $language_codes_bing = array(
        "en!",
        "ar!",
        "bs-Latn!",
        "bg!",
        "ca!",
        "zh-CHS!",
        "zh-CHT!",
        "hr!",
        "cs!",
        "da!",
        "nl!",
        "et!",
        "fi!",
        "fr!",
        "de!",
        "el!",
        "ht!",
        "he!",
        "hi!",
        "mww!",
        "hu!",
        "id!",
        "it!",
        "ja!",
        "sw!",
        "tlh!",
        "tlh-Qaak!",
        "ko!",
        "lv!",
        "lt!",
        "ms!",
        "mt!",
        "nor!",
        "fa!",
        "pl!",
        "pt!",
        "otq!",
        "ro!",
        "ru!",
        "sr-Cyrl!",
        "sr-Latn!",
        "sk!",
        "sl!",
        "es!",
        "sv!",
        "th!",
        "tr!",
        "uk!",
        "ur!",
        "vi!",
        "cy!",
        "yua!",
        
        "af!",
        "sq!",
        "am!",
        "hy!",
        "as!",
        "az!",
        "bn!",
        "ba!",
        "eu!",
        "yue!",
        "lzh!",
        "prs!",
        "dv!",
        "fo!",
        "fj!",
        "fil!",
        "fr-ca!",
        "gl!",
        "ka!",
        "gu!",
        "is!",
        "ikt!",
        "iu!",
        "iu-Latn!",
        "ga!",
        "kn!",
        "kk!",
        "km!",
        "ku!",
        "kmr!",
        "ky!",
        "lo!",
        "mk!",
        "mg!",
        "ml!",
        "mi!",
        "mr!",
        "mn-Cyrl!",
        "mn-Mong!",
        "my!",
        "ne!",
        "or!",
        "ps!",
        "pt-pt!",
        "pa!",
        "sm!",
        "so!",
        "sw!",
        "ty!",
        "ta!",
        "tt!",
        "te!",
        "bo!",
        "ti!",
        "to!",
        "tk!",
        "hsb!",
        "ug!",
        "uz!",
        "zu!"
    );
function manhwaclan_get_random_user_agent($ua = '') {
	if($ua != '')
	{
		return $ua;
	}
	$agents = array(
		"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36",
		"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36",
		"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8",
		"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36",
		"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0",
		"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:55.0) Gecko/20100101 Firefox/55.0",
		"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36",
		"Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko",
		"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0",
		"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0",
		"Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36",
		"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:55.0) Gecko/20100101 Firefox/55.0",
		"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36",
		"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36"
	);
	$rand   = rand( 0, count( $agents ) - 1 );
	return trim( $agents[ $rand ] );
}
function manhwaclan_assign_var(&$target, $var, $root = false) {
	static $cnt = 0;
    $key = key($var);
    if(is_array($var[$key])) 
        manhwaclan_assign_var($target[$key], $var[$key], false);
    else {
        if($key==0)
		{
			if($cnt == 0 && $root == true)
			{
				$target['_umsr_nonce'] = $var[$key];
				$cnt++;
			}
			elseif($cnt == 1 && $root == true)
			{
				$target['_wp_http_referer'] = $var[$key];
				$cnt++;
			}
			else
			{
				$target[] = $var[$key];
			}
		}
        else
		{
            $target[$key] = $var[$key];
		}
    }   
}

$plugin = plugin_basename(__FILE__);
if(is_admin())
{
    if($_SERVER["REQUEST_METHOD"]==="POST" && !empty($_POST["coderevolution_max_input_var_data"])) {
        $vars = explode("&", $_POST["coderevolution_max_input_var_data"]);
        $coderevolution_max_input_var_data = array();
        foreach($vars as $var) {
            parse_str($var, $variable);
            manhwaclan_assign_var($_POST, $variable, true);
        }
        unset($_POST["coderevolution_max_input_var_data"]);
    }
}
function manhwaclan_admin_enqueue_all()
{
    $reg_css_code = '.cr_auto_update{background-color:#fff8e5;margin:5px 20px 15px 20px;border-left:4px solid #fff;padding:12px 12px 12px 12px !important;border-left-color:#ffb900;}';
    wp_register_style( 'ums-plugin-reg-style', false );
    wp_enqueue_style( 'ums-plugin-reg-style' );
    wp_add_inline_style( 'ums-plugin-reg-style', $reg_css_code );
}
add_action('wp_enqueue_scripts', 'manhwaclan_wp_load_front_files');
function manhwaclan_wp_load_front_files()
{
    wp_enqueue_style('coderevolution-front-css', plugins_url('styles/coderevolution-front.css', __FILE__));
}
function manhwaclan_add_activation_link($links)
{
    $settings_link = '<a href="admin.php?page=manhwaclan_admin_settings">' . esc_html__('Activate Plugin License', 'ultimate-manga-scraper') . '</a>';
    array_push($links, $settings_link);
    return $links;
}
use \Eventviva\ImageResize;
$min_timeout = 1;

add_action('admin_menu', 'manhwaclan_register_my_custom_menu_page');
add_action('network_admin_menu', 'manhwaclan_register_my_custom_menu_page');
function manhwaclan_register_my_custom_menu_page()
{
    add_menu_page('ManhwaClan.com Scraper', 'ManhwaClan.com Scraper', 'manage_options', 'manhwaclan_admin_settings', 'manhwaclan_admin_settings', plugins_url('images/icon.png', __FILE__));
    $main = add_submenu_page('manhwaclan_admin_settings', esc_html__("Main Settings", 'ultimate-manga-scraper'), esc_html__("Main Settings", 'ultimate-manga-scraper'), 'manage_options', 'manhwaclan_admin_settings');
    add_action( 'load-' . $main, 'manhwaclan_load_all_admin_js' );
    add_action( 'load-' . $main, 'manhwaclan_load_main_admin_js' );
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (isset($manhwaclan_Main_Settings['manhwaclan_enabled']) && $manhwaclan_Main_Settings['manhwaclan_enabled'] == 'on') {
        $mangax = add_submenu_page('manhwaclan_admin_settings', esc_html__('Manga Scraper (manhwaclan.com)', 'ultimate-manga-scraper'), esc_html__('Manga Scraper (manhwaclan.com)', 'ultimate-manga-scraper'), 'manage_options', 'manhwaclan_text_panel', 'manhwaclan_text_panel');
        add_action( 'load-' . $mangax, 'manhwaclan_load_admin_js' );
        add_action( 'load-' . $mangax, 'manhwaclan_load_all_admin_js' );
        $logs = add_submenu_page('manhwaclan_admin_settings', esc_html__("Activity & Logging", 'ultimate-manga-scraper'), esc_html__("Activity & Logging", 'ultimate-manga-scraper'), 'manage_options', 'manhwaclan_logs', 'manhwaclan_logs');
        add_action( 'load-' . $logs, 'manhwaclan_load_all_admin_js' );
    }
}
function manhwaclan_load_admin_js(){
    add_action('admin_enqueue_scripts', 'manhwaclan_enqueue_admin_js');
}

function manhwaclan_enqueue_admin_js(){
    wp_enqueue_script('ums-footer-script', plugins_url('scripts/footer.js', __FILE__), array('jquery'), false, true);
    $cr_miv = ini_get('max_input_vars');
	if($cr_miv === null || $cr_miv === false || !is_numeric($cr_miv))
	{
        $cr_miv = '9999999';
    }
    $footer_conf_settings = array(
        'max_input_vars' => $cr_miv,
        'plugin_dir_url' => plugin_dir_url(__FILE__),
        'ajaxurl' => admin_url('admin-ajax.php')
    );
    wp_localize_script('ums-footer-script', 'mycustomsettings', $footer_conf_settings);
    wp_register_style('ums-rules-style', plugins_url('styles/ums-rules.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('ums-rules-style');
}
function manhwaclan_load_main_admin_js(){
    add_action('admin_enqueue_scripts', 'manhwaclan_enqueue_main_admin_js');
}

function manhwaclan_enqueue_main_admin_js(){
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    wp_enqueue_script('ums-main-script', plugins_url('scripts/main.js', __FILE__), array('jquery'));
    if(!isset($manhwaclan_Main_Settings['best_user']))
    {
        $best_user = '';
    }
    else
    {
        $best_user = $manhwaclan_Main_Settings['best_user'];
    }
    if(!isset($manhwaclan_Main_Settings['best_password']))
    {
        $best_password = '';
    }
    else
    {
        $best_password = $manhwaclan_Main_Settings['best_password'];
    }
    $header_main_settings = array(
        'best_user' => $best_user,
        'best_password' => $best_password
    );
    wp_localize_script('ums-main-script', 'mycustommainsettings', $header_main_settings);
}
function manhwaclan_load_all_admin_js(){
    add_action('admin_enqueue_scripts', 'manhwaclan_admin_load_files');
}
function manhwaclan_add_rating_link($links)
{
    $settings_link = '<a href="//codecanyon.net/downloads" target="_blank" title="Rate">
            <i class="wdi-rate-stars"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#ffb900" stroke="#ffb900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#ffb900" stroke="#ffb900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#ffb900" stroke="#ffb900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#ffb900" stroke="#ffb900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#ffb900" stroke="#ffb900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></i></a>';
    array_push($links, $settings_link);
    return $links;
}
add_filter("plugin_action_links_$plugin", 'manhwaclan_add_support_link');
function manhwaclan_add_support_link($links)
{
    $settings_link = '<a href="//coderevolution.ro/knowledge-base/" target="_blank">' . esc_html__('Support', 'ultimate-manga-scraper') . '</a>';
    array_push($links, $settings_link);
    return $links;
}
add_filter("plugin_action_links_$plugin", 'manhwaclan_add_settings_link');
add_filter("plugin_action_links_$plugin", 'manhwaclan_add_rating_link');
function manhwaclan_add_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=manhwaclan_admin_settings">' . esc_html__('Settings', 'ultimate-manga-scraper') . '</a>';
    array_push($links, $settings_link);
    return $links;
}

add_filter('cron_schedules', 'manhwaclan_add_cron_schedule');
function manhwaclan_add_cron_schedule($schedules)
{
    $schedules['manhwaclan_cron'] = array(
        'interval' => 3600,
        'display' => esc_html__('ums Cron', 'ultimate-manga-scraper')
    );
    $schedules['minutely'] = array(
        'interval' => 60,
        'display' => esc_html__('Once A Minute', 'ultimate-manga-scraper')
    );
    $schedules['weekly']        = array(
        'interval' => 604800,
        'display' => esc_html__('Once Weekly', 'ultimate-manga-scraper')
    );
    $schedules['monthly']       = array(
        'interval' => 2592000,
        'display' => esc_html__('Once Monthly', 'ultimate-manga-scraper')
    );
    return $schedules;
}
function manhwaclan_auto_clear_log()
{
    global $wp_filesystem;
    if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
        include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
       wp_filesystem($creds);
    }
    if ($wp_filesystem->exists(WP_CONTENT_DIR . '/manhwaclan_info.log')) {
        $wp_filesystem->delete(WP_CONTENT_DIR . '/manhwaclan_info.log');
    }
}

register_deactivation_hook(__FILE__, 'manhwaclan_my_deactivation');
function manhwaclan_my_deactivation()
{
    wp_clear_scheduled_hook('umsaction');
    wp_clear_scheduled_hook('umsactionclear');
    $running = array();
    update_option('manhwaclan_running_list', $running, false);
}
add_action('umsaction', 'manhwaclan_cron');
add_action('umsactionclear', 'manhwaclan_auto_clear_log');

function manhwaclan_cron_schedule()
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (isset($manhwaclan_Main_Settings['manhwaclan_enabled']) && $manhwaclan_Main_Settings['manhwaclan_enabled'] === 'on') {
        if (!wp_next_scheduled('umsaction')) {
            $unlocker = get_option('manhwaclan_minute_running_unlocked', false);
            if($unlocker == '1')
            {
                $rez = wp_schedule_event(time(), 'minutely', 'umsaction');
            }
            else
            {
                $rez = wp_schedule_event(time(), 'hourly', 'umsaction');
            }
            
            if ($rez === FALSE) {
                manhwaclan_log_to_file('[Scheduler] Failed to schedule umsaction to manhwaclan_cron!');
            }
        }
        
        if (isset($manhwaclan_Main_Settings['enable_logging']) && $manhwaclan_Main_Settings['enable_logging'] === 'on' && isset($manhwaclan_Main_Settings['auto_clear_logs']) && $manhwaclan_Main_Settings['auto_clear_logs'] !== 'No') {
            if (!wp_next_scheduled('umsactionclear')) {
                $rez = wp_schedule_event(time(), $manhwaclan_Main_Settings['auto_clear_logs'], 'umsactionclear');
                if ($rez === FALSE) {
                    manhwaclan_log_to_file('[Scheduler] Failed to schedule umsactionclear to ' . $manhwaclan_Main_Settings['auto_clear_logs'] . '!');
                }
                add_option('manhwaclan_schedule_time', $manhwaclan_Main_Settings['auto_clear_logs']);
            } else {
                if (!get_option('manhwaclan_schedule_time')) {
                    wp_clear_scheduled_hook('umsactionclear');
                    $rez = wp_schedule_event(time(), $manhwaclan_Main_Settings['auto_clear_logs'], 'umsactionclear');
                    add_option('manhwaclan_schedule_time', $manhwaclan_Main_Settings['auto_clear_logs']);
                    if ($rez === FALSE) {
                        manhwaclan_log_to_file('[Scheduler] Failed to schedule umsactionclear to ' . $manhwaclan_Main_Settings['auto_clear_logs'] . '!');
                    }
                } else {
                    $the_time = get_option('manhwaclan_schedule_time');
                    if ($the_time != $manhwaclan_Main_Settings['auto_clear_logs']) {
                        wp_clear_scheduled_hook('umsactionclear');
                        delete_option('manhwaclan_schedule_time');
                        $rez = wp_schedule_event(time(), $manhwaclan_Main_Settings['auto_clear_logs'], 'umsactionclear');
                        add_option('manhwaclan_schedule_time', $manhwaclan_Main_Settings['auto_clear_logs']);
                        if ($rez === FALSE) {
                            manhwaclan_log_to_file('[Scheduler] Failed to schedule umsactionclear to ' . $manhwaclan_Main_Settings['auto_clear_logs'] . '!');
                        }
                    }
                }
            }
        } else {
            if (!wp_next_scheduled('umsactionclear')) {
                delete_option('manhwaclan_schedule_time');
            } else {
                wp_clear_scheduled_hook('umsactionclear');
                delete_option('manhwaclan_schedule_time');
            }
        }
    } else {
        if (wp_next_scheduled('umsaction')) {
            wp_clear_scheduled_hook('umsaction');
        }
        
        if (!wp_next_scheduled('umsactionclear')) {
            delete_option('manhwaclan_schedule_time');
        } else {
            wp_clear_scheduled_hook('umsactionclear');
            delete_option('manhwaclan_schedule_time');
        }
    }
}
function manhwaclan_cron()
{
    $GLOBALS['wp_object_cache']->delete('manhwaclan_rules_list', 'options');
    if (!get_option('manhwaclan_rules_list')) {
        $rules = array();
    } else {
        $rules = get_option('manhwaclan_rules_list');
    }
    $unlocker = get_option('manhwaclan_minute_running_unlocked', false);
    if (!empty($rules)) {
        $cont = 0;
        foreach ($rules as $request => $bundle[]) {
            $bundle_values   = array_values($bundle);
            $myValues        = $bundle_values[$cont];
            $array_my_values = array_values($myValues);for($iji=0;$iji<count($array_my_values);++$iji){if(is_string($array_my_values[$iji])){$array_my_values[$iji]=stripslashes($array_my_values[$iji]);}}
            $schedule        = isset($array_my_values[1]) ? $array_my_values[1] : '24';
            $active          = isset($array_my_values[2]) ? $array_my_values[2] : '0';
            $last_run        = isset($array_my_values[3]) ? $array_my_values[3] : manhwaclan_get_date_now();
            if ($active == '1') {
                $now                = manhwaclan_get_date_now();
                if($unlocker == '1')
                {
                    $nextrun        = manhwaclan_add_minute($last_run, $schedule);
                    $manhwaclan_hour_diff = (int) manhwaclan_minute_diff($now, $nextrun);
                }
                else
                {
                    $nextrun            = manhwaclan_add_hour($last_run, $schedule);
                    $manhwaclan_hour_diff = (int) manhwaclan_hour_diff($now, $nextrun);
                }
                if ($manhwaclan_hour_diff >= 0) {
                    manhwaclan_run_rule($cont, 0);
                }
            }
            $cont = $cont + 1;
        }
    }
    $GLOBALS['wp_object_cache']->delete('manhwaclan_text_list', 'options');
    if (!get_option('manhwaclan_text_list')) {
        $xrules = array();
    } else {
        $xrules = get_option('manhwaclan_text_list');
    }
    if (!empty($xrules)) {
        $xcont = 0;
        foreach ($xrules as $xrequest => $xbundle[]) {
            $xbundle_values   = array_values($xbundle);
            $xmyValues        = $xbundle_values[$xcont];
            $xarray_my_values = array_values($xmyValues);for($xiji=0;$xiji<count($xarray_my_values);++$xiji){if(is_string($xarray_my_values[$xiji])){$xarray_my_values[$xiji]=stripslashes($xarray_my_values[$xiji]);}}
            $xschedule        = isset($xarray_my_values[1]) ? $xarray_my_values[1] : '24';
            $xactive          = isset($xarray_my_values[2]) ? $xarray_my_values[2] : '0';
            $xlast_run        = isset($xarray_my_values[3]) ? $xarray_my_values[3] : manhwaclan_get_date_now();
            if ($xactive == '1') {
                $xnow                = manhwaclan_get_date_now();
                if($unlocker == '1')
                {
                    $xnextrun        = manhwaclan_add_minute($xlast_run, $xschedule);
                    $xmanhwaclan_hour_diff = (int) manhwaclan_minute_diff($xnow, $xnextrun);
                }
                else
                {
                    $xnextrun            = manhwaclan_add_hour($xlast_run, $xschedule);
                    $xmanhwaclan_hour_diff = (int) manhwaclan_hour_diff($xnow, $xnextrun);
                }
                if ($xmanhwaclan_hour_diff >= 0) {
                    manhwaclan_run_rule($xcont, 1);
                }
            }
            $xcont = $xcont + 1;
        }
    }
    $running = array();
    update_option('manhwaclan_running_list', $running);
}

function manhwaclan_log_to_file($str)
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (isset($manhwaclan_Main_Settings['enable_logging']) && $manhwaclan_Main_Settings['enable_logging'] == 'on') {
        $d = date("j-M-Y H:i:s e", current_time( 'timestamp' ));
        error_log("[$d] " . $str . "<br/>\r\n", 3, WP_CONTENT_DIR . '/manhwaclan_info.log');
    }
}
function manhwaclan_delete_all_posts()
{
    $failed                 = false;
    $number                 = 0;
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    $post_list = array();
    $postsPerPage = 50000;
    $paged = 0;
    do
    {
        $postOffset = $paged * $postsPerPage;
        $query = array(
            'post_status' => array(
                'publish',
                'draft',
                'pending',
                'trash',
                'private',
                'future'
            ),
            'post_type' => array(
                'any'
            ),
            'numberposts' => $postsPerPage,
            'meta_key' => 'manhwaclan_parent_rule',
            'fields' => 'ids',
            'offset'  => $postOffset
        );
        $got_me = get_posts($query);
        $post_list = array_merge($post_list, $got_me);
        $paged++;
    }while(!empty($got_me));
    wp_suspend_cache_addition(true);
    foreach ($post_list as $post) {
        $index = get_post_meta($post, 'manhwaclan_parent_rule', true);
        if (isset($index) && $index !== '') {
            $args             = array(
                'post_parent' => $post
            );
            $post_attachments = get_children($args);
            if (isset($post_attachments) && !empty($post_attachments)) {
                foreach ($post_attachments as $attachment) {
                    wp_delete_attachment($attachment->ID, true);
                }
            }
            $res = wp_delete_post($post, true);
            if ($res === false) {
                $failed = true;
            } else {
                $number++;
            }
        }
    }
    wp_suspend_cache_addition(false);
    if ($failed === true) {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('[PostDelete] Failed to delete all posts!');
        }
    } else {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('[PostDelete] Successfuly deleted ' . esc_html($number) . ' posts!');
        }
    }
}
add_action('wp_ajax_manhwaclan_my_action', 'manhwaclan_my_action_callback');
function manhwaclan_my_action_callback()
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    $failed                 = false;
    $type                   = $_POST['type'];
    $del_id                 = $_POST['id'];
    $how                    = $_POST['how'];
    $force_delete           = true;
    $number                 = 0;
    if ($how == 'trash') {
        $force_delete = false;
    }
    else
    {
        $skip_posts_temp = get_option('manhwaclan_continue_search', array());
        $skip_posts_temp[$del_id] = '';
        update_option('manhwaclan_continue_search', $skip_posts_temp);
    }
    $post_list = array();
    $postsPerPage = 50000;
    $paged = 0;
    do
    {
        $postOffset = $paged * $postsPerPage;
        $query = array(
            'post_status' => array(
                'publish',
                'draft',
                'pending',
                'trash',
                'private',
                'future'
            ),
            'post_type' => array(
                'any'
            ),
            'numberposts' => $postsPerPage,
            'meta_key' => 'manhwaclan_parent_rule',
            'fields' => 'ids',
            'offset'  => $postOffset
        );
        $got_me = get_posts($query);
        $post_list = array_merge($post_list, $got_me);
        $paged++;
    }while(!empty($got_me));
    wp_suspend_cache_addition(true);
    foreach ($post_list as $post) {
        $index = get_post_meta($post, 'manhwaclan_parent_rule', true);
        if ($index == $type . '-' . $del_id) {
            $args             = array(
                'post_parent' => $post
            );
            $post_attachments = get_children($args);
            if (isset($post_attachments) && !empty($post_attachments)) {
                foreach ($post_attachments as $attachment) {
                    wp_delete_attachment($attachment->ID, true);
                }
            }
            $res = wp_delete_post($post, $force_delete);
            if ($res === false) {
                $failed = true;
            } else {
                $number++;
            }
        }
    }
    wp_suspend_cache_addition(false);
    if ($failed === true) {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('[PostDelete] Failed to delete all posts for rule id: ' . esc_html($del_id) . '!');
        }
        echo 'failed';
    } else {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('[PostDelete] Successfuly deleted ' . esc_html($number) . ' posts for rule id: ' . esc_html($del_id) . '!');
        }
        if ($number == 0) {
            echo 'nochange';
        } else {
            echo 'ok';
        }
    }
    die();
}
add_action('wp_ajax_manhwaclan_run_my_action', 'manhwaclan_run_my_action_callback');
function manhwaclan_run_my_action_callback()
{
    $run_id = $_POST['id'];
    $run_type = isset($_POST['type']) ? $_POST['type'] : 0;
    $rerun_count = isset($_POST['rerun_count']) ? $_POST['rerun_count'] : 0;
    echo manhwaclan_run_rule($run_id, $run_type, 0, $rerun_count);
    die();
}


function manhwaclan_clearFromList($param, $type)
{
    $GLOBALS['wp_object_cache']->delete('manhwaclan_running_list', 'options');
    $running = get_option('manhwaclan_running_list');
    if($running !== false)
    {
        $key = array_search(array(
            $param => $type
        ), $running);
        if ($key !== FALSE) {
            unset($running[$key]);
            update_option('manhwaclan_running_list', $running);
        }
    }
}

function manhwaclan_get_page_PuppeteerAPI($url, $custom_cookies, $custom_user_agent, $use_proxy, $user_pass, $timeout = '')
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (!isset($manhwaclan_Main_Settings['headlessbrowserapi_key']) || trim($manhwaclan_Main_Settings['headlessbrowserapi_key']) == '')
    {
        manhwaclan_log_to_file('You need to add your HeadlessBrowserAPI key in the plugin\'s \'Main Settings\' before you can use this feature.');
        return false;
    }
    if($custom_user_agent == '')
    {
        $custom_user_agent = 'default';
    }
    if($custom_cookies == '')
    {
        $custom_cookies = 'default';
    }
    if($user_pass == '')
    {
        $user_pass = 'default';
    }
    if($timeout != '')
    {
        $phantomjs_timeout = $timeout;
    }
    else
    {
        if (isset($manhwaclan_Main_Settings['phantom_timeout']) && $manhwaclan_Main_Settings['phantom_timeout'] != '') 
        {
            $phantomjs_timeout = ((int)$manhwaclan_Main_Settings['phantom_timeout']);
        }
        else
        {
            $phantomjs_timeout = 'default';
        }
    }
    $phantomjs_proxcomm = '"null"';
    if ($use_proxy == '1' && isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '') 
    {
        $proxy_url = $manhwaclan_Main_Settings['proxy_url'];
        if(isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '')
        {
            $proxy_auth = $manhwaclan_Main_Settings['proxy_auth'];
        }
        else
        {
            $proxy_auth = 'default';
        }
    }
    else
    {
        $proxy_url = 'default';
        $proxy_auth = 'default';
    }
    
    $za_api_url = 'https://headlessbrowserapi.com/apis/scrape/v1/puppeteer?apikey=' . trim($manhwaclan_Main_Settings['headlessbrowserapi_key']) . '&url=' . urlencode($url) . '&custom_user_agent=' . urlencode($custom_user_agent) . '&custom_cookies=' . urlencode($custom_cookies) . '&user_pass=' . urlencode($user_pass) . '&timeout=' . urlencode($phantomjs_timeout) . '&proxy_url=' . urlencode($proxy_url) . '&proxy_auth=' . urlencode($proxy_auth);
    $api_timeout = 120;
    $args = array(
       'timeout'     => $api_timeout,
       'redirection' => 10,
       'blocking'    => true,
       'compress'    => false,
       'decompress'  => true,
       'sslverify'   => false,
       'stream'      => false
    );
    $ret_data = wp_remote_get($za_api_url, $args);
    $response_code       = wp_remote_retrieve_response_code( $ret_data );
    $response_message    = wp_remote_retrieve_response_message( $ret_data );    
    if ( 200 != $response_code ) {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) 
        {
            manhwaclan_log_to_file('Failed to get response from HeadlessBrowserAPI: ' . $za_api_url . ' code: ' . $response_code . ' message: ' . $response_message);
            if(isset($ret_data->errors['http_request_failed']))
            {
                foreach($ret_data->errors['http_request_failed'] as $errx)
                {
                    manhwaclan_log_to_file('Error message: ' . html_entity_decode($errx));
                }
            }
        }
        return false;
    } else {
        $cmdResult = wp_remote_retrieve_body( $ret_data );
    }
    $jcmdResult = json_decode($cmdResult, true);
    if($jcmdResult === false)
    {
        manhwaclan_log_to_file('Failed to decode response from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult, true));
        return false;
    }
    $cmdResult = $jcmdResult;
    if(isset($cmdResult['apicalls']))
    {
        update_option('headless_calls', esc_html($cmdResult['apicalls']));
    }
    if(isset($cmdResult['error']))
    {
        manhwaclan_log_to_file('An error occurred while getting content from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult['error'], true));
        return false;
    }
    if(!isset($cmdResult['html']))
    {
        manhwaclan_log_to_file('Malformed data imported from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult, true));
        return false;
    }
    return '<html><body>' . $cmdResult['html'] . '</body></html>';
}
function manhwaclan_get_page_TorAPI($url, $custom_cookies, $custom_user_agent, $use_proxy, $user_pass, $timeout = '')
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (!isset($manhwaclan_Main_Settings['headlessbrowserapi_key']) || trim($manhwaclan_Main_Settings['headlessbrowserapi_key']) == '')
    {
        manhwaclan_log_to_file('You need to add your HeadlessBrowserAPI key in the plugin\'s \'Main Settings\' before you can use this feature.');
        return false;
    }
    if($custom_user_agent == '')
    {
        $custom_user_agent = 'default';
    }
    if($custom_cookies == '')
    {
        $custom_cookies = 'default';
    }
    if($user_pass == '')
    {
        $user_pass = 'default';
    }
    if($timeout != '')
    {
        $phantomjs_timeout = $timeout;
    }
    else
    {
        if (isset($manhwaclan_Main_Settings['phantom_timeout']) && $manhwaclan_Main_Settings['phantom_timeout'] != '') 
        {
            $phantomjs_timeout = ((int)$manhwaclan_Main_Settings['phantom_timeout']);
        }
        else
        {
            $phantomjs_timeout = 'default';
        }
    }
    $phantomjs_proxcomm = '"null"';
    if ($use_proxy == '1' && isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '') 
    {
        $proxy_url = $manhwaclan_Main_Settings['proxy_url'];
        if(isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '')
        {
            $proxy_auth = $manhwaclan_Main_Settings['proxy_auth'];
        }
        else
        {
            $proxy_auth = 'default';
        }
    }
    else
    {
        $proxy_url = 'default';
        $proxy_auth = 'default';
    }
    
    $za_api_url = 'https://headlessbrowserapi.com/apis/scrape/v1/tor?apikey=' . trim($manhwaclan_Main_Settings['headlessbrowserapi_key']) . '&url=' . urlencode($url) . '&custom_user_agent=' . urlencode($custom_user_agent) . '&custom_cookies=' . urlencode($custom_cookies) . '&user_pass=' . urlencode($user_pass) . '&timeout=' . urlencode($phantomjs_timeout) . '&proxy_url=' . urlencode($proxy_url) . '&proxy_auth=' . urlencode($proxy_auth);
    $api_timeout = 120;
    $args = array(
       'timeout'     => $api_timeout,
       'redirection' => 10,
       'blocking'    => true,
       'compress'    => false,
       'decompress'  => true,
       'sslverify'   => false,
       'stream'      => false
    );
    $ret_data = wp_remote_get($za_api_url, $args);
    $response_code       = wp_remote_retrieve_response_code( $ret_data );
    $response_message    = wp_remote_retrieve_response_message( $ret_data );    
    if ( 200 != $response_code ) {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) 
        {
            manhwaclan_log_to_file('Failed to get response from HeadlessBrowserAPI: ' . $za_api_url . ' code: ' . $response_code . ' message: ' . $response_message);
            if(isset($ret_data->errors['http_request_failed']))
            {
                foreach($ret_data->errors['http_request_failed'] as $errx)
                {
                    manhwaclan_log_to_file('Error message: ' . html_entity_decode($errx));
                }
            }
        }
        return false;
    } else {
        $cmdResult = wp_remote_retrieve_body( $ret_data );
    }
    $jcmdResult = json_decode($cmdResult, true);
    if($jcmdResult === false)
    {
        manhwaclan_log_to_file('Failed to decode response from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult, true));
        return false;
    }
    $cmdResult = $jcmdResult;
    if(isset($cmdResult['apicalls']))
    {
        update_option('headless_calls', esc_html($cmdResult['apicalls']));
    }
    if(isset($cmdResult['error']))
    {
        manhwaclan_log_to_file('An error occurred while getting content from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult['error'], true));
        return false;
    }
    if(!isset($cmdResult['html']))
    {
        manhwaclan_log_to_file('Malformed data imported from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult, true));
        return false;
    }
    return '<html><body>' . $cmdResult['html'] . '</body></html>';
}
function manhwaclan_get_page_PhantomJSAPI($url, $custom_cookies, $custom_user_agent, $use_proxy, $user_pass, $timeout = '')
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (!isset($manhwaclan_Main_Settings['headlessbrowserapi_key']) || trim($manhwaclan_Main_Settings['headlessbrowserapi_key']) == '')
    {
        manhwaclan_log_to_file('You need to add your HeadlessBrowserAPI key in the plugin\'s \'Main Settings\' before you can use this feature.');
        return false;
    }
    if($custom_user_agent == '')
    {
        $custom_user_agent = 'default';
    }
    if($custom_cookies == '')
    {
        $custom_cookies = 'default';
    }
    if($user_pass == '')
    {
        $user_pass = 'default';
    }
    if($timeout != '')
    {
        $phantomjs_timeout = $timeout;
    }
    else
    {
        if (isset($manhwaclan_Main_Settings['phantom_timeout']) && $manhwaclan_Main_Settings['phantom_timeout'] != '') 
        {
            $phantomjs_timeout = ((int)$manhwaclan_Main_Settings['phantom_timeout']);
        }
        else
        {
            $phantomjs_timeout = 'default';
        }
    }
    $phantomjs_proxcomm = '"null"';
    if ($use_proxy == '1' && isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '') 
    {
        $proxy_url = $manhwaclan_Main_Settings['proxy_url'];
        if(isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '')
        {
            $proxy_auth = $manhwaclan_Main_Settings['proxy_auth'];
        }
        else
        {
            $proxy_auth = 'default';
        }
    }
    else
    {
        $proxy_url = 'default';
        $proxy_auth = 'default';
    }
    
    $za_api_url = 'https://headlessbrowserapi.com/apis/scrape/v1/phantomjs?apikey=' . trim($manhwaclan_Main_Settings['headlessbrowserapi_key']) . '&url=' . urlencode($url) . '&custom_user_agent=' . urlencode($custom_user_agent) . '&custom_cookies=' . urlencode($custom_cookies) . '&user_pass=' . urlencode($user_pass) . '&timeout=' . urlencode($phantomjs_timeout) . '&proxy_url=' . urlencode($proxy_url) . '&proxy_auth=' . urlencode($proxy_auth);
    $api_timeout = 120;
    $args = array(
       'timeout'     => $api_timeout,
       'redirection' => 10,
       'blocking'    => true,
       'compress'    => false,
       'decompress'  => true,
       'sslverify'   => false,
       'stream'      => false
    );
    $ret_data = wp_remote_get($za_api_url, $args);
    $response_code       = wp_remote_retrieve_response_code( $ret_data );
    $response_message    = wp_remote_retrieve_response_message( $ret_data );    
    if ( 200 != $response_code ) {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) 
        {
            manhwaclan_log_to_file('Failed to get response from HeadlessBrowserAPI: ' . $za_api_url . ' code: ' . $response_code . ' message: ' . $response_message);
            if(isset($ret_data->errors['http_request_failed']))
            {
                foreach($ret_data->errors['http_request_failed'] as $errx)
                {
                    manhwaclan_log_to_file('Error message: ' . html_entity_decode($errx));
                }
            }
        }
        return false;
    } else {
        $cmdResult = wp_remote_retrieve_body( $ret_data );
    }
    $jcmdResult = json_decode($cmdResult, true);
    if($jcmdResult === false)
    {
        manhwaclan_log_to_file('Failed to decode response from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult, true));
        return false;
    }
    $cmdResult = $jcmdResult;
    if(isset($cmdResult['apicalls']))
    {
        update_option('headless_calls', esc_html($cmdResult['apicalls']));
    }
    if(isset($cmdResult['error']))
    {
        manhwaclan_log_to_file('An error occurred while getting content from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult['error'], true));
        return false;
    }
    if(!isset($cmdResult['html']))
    {
        manhwaclan_log_to_file('Malformed data imported from HeadlessBrowserAPI: ' . $za_api_url . ' - ' . print_r($cmdResult, true));
        return false;
    }
    return '<html><body>' . $cmdResult['html'] . '</body></html>';
}
function manhwaclan_get_web_page($url, $ua = '', $use_phantom = '0')
{
    if(manhwaclan_startsWith($url, '//'))
    {
        $url = 'http:' . $url;
    }
    $content = false;
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    $got_phantom = false;
    if($use_phantom == '1')
    {
        $content = manhwaclan_get_page_PhantomJS($url, 'isAdult=1', manhwaclan_get_random_user_agent($ua), '1', '', '');
        if($content !== false)
        {
            $got_phantom = true;
        }
    }
    elseif($use_phantom == '2')
    {
        $content = manhwaclan_get_page_Puppeteer($url, 'isAdult=1', manhwaclan_get_random_user_agent($ua), '1', '');
        if($content !== false)
        {
            $got_phantom = true;
        }
    }
    elseif($use_phantom == '4')
    {
        $content = manhwaclan_get_page_PuppeteerAPI($url, 'isAdult=1', manhwaclan_get_random_user_agent($ua), '1', '', '');
        if($content !== false)
        {
            $got_phantom = true;
        }
    }
    elseif($use_phantom == '5')
    {
        $content = manhwaclan_get_page_TorAPI($url, 'isAdult=1', manhwaclan_get_random_user_agent($ua), '1', '', '');
        if($content !== false)
        {
            $got_phantom = true;
        }
    }
    elseif($use_phantom == '6')
    {
        $content = manhwaclan_get_page_PhantomJSAPI($url, 'isAdult=1', manhwaclan_get_random_user_agent($ua), '1', '', '');
        if($content !== false)
        {
            $got_phantom = true;
        }
    }
    if($got_phantom === false)
    {
        if (!isset($manhwaclan_Main_Settings['proxy_url']) || $manhwaclan_Main_Settings['proxy_url'] == '') {
            $args = array(
               'timeout'     => 10,
               'redirection' => 10,
               'user-agent'  => manhwaclan_get_random_user_agent($ua),
               'blocking'    => true,
               'compress'    => false,
               'decompress'  => true,
               'sslverify'   => false,
               'stream'      => false,
               'filename'    => null
            );
            $cookies = [];
            $cookies[] = new WP_Http_Cookie( array(
                'name'  => 'isAdult',
                'value' => '1',
            ));
            $args['cookies'] = $cookies;
            
            $ret_data            = wp_remote_get($url, $args);  
            $response_code       = wp_remote_retrieve_response_code( $ret_data );
            $response_message    = wp_remote_retrieve_response_message( $ret_data );        
            if ( 200 != $response_code ) {
            } else {
                $content = wp_remote_retrieve_body( $ret_data );
            }
        }
        if($content === false)
        {
            if(function_exists('curl_version') && filter_var($url, FILTER_VALIDATE_URL))
            {
                $user_agent = manhwaclan_get_random_user_agent($ua);
                $options    = array(
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_COOKIEJAR => get_temp_dir() . 'umscookie.txt',
                    CURLOPT_COOKIEFILE => get_temp_dir() . 'umscookie.txt',
                    CURLOPT_USERAGENT => $user_agent,
                    CURLOPT_REFERER => 'manhwaclan.com',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_CONNECTTIMEOUT => 10,
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_COOKIE => 'isAdult=1'
                );
                $ch         = curl_init($url);
                if (isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '') {
                    curl_setopt($ch, CURLOPT_PROXY, $manhwaclan_Main_Settings['proxy_url']);
                    if (isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '') {
                        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $manhwaclan_Main_Settings['proxy_auth']);
                    }
                }
                if ($ch === FALSE) {
                    return FALSE;
                }
                curl_setopt_array($ch, $options);
                $content = curl_exec($ch);
                curl_close($ch);
            }
            else
            {
                $allowUrlFopen = preg_match('/1|yes|on|true/i', ini_get('allow_url_fopen'));
                if ($allowUrlFopen) {
                    global $wp_filesystem;
                    if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
                        include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
                        wp_filesystem($creds);
                    }
                    return $wp_filesystem->get_contents($url);
                }
            }
        }
    }
    return $content;
}

function manhwaclan_utf8_encode($str)
{
    if(function_exists('mb_detect_encoding') && function_exists('mb_convert_encoding'))
    {
        $enc = mb_detect_encoding($str);
        if ($enc !== FALSE) {
            $str = mb_convert_encoding($str, 'UTF-8', $enc);
        } else {
            $str = mb_convert_encoding($str, 'UTF-8');
        }
    }
    return $str;
}
function manhwaclan_startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}
function manhwaclan_image_url_filter( $url ){

    $url = str_replace( 'https://', '', $url );
    $url = str_replace( 'http://', '', $url );
    $url = str_replace( '//', '', $url );
    $url = str_replace( 'http:', '', $url );
    if(strpos($url, '/') === false){
        $url = 'fanfox.net' . $url;
    }
    return "https://{$url}";
}
function manhwaclan_getFacebookButton($url)
{
    $button = '<a class="crf_twitt manhwaclan_facebook manhwaclan_btn button purchase" href="https://www.facebook.com/sharer/sharer.php?display=popup&ref=plugin&src=share_button&u=' . urlencode($url) . '" onclick="return !window.open(this.href, \'Facebook\', \'width=640,height=580\')"><img src="' . manhwaclan_get_file_url('images/facebook.png') . '" alt="Facebook" class="crf_social_img"></a>';
    return $button;
}
function manhwaclan_getTwitterButton($url, $item_title)
{
    $button = '<a class="crf_twitt manhwaclan_twitter manhwaclan_btn button purchase" href="https://twitter.com/intent/tweet?text=Check+out+%27' . urlencode($item_title) . '%27&url=' . urlencode(htmlspecialchars_decode($url)) . '" onclick="return !window.open(this.href, \'Twitter\', \'width=640,height=580\')"><img src="' . manhwaclan_get_file_url('images/twitter.png') . '" alt="Twitter" class="crf_social_img"></a>';
    return $button;
}
function manhwaclan_getPinterestButton($url, $item_title, $banner)
{
    $button = '<a class="crf_twitt manhwaclan_pinterest manhwaclan_btn button purchase" href="http://pinterest.com/pin/create/button?description=' . urlencode($item_title) . '&media=' . urlencode($banner) . '&url=' . urlencode(htmlspecialchars_decode($url)) . '" onclick="return !window.open(this.href, \'Pinterest\', \'width=640,height=580\')"><img src="' . manhwaclan_get_file_url('images/pinterest.png') . '" alt="Pinterest" class="crf_social_img"></a>';
    return $button;
}

function manhwaclan_get_page_Puppeteer($url, $custom_cookies, $custom_user_agent, $use_proxy, $user_pass)
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if(!function_exists('shell' . '_exec')) {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('shel' . 'l_exec not found!');
        }
        return false;
    }
    if($custom_user_agent == '')
    {
        $custom_user_agent = 'default';
    }
    if($custom_cookies == '')
    {
        $custom_cookies = 'default';
    }
    if($user_pass == '')
    {
        $user_pass = 'default';
    }
    $phantomjs_proxcomm = '"null"';
    if ($use_proxy == '1' && isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '') 
    {
        $prx = explode(',', $manhwaclan_Main_Settings['proxy_url']);
        $randomness = array_rand($prx);
        $phantomjs_proxcomm = '"' . trim($prx[$randomness]);
        if (isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '') 
        {
            $prx_auth = explode(',', $manhwaclan_Main_Settings['proxy_auth']);
            if(isset($prx_auth[$randomness]) && trim($prx_auth[$randomness]) != '')
            {
                $phantomjs_proxcomm .= '~~~' . trim($prx_auth[$randomness]);
            }
        }
        $phantomjs_proxcomm .= '"';
    }
    $disabled = explode(',', ini_get('disable_functions'));
    if(in_array('shell' . '_exec', $disabled))
    {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('shel' . 'l_exec disabled');
        }
        return false;
    }
    
    $puppeteer_comm = 'node ';
    $puppeteer_comm .= '"' . dirname(__FILE__) . '/res/puppeteer/puppeteer.js" "' . $url . '" ' . $phantomjs_proxcomm . '  "' . $custom_user_agent . '" "' . $custom_cookies . '" "' . $user_pass . '"';
    $puppeteer_comm .= ' 2>&1';
    if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
        manhwaclan_log_to_file('Puppeteer command: ' . $puppeteer_comm);
    }
    $shefunc = trim(' s ') . trim(' h ') . 'ell' . '_exec';
    $cmdResult = $shefunc($puppeteer_comm);
    if($cmdResult === NULL || $cmdResult == '')
    {
        manhwaclan_log_to_file('puppeteer did not return usable info for: ' . $url);
        return false;
    }
    if(trim($cmdResult) === 'timeout')
    {
        manhwaclan_log_to_file('puppeteer timed out while getting page: ' . $url. ' - please increase timeout in Main Settings');
        return false;
    }
    if(stristr($cmdResult, 'sh: node: command not found') !== false || stristr($cmdResult, 'throw err;') !== false)
    {
        manhwaclan_log_to_file('nodeJS not found, please install it on your server');
        return false;
    }
    if(stristr($cmdResult, 'sh: puppeteer: command not found') !== false)
    {
        manhwaclan_log_to_file('puppeteer not found, please install it on your server');
        return false;
    }
    if(stristr($cmdResult, 'res/puppeteer/puppeteer.js:') !== false)
    {
        manhwaclan_log_to_file('puppeteer failed to run, error: ' . $cmdResult);
        return false;
    }
    return $cmdResult;
}
function manhwaclan_get_page_PhantomJS($url, $custom_cookies, $custom_user_agent, $use_proxy, $user_pass, $phantom_wait)
{
    if(!function_exists('shell' . '_exec')) {
        return false;
    }
    $disabled = explode(',', ini_get('disable_functions'));
    if(in_array('shell' . '_exec', $disabled))
    {
        return false;
    }
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (isset($manhwaclan_Main_Settings['phantom_path']) && $manhwaclan_Main_Settings['phantom_path'] != '') 
    {
        $phantomjs_comm = $manhwaclan_Main_Settings['phantom_path'];
    }
    else
    {
        $phantomjs_comm = 'phantomjs';
    }
    if (isset($manhwaclan_Main_Settings['phantom_timeout']) && $manhwaclan_Main_Settings['phantom_timeout'] != '') 
    {
        $phantomjs_timeout = ((int)$manhwaclan_Main_Settings['phantom_timeout']);
    }
    else
    {
        $phantomjs_timeout = '15000';
    }
    if($custom_user_agent == '')
    {
        $custom_user_agent = 'default';
    }
    if($custom_cookies == '')
    {
        $custom_cookies = 'default';
    }
    if($user_pass == '')
    {
        $user_pass = 'default';
    }
    if ($use_proxy == '1' && isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '') 
    {
        $prx = explode(',', $manhwaclan_Main_Settings['proxy_url']);
        $randomness = array_rand($prx);
        $phantomjs_comm .= ' --proxy=' . trim($prx[$randomness]);
        if (isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '') 
        {
            $prx_auth = explode(',', $manhwaclan_Main_Settings['proxy_auth']);
            if(isset($prx_auth[$randomness]) && trim($prx_auth[$randomness]) != '')
            {
                $phantomjs_comm .= ' --proxy-auth=' . trim($prx_auth[$randomness]);
            }
        }
    }
    $phantomjs_comm .= ' --ignore-ssl-errors=true ';
    $phantomjs_comm .= '"' . dirname(__FILE__) . '/res/phantomjs/phantom.js" "' . $url . '" "' . esc_html($phantomjs_timeout) . '" "' . $custom_user_agent . '" "' . $custom_cookies . '" "' . $user_pass . '" "' . esc_html($phantom_wait) . '"';
    $phantomjs_comm .= ' 2>&1';
    $shefunc = trim(' s ') . trim(' h ') . 'ell' . '_exec';
    $cmdResult = $shefunc($phantomjs_comm);
    if($cmdResult === NULL || $cmdResult == '')
    {
        manhwaclan_log_to_file('phantomjs did not return usable info for: ' . $url);
        return false;
    }
    if(trim($cmdResult) === 'timeout')
    {
        manhwaclan_log_to_file('phantomjs timed out while getting page: ' . $url. ' - please increase timeout in Main Settings');
        return false;
    }
    if(stristr($cmdResult, 'sh: phantomjs: command not found') !== false)
    {
        manhwaclan_log_to_file('phantomjs not found, please install it on your server');
        return false;
    }
    return $cmdResult;
}

function manhwaclan_testPhantom()
{
    if(!function_exists('shell' . '_exec')) {
        return -1;
    }
    $disabled = explode(',', ini_get('disable_functions'));
    if(in_array('shell' . '_exec', $disabled))
    {
        return -2;
    }
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if (isset($manhwaclan_Main_Settings['phantom_path']) && $manhwaclan_Main_Settings['phantom_path'] != '') 
    {
        $phantomjs_comm = $manhwaclan_Main_Settings['phantom_path'] . ' ';
    }
    else
    {
        $phantomjs_comm = 'phantomjs ';
    }
    $shefunc = trim(' s ') . trim(' h ') . 'ell' . '_exec';
    $cmdResult = $shefunc($phantomjs_comm . '-h 2>&1');
    if(stristr($cmdResult, 'Usage') !== false)
    {
        return 1;
    }
    return 0;
}

function manhwaclan_wp_mcl_e_upload_file( $url, $post_id = 0 ){
    if($url == '' || $url == false)
    {
        return false;
    }
    $ch = curl_init();
    if ($ch === FALSE) 
    {
        manhwaclan_log_to_file ('Failed to init curl in image downloader');
        return false;
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    $headers = array();
    $headers[] = 'Sec-Ch-Ua: ^^';
    $headers[] = 'Referer: https://manhwaclan.com/';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
    $headers[] = 'Sec-Ch-Ua-Platform: ^^Windows^^\"\"';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $content = curl_exec($ch);
 
    if (curl_errno($ch)) 
    {
        manhwaclan_log_to_file( 'Image Error:' . curl_error($ch));
        return false;
    }
    if($content == false)
    {
        manhwaclan_log_to_file( 'Failed to download image:' . $url);
        return false;
    }
    curl_close($ch);
    $pathinfo = pathinfo( $url );
    $upload_dir = wp_upload_dir();
    if(stristr($pathinfo['extension'], 'render_jsfalse'))
    {
        $pathinfo['extension'] = 'jpg';
    }
    $file_tmp_path = $upload_dir['basedir'] . '/' . $pathinfo['filename'] . '-' . $post_id . '.' . explode('?', $pathinfo['extension'])[0];
    global $wp_filesystem;
    if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') )
    {
        include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
        wp_filesystem($creds);
    }
    $file = $wp_filesystem->put_contents( $file_tmp_path, $content );
    $wp_filetype = wp_check_filetype(basename($file_tmp_path), null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => $post_id,
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment( $attachment, $file_tmp_path );
    $imagenew = get_post( $attach_id );
    $fullsizepath = get_attached_file( $imagenew->ID );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
    wp_update_attachment_metadata( $attach_id, $attach_data );
    return $attach_id;

}

function manhwaclan_update_post_ratings( $post_id, $ratings = array() ){

    if( empty( $ratings ) || !isset( $ratings['avg'] ) || !isset( $ratings['numbers'] ) ){
        return false;
    }

    extract( $ratings );

    $totals = intval( (float)trim($avg) * (float)$numbers );
    $int_avg_totals = intval( $avg ) * $numbers;

    $above_avg_numbers = $totals - $int_avg_totals;
    $int_avg_numbers = $numbers - $above_avg_numbers;

    $rates = array();

    for( $i = 1; $i <= $above_avg_numbers; $i++ ){
        $rates[] = intval( (int)$avg + 1 );
    }

    for( $i = 1; $i <= $int_avg_numbers; $i++ ){
        $rates[] = intval( $avg );
    }

    update_post_meta( $post_id, '_manga_avarage_reviews', $avg );
    update_post_meta( $post_id, '_manga_reviews', $rates );

    return true;
}

function manhwaclan_update_post_views( $post_id, $views ){

    $month = date('m');

    update_post_meta( $post_id, '_wp_manga_month_views', array(
        'date' => $month,
        'views' => $views
    ) );
    
    update_post_meta( $post_id, '_wp_manga_views', $views );
    
    $new_year_views = array( 'views' => $views, 'date' => date('y') );
    update_post_meta( $post_id, '_wp_manga_year_views', $new_year_views );
    update_post_meta( $post_id, '_wp_manga_year_views_value', $views );

}
function manhwaclan_add_manga_terms( $post_id, $terms, $taxonomy ){

    $terms = explode(',', $terms);

    if( empty( $terms ) ){
        return false;
    }

    $taxonomy_obj = get_taxonomy( $taxonomy );

    if( is_object($taxonomy_obj) && $taxonomy_obj->hierarchical )
    {
        $output_terms = array();
        foreach( $terms as $current_term ){

            if( empty( $current_term ) ){
                continue;
            }
            $term = term_exists( $current_term, $taxonomy );
            if( ! $term || is_wp_error( $term ) ){
                $term = wp_insert_term( $current_term, $taxonomy );
                if( !is_wp_error( $term ) && isset( $term['term_id'] ) ){
                    $term = intval( $term['term_id'] );

                }else{
                    continue;
                }
            }else{
                $term = intval( $term['term_id'] );
            }

            $output_terms[] = $term;
        }

        $terms = $output_terms;
    }

    $resp = wp_set_post_terms( $post_id, $terms, $taxonomy );

    return $resp;

}
function manhwaclan_fetch_chapters( $scans, $post_id, $itemx, $storage = 'local', $manga_name = '' ){

    global $wp_manga_storage, $wp_manga_volume, $wp_manga_chapter;
    if(isset($itemx['volume']) && $itemx['volume'] != 'NO-VOLUME' && $itemx['volume'] != 'No Volume' && $itemx['volume'] != '-1' && is_object($wp_manga_volume)){
        $find_vols = $wp_manga_volume->get_volumes(
            array(
                'post_id'     => $post_id,
                'volume_name' => $itemx['volume']
            )
        );
        
        if( !empty( $find_vols ) ){
            $volume_id = $find_vols[0]['volume_id'];
            $is_volume_created = true;

        }
        else
        {
            $volume_id = $wp_manga_storage->create_volume( $itemx['volume'], $post_id );
        }
    } 
    else 
    {
        $is_volume_created = true;
        $volume_id = 0;
    }
    $cur_chap_index = 0;
    $resp = manhwaclan_fetch_single_chapter( $scans, $volume_id, $post_id, $itemx, $storage, $manga_name );
    if( is_wp_error( $resp ) ){
        return $resp;
    }
    elseif($resp === false || $resp == null)
    {
        return false;
    }
    elseif($resp === 'CloudFlare')
    {
        return 'CloudFlare';
    }
    elseif($resp !== true)
    {
        return 'ok';
    }
    return true;
}
function manhwaclan_manga_url_filter( $url ){

    $url = str_replace( 'https://', '', $url );
    $url = str_replace( 'http://', '', $url );
    $url = str_replace( '//', '', $url );
    $url = str_replace( 'http:', '', $url );

    return "http://{$url}";
}
function manhwaclan_get_chapter_images( $url )
{
    $url = manhwaclan_manga_url_filter( $url );
    $images_url = array();
    $page_html = manhwaclan_get_web_page($url);
    if( strpos( $page_html, 'Sorry, its licensed, and not available.') !== false || strpos( $page_html, 'has been licensed, it is not available in') !== false ){
        manhwaclan_log_to_file( "URL not available in your country: $url");
        return false;
    }
    if( strpos( $page_html, 'licensed and not available.') !== false ){
        manhwaclan_log_to_file( "URL not available in your country (licensed): $url");
        return false;
    }
    $total_pages = 1;
    preg_match('/var imagecount=(\d+);/', $page_html, $matches);
    if($matches){
        $total_pages = $matches[1];
    }
    $chapterid = '';
    preg_match('/var chapterid =(\d+);/', $page_html, $matches);
    if($matches){
        $chapterid = $matches[1];
    }
    require_once (dirname(__FILE__) . "/res/UMSJavaScriptUnpacker.php"); 
    $dm5_key = '';
    preg_match('/eval\(.*(dm5_key).*\)/', $page_html, $matches);
    $unpacker = new UMSJavaScriptUnpacker();
    if($matches){
        $eval = $matches[0];
        $js = $unpacker->unpack($eval);
        $dm5_key = str_replace(array('\'','+',' '),array('','',''),str_replace(array('var guidkey=',';$("#dm5_key").val(guidkey);'), array('',''), $js));
    }
    $newImgs = '';
    preg_match('/eval\(.*(newImgs).*\)/', $page_html, $matches);
    if($matches){
        $eval = $matches[0];
        $js = $unpacker->unpack($eval);
        $newImgs = explode(',', str_replace('var newImgs=[', '', substr($js, 0, strpos($js, '];var newImginfos'))));
    }
    if($newImgs)
    {
        foreach($newImgs as $img){
            $url = 'http:' . str_replace("'", "", $img);
            array_push($images_url, substr($url, 0, strpos($url, '?')));
        }
        if(count($images_url) > 0)
        {
            return $images_url;
        }
    }			
    $base_url = str_replace( '1.html', '', $url );
    $base_url = str_replace( '1.htm', '', $base_url );
    $base_url = manhwaclan_manga_url_filter( $base_url );
    for( $i = 1; $i <= $total_pages; $i++ ){
        $data_url = $base_url . 'chapterfun.ashx?cid=' . $chapterid . '&page=' . $i . '&key=' . ($i == 1 ? '' : $dm5_key);
        $eval = manhwaclan_get_web_page($data_url);
        if($eval != '' && strpos($eval, "Bad Request - Invalid URL") === false){
            $js = $unpacker->unpack($eval);
            $idx1 = strpos($js, 'var pix="') + 9;
            $idx2 = strpos($js, '";');
            $url_1 = substr($js, $idx1, $idx2 - $idx1);
            $idx1 = strpos($js, 'var pvalue=["') + 13;
            $idx2 = strpos($js, '","');
            if($idx2 === false)
            {
                $idx2 = strpos($js, '"];');
            }
            $url_2 = substr($js, $idx1, $idx2 - $idx1);
            $image = $url_1 . $url_2;
            $image = manhwaclan_image_url_filter($image);
            array_push( $images_url, substr($image, 0, strpos($image, '?')) );
        }
    }
    if(count($images_url) == 0)
    {
        require_once (dirname(__FILE__) . "/res/simple_html_dom.php"); 
        $html = manhwaclan_str_get_html( $page_html );
        if( empty( $html ) ){
            manhwaclan_log_to_file( "Cannot get chapter images from $url");
            return false;
        }
        $pages = $html->find('#top_bar select.m > option');

        if( empty( $pages ) && !isset( $pages[ count( $pages ) - 2 ] ) ){
            manhwaclan_log_to_file( "Cannot get chapter total pages " . $pages->plaintext,);
            return false;
        }
        $total_pages = $pages[ count( $pages ) - 2 ]->plaintext;
        $page_url = str_replace( '1.html', '', $url );
        $page_url = str_replace( '1.htm', '', $page_url );
        $page_url = manhwaclan_manga_url_filter( $page_url );
        $images_url = array();
        for( $i = 1; $i <= $total_pages; $i++ ){
            $image = manhwaclan_get_page_images( "{$page_url}{$i}.html" );
            if( empty( $image ) ){
                manhwaclan_log_to_file( "Cannot get page image {$page_url}{$i}.html" );
                return false;
            }
            $images_url = array_merge( $images_url, $image );
        }
    }
    return $images_url;
}
function manhwaclan_get_page_images( $page_url ){
				
    require_once (dirname(__FILE__) . "/res/simple_html_dom.php"); 
    $page_html = manhwaclan_get_web_page($page_url);
    $html = manhwaclan_str_get_html( $page_html );

    if( empty( $html ) ){
        manhwaclan_log_to_file("Cannot get page images from " . $page_url);
        return false;
    }

    $images = $html->find( '#viewer .read_img a > img' );
    
    if( empty( $images ) ){
        return false;
    }

    $images_url = array();

    foreach( $images as $image ){
        $images_url[] = $image->src;
    }

    return $images_url;

}
function manhwaclan_fetch_single_chapter( $manhwaclan_chapter_images, $volume_id, $post_id, $itemx, $storage = 'local', $manga_name = '')
{
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    global $wp_manga, $wp_manga_storage;
    $timestamp = time();
    if($wp_manga == null)
    {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('wp_manga global variable not found');
        }
        return false;
    }
    if($wp_manga_storage == null)
    {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('wp_manga_storage global variable not found');
        }
        return false;
    }
    $uniqid = $wp_manga->get_uniqid( $post_id );
    $clearstring = filter_var($itemx['title'] . md5($itemx['title']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $slugified_name = $wp_manga_storage->slugify( $clearstring );
    $slugified_name = sanitize_title($slugified_name);
    global $wp_manga_chapter;
    $chapter_2 = $wp_manga_chapter->get_chapter_by_slug( $post_id, $slugified_name );
    if($chapter_2 && $chapter_2['volume_id'] == $volume_id && $chapter_2['chapter_slug'] == $slugified_name){
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('Chapter already existing: ' . $chapter_2['chapter_name']);
        }
        return true;
    }
    
    $extract = WP_MANGA_DATA_DIR . $uniqid . '/' . $slugified_name;
    $extract_uri = WP_MANGA_DATA_URL;
    global $wp_filesystem;
    if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
        include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
       wp_filesystem($creds);
    }
    if (!$wp_filesystem->exists( $extract ) ){
        if( ! wp_mkdir_p( $extract ) ){
            manhwaclan_log_to_file("Cannot make dir $extract");
        }
    }
    if(count($manhwaclan_chapter_images) == 0)
    {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('No images found for: ' . $itemx['title']);
        }
        return true;
    }
    $has_image = '';
    $existing_images = get_post_meta($post_id, 'manhwaclan_' . $slugified_name . '_cnt', true);
    if(!$existing_images)
    {
        $existing_images = 0;
    }
    $index = 1;
    foreach( $manhwaclan_chapter_images as $image )
    {
        if($index > $existing_images){
            $data = manhwaclan_get_web_page( $image );
            if( $data === false ){
                manhwaclan_log_to_file("Cannot get single chapter from " . $image);            
                continue;
            }
            $pathinfo = pathinfo( $image );
            $file_name = manhwaclan_url_file_name_filter( $pathinfo['basename'] );
            $resp = $wp_filesystem->put_contents( "{$extract}/{$file_name}", $data );
            if( $resp && empty( $has_image ) )
            {
                $has_image = '1';
            }
        }
        $index++;
    }
    if( empty( $has_image ) ){
        $wp_filesystem->copy( dirname(__FILE__) . "/images/image-placeholder.jpg", "{$extract}/image-placeholder.jpg" );
    }
    $ch_name = str_replace($manga_name, '', $itemx['title']);
    $ch_name = trim(trim($ch_name, '- '));
    $ch_name = trim($ch_name);
    $chapter_args = array(
        'post_id'             => $post_id,
        'volume_id'           => $volume_id,
        'chapter_name'        => $ch_name,
        'chapter_name_extend' => '',
        'chapter_slug'        => $slugified_name,
    );
    $chapter_2 = $wp_manga_chapter->get_chapter_by_slug( $post_id, $slugified_name );
    if($chapter_2 && $chapter_2['volume_id'] == $volume_id && $chapter_2['chapter_slug'] == $slugified_name){
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('Chapter found to be already published: ' . $itemx['title']);
        }
        return true;
    }
    if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
        manhwaclan_log_to_file('Uploading chapter: ' . $itemx['title']);
    }
    $result = $wp_manga_storage->wp_manga_upload_single_chapter( $chapter_args, $extract, $extract_uri, $storage );
    if($result == false || $result == null)
    {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('wp_manga_upload_single_chapter failed, details: extract: ' . $extract . ' -- extract_uri: ' . $extract_uri . ' -- storage: ' . $storage . ' -- chapter_args: ' . print_r($chapter_args, true));
        }
    }
    return $result; 
}
function manhwaclan_url_file_name_filter( $name ){
    $name = explode('?', $name);
    return $name[0];
}
function manhwaclan_my_user_by_rand( $ua ) {
  remove_action('pre_user_query', 'manhwaclan_my_user_by_rand');
  $ua->query_orderby = str_replace( 'user_login ASC', 'RAND()', $ua->query_orderby );
}
function manhwaclan_get_upload_cloud_list($upload_cloud_file){
    global $wp_filesystem;
    if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
        include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
       wp_filesystem($creds);
    }
    if ($wp_filesystem->exists( $upload_cloud_file ) ){
        $content = $wp_filesystem->get_contents( $upload_cloud_file );

        return json_decode( $content, true );
    }

    return [];

}

function manhwaclan_display_random_user(){
    add_action('pre_user_query', 'manhwaclan_my_user_by_rand');
    $args = array(
      'orderby' => 'user_login', 'order' => 'ASC', 'number' => 1, 'role__in' => array( 'contributor','author','editor','administrator','super-admin' )
    );
    $user_query = new WP_User_Query( $args );
    $user_query->query();
    $results = $user_query->results;
    if(empty($results))
    {
        return false;
    }
    shuffle($results);
    return array_pop($results);
  }
function manhwaclan_put_upload_cloud_list( $item, $upload_cloud_file ){

    $list = manhwaclan_get_upload_cloud_list($upload_cloud_file);
    
    if( ! isset( $list[ $item['id'] ] ) )
    {
        global $wp_filesystem;
        if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
            include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
            wp_filesystem($creds);
        }
        $list[ $item['id'] ] = $item;
        $wp_filesystem->put_contents( $upload_cloud_file, json_encode( $list, JSON_PRETTY_PRINT ) );
    }

    return true;
}

function manhwaclan_randomName() {
    $firstname = array(
        'Johnathon',
        'Anthony',
        'Erasmo',
        'Raleigh',
        'Nancie',
        'Tama',
        'Camellia',
        'Augustine',
        'Christeen',
        'Luz',
        'Diego',
        'Lyndia',
        'Thomas',
        'Georgianna',
        'Leigha',
        'Alejandro',
        'Marquis',
        'Joan',
        'Stephania',
        'Elroy',
        'Zonia',
        'Buffy',
        'Sharie',
        'Blythe',
        'Gaylene',
        'Elida',
        'Randy',
        'Margarete',
        'Margarett',
        'Dion',
        'Tomi',
        'Arden',
        'Clora',
        'Laine',
        'Becki',
        'Margherita',
        'Bong',
        'Jeanice',
        'Qiana',
        'Lawanda',
        'Rebecka',
        'Maribel',
        'Tami',
        'Yuri',
        'Michele',
        'Rubi',
        'Larisa',
        'Lloyd',
        'Tyisha',
        'Samatha',
    );

    $lastname = array(
        'Mischke',
        'Serna',
        'Pingree',
        'Mcnaught',
        'Pepper',
        'Schildgen',
        'Mongold',
        'Wrona',
        'Geddes',
        'Lanz',
        'Fetzer',
        'Schroeder',
        'Block',
        'Mayoral',
        'Fleishman',
        'Roberie',
        'Latson',
        'Lupo',
        'Motsinger',
        'Drews',
        'Coby',
        'Redner',
        'Culton',
        'Howe',
        'Stoval',
        'Michaud',
        'Mote',
        'Menjivar',
        'Wiers',
        'Paris',
        'Grisby',
        'Noren',
        'Damron',
        'Kazmierczak',
        'Haslett',
        'Guillemette',
        'Buresh',
        'Center',
        'Kucera',
        'Catt',
        'Badon',
        'Grumbles',
        'Antes',
        'Byron',
        'Volkman',
        'Klemp',
        'Pekar',
        'Pecora',
        'Schewe',
        'Ramage',
    );

    $name = $firstname[rand ( 0 , count($firstname) -1)];
    $name .= ' ';
    $name .= $lastname[rand ( 0 , count($lastname) -1)];

    return $name;
}
function manhwaclan_run_rule($param, $type, $auto = 1, $rerun_count = 0)
{
    global $wp_filesystem;
    if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
        include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
        wp_filesystem($creds);
    }
    $theme = wp_get_theme();
    if ( 'Madara' != $theme->name && 'Madara' != $theme->parent_theme ) {
        manhwaclan_log_to_file('This plugin requires the Madara theme to work! Please install it from here: https://mangabooth.com/product/wp-manga-theme-madara/');
        if($auto == 1)
        {
            manhwaclan_clearFromList($param, $type);
        }
        return 'fail';
    }
    if( ! class_exists('WP_MANGA_STORAGE') ) {
        manhwaclan_log_to_file('Madara Core Plugin is missing! Please install it from here: https://mangabooth.com/product/wp-manga-theme-madara/');
        if($auto == 1)
        {
            manhwaclan_clearFromList($param, $type);
        }
        return 'fail';
    }
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    global $wp_embed;
    global $wp_manga;
    global $wp_manga_storage;
    global $wp_manga_chapter;
    global $wp_manga_volume;
    if($rerun_count == 0)
    {
        $f = fopen(get_temp_dir() . 'manhwaclan_' . $type . '_' . $param, 'w');
        if($f !== false)
        {
            $flock_disabled = explode(',', ini_get('disable_functions'));
            if(!in_array('flock', $flock_disabled))
            {
                if (!flock($f, LOCK_EX | LOCK_NB)) {
                    return 'nochange';
                }
            }
        }
        $GLOBALS['wp_object_cache']->delete('manhwaclan_running_list', 'options');
        if (!get_option('manhwaclan_running_list')) {
            $running = array();
        } else {
            $running = get_option('manhwaclan_running_list');
        }
        if (!empty($running)) {
            if (in_array(array(
                $param => $type
            ), $running))
            {
                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                    manhwaclan_log_to_file('Only one instance of this rule is allowed. Rule is already running!');
                }
                return 'nochange';
            }
        }
        $running[] = array(
            $param => $type
        );
        update_option('manhwaclan_running_list', $running, false);
        register_shutdown_function('manhwaclan_clear_flag_at_shutdown', $param, $type);
        if (isset($manhwaclan_Main_Settings['rule_timeout']) && $manhwaclan_Main_Settings['rule_timeout'] != '') {
            $timeout = intval($manhwaclan_Main_Settings['rule_timeout']);
        } else {
            $timeout = 3600;
        }
        ini_set('safe_mode', 'Off');
        ini_set('max_execution_time', $timeout);
        ini_set('ignore_user_abort', 1);
        if(function_exists('ignore_user_abort'))
{
    ignore_user_abort(true);
}
        if(function_exists('set_time_limit'))
{
    set_time_limit($timeout);
}
    }
    else
    {
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('Retrying to run rule, retry count: ' . $rerun_count);
        }
    }
    $manhwaclan_imported_chapters = 0;
    if (isset($manhwaclan_Main_Settings['manhwaclan_enabled']) && $manhwaclan_Main_Settings['manhwaclan_enabled'] == 'on') {
        try {
            $item_img         = '';
            $cont             = 0;
            $found            = 0;
            $schedule         = '';
            $max              = PHP_INT_MAX;
            $active           = '0';
            $last_run         = '';
            $first            = false;
            $others           = array();
            $list_item        = '';
            $default_category = '';
            $extra_categories = '';
            $posted_items    = array();
            $post_status     = 'publish';
            $accept_comments = 'closed';
            $post_user_name  = 1;
            $can_create_cat  = 'off';
            $item_create_tag = '';
            $can_create_tag  = 'disabled';
            $item_tags       = '';
            $auto_categories = 'disabled';
            $get_img         = '';
            $img_found       = false;
            $post_array      = array();
            $use_phantom     = '';
            $source_site     = 'fanfox.net';
            $manga_name      = '';
            $reverse_chapters= '';
            $result_type     = '';
            $manga_author    = '';
            $manga_artist    = '';
            $manga_genres    = '';
            $manga_exgenres  = '';
            $manga_year_after = '';
            $manga_year_before= '';
            $manga_min_rating = '';
            $manga_completed  = '';
            $manga_sorting    = '';
            $manga_direction  = '';
            $max_manga        = '';
            $continue_search  = '';
            $chapter_warning  = '';
            $enable_pingback  = '';
            $enable_comments  = '';
            $rule_translate   = '';
            $no_translate_title='';
            $get_date         = '';
            $is_url_search    = true;
            if($type == 0)
            {
                return 'fail';
            }
            elseif($type == 1)
            {
                $GLOBALS['wp_object_cache']->delete('manhwaclan_text_list', 'options');
                if (!get_option('manhwaclan_text_list')) {
                    $rules = array();
                } else {
                    $rules = get_option('manhwaclan_text_list');
                }
                if (!empty($rules)) {
                    foreach ($rules as $request => $bundle[]) {
                        if ($cont == $param) {
                            $bundle_values    = array_values($bundle);
                            $myValues         = $bundle_values[$cont];
                            $array_my_values  = array_values($myValues);for($iji=0;$iji<count($array_my_values);++$iji){if(is_string($array_my_values[$iji])){$array_my_values[$iji]=stripslashes($array_my_values[$iji]);}}
                            $manga_name       = isset($array_my_values[0]) ? $array_my_values[0] : '';
                            $schedule         = isset($array_my_values[1]) ? $array_my_values[1] : '';
                            $active           = isset($array_my_values[2]) ? $array_my_values[2] : '';
                            $last_run         = isset($array_my_values[3]) ? $array_my_values[3] : '';
                            $max              = isset($array_my_values[4]) ? $array_my_values[4] : '';
                            $post_status      = isset($array_my_values[5]) ? $array_my_values[5] : '';
                            $post_user_name   = isset($array_my_values[6]) ? $array_my_values[6] : '';
                            //unused
                            $item_create_tag  = isset($array_my_values[7]) ? $array_my_values[7] : '';
                            //unused
                            $default_category = isset($array_my_values[8]) ? $array_my_values[8] : '';
                            $auto_categories  = isset($array_my_values[9]) ? $array_my_values[9] : '';
                            $can_create_tag   = isset($array_my_values[10]) ? $array_my_values[10] : '';
                            $use_phantom      = isset($array_my_values[11]) ? $array_my_values[11] : '';
                            $max_manga        = isset($array_my_values[12]) ? $array_my_values[12] : '';
                            $chapter_warning  = isset($array_my_values[13]) ? $array_my_values[13] : '';
                            $enable_comments  = isset($array_my_values[14]) ? $array_my_values[14] : '';
                            $enable_pingback  = isset($array_my_values[15]) ? $array_my_values[15] : '';
                            $get_date         = isset($array_my_values[16]) ? $array_my_values[16] : '';
                            $rule_translate   = isset($array_my_values[17]) ? $array_my_values[17] : '';
                            $no_translate_title= isset($array_my_values[18]) ? $array_my_values[18] : '';
                            $found            = 1;
                            break;
                        }
                        $cont = $cont + 1;
                    }
                } else {
                    manhwaclan_log_to_file('No rules found for manhwaclan_text_list!');
                    if($auto == 1)
                    {
                        manhwaclan_clearFromList($param, $type);
                    }
                    return 'fail';
                }
                if ($found == 0) {
                    manhwaclan_log_to_file($param . ' not found in manhwaclan_text_list!');
                    if($auto == 1)
                    {
                        manhwaclan_clearFromList($param, $type);
                    }
                    return 'fail';
                } else {
                    if($rerun_count == 0)
                    {
                        $GLOBALS['wp_object_cache']->delete('manhwaclan_text_list', 'options');
                        $rules = get_option('manhwaclan_text_list');
                        $rules[$param][3] = manhwaclan_get_date_now();
                        update_option('manhwaclan_text_list', $rules, false);
                    }
                }
            }
            else
            {
                manhwaclan_log_to_file('Unrecognized rule type: ' . $type);
                if($auto == 1)
                {
                    manhwaclan_clearFromList($param, $type);
                }
                return 'fail';
            }
            if (isset($manhwaclan_Main_Settings['manga_storage']) && $manhwaclan_Main_Settings['manga_storage'] != '') {
                $storage = $manhwaclan_Main_Settings['manga_storage'];
            }
            else
            {
                $storage = 'local';
            }
            if($type == 0)
            {
                return 'fail';
            }
            elseif($type == 1)
            {
                if(trim($max_manga) != '')
                {
                    $get_max_manga = intval(trim($max_manga));
                }
                else
                {
                    $get_max_manga = 999;
                }
                $items = array();
                $page_increased = false;
                {
                    $manga_arr = array();
                    try
                    {
                        global $wp_filesystem;
                        if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ){
                            include_once(ABSPATH . 'wp-admin/includes/file.php');$creds = request_filesystem_credentials( site_url() );
                            wp_filesystem($creds);
                        }
                        $prefixh = 'http://manhwaclan.com/manga/';
                        $wprefixh = 'http://www.manhwaclan.com/manga/';
                        $prefixs = 'https://manhwaclan.com/manga/';
                        $wprefixs = 'https://www.manhwaclan.com/manga/';
                        $manga_names = explode(',', $manga_name);
                        $manga_names = array_map('trim', $manga_names);
                        foreach($manga_names as $mngn)
                        {
                            if (substr($mngn, 0, strlen($prefixs)) == $prefixs) {
                                $manga_arr[] = $mngn;
                            }
                            elseif (substr($mngn, 0, strlen($prefixh)) == $prefixh) {
                                $manga_arr[] = $mngn;
                            }
                            elseif (substr($mngn, 0, strlen($wprefixh)) == $wprefixh) {
                                $manga_arr[] = $mngn;
                            }
                            elseif (substr($mngn, 0, strlen($wprefixs)) == $wprefixs) {
                                $manga_arr[] = $mngn;
                            }
                            else
                            {
                                if($wp_filesystem->exists(dirname(__FILE__) . "/sitemap.txt"))
                                {
                                    $handle = fopen(dirname(__FILE__) . "/sitemap.txt", "r");
                                    if ($handle)
                                    {
                                        while (!feof($handle))
                                        {
                                            $buffer = fgets($handle);
                                            if($buffer !== false)
                                            {
                                                if($mngn == '*')
                                                {
                                                    $manga_arr['a' . rand()] = 'https://manhwaclan.com/manga/' . trim($buffer) . '/';
                                                }
                                                else
                                                {
                                                    $xbuffer = str_replace('-', ' ', $buffer);
                                                    $mngnwords = explode(' ', $mngn);
                                                    $xbuffer_arr = explode(' ', $xbuffer);
                                                    foreach($mngnwords as $mangx)
                                                    {
                                                        $mangx = trim($mangx);
                                                        $xfound = false;
                                                        foreach($xbuffer_arr as $xbf)
                                                        {
                                                            $xbf = trim($xbf);
                                                            if($xbf == $mangx)
                                                            {
                                                                $xfound = true;
                                                            }
                                                        }
                                                        if($xfound == true)
                                                        {
                                                            $manga_arr['a' . rand()] = 'https://manhwaclan.com/manga/' . trim($buffer) . '/';
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        fclose($handle);
                                    }
                                }
                                else
                                {
                                    manhwaclan_log_to_file('Only URLs from https://manhwaclan.com/manga/ are allowed, because sitemap file failed to be opened, skipping: ' . $mngn);
                                    continue;
                                }
                            }
                        }
                        if(count($manga_arr) == 0)
                        {
                            manhwaclan_log_to_file('No Manga matched your query: ' . $manga_name);
                            return 'nochange';
                        }
                        $scraped_manga = 0;
                        $user_name_type = $post_user_name;
                        foreach($manga_arr as $ind => $current_manga)
                        {
                            $first_chapter = '';
                            $html_site = false;
                            if($get_max_manga <= $scraped_manga)
                            {
                                break;
                            }
                            if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                manhwaclan_log_to_file('Starting scraping for: (' . $ind . ') ' . $current_manga);
                            }
                            $is_url_search = true;
                            {
                                $html_site = manhwaclan_get_web_page($current_manga, manhwaclan_get_random_user_agent(), $use_phantom);
                                if($html_site == false)
                                {
                                    manhwaclan_log_to_file('Failed to download manga pages: ' . $html_site);
                                    usleep(rand(500000, 1000000));
                                    continue;
                                }
                                else
                                {
                                    preg_match_all('#<li class="wp-manga-chapter(?:\s*?)">(?:\s|\n)*<a href="([^"]*?)">#i', $html_site, $azurli);
                                    if(isset($azurli[1][0]))
                                    {
                                        $current_manga = end($azurli[1]);
                                        $first_chapter = $current_manga;
                                    }
                                    else
                                    {
                                        $is_url_search = false;
                                        $possible = array('chapter-1', 'chapter-0');
                                        $foundit = false;
                                        foreach($possible as $pp)
                                        {
                                            $try_me = $current_manga . $pp;
                                            $html_site = manhwaclan_get_web_page($try_me, manhwaclan_get_random_user_agent(), $use_phantom);
                                            if($html_site == false)
                                            {
                                                manhwaclan_log_to_file('Failed to download guessing pages: ' . $html_site);
                                                usleep(rand(500000, 1000000));
                                                continue;
                                            }
                                            preg_match_all('#<a\s*href="([^"]*?)"\s*class="btn next_page"#i', $html_site, $xzurli);
                                            if(isset($xzurli[1][0]))
                                            {
                                                $current_manga = $try_me;
                                                $foundit = true;
                                                usleep(rand(500000, 1000000));
                                                break;
                                            }
                                            preg_match_all('#<img id="(?:[^"]*?)" src="([^"]*?)" class="wp-manga-chapter-img#i', $html_site, $zurli);
                                            if(isset($zurli[1][0]))
                                            {
                                                $current_manga = $try_me;
                                                $foundit = true;
                                                usleep(rand(500000, 1000000));
                                                break;
                                            }
                                            usleep(rand(500000, 1000000));
                                        }
                                        if($foundit == false)
                                        {
                                            manhwaclan_log_to_file('Failed to find first chapter URL for : ' . $current_manga);
                                            continue;
                                        }
                                    }
                                }
                            }
                            $latest_chapter = $current_manga;
                            preg_match_all('#https:\/\/manhwaclan\.com\/manga\/([^/]*?)\/#i', $current_manga, $mathce);
                            if(isset($mathce[1][0]))
                            {
                                $current_manga = 'https://manhwaclan.com/manga/' . $mathce[1][0] . '/';
                            }
                            if($html_site === false)
                            {
                                $html_site = manhwaclan_get_web_page($current_manga, manhwaclan_get_random_user_agent(), $use_phantom);
                                if($html_site == false)
                                {
                                    manhwaclan_log_to_file('Failed to download manga chapter: ' . $current_manga);
                                    continue;
                                }
                            }
                            require_once (dirname(__FILE__) . "/res/simple_html_dom.php"); 
                            $html = manhwaclan_str_get_html( $html_site );
                            $tag = $html->find( '.profile-manga .post-title h1', 0 );
                            $name_str = '';
                            $my_slug = '';
                            $my_slug = str_replace( 'http://', '', $current_manga );
                            $my_slug = str_replace( 'https://', '', $my_slug );
                            $my_slug = str_replace( 'http:', '', $my_slug );
                            $my_slug = str_replace( 'manhwaclan.com/manga/', '', $my_slug );
                            $my_slug = str_replace( '/', '', $my_slug );
                            $my_slug = str_replace( '.html', '', $my_slug );
                            $my_slug = str_replace( '.htm', '', $my_slug );
                            if($tag){
                                $name_str = trim($tag->plaintext);
                                $span = $tag->find('span', 0);
                                if($span){
                                    $name_str = trim(str_replace($span->plaintext,'', $name_str));
                                }
                            }
                            if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                manhwaclan_log_to_file('Processing manga: ' . $name_str);
                            }
                            $find_post = new WP_Query( array(
                                'title'     => $name_str,
                                'post_type' => 'wp-manga',
                            ) );
                            $existing_post_id = false;
                            if( $find_post->have_posts() )
                            {
                                $existing_post_id = $find_post->posts[0]->ID;
                            }
                            if($existing_post_id == false)
                            {
                                $args = array(
                                    'post_type'  => 'wp-manga',
                                    'meta_key'   => '_manga_import_slug',
                                    'meta_value' => $my_slug,
                                    'post_status' => array('publish','draft','pending','trash','private','future')
                                );
                                $query = new WP_Query( $args );
                                if( $query->have_posts() ){
                                    $existing_post_id = $query->posts[0]->ID;
                                }
                            }
                            if($existing_post_id == false)
                            {
                                $block_warning = $html->find('#page .warning', 0);
                                if( !empty( $block_warning ) && strpos( $block_warning->plaintext, 'has been licensed, it is not available' ) !== false ){
                                    manhwaclan_log_to_file('Request blocked, please use a proxy!');
                                    continue;
                                }
                                $desc = $html->find( '.description-summary' );
                                $desc = !empty( $desc ) ? trim($desc[0]->plaintext) : '';
                                $desc = str_replace('manhwaclan.com', '',$desc);
                                $thumb = '';
                                preg_match_all('#<meta\s*property="og:image"\s*content="([^"]*?)"\s*\/?>#i', $html_site, $imatch);
                                if(isset($imatch[1][0]))
                                {
                                    $thumb = trim($imatch[1][0]);
                                }
                                $status = 'ongoing';
                                preg_match_all('#Status(?:[\n\s]*?)<\/h5>(?:[\n\s]*?)<\/div>(?:[\n\s]*?)<div class="summary-content">(?:[\n\s]*?)([^<\s]*?)(?:[\n\s]*?)<\/div>#i', $html_site, $smatch);
                                if(isset($smatch[1][0]))
                                {
                                    $status = trim($smatch[1][0]);
                                }
                                if(stristr($status, 'ongoing') !== false)
                                {
                                    $status = 'on-going';
                                }
                                elseif(stristr($status, 'completed') !== false)
                                {
                                    $status = 'end';
                                }
                                elseif(stristr($status, 'canceled') !== false)
                                {
                                    $status = 'canceled';
                                }
                                elseif(stristr($status, 'on hold') !== false)
                                {
                                    $status = 'on-hold';
                                }
                                elseif(stristr($status, 'upcoming') !== false)
                                {
                                    $status = 'upcoming';
                                }
                                $alter_name = '';
                                preg_match_all('#Alternative(?:[\n\s]*?)<\/h5>(?:[\n\s]*?)<\/div>(?:[\n\s]*?)<div class="summary-content">(?:[\n\s]*?)([\s\S]*?)(?:[\n\s]*?)<\/div>#i', $html_site, $smatch);
                                if(isset($smatch[1][0]))
                                {
                                    $alter_name = trim($smatch[1][0]);
                                }
                                $data = $html->find( '.summary_content .post-content .post-content_item' );
                                $xtype = '';
                                if( !empty( $data ) ){
                                    foreach($data as $item){
                                        if(trim($item->find('.summary-heading h5',0)->plaintext) == 'Type'){
                                            $xtype = $item->find('.summary-content', 0)->plaintext;
                                            if(trim($xtype) == 'Updating')
                                            {
                                                $xtype = '';
                                            }
                                        }
                                    }
                                }
                                $xrelease = '2021';
                                preg_match_all('#<a href="https:\/\/manhwaclan\.com\/manga-release\/(?:[^"]*?)" rel="tag">([^<]+?)<\/a>#i', $html_site, $xmathc);
                                if(isset($xmathc[1][0]))
                                {
                                    $xrelease = trim($xmathc[1][0]);
                                }
                                $xauthor = '';
                                $author = '';
                                $data = $html->find( '.author-content a' );
                                if( !empty( $data ) ){
                                    $authors = array();
                                    foreach($data as $arxthor)
                                    {
                                        array_push($authors, $arxthor->plaintext);
                                        if($author == '')
                                        {
                                            $author = $arxthor->plaintext;
                                        }
                                    }
                                    $xauthor = implode(',', $authors);
                                }

                                $xartists = '';
                                $data = $html->find( '.artist-content a' );
                                if( !empty( $data ) ){
                                    $artists = array();
                                    foreach($data as $artist){
                                        array_push($artists, $artist->plaintext);
                                    }
                                    $xartists = implode(',', $artists);
                                }
                                $xgenres = '';
                                $data = $html->find( '.genres-content a' );
                                if( !empty( $data ) ){
                                    $genres = array();
                                    foreach($data as $genre){
                                        array_push($genres, $genre->plaintext);
                                    }
                                    $xgenres = implode(',', $genres);
                                }
                                $items = $html->find('.summary_content .post-content .post-content_item');
                                $views = '';
                                foreach($items as $item){
                                    if(trim($item->find('.summary-heading', 0)->plaintext) == 'Rank'){
                                        $str = $item->find('.summary-content',0)->plaintext;
                                        preg_match_all('~\d+(?:\.\d+)?~', $str, $matches);
                                        if($matches){
                                            if(count($matches) == 3){
                                                $views = $matches[0][1];
                                            } else {
                                                $views = $matches[0][0];
                                            }
                                            if(strpos($str, 'K monthly views') !== false){
                                                $views = floatval($views) * 1000;
                                            }
                                            if(strpos($str, 'M monthly views') !== false){
                                                $views = floatval($views) * 1000000;
                                            }
                                            break;
                                        }
                                    }
                                }
                                $average_vote = $html->find('.post-total-rating .total_votes', 0);
                                $str = $html->find('.vote-details',0);
                                $xrating = array();
                                preg_match_all('!\d+!', $str, $matches);
                                $number_votes = 1;
                                if($matches && count($matches[0]) == 3)
                                {
                                    $number_votes = $matches[0][2];
                                }
                                if( !empty( $average_vote ) && $average_vote->plaintext > 0 ){
                                    $xrating = array(
                                        'avg'     => $average_vote->plaintext,
                                        'numbers' => $number_votes
                                    );
                                }
                                $xtags = '';
                                $data = $html->find( '.wp-manga-tags-list a' );
                                if( !empty( $data ) ){
                                    $tags = array();
                                    foreach($data as $tag){
                                        array_push($tags, trim($tag->plaintext));
                                    }
                                    $xtags = implode(',', $tags);
                                }
                                if($auto_categories == 'disabled')
                                {
                                    $xgenres = '';
                                }
                                if($can_create_tag == 'disabled')
                                {
                                    $xtags = '';
                                }
                                $xtime_year = '';
                                $time_year = strtotime($xrelease);
                                if($time_year !== false)
                                {
                                    $time_year = date("Y", $time_year);
                                    if($time_year !== false)
                                    {
                                        $xtime_year = $time_year;
                                    }
                                }
                                $post_args = array(
                                    'manga_import_slug' => $my_slug,
                                    'title'             => $name_str,
                                    'post_status'       => $post_status,
                                    'description'       => $desc,
                                    'thumb'             => $thumb,
                                    'status'            => $status,
                                    'altername'         => strip_tags( $alter_name ),
                                    'type'              => strip_tags( $xtype ),
                                    'release'           => $xtime_year,
                                    'authors'           => strip_tags( $xauthor ),
                                    'artists'           => strip_tags( $xartists ),
                                );
                                if(empty(trim($views)) || !is_numeric(strip_tags( $views  )))
                                {
                                    $viewsm = rand(100,500);
                                }
                                else
                                {
                                    $viewsm = strip_tags(trim($views));
                                }
                                $post_args['genres'] = strip_tags( $xgenres );
                                $post_args['views'] = $viewsm;
                                $post_args['ratings'] = $xrating;
                                $post_args['tags'] = strip_tags( $xtags );
                                $post_args['description'] = str_ireplace('manhwaclan.com', $_SERVER['HTTP_HOST'], $post_args['description']);
                                $arr = manhwaclan_spin_and_translate($post_args['title'], $post_args['description'], $rule_translate, 'en');
                                if($arr === false)
                                {
                                    if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                        manhwaclan_log_to_file('Skipping manga (because it failed to be translated): ' . print_r($post_args, true));
                                    }
                                }
                                if($no_translate_title != '1')
                                {
                                    $post_args['title']              = $arr[0];
                                }
                                $post_args['description']        = $arr[1];
                                $za_xpost_args = array(
                                    'post_title'   => !empty( $post_args['title'] ) ? $post_args['title'] : '',
                                    'post_content' => !empty( $post_args['description'] ) ? $post_args['description'] : '',
                                    'post_type'    => 'wp-manga',
                                    'post_status'  => isset( $post_args['post_status'] ) ? $post_args['post_status'] : 'pending',
                                );
                                $accept_comments = 'closed';
                                if ($enable_comments == '1') {
                                    $accept_comments = 'open';
                                }
                                $za_xpost_args['comment_status'] = $accept_comments;
                                if ($enable_pingback == '1') 
                                {
                                    $za_xpost_args['ping_status'] = 'open';
                                } 
                                else 
                                {
                                    $za_xpost_args['ping_status'] = 'closed';
                                }
                                if($get_date == '1')
                                {
                                    if(!empty($xrelease))
                                    {
                                        $postdatex = gmdate("Y-m-d H:i:s", strtotime($xrelease));
                                        $za_xpost_args['post_date_gmt'] = $postdatex;
                                    }
                                }
                                if($user_name_type == 'rand')
                                {
                                    $randid = manhwaclan_display_random_user();
                                    if($randid === false)
                                    {
                                        $za_xpost_args['post_author']               = manhwaclan_randomName();
                                    }
                                    else
                                    {
                                        $za_xpost_args['post_author']               = $randid->ID;
                                    }
                                }
                                elseif($user_name_type == 'feed-news')
                                {
                                    $sp_post_user_name = manhwaclan_randomName();
                                    if($author == '' || $author == '1' || $author == 'null')
                                    {
                                        $author = manhwaclan_randomName();
                                    }
                                    if($author != '')
                                    {
                                        $xauthor = sanitize_user( $author, true );
                                        $xauthor = apply_filters( 'pre_user_login', $xauthor );
                                        $xauthor = trim( $xauthor );
                                        if(username_exists( $xauthor ))
                                        {
                                            $user_id_t = get_user_by('login', $xauthor);
                                            if($user_id_t)
                                            {
                                                $sp_post_user_name = $user_id_t->ID;
                                            }
                                        }
                                        else
                                        {
                                            $palphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^*()-+=_?><,.;:}{][';
                                            $ppass = '';
                                            $alphaLength = strlen($palphabet) - 1;
                                            for ($ipass = 0; $ipass < 8; $ipass++) 
                                            {
                                                $npass = rand(0, $alphaLength);
                                                $ppass .= $palphabet[$npass];
                                            }
                                            $curr_id = wp_create_user($author, $ppass, manhwaclan_generate_random_email());
                                            if ( is_int($curr_id) )
                                            {
                                                $u = new WP_User($curr_id);
                                                $u->remove_role('subscriber');
                                                $u->add_role('author');
                                                $sp_post_user_name               = $curr_id;
                                            }
                                        }
                                    }
                                    $za_xpost_args['post_author']               = manhwaclan_utf8_encode($sp_post_user_name);
                                }
                                else
                                {
                                    $za_xpost_args['post_author']               = manhwaclan_utf8_encode($post_user_name);
                                }
                                
                                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                    manhwaclan_log_to_file('Inserting new manga: ' . $za_xpost_args['post_title']);
                                }
                                $existing_post_id = wp_insert_post( $za_xpost_args );
                                if( ! $existing_post_id && is_wp_error( $existing_post_id ) ){
                                    manhwaclan_log_to_file('Failed to insert manga into db: ' . $post_args['title']);
                                    continue;
                                }
                                add_post_meta($existing_post_id, 'manhwaclan_parent_rule', $type . '-' . $param);
                                wp_set_object_terms( $existing_post_id, 'manhwaclan_' . $type . '_' . $param, 'coderevolution_post_source', true);
                                
                                $thumb_id = manhwaclan_wp_mcl_e_upload_file( $post_args['thumb'], $existing_post_id );
                                $meta_data = array(
                                    '_manga_import_slug'     => $post_args['manga_import_slug'],
                                    '_thumbnail_id'          => $thumb_id,
                                    '_wp_manga_alternative'  => strip_tags( $alter_name ),
                                    '_wp_manga_type'         => strip_tags( $xtype ),
                                    '_wp_manga_status'       => $status,
                                    '_wp_manga_chapter_type' => 'manga',
                                    '_wp_manga_chapters_warning'=> $chapter_warning,
                                );
                                foreach( $meta_data as $key => $value ){
                                    if( !empty( $value ) ){
                                        update_post_meta( $existing_post_id, $key, $value );
                                    }
                                }
                                $manga_terms = array(
                                    'wp-manga-release'     => strip_tags( $xrelease ),
                                    'wp-manga-author'      => strip_tags( $xauthor ),
                                    'wp-manga-artist'      => strip_tags( $xartists ),
                                    'wp-manga-genre'       => strip_tags( $xgenres ),
                                    'wp-manga-tag'         => $post_args['tags'],
                                );
                                foreach( $manga_terms as $tax => $term ){
                                    $resp = manhwaclan_add_manga_terms( $existing_post_id, $term, $tax );
                                }
                                manhwaclan_update_post_views( $existing_post_id, $viewsm );
                                manhwaclan_update_post_ratings( $existing_post_id, $xrating );
                            }
                            if($is_url_search)
                            {
                                $skip_posts_temp = get_option('manhwaclan_continue_search', array());
                                if(isset($skip_posts_temp[$param]) && $skip_posts_temp[$param] != '')
                                {
                                    if(stristr($skip_posts_temp[$param], $current_manga) === false)
                                    {
                                        $skip_posts_temp[$param] = '';
                                        update_option('manhwaclan_continue_search', $skip_posts_temp);
                                        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                            manhwaclan_log_to_file('Manga URL changed: ' . $current_manga);
                                        }
                                    }
                                    else
                                    {
                                        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                            manhwaclan_log_to_file('Loading last scraped chapter from memory: ' . $skip_posts_temp[$param] . ' (replacing: ' . $latest_chapter . ')');
                                        }
                                        $latest_chapter = $skip_posts_temp[$param];
                                    }
                                }
                            }
                            $manhwaclan_max_chapters = $max;
                            $local_imported = 0;
                            $new_chap = false;
                            $cc = 1;
                            while(!empty($latest_chapter) && $latest_chapter != '#')
                            {
                                if($manhwaclan_max_chapters <= $local_imported)
                                {
                                    break;
                                }
                                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                    manhwaclan_log_to_file('Processing manga chapter: ' . $latest_chapter);
                                }
                                
                                $page_html = manhwaclan_get_web_page($latest_chapter, manhwaclan_get_random_user_agent(), $use_phantom);
                                if( $page_html == false ){
                                    manhwaclan_log_to_file('Failed to download HTML for chapter: ' . $latest_chapter);
                                    break;
                                }
                                preg_match_all('#<h1 id="chapter-heading">([^<]*?)<\/h1>#i', $page_html, $tmy);
                                if(!isset($tmy[1][0]))
                                {
                                    manhwaclan_log_to_file('Failed to detect title for chapter: ' . $latest_chapter);
                                    $cname = 'Current Chapter ' . $cc;
                                    $cc++;
                                    if($is_url_search)
                                    {
                                        $skip_posts_temp[$param] = '';
                                        update_option('manhwaclan_continue_search', $skip_posts_temp);
                                    }
                                }
                                else
                                {
                                    $cname = $tmy[1][0];
                                }
                                $slugified_name = $wp_manga_storage->slugify( $cname );
                                $chapter_2 = $wp_manga_chapter->get_chapter_by_slug( $existing_post_id, $slugified_name );
                                if($chapter_2 && strtolower($chapter_2['chapter_slug']) == strtolower($slugified_name))
                                {
                                    preg_match_all('#<a\s*href="([^"]*?)"\s*class="btn next_page"#i', $page_html, $zurli);
                                    if(isset($zurli[1][0]))
                                    {
                                        $latest_chapter = $zurli[1][0];
                                        if($is_url_search)
                                        {
                                            $skip_posts_temp[$param] = $latest_chapter;
                                            update_option('manhwaclan_continue_search', $skip_posts_temp);
                                        }
                                    }
                                    else
                                    {
                                        $latest_chapter = '';
                                    }
                                    manhwaclan_log_to_file('Chapter already published, skipping it: ' . $chapter_2['chapter_name']);
                                    continue;
                                }
                                $scans = array();
                                preg_match_all('#<img id="(?:[^"]*?)" src="([^"]*?)" class="wp-manga-chapter-img#i', $page_html, $zurli);
                                if(isset($zurli[1][0]))
                                {
                                    foreach($zurli[1] as $zuzu)
                                    {
                                        if(trim($zuzu) != '' && trim($zuzu) != '#')
                                        {
                                            $scans[] = trim($zuzu);
                                        }
                                    }
                                }
                                if($first_chapter == $latest_chapter)
                                {
                                    $ttx = get_post_meta( $existing_post_id, '_thumbnail_id');
                                    if (empty($ttx) && isset($scans[0])) 
                                    {
                                        $thumb_id = manhwaclan_wp_mcl_e_upload_file( $scans[0], $existing_post_id );
                                        if($thumb_id === false)
                                        {
                                            include_once( ABSPATH . 'wp-admin/includes/image.php' );
                                            $thcontent = manhwaclan_get_web_page($scans[0]);
                                            $pathinfo = pathinfo( $scans[0] );
                                            if( $thcontent != false ){
                                                $upload_dir = wp_upload_dir();
                                                $file_tmp_path = $upload_dir['basedir'] . '/' . $pathinfo['filename'] . '-' . $existing_post_id . '.' . explode('?',$pathinfo['extension'])[0];
                                                $file = $wp_filesystem->put_contents( $file_tmp_path, $thcontent );
                                                $wp_filetype = wp_check_filetype(basename($file_tmp_path), null );
                                                $attachment = array(
                                                    'post_mime_type' => $wp_filetype['type'],
                                                    'post_title' => $existing_post_id,
                                                    'post_content' => '',
                                                    'post_status' => 'inherit'
                                                );
                                                $attach_id = wp_insert_attachment( $attachment, $file_tmp_path );
                                                $thumb_id = $attach_id;
                                                $imagenew = get_post( $attach_id );
                                                $fullsizepath = get_attached_file( $imagenew->ID );
                                                $attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
                                                wp_update_attachment_metadata( $attach_id, $attach_data );
                                            }
                                        }
                                        if($thumb_id != false)
                                        {
                                            update_post_meta( $existing_post_id, '_thumbnail_id', $thumb_id );
                                        }
                                    }
                                }
                                $mng = array();
                                $mng['title'] = $cname;
                                $resp = manhwaclan_fetch_chapters( $scans, $existing_post_id, $mng, $storage, $name_str);
                                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                    manhwaclan_log_to_file('Response: ' . print_r($resp, true));
                                }
                                if( is_wp_error( $resp ) )
                                {
                                    manhwaclan_log_to_file('Failed to download chapter, wperror: ' . print_r($resp, true));
                                }
                                elseif( $resp === false || $resp === null)
                                {
                                    manhwaclan_log_to_file('Generic error when downloading chapters.');
                                }
                                elseif( trim($resp) === 'CloudFlare' && isset($manhwaclan_Main_Settings['enable_cloudflare']) && $manhwaclan_Main_Settings['enable_cloudflare'] == 'on')
                                {
                                    if($auto == 1 && $rerun_count <= 10)
                                    {
                                        sleep(5);
                                        $rerun_count++;
                                        manhwaclan_log_to_file('Rerunning scraping using CloudFlare protection ' . $param . ' - ' . $type . ' - ' . $auto . ' - ' . $rerun_count);
                                        $returnx = manhwaclan_run_rule($param, $type, $auto, $rerun_count);
                                        return $returnx;
                                    }
                                    return 'nochange';
                                }
                                elseif( trim($resp) == 'ok')
                                {
                                    if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) 
                                    {
                                        manhwaclan_log_to_file('Chapter imported OK: ' . $mng['title']);
                                    }
                                    $new_chap = true;
                                    $manhwaclan_imported_chapters++;
                                    $local_imported++;
                                }
                                elseif( $resp == true)
                                {
                                    manhwaclan_log_to_file('Chapter already existing, skipping it');
                                }
                                else
                                {
                                    manhwaclan_log_to_file('Invalid response from call: ' . print_r($resp, true));
                                }
                                if (isset($manhwaclan_Main_Settings['request_timeout']) && $manhwaclan_Main_Settings['request_timeout'] != '') 
                                {
                                    $timeout = intval($manhwaclan_Main_Settings['request_timeout']);
                                } 
                                else 
                                {
                                    $timeout = 1;
                                }
                                preg_match_all('#<a\s*href="([^"]*?)"\s*class="btn next_page"#i', $page_html, $zurli);
                                if(isset($zurli[1][0]))
                                {
                                    $latest_chapter = $zurli[1][0];
                                    if($is_url_search)
                                    {
                                        $skip_posts_temp[$param] = $latest_chapter;
                                        update_option('manhwaclan_continue_search', $skip_posts_temp);
                                    }
                                }
                                else
                                {
                                    $latest_chapter = '';
                                }
                                sleep($timeout);
                            }
                            if(empty($latest_chapter) || $latest_chapter == '')
                            {
                                $skip_posts_temp[$param] = '';
                                update_option('manhwaclan_continue_search', $skip_posts_temp);
                                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                    manhwaclan_log_to_file('Finished processing for: ' . $current_manga);
                                }
                            }
                            if($new_chap == true)
                            {
                                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                                    manhwaclan_log_to_file('Total manga chapters scraped: ' . $local_imported);
                                }
                                $scraped_manga++;
                            }                            
                        }
                    }
                    catch(Exception $e)
                    {
                        manhwaclan_log_to_file('Importing failed: ' . $e->getMessage());
                        if($auto == 1)
                        {
                            manhwaclan_clearFromList($param, $type);
                        }
                        return 'fail';
                    }
                }
            }
        }
        catch (Exception $e) {
            if($continue_search == '1')
            {
                if($is_url_search)
                {
                    $skip_posts_temp[$param][$type] = 1;
                    update_option('manhwaclan_continue_search', $skip_posts_temp);
                }
            }
            manhwaclan_log_to_file('Exception thrown ' . esc_html($e->getMessage()) . '!');
            if($auto == 1)
            {
                manhwaclan_clearFromList($param, $type);
            }
            return 'fail';
        }
        
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('Rule ID ' . esc_html($param) . ' succesfully run! ' . esc_html($manhwaclan_imported_chapters) . ' chapters created!');
        }
    }
    if($type == 0)
    {
        if ($manhwaclan_imported_chapters == 0) 
        {
            if($continue_search == '1')
            {
                if($is_url_search)
                {
                    if($page_increased == false)
                    {
                        if(trim($max_manga) != '')
                        {
                            if(isset($skip_posts_temp[$param][$type]))
                            {
                                $skip_posts_temp[$param][$type] += 1;
                            }
                            else
                            {
                                $skip_posts_temp[$param][$type] = 2;
                            }
                            update_option('manhwaclan_continue_search', $skip_posts_temp);
                        }
                        else
                        {
                            $skip_posts_temp[$param][$type] = 1;
                            update_option('manhwaclan_continue_search', $skip_posts_temp);
                        }
                    }
                }
            }
            if($auto == 1)
            {
                manhwaclan_clearFromList($param, $type);
            }
            return 'nochange';
        } 
        else 
        {
            if($auto == 1)
            {
                manhwaclan_clearFromList($param, $type);
            }
            return 'ok';
        }
    }
    else
    {
        if($auto == 1)
        {
            manhwaclan_clearFromList($param, $type);
        }
        if ($manhwaclan_imported_chapters == 0) 
        {
            return 'nochange';
        }
        else
        {
            return 'ok';
        }
    }
}

function manhwaclan_repairHTML($text)
{
    $text = htmlspecialchars_decode($text);
    $text = str_replace("< ", "<", $text);
    $text = str_replace(" >", ">", $text);
    $text = str_replace("= ", "=", $text);
    $text = str_replace(" =", "=", $text);
    $text = str_replace("\/ ", "\/", $text);
    $text = str_replace("</ iframe>", "</iframe>", $text);
    $text = str_replace("frameborder ", "frameborder=\"0\" allowfullscreen></iframe>", $text);
    $doc = new DOMDocument();
    $doc->substituteEntities = false;
    $internalErrors = libxml_use_internal_errors(true);
    $doc->loadHTML('<?xml encoding="utf-8" ?>' . $text);
    $text = $doc->saveHTML();
                    libxml_use_internal_errors($internalErrors);
	$text = preg_replace('#<!DOCTYPE html PUBLIC "-\/\/W3C\/\/DTD HTML 4\.0 Transitional\/\/EN" "http:\/\/www\.w3\.org\/TR\/REC-html40\/loose\.dtd">(?:[^<]*)<\?xml encoding="utf-8" \?><html><body>(?:<p>)?#i', '', $text);
	$text = str_replace('</p></body></html>', '', $text);
    $text = str_replace('</body></html></p>', '', $text);
    $text = str_replace('</body></html>', '', $text);
    return $text;
}
function manhwaclan_replaceExcludes($text, &$htmlfounds, &$pre_tags_matches, &$pre_tags_matches_s, &$conseqMatchs)
{
    preg_match_all ( '{<script.*?script>}s', $text, $script_matchs );
    $script_matchs = $script_matchs [0];
    preg_match_all ( '{<pre.*?/pre>}s', $text, $pre_matchs );
    $pre_matchs = $pre_matchs [0];
    preg_match_all ( '{<code.*?/code>}s', $text, $code_matchs );
    $code_matchs = $code_matchs [0];
    preg_match_all ( "/<[^<>]+>/is", $text, $matches, PREG_PATTERN_ORDER );
    $htmlfounds = array_filter ( array_unique ( $matches [0] ) );
    $htmlfounds = array_merge ( $script_matchs, $pre_matchs, $code_matchs, $htmlfounds );
    $htmlfounds [] = '&quot;';
    $imgFoundsSeparated = array ();
    $new_imgFoundsSeparated = array ();
    $altSeparator = '';
    $colonSeparator = '';
    foreach ( $htmlfounds as $key => $currentFound ) 
    {
        if (stristr ( $currentFound, '<img' ) && stristr ( $currentFound, 'alt' ) && ! stristr ( $currentFound, 'alt=""' )) 
        {
            $altSeparator = '';
            $colonSeparator = '';
            if (stristr ( $currentFound, 'alt="' )) {
                $altSeparator = 'alt="';
                $colonSeparator = '"';
            } elseif (stristr ( $currentFound, 'alt = "' )) {
                $altSeparator = 'alt = "';
                $colonSeparator = '"';
            } elseif (stristr ( $currentFound, 'alt ="' )) {
                $altSeparator = 'alt ="';
                $colonSeparator = '"';
            } elseif (stristr ( $currentFound, 'alt= "' )) {
                $altSeparator = 'alt= "';
                $colonSeparator = '"';
            } elseif (stristr ( $currentFound, 'alt=\'' )) {
                $altSeparator = 'alt=\'';
                $colonSeparator = '\'';
            } elseif (stristr ( $currentFound, 'alt = \'' )) {
                $altSeparator = 'alt = \'';
                $colonSeparator = '\'';
            } elseif (stristr ( $currentFound, 'alt= \'' )) {
                $altSeparator = 'alt= \'';
                $colonSeparator = '\'';
            } elseif (stristr ( $currentFound, 'alt =\'' )) {
                $altSeparator = 'alt =\'';
                $colonSeparator = '\'';
            }
            if (trim ( $altSeparator ) != '') 
            {
                $currentFoundParts = explode ( $altSeparator, $currentFound );
                $preAlt = $currentFoundParts [1];
                $preAltParts = explode ( $colonSeparator, $preAlt );
                $altText = $preAltParts [0];
                if (trim ( $altText ) != '') 
                {
                    unset ( $preAltParts [0] );
                    $past_alt_text = implode ( $colonSeparator, $preAltParts );
                    $imgFoundsSeparated [] = $currentFoundParts [0] . $altSeparator;
                    $imgFoundsSeparated [] = $colonSeparator . $past_alt_text;
                    $htmlfounds [$key] = '';
                }
            }
        }
    }
    $title_separator = str_replace ( 'alt', 'title', $altSeparator );
    if($title_separator == '')
    {
        $title_separator = 'title';
    }
    foreach ( $imgFoundsSeparated as $img_part ) 
    {
        if (stristr ( $img_part, ' title' )) 
        {
            $img_part_parts = explode ( $title_separator, $img_part );
            $pre_title_part = $img_part_parts [0] . $title_separator;
            $post_title_parts = explode ( $colonSeparator, $img_part_parts [1] );
            $found_title = $post_title_parts [0];
            unset ( $post_title_parts [0] );
            $past_title_text = implode ( $colonSeparator, $post_title_parts );
            $post_title_part = $colonSeparator . $past_title_text;
            $new_imgFoundsSeparated [] = $pre_title_part;
            $new_imgFoundsSeparated [] = $post_title_part;
        } else {
            $new_imgFoundsSeparated [] = $img_part;
        }
    }
    if (count ( $new_imgFoundsSeparated ) != 0) {
        $htmlfounds = array_merge ( $htmlfounds, $new_imgFoundsSeparated );
    }
    preg_match_all ( "/<\!--.*?-->/is", $text, $matches2, PREG_PATTERN_ORDER );
    $newhtmlfounds = $matches2 [0];
    preg_match_all ( "/\[.*?\]/is", $text, $matches3, PREG_PATTERN_ORDER );
    $shortcodesfounds = $matches3 [0];
    $htmlfounds = array_merge ( $htmlfounds, $newhtmlfounds, $shortcodesfounds );
    $in = 0;
    $cleanHtmlFounds = array ();
    foreach ( $htmlfounds as $htmlfound ) {
        
        if ($htmlfound == '[19459000]') {
        } elseif (trim ( $htmlfound ) == '') {
        } else {
            $cleanHtmlFounds [] = $htmlfound;
        }
    }
    $htmlfounds = array_filter ( $cleanHtmlFounds );
    $start = 19459001;
    foreach ( $htmlfounds as $htmlfound ) {
        $text = str_replace ( $htmlfound, '[' . $start . ']', $text );
        $start ++;
    }
    $text = str_replace ( '.{', '. {', $text );
    preg_match_all ( '!(?:\[1945\d*\][\s]*){2,}!s', $text, $conseqMatchs );
    $startConseq = 19659001;
    foreach ( $conseqMatchs [0] as $conseqMatch ) {
        $text = preg_replace ( '{' . preg_quote ( trim ( $conseqMatch ) ) . '}', '[' . $startConseq . ']', $text, 1 );
        $startConseq ++;
    }
    preg_match_all ( '{\[.*?\]}', $text, $pre_tags_matches );
    $pre_tags_matches = ($pre_tags_matches [0]);
    preg_match_all ( '{\s*\[.*?\]\s*}u', $text, $pre_tags_matches_s );
    $pre_tags_matches_s = ($pre_tags_matches_s [0]);
    $text = str_replace ( '[', "\n\n[", $text );
    $text = str_replace ( ']', "]\n\n", $text );
	return $text;	
}
function manhwaclan_restoreExcludes($translated, $htmlfounds, $pre_tags_matches, $pre_tags_matches_s, $conseqMatchs){
    $translated = preg_replace ( '{]\s*?1945}', '][1945', $translated );
    $translated = preg_replace ( '{ 19459(\d*?)]}', ' [19459$1]', $translated );
    $translated = str_replace ( '[ [1945', '[1945', $translated );
    $translated = str_replace ( '], ', ']', $translated );
    preg_match_all ( '{\[.*?\]}', $translated, $bracket_matchs );
    $bracket_matchs = $bracket_matchs [0];
    foreach ( $bracket_matchs as $single_bracket ) 
    {
        if (stristr ( $single_bracket, '1' ) && stristr ( $single_bracket, '9' )) {
            $single_bracket_clean = str_replace ( array (
                    ',',
                    ' ' 
            ), '', $single_bracket );
            $translated = str_replace ( $single_bracket, $single_bracket_clean, $translated );
        }
    }
    preg_match_all ( '{\[\d*?\]}', $translated, $post_tags_matches );
    $post_tags_matches = ($post_tags_matches [0]);
    if (count ( $pre_tags_matches ) == count ( $post_tags_matches )) 
    {
        if ($pre_tags_matches !== $post_tags_matches) 
        {
            $i = 0;
            foreach ( $post_tags_matches as $post_tags_match ) {
                $translated = preg_replace ( '{' . preg_quote ( trim ( $post_tags_match ) ) . '}', '[' . $i . ']', $translated, 1 );
                $i ++;
            }
            $i = 0;
            foreach ( $pre_tags_matches as $pre_tags_match ) {
                $translated = str_replace ( '[' . $i . ']', $pre_tags_match, $translated );
                $i ++;
            }
        }
    }
    $translated = str_replace ( "\n\n[", '[', $translated );
    $translated = str_replace ( "]\n\n", ']', $translated );
    $i = 0;
    foreach ( $pre_tags_matches_s as $pre_tags_match ) 
    {
        $pre_tags_match_h = htmlentities ( $pre_tags_match );
        if (stristr ( $pre_tags_match_h, '&nbsp;' )) {
            $pre_tags_match = str_replace ( '&nbsp;', ' ', $pre_tags_match_h );
        }
        $translated = preg_replace ( '{' . preg_quote ( trim ( $pre_tags_match ) ) . '}', "[$i]", $translated, 1 );
        $i ++;
    }
    $translated = preg_replace ( '{\s*\[}u', '[', $translated );
    $translated = preg_replace ( '{\]\s*}u', ']', $translated );
    $i = 0;
    foreach ( $pre_tags_matches_s as $pre_tags_match ) 
    {
        $pre_tags_match_h = htmlentities ( $pre_tags_match );
        if (stristr ( $pre_tags_match_h, '&nbsp;' )) {
            $pre_tags_match = str_replace ( '&nbsp;', ' ', $pre_tags_match_h );
        }
        $translated = preg_replace ( '{' . preg_quote ( "[$i]" ) . '}', $pre_tags_match, $translated, 1 );
        $i ++;
    }
    $startConseq = 19659001;
    foreach ( $conseqMatchs [0] as $conseqMatch ) {
        $translated = str_replace ( '[' . $startConseq . ']', $conseqMatch, $translated );
        $startConseq ++;
    }
    preg_match_all ( '!\[.*?\]!', $translated, $brackets );
    $brackets = $brackets [0];
    $brackets = array_unique ( $brackets );
    foreach ( $brackets as $bracket ) {
        if (stristr ( $bracket, '19' )) 
        {
            $corrrect_bracket = str_replace ( ' ', '', $bracket );
            $corrrect_bracket = str_replace ( '.', '', $corrrect_bracket );
            $corrrect_bracket = str_replace ( ',', '', $corrrect_bracket );
            $translated = str_replace ( $bracket, $corrrect_bracket, $translated );
        }
    }
    $start = 19459001;
    foreach ( $htmlfounds as $htmlfound ) {
        $translated = str_replace ( '[' . $start . ']', $htmlfound, $translated );
        $start ++;
    }
    return $translated;
}
function manhwaclan_spin_and_translate($post_title, $final_content, $rule_translate, $rule_translate_source)
{
    $translation = false;
    $pre_tags_matches = array();
    $pre_tags_matches_s = array();
    $conseqMatchs = array();
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    if($rule_translate != '' && $rule_translate != 'disabled')
    {
        if (isset($rule_translate_source) && $rule_translate_source != 'disabled' && $rule_translate_source != '') {
            $tr = $rule_translate_source;
        }
        else
        {
            $tr = 'auto';
        }
        $htmlfounds = array();
        $final_content = manhwaclan_replaceExcludes($final_content, $htmlfounds, $pre_tags_matches, $pre_tags_matches_s, $conseqMatchs);
        
        $translation = manhwaclan_translate($post_title, $final_content, $tr, $rule_translate);
        if (is_array($translation) && isset($translation[1]))
        {
            $translation[1] = preg_replace('#(?<=[\*(])\s+(?=[\*)])#', '', $translation[1]);
            $translation[1] = preg_replace('#([^(*\s]\s)\*+\)#', '$1', $translation[1]);
            $translation[1] = preg_replace('#\(\*+([\s][^)*\s])#', '$1', $translation[1]);
            $translation[1] = manhwaclan_restoreExcludes($translation[1], $htmlfounds, $pre_tags_matches, $pre_tags_matches_s, $conseqMatchs);
        }
        else
        {
            $final_content = manhwaclan_restoreExcludes($final_content, $htmlfounds, $pre_tags_matches, $pre_tags_matches_s, $conseqMatchs);
        }
        if ($translation !== FALSE) {
            if (is_array($translation) && isset($translation[0]) && isset($translation[1])) {
                $post_title    = $translation[0];
                $final_content = $translation[1];
                $final_content = str_replace('</ iframe>', '</iframe>', $final_content);
                if(stristr($final_content, '<head>') !== false)
                {
                    $d = new DOMDocument;
                    $mock = new DOMDocument;
                    $internalErrors = libxml_use_internal_errors(true);
                    $d->loadHTML('<?xml encoding="utf-8" ?>' . $final_content);
                    libxml_use_internal_errors($internalErrors);
                    $body = $d->getElementsByTagName('body')->item(0);
                    foreach ($body->childNodes as $child)
                    {
                        $mock->appendChild($mock->importNode($child, true));
                    }
                    $new_post_content_temp = $mock->saveHTML();
                    if($new_post_content_temp !== '' && $new_post_content_temp !== false)
                    {
						$new_post_content_temp = str_replace('<?xml encoding="utf-8" ?>', '', $new_post_content_temp);
                        $final_content = preg_replace("/_addload\(function\(\){([^<]*)/i", "", $new_post_content_temp); 
                    }
                }
                $final_content = manhwaclan_repairHTML($final_content);
                $final_content = str_replace('%20', '', $final_content);
                $final_content = str_replace('/V/', '/v/', $final_content);
                $final_content = str_replace('?Oh=', '?oh=', $final_content);
                $final_content = htmlspecialchars_decode($final_content);
                $final_content = str_replace('</ ', '</', $final_content);
                $final_content = str_replace(' />', '/>', $final_content);
                $final_content = str_replace('< br/>', '<br/>', $final_content);
                $final_content = str_replace('< / ', '</', $final_content);
                $final_content = str_replace(' / >', '/>', $final_content);
                $final_content = preg_replace('/[\x00-\x1F\x7F\xA0]/u', '', $final_content);
                $post_title = preg_replace('{&\s*#\s*(\d+)\s*;}', '&#$1;', $post_title);
                $post_title = htmlspecialchars_decode($post_title);
                $post_title = str_replace('</ ', '</', $post_title);
                $post_title = str_replace(' />', '/>', $post_title);
                $post_title = preg_replace('/[\x00-\x1F\x7F\xA0]/u', '', $post_title);
            } else {
                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                    manhwaclan_log_to_file('Translation failed - malformed data!');
                }
                return false;
            }
        } else {
            if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                manhwaclan_log_to_file('Translation Failed - returned false!');
            }
            return false;
        }
    }
    else
    {
        if (isset($manhwaclan_Main_Settings['translate']) && $manhwaclan_Main_Settings['translate'] != 'disabled') {
            if (isset($manhwaclan_Main_Settings['translate_source']) && $manhwaclan_Main_Settings['translate_source'] != 'disabled') {
                $tr = $manhwaclan_Main_Settings['translate_source'];
            }
            else
            {
                $tr = 'auto';
            }
            $htmlfounds = array();
            $final_content = manhwaclan_replaceExcludes($final_content, $htmlfounds, $pre_tags_matches, $pre_tags_matches_s, $conseqMatchs);
        
            $translation = manhwaclan_translate($post_title, $final_content, $tr, $manhwaclan_Main_Settings['translate']);
            if (is_array($translation) && isset($translation[1]))
            {
                $translation[1] = preg_replace('#(?<=[\*(])\s+(?=[\*)])#', '', $translation[1]);
                $translation[1] = preg_replace('#([^(*\s]\s)\*+\)#', '$1', $translation[1]);
                $translation[1] = preg_replace('#\(\*+([\s][^)*\s])#', '$1', $translation[1]);
                $translation[1] = manhwaclan_restoreExcludes($translation[1], $htmlfounds, $pre_tags_matches, $pre_tags_matches_s, $conseqMatchs);
            }
            else
            {
                $final_content = manhwaclan_restoreExcludes($final_content, $htmlfounds, $pre_tags_matches, $pre_tags_matches_s, $conseqMatchs);
            }
            if ($translation !== FALSE) {
                if (is_array($translation) && isset($translation[0]) && isset($translation[1])) {
                    $post_title    = $translation[0];
                    $final_content = $translation[1];
                    $final_content = str_replace('</ iframe>', '</iframe>', $final_content);
                    if(stristr($final_content, '<head>') !== false)
                    {
                        $d = new DOMDocument;
                        $mock = new DOMDocument;
                        $internalErrors = libxml_use_internal_errors(true);
                        $d->loadHTML('<?xml encoding="utf-8" ?>' . $final_content);
                    libxml_use_internal_errors($internalErrors);
                        $body = $d->getElementsByTagName('body')->item(0);
                        foreach ($body->childNodes as $child)
                        {
                            $mock->appendChild($mock->importNode($child, true));
                        }
                        $new_post_content_temp = $mock->saveHTML();
                        if($new_post_content_temp !== '' && $new_post_content_temp !== false)
                        {
                            $final_content = preg_replace("/_addload\(function\(\){([^<]*)/i", "", $new_post_content_temp); 
                        }
                    }
                    $final_content = manhwaclan_repairHTML($final_content);
                    $final_content = str_replace('%20', '', $final_content);
                    $final_content = str_replace('/V/', '/v/', $final_content);
                    $final_content = str_replace('?Oh=', '?oh=', $final_content);
                    $final_content = htmlspecialchars_decode($final_content);
                    $final_content = str_replace('</ ', '</', $final_content);
                    $final_content = str_replace(' />', '/>', $final_content);
                    $final_content = str_replace('< br/>', '<br/>', $final_content);
                    $final_content = str_replace('< / ', '</', $final_content);
                    $final_content = str_replace(' / >', '/>', $final_content);
                    $final_content = preg_replace('/[\x00-\x1F\x7F\xA0]/u', '', $final_content);
                    $post_title = preg_replace('{&\s*#\s*(\d+)\s*;}', '&#$1;', $post_title);
$post_title = htmlspecialchars_decode($post_title);
                    $post_title = str_replace('</ ', '</', $post_title);
                    $post_title = str_replace(' />', '/>', $post_title);
                    $post_title = preg_replace('/[\x00-\x1F\x7F\xA0]/u', '', $post_title);
                } else {
                    if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                        manhwaclan_log_to_file('Translation failed - malformed data!');
                    }
                    return false;
                }
            } else {
                if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                    manhwaclan_log_to_file('Translation Failed - returned false!');
                }
                return false;
            }
        }
    }
    return array(
        $post_title,
        $final_content
    );
}
function manhwaclan_translate($title, $content, $from, $to)
{
    $ch = FALSE;
    $manhwaclan_Main_Settings = get_option('manhwaclan_Main_Settings', false);
    try {
        if($from == 'disabled')
        {
            if(strstr($to, '-') !== false && $to != 'zh-CN' && $to != 'zh-TW')
            {
                $from = 'auto-';
            }
            else
            {
                $from = 'auto';
            }
        }
        if($from != 'en' && $from != 'EN-' && $from != 'en!' && $from == $to)
        {
            if(strstr($to, '-') !== false && $to != 'zh-CN' && $to != 'zh-TW')
            {
                $from = 'en-';
            }
            else
            {
                $from = 'en';
            }
        }
        elseif(($from == 'en' || $from == 'EN-' || $from == 'en!') && $from == $to)
        {
            return false;
        }
        if(strstr($to, '!') !== false)
        {
            if (!isset($manhwaclan_Main_Settings['bing_auth']) || trim($manhwaclan_Main_Settings['bing_auth']) == '')
            {
                throw new Exception('You must enter a Microsoft Translator API key from plugin settings, to use this feature!');
            }
            require_once (dirname(__FILE__) . "/res/ums-translator-microsoft.php");
            $options    = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_TIMEOUT => 60,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0
            );
            $ch = curl_init();
            if ($ch === FALSE) {
                manhwaclan_log_to_file ('Failed to init curl in Microsoft Translator');
				return false;
            }
            if (isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '' && $manhwaclan_Main_Settings['proxy_url'] != 'disable' && $manhwaclan_Main_Settings['proxy_url'] != 'disabled') {
				$prx = explode(',', $manhwaclan_Main_Settings['proxy_url']);
                $randomness = array_rand($prx);
                $options[CURLOPT_PROXY] = trim($prx[$randomness]);
                if (isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '') 
                {
                    $prx_auth = explode(',', $manhwaclan_Main_Settings['proxy_auth']);
                    if(isset($prx_auth[$randomness]) && trim($prx_auth[$randomness]) != '')
                    {
                        $options[CURLOPT_PROXYUSERPWD] = trim($prx_auth[$randomness]);
                    }
                }
            }
            curl_setopt_array($ch, $options);
			$MicrosoftTranslator = new MicrosoftTranslator ( $ch );	
			try 
            {
                if (!isset($manhwaclan_Main_Settings['bing_region']) || trim($manhwaclan_Main_Settings['bing_region']) == '')
                {
                    $mt_region = 'global';
                }
                else
                {
                    $mt_region = trim($manhwaclan_Main_Settings['bing_region']);
                }
                if($from == 'auto' || $from == 'auto-' || $from == 'disabled')
                {
                    $from = 'no';
                }
				$accessToken = $MicrosoftTranslator->getToken ( trim($manhwaclan_Main_Settings['bing_auth']) , $mt_region  );
                $from = trim($from, '!');
                $to = trim($to, '!');
				$translated = $MicrosoftTranslator->translateWrap ( $content, $from, $to );
                $translated_title = $MicrosoftTranslator->translateWrap ( $title, $from, $to );
                curl_close($ch);
			} 
            catch ( Exception $e ) 
            {
                curl_close($ch);
				manhwaclan_log_to_file ('Microsoft Translation error: ' . $e->getMessage());
				return false;
			}
        }
        elseif(strstr($to, '-') !== false && $to != 'zh-CN' && $to != 'zh-TW')
        {
            if (!isset($manhwaclan_Main_Settings['deepl_auth']) || trim($manhwaclan_Main_Settings['deepl_auth']) == '')
            {
                throw new Exception('You must enter a DeepL API key from plugin settings, to use this feature!');
            }
            $to = rtrim($to, '-');
            $from = rtrim($from, '-');
            if(strlen($content) > 30000)
            {
                $translated = '';
                while($content != '')
                {
                    $first30k = substr($content, 0, 30000);
                    $content = substr($content, 30000);
                    if (isset($manhwaclan_Main_Settings['deppl_free']) && trim($manhwaclan_Main_Settings['deppl_free']) == 'on')
                    {
                        $ch = curl_init('https://api-free.deepl.com/v2/translate');
                    }
                    else
                    {
                        $ch = curl_init('https://api.deepl.com/v2/translate');
                    }
                    if($ch !== false)
                    {
                        $data           = array();
                        $data['text']   = $first30k;
                        if($from != 'auto')
                        {
                            $data['source_lang']   = $from;
                        }
                        $data['tag_handling']  = 'xml';
                        $data['non_splitting_tags']  = 'div';
                        $data['preserve_formatting']  = '1';
                        $data['target_lang']   = $to;
                        $data['auth_key']   = trim($manhwaclan_Main_Settings['deepl_auth']);
                        $fdata = "";
                        foreach ($data as $key => $val) {
                            $fdata .= "$key=" . urlencode(trim($val)) . "&";
                        }
                        $headers = [
                            'Content-Type: application/x-www-form-urlencoded',
                            'Content-Length: ' . strlen($fdata)
                        ];
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_USERAGENT, manhwaclan_get_random_user_agent());
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fdata);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                        $translated_temp = curl_exec($ch);
                        if($translated_temp === false)
                        {
                            throw new Exception('Failed to post to DeepL: ' . curl_error($ch));
                        }
                        curl_close($ch);
                    }
                    $trans_json = json_decode($translated_temp, true);
                    if($trans_json === false)
                    {
                        throw new Exception('Incorrect multipart response from DeepL: ' . $translated_temp);
                    }
                    if(!isset($trans_json['translations'][0]['text']))
                    {
                        throw new Exception('Unrecognized multipart response from DeepL: ' . $translated_temp);
                    }
                    $translated .= ' ' . $trans_json['translations'][0]['text'];
                }
            }
            else
            {
                if (isset($manhwaclan_Main_Settings['deppl_free']) && trim($manhwaclan_Main_Settings['deppl_free']) == 'on')
                {
                    $ch = curl_init('https://api-free.deepl.com/v2/translate');
                }
                else
                {
                    $ch = curl_init('https://api.deepl.com/v2/translate');
                }
                if($ch !== false)
                {
                    $data           = array();
                    $data['text']   = $content;
                    if($from != 'auto')
                    {
                        $data['source_lang']   = $from;
                    }
                    $data['tag_handling']  = 'xml';
                    $data['non_splitting_tags']  = 'div';
                    $data['preserve_formatting']  = '1';
                    $data['target_lang']   = $to;
                    $data['auth_key']   = trim($manhwaclan_Main_Settings['deepl_auth']);
                    $fdata = "";
                    foreach ($data as $key => $val) {
                        $fdata .= "$key=" . urlencode(trim($val)) . "&";
                    }
                    curl_setopt($ch, CURLOPT_POST, 1);
                    $headers = [
                        'Content-Type: application/x-www-form-urlencoded',
                        'Content-Length: ' . strlen($fdata)
                    ];
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $fdata);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_USERAGENT, manhwaclan_get_random_user_agent());
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                    $translated = curl_exec($ch);
                    if($translated === false)
                    {
                        throw new Exception('Failed to post to DeepL: ' . curl_error($ch));
                    }
                    curl_close($ch);
                }
                $trans_json = json_decode($translated, true);
                if($trans_json === false)
                {
                    throw new Exception('Incorrect text response from DeepL: ' . $translated);
                }
                if(!isset($trans_json['translations'][0]['text']))
                {
                    throw new Exception('Unrecognized text response from DeepL: ' . 'https://api.deepl.com/v2/translate?text=' . urlencode($content) . '&source_lang=' . $from . '&target_lang=' . $to . '&auth_key=' . trim($manhwaclan_Main_Settings['deepl_auth']) . '&tag_handling=xml&preserve_formatting=1' . ' --- ' . $translated);
                }
                $translated = $trans_json['translations'][0]['text'];
            }
            $translated = str_replace('<strong>', ' <strong>', $translated);
            $translated = str_replace('</strong>', '</strong> ', $translated);
            if($from != 'auto')
            {
                $from_from = '&source_lang=' . $from;
            }
            else
            {
                $from_from = '';
            }
            if (isset($manhwaclan_Main_Settings['deppl_free']) && trim($manhwaclan_Main_Settings['deppl_free']) == 'on')
            {
                $translated_title = manhwaclan_get_web_page('https://api-free.deepl.com/v2/translate?text=' . urlencode($title) . $from_from . '&target_lang=' . $to . '&auth_key=' . trim($manhwaclan_Main_Settings['deepl_auth']) . '&tag_handling=xml&preserve_formatting=1');
            }
            else
            {
                $translated_title = manhwaclan_get_web_page('https://api.deepl.com/v2/translate?text=' . urlencode($title) . $from_from . '&target_lang=' . $to . '&auth_key=' . trim($manhwaclan_Main_Settings['deepl_auth']) . '&tag_handling=xml&preserve_formatting=1');
            }
            $trans_json = json_decode($translated_title, true);
            if($trans_json === false)
            {
                throw new Exception('Incorrect title response from DeepL: ' . $translated_title);
            }
            if(!isset($trans_json['translations'][0]['text']))
            {
                throw new Exception('Unrecognized title response from DeepL: ' . $translated_title);
            }
            $translated_title = $trans_json['translations'][0]['text'];
        }
        else
        {
            if (isset($manhwaclan_Main_Settings['google_trans_auth']) && trim($manhwaclan_Main_Settings['google_trans_auth']) != '')
            {
                require_once(dirname(__FILE__) . "/res/translator-api.php");
                $ch = curl_init();
                if ($ch === FALSE) {
                    if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                        manhwaclan_log_to_file('Failed to init cURL in translator!');
                    }
                    return false;
                }
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                $GoogleTranslatorAPI = new GoogleTranslatorAPI($ch, $manhwaclan_Main_Settings['google_trans_auth']);
                $translated = '';
                $translated_title = '';
                if($content != '')
                {
                    if(strlen($content) > 30000)
                    {
                        while($content != '')
                        {
                            $first30k = substr($content, 0, 30000);
                            $content = substr($content, 30000);
                            $translated_temp       = $GoogleTranslatorAPI->translateText($first30k, $from, $to);
                            $translated .= ' ' . $translated_temp;
                        }
                    }
                    else
                    {
                        $translated       = $GoogleTranslatorAPI->translateText($content, $from, $to);
                    }
                }
                if($title != '')
                {
                    $translated_title = $GoogleTranslatorAPI->translateText($title, $from, $to);
                }
                curl_close($ch);
            }
            else
            {
                require_once(dirname(__FILE__) . "/res/ums-translator.php");
                $ch = curl_init();
                if ($ch === FALSE) {
                    if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
                        manhwaclan_log_to_file('Failed to init cURL in translator!');
                    }
                    return false;
                }
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_USERAGENT, manhwaclan_get_random_user_agent());
				if (isset($manhwaclan_Main_Settings['proxy_url']) && $manhwaclan_Main_Settings['proxy_url'] != '' && $manhwaclan_Main_Settings['proxy_url'] != 'disable' && $manhwaclan_Main_Settings['proxy_url'] != 'disabled') {
					$prx = explode(',', $manhwaclan_Main_Settings['proxy_url']);
					$randomness = array_rand($prx);
					curl_setopt( $ch, CURLOPT_PROXY, trim($prx[$randomness]));
					if (isset($manhwaclan_Main_Settings['proxy_auth']) && $manhwaclan_Main_Settings['proxy_auth'] != '') 
					{
						$prx_auth = explode(',', $manhwaclan_Main_Settings['proxy_auth']);
						if(isset($prx_auth[$randomness]) && trim($prx_auth[$randomness]) != '')
						{
							curl_setopt( $ch, CURLOPT_PROXYUSERPWD, trim($prx_auth[$randomness]) );
						}
					}
				}
				$GoogleTranslator = new GoogleTranslator($ch);
                if(strlen($content) > 13000)
                {
                    $translated = '';
                    while($content != '')
                    {
                        $first30k = substr($content, 0, 13000);
                        $content = substr($content, 13000);
                        $translated_temp       = $GoogleTranslator->translateText($first30k, $from, $to);
                        if (strpos($translated, '<h2>The page you have attempted to translate is already in ') !== false) {
                            throw new Exception('Page content already in ' . $to);
                        }
                        if (strpos($translated, 'Error 400 (Bad Request)!!1') !== false) {
                            throw new Exception('Unexpected error while translating page!');
                        }
                        if(substr_compare($translated_temp, '</pre>', -strlen('</pre>')) === 0){$translated_temp = substr_replace($translated_temp ,"", -6);}if(substr( $translated_temp, 0, 5 ) === "<pre>"){$translated_temp = substr($translated_temp, 5);}
                        $translated .= ' ' . $translated_temp;
                    }
                }
                else
                {
                    $translated       = $GoogleTranslator->translateText($content, $from, $to);
                    if (strpos($translated, '<h2>The page you have attempted to translate is already in ') !== false) {
                        throw new Exception('Page content already in ' . $to);
                    }
                    if (strpos($translated, 'Error 400 (Bad Request)!!1') !== false) {
                        throw new Exception('Unexpected error while translating page!');
                    }
                }
                $translated_title = $GoogleTranslator->translateText($title, $from, $to);
                if (strpos($translated_title, '<h2>The page you have attempted to translate is already in ') !== false) {
                    throw new Exception('Page title already in ' . $to);
                }
                if (strpos($translated_title, 'Error 400 (Bad Request)!!1') !== false) {
                    throw new Exception('Unexpected error while translating page title!');
                }
                curl_close($ch);
            }
        }
    }
    catch (Exception $e) {
        if($ch !== false)
        {
            curl_close($ch);
        }
        if (isset($manhwaclan_Main_Settings['enable_detailed_logging'])) {
            manhwaclan_log_to_file('Exception thrown in Translator ' . $e);
        }
        return false;
    }
    if(substr_compare($translated_title, '</pre>', -strlen('</pre>')) === 0){$title = substr_replace($translated_title ,"", -6);}else{$title = $translated_title;}if(substr( $title, 0, 5 ) === "<pre>"){$title = substr($title, 5);}
    if(substr_compare($translated, '</pre>', -strlen('</pre>')) === 0){$text = substr_replace($translated ,"", -6);}else{$text = $translated;}if(substr( $text, 0, 5 ) === "<pre>"){$text = substr($text, 5);}
    $text  = preg_replace('/' . preg_quote('html lang=') . '.*?' . preg_quote('>') . '/', '', $text);
    $text  = preg_replace('/' . preg_quote('!DOCTYPE') . '.*?' . preg_quote('<') . '/', '', $text);
    $text = str_replace('%% item_cat %%', '%%item_cat%%', $text);
    $text = str_replace('%% item_tags %%', '%%item_tags%%', $text);
    $text = str_replace('%% item_url %%', '%%item_url%%', $text);
    $text = str_replace('%% item_read_more_button %%', '%%item_read_more_button%%', $text);
    $text = str_replace('%%item_read_more_button %%', '%%item_read_more_button%%', $text);
    $text = str_replace('%% item_read_more_button%%', '%%item_read_more_button%%', $text);
    $text = str_replace('%% item_image_URL %%', '%%item_image_URL%%', $text);
    $text = str_replace('%% author_link %%', '%%author_link%%', $text);
    $text = str_replace('%% custom_html2 %%', '%%custom_html2%%', $text);
    $text = str_replace('%% custom_html %%', '%%custom_html%%', $text);
    $text = str_replace('%% random_sentence %%', '%%random_sentence%%', $text);
    $text = str_replace('%% random_sentence2 %%', '%%random_sentence2%%', $text);
    $text = str_replace('%% item_title %%', '%%item_title%%', $text);
    $text = str_replace('%% item_content %%', '%%item_content%%', $text);
    $text = str_replace('%% item_original_content %%', '%%item_original_content%%', $text);
    $text = str_replace('%% item_content_plain_text %%', '%%item_content_plain_text%%', $text);
    $text = str_replace('%% item_description %%', '%%item_description%%', $text);
    $text = str_replace('%% author %%', '%%author%%', $text);
    $text = str_replace('%% item_media %%', '%%item_media%%', $text);
    $text = str_replace('%% item_date %%', '%%item_date%%', $text);
    $text = str_replace('&amp; # 039;', '\'', $text);
    $text = str_replace('%% %% item_read_more_button', '%%item_read_more_button%%', $text);
    $text = str_replace('&amp; ldquo;', '"', $text);
    $text = str_replace('&amp; rdquo;', '"', $text);
    $text = str_replace(' \' ', '\'', $text);
    $text = preg_replace('{<iframe src="https://translate.google.com/translate(?:.*?)></iframe>}i', "", html_entity_decode($text, ENT_QUOTES));
    $text = preg_replace('{<span class="google-src-text.*?>.*?</span>}', "", $text);
    $text = preg_replace('{<span class="notranslate.*?>(.*?)</span>}', "$1", $text);
    $title = str_replace('%% random_sentence %%', '%%random_sentence%%', $title);
    $title = str_replace('%% random_sentence2 %%', '%%random_sentence2%%', $title);
    $title = str_replace('%% item_title %%', '%%item_title%%', $title);
    $title = str_replace('%% item_description %%', '%%item_description%%', $title);
    $title = str_replace('%% item_url %%', '%%item_url%%', $title);
    $title = str_replace('%% item_date %%', '%%item_date%%', $title);
    $title = str_replace('%% author %%', '%%author%%', $title);
    $title = str_replace('%% item_cat %%', '%%item_cat%%', $title);
    $title = str_replace('%% item_tags %%', '%%item_tags%%', $title);
    $title = str_replace('&amp; # 039;', '\'', $title);
    $title = str_replace('&amp; ldquo;', '"', $title);
    $title = str_replace('&amp; rdquo;', '"', $title);
    $title = str_replace(' \' ', '\'', $title);

    return array(
        $title,
        $text
    );
}
function manhwaclan_generate_random_email()
{
    $tlds = array("com", "net", "gov", "org", "edu", "biz", "info");
    $char = "0123456789abcdefghijklmnopqrstuvwxyz";
    $ulen = mt_rand(5, 10);
    $dlen = mt_rand(7, 17);
    $a = "";
    for ($i = 1; $i <= $ulen; $i++) {
        $a .= substr($char, mt_rand(0, strlen($char)), 1);
    }
    $a .= "@";
    for ($i = 1; $i <= $dlen; $i++) {
        $a .= substr($char, mt_rand(0, strlen($char)), 1);
    }
    $a .= ".";
    $a .= $tlds[mt_rand(0, (sizeof($tlds)-1))];
    return $a;
}
$manhwaclan_fatal = false;
function manhwaclan_clear_flag_at_shutdown($param, $type)
{
    $error = error_get_last();
    if ($error !== null && $error['type'] === E_ERROR && $GLOBALS['manhwaclan_fatal'] === false) {
        $GLOBALS['manhwaclan_fatal'] = true;
        $running = array();
        update_option('manhwaclan_running_list', $running);
        manhwaclan_log_to_file('[FATAL] Exit error: ' . $error['message'] . ', file: ' . $error['file'] . ', line: ' . $error['line'] . ' - rule ID: ' . $param . '!');
        manhwaclan_clearFromList($param, $type);
    }
    else
    {
        manhwaclan_clearFromList($param, $type);
    }
}

function manhwaclan_hour_diff($date1, $date2)
{
    $date1 = new DateTime($date1, manhwaclan_get_blog_timezone());
    $date2 = new DateTime($date2, manhwaclan_get_blog_timezone());
    
    $number1 = (int) $date1->format('U');
    $number2 = (int) $date2->format('U');
    return ($number1 - $number2) / 60;
}

function manhwaclan_add_hour($date, $hour)
{
    $date1 = new DateTime($date, manhwaclan_get_blog_timezone());
    $date1->modify("$hour hours");
    $date1 = (array)$date1;
    foreach ($date1 as $key => $value) {
        if ($key == 'date') {
            return $value;
        }
    }
    return $date;
}

function manhwaclan_minute_diff($date1, $date2)
{
    $date1 = new DateTime($date1, manhwaclan_get_blog_timezone());
    $date2 = new DateTime($date2, manhwaclan_get_blog_timezone());
    
    $number1 = (int) $date1->format('U');
    $number2 = (int) $date2->format('U');
    return ($number1 - $number2);
}

function manhwaclan_add_minute($date, $minute)
{
    $date1 = new DateTime($date, manhwaclan_get_blog_timezone());
    $date1->modify("$minute minutes");
    $date1 = (array)$date1;
    foreach ($date1 as $key => $value) {
        if ($key == 'date') {
            return $value;
        }
    }
    return $date;
}

function manhwaclan_get_blog_timezone() {

    $tzstring = get_option( 'timezone_string' );
    $offset   = get_option( 'gmt_offset' );

    if( empty( $tzstring ) && 0 != $offset && floor( $offset ) == $offset ){
        $offset_st = $offset > 0 ? "-$offset" : '+'.absint( $offset );
        $tzstring  = 'Etc/GMT'.$offset_st;
    }
    if( empty( $tzstring ) ){
        $tzstring = 'UTC';
    }
    $timezone = new DateTimeZone( $tzstring );
    return $timezone; 
}
function manhwaclan_get_date_now($param = 'now')
{
    $date = new DateTime($param, manhwaclan_get_blog_timezone());
    $date = (array)$date;
    foreach ($date as $key => $value) {
        if ($key == 'date') {
            return $value;
        }
    }
    return '';
}

add_action('init', 'manhwaclan_create_taxonomy', 0);
add_action( 'enqueue_block_editor_assets', 'manhwaclan_enqueue_block_editor_assets' );
function manhwaclan_enqueue_block_editor_assets() {
	wp_register_style('ums-browser-style', plugins_url('styles/ums-browser.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('ums-browser-style');
}
function manhwaclan_create_taxonomy()
{
    if(!taxonomy_exists('coderevolution_post_source'))
    {
        $labels = array(
            'name' => _x('Post Source', 'taxonomy general name', 'ultimate-manga-scraper'),
            'singular_name' => _x('Post Source', 'taxonomy singular name', 'ultimate-manga-scraper'),
            'search_items' => esc_html__('Search Post Source', 'ultimate-manga-scraper'),
            'popular_items' => esc_html__('Popular Post Source', 'ultimate-manga-scraper'),
            'all_items' => esc_html__('All Post Sources', 'ultimate-manga-scraper'),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => esc_html__('Edit Post Source', 'ultimate-manga-scraper'),
            'update_item' => esc_html__('Update Post Source', 'ultimate-manga-scraper'),
            'add_new_item' => esc_html__('Add New Post Source', 'ultimate-manga-scraper'),
            'new_item_name' => esc_html__('New Post Source Name', 'ultimate-manga-scraper'),
            'separate_items_with_commas' => esc_html__('Separate Post Source with commas', 'ultimate-manga-scraper'),
            'add_or_remove_items' => esc_html__('Add or remove Post Source', 'ultimate-manga-scraper'),
            'choose_from_most_used' => esc_html__('Choose from the most used Post Source', 'ultimate-manga-scraper'),
            'not_found' => esc_html__('No Post Sources found.', 'ultimate-manga-scraper'),
            'menu_name' => esc_html__('Post Source', 'ultimate-manga-scraper')
        );
        
        $args = array(
            'hierarchical' => false,
            'public' => false,
            'show_ui' => false,
            'show_in_menu' => false,
            'description' => 'Post Source',
            'labels' => $labels,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => false
        );
        
        $add_post_type = array(
            'wp-manga'
        );
        $xargs = array(
            'public'   => true,
            '_builtin' => false
        );
        $output = 'names'; 
        $operator = 'and';
        register_taxonomy('coderevolution_post_source', $add_post_type, $args);
        add_action('pre_get_posts', function($qry) {
            if (is_admin()) return;
            if (is_tax('coderevolution_post_source')){
                $qry->set_404();
            }
        });
    }
}

register_activation_hook(__FILE__, 'manhwaclan_activation_callback');
function manhwaclan_activation_callback($defaults = FALSE)
{
    if (!get_option('manhwaclan_posts_per_page') || $defaults === TRUE) {
        if ($defaults === FALSE) {
            add_option('manhwaclan_posts_per_page', '10');
        } else {
            update_option('manhwaclan_posts_per_page', '10');
        }
    }
    if (!get_option('manhwaclan_Main_Settings') || $defaults === TRUE) {
        $manhwaclan_Main_Settings = array(
            'manhwaclan_enabled' => 'on',
            'auto_clear_logs' => 'No',
            'enable_logging' => 'on',
            'manga_storage' => 'local',
            'enable_cloudflare' => '',
            'enable_detailed_logging' => '',
            'request_timeout' => '1',
            'rule_timeout' => '3600',
            'proxy_auth' => '',
            'proxy_url' => '',
        );
        if ($defaults === FALSE) {
            add_option('manhwaclan_Main_Settings', $manhwaclan_Main_Settings);
        } else {
            update_option('manhwaclan_Main_Settings', $manhwaclan_Main_Settings);
        }
    }
}

register_activation_hook(__FILE__, 'manhwaclan_check_version');
function manhwaclan_check_version()
{
    if (!function_exists('curl_init')) {
        echo '<h3>'.esc_html__('Please enable curl PHP extension. Please contact your hosting provider\'s support to help you in this matter.', 'ultimate-manga-scraper').'</h3>';
        die;
    }
    global $wp_version;
    if (!current_user_can('activate_plugins')) {
        echo '<p>' . esc_html__('You are not allowed to activate plugins!', 'ultimate-manga-scraper') . '</p>';
        die;
    }
    $php_version_required = '5.0';
    $wp_version_required  = '2.7';
    
    if (version_compare(PHP_VERSION, $php_version_required, '<')) {
        deactivate_plugins(basename(__FILE__));
        echo '<p>' . sprintf(esc_html__('This plugin can not be activated because it requires a PHP version greater than %1$s. Please update your PHP version before you activate it.', 'ultimate-manga-scraper'), $php_version_required) . '</p>';
        die;
    }
    
    if (version_compare($wp_version, $wp_version_required, '<')) {
        deactivate_plugins(basename(__FILE__));
        echo '<p>' . sprintf(esc_html__('This plugin can not be activated because it requires a WordPress version greater than %1$s. Please go to Dashboard -> Updates to get the latest version of WordPress.', 'ultimate-manga-scraper'), $wp_version_required) . '</p>';
        die;
    }
}
add_action('admin_init', 'manhwaclan_register_mysettings');
function manhwaclan_register_mysettings()
{ 
    manhwaclan_cron_schedule();
    register_setting('manhwaclan_option_group', 'manhwaclan_Main_Settings');
    if(isset($_GET['manhwaclan_page']))
    {
        $curent_page = $_GET["manhwaclan_page"];
    }
    else
    {
        $curent_page = '';
    }
    $all_rules = array();
    $last_url = (manhwaclan_isSecure() ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(stristr($last_url, 'manhwaclan_items_panel') !== false)
    {
        $GLOBALS['wp_object_cache']->delete('manhwaclan_rules_list', 'options');
        $all_rules = get_option('manhwaclan_rules_list', array());
    }
    elseif(stristr($last_url, 'manhwaclan_novel_panel') !== false)
    {
        $GLOBALS['wp_object_cache']->delete('manhwaclan_novel_list', 'options');
        $all_rules = get_option('manhwaclan_novel_list', array());
    }
    elseif(stristr($last_url, 'manhwaclan_vipnovel_panel') !== false)
    {
        $GLOBALS['wp_object_cache']->delete('manhwaclan_vipnovel_list', 'options');
        $all_rules = get_option('manhwaclan_vipnovel_list', array());
    }
    elseif(stristr($last_url, 'manhwaclan_text_panel') !== false)
    {
        $GLOBALS['wp_object_cache']->delete('manhwaclan_text_list', 'options');
        $all_rules = get_option('manhwaclan_text_list', array());
    }
    if($all_rules === false)
    {
        $all_rules = array();
    }
    $rules_count = count($all_rules);
    $rules_per_page = get_option('manhwaclan_posts_per_page', 10);
    $max_pages = ceil($rules_count/$rules_per_page);
    if($max_pages == 0)
    {
        $max_pages = 1;
    }
    if((stristr($last_url, 'manhwaclan_items_panel') !== false || stristr($last_url, 'manhwaclan_novel_panel') !== false || stristr($last_url, 'manhwaclan_text_panel') !== false) && (!is_numeric($curent_page) || $curent_page > $max_pages || $curent_page <= 0))
    {
        if(stristr($last_url, 'manhwaclan_page=') === false)
        {
            if(stristr($last_url, '?') === false)
            {
                $last_url .= '?manhwaclan_page=' . $max_pages;
            }
            else
            {
                $last_url .= '&manhwaclan_page=' . $max_pages;
            }
        }
        else
        {
            if(isset($_GET['manhwaclan_page']))
            {
                $curent_page = $_GET["manhwaclan_page"];
            }
            else
            {
                $curent_page = '';
            }
            if(is_numeric($curent_page))
            {
                $last_url = str_replace('manhwaclan_page=' . $curent_page, 'manhwaclan_page=' . $max_pages, $last_url);
            }
            else
            {
                if(stristr($last_url, '?') === false)
                {
                    $last_url .= '?manhwaclan_page=' . $max_pages;
                }
                else
                {
                    $last_url .= '&manhwaclan_page=' . $max_pages;
                }
            }
        }
        manhwaclan_redirect($last_url);
    }
    if (is_multisite()) {
        if (!get_option('manhwaclan_Main_Settings')) {
            manhwaclan_activation_callback(TRUE);
        }
    }
}

function manhwaclan_get_plugin_url()
{
    return plugins_url('', __FILE__);
}

function manhwaclan_get_file_url($url)
{
    return esc_url(manhwaclan_get_plugin_url() . '/' . $url);
}

function manhwaclan_admin_load_files()
{
    wp_register_style('ums-browser-style', plugins_url('styles/ums-browser.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('ums-browser-style');
    wp_register_style('ums-custom-style', plugins_url('styles/coderevolution-style.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('ums-custom-style');
    wp_enqueue_script('jquery');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}

require(dirname(__FILE__) . "/res/ums-main.php");
require(dirname(__FILE__) . "/res/ums-text-list.php");
require(dirname(__FILE__) . "/res/ums-logs.php");
?>