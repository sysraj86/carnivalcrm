<?php

/**
 * Project:		CMS_SEO: A search engine optimization class for
						content management systems.
 * File:		CMS_SEO.php
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://www.jjwdesign.com/
 * @copyright 2006 JJW Design
 * @author Jeffrey J. Walters <design@jjwdesign.com>
 * @package CMS_SEO
 * @version 1.0
 */

// SEO Class

class cms_seo {

    /**
     * The name of the directory where templates are located.
     *
     * @var string
     */
//    var $template_dir    =  'templates';


   function cms_seo()
   {

   }

	// Simple Set of SEO Related Functions
	// seo_fns.php
	
	function seo_create_title($str, $length = 90) {
		// Strip HTML and Truncate to create a title, Google truncates Titles to 40 characters.
		$title = truncate_string(seo_simple_strip_tags($str), $length);
		if (strlen($str) > strlen($title)) {
			$title .= "...";
		}
		return $title;
	}
	
	function seo_create_meta_description($str, $length = 120) {
		// Strip HTML and Truncate to create a META description, Google doesn't care about META tags.
		$meta_description = truncate_string(seo_simple_strip_tags($str), $length);
		if (strlen($str) > strlen($meta_description)) {
			$meta_description .= "...";
		}
		return $meta_description;
	}
	
	function seo_create_meta_keywords($str, $length = 200) {
		// Strip HTML and Truncate to create a META keywords, Google doesn't care about META tags.
		$exclude = array('description','save','month','year','hundreds','dollars','per',"a","ii","about","above","according","across","39","actually","ad","adj","ae","af","after","afterwards","ag","again","against","ai","al","all","almost","alone","along","already","also","although","always","am","among","amongst","an","and","another","any","anyhow","anyone","anything","anywhere","ao","aq","ar","are","aren","aren't","around","arpa","as","at","au","aw","az","b","ba","bb","bd","be","became","because","become","becomes","becoming","been","before","beforehand","begin","beginning","behind","being","below","beside","besides","between","beyond","bf","bg","bh","bi","billion","bj","bm","bn","bo","both","br","bs","bt","but","buy","bv","bw","by","bz","c","ca","can","can't","cannot","caption","cc","cd","cf","cg","ch","ci","ck","cl","click","cm","cn","co","co.","com","copy","could","couldn","couldn't","cr","cs","cu","cv","cx","cy","cz","d","de","did","didn","didn't","dj","dk","dm","do","does","doesn","doesn't","don","don't","down","during","dz","e","each","ec","edu","ee","eg","eh","eight","eighty","either","else","elsewhere","end","ending","enough","er","es","et","etc","even","ever","every","everyone","everything","everywhere","except","f","few","fi","fifty","find","first","five","fj","fk","fm","fo","for","former","formerly","forty","found","four","fr","free","from","further","fx","g","ga","gb","gd","ge","get","gf","gg","gh","gi","gl","gm","gmt","gn","go","gov","gp","gq","gr","gs","gt","gu","gw","gy","h","had","has","hasn","hasn't","have","haven","haven't","he","he'd","he'll","he's","help","hence","her","here","here's","hereafter","hereby","herein","hereupon","hers","herself","him","himself","his","hk","hm","hn","home","homepage","how","however","hr","ht","htm","html","http","hu","hundred","i","i'd","i'll","i'm","i've","i.e.","id","ie","if","il","im","in","inc","inc.","indeed","information","instead","int","into","io","iq","ir","is","isn","isn't","it","it's","its","itself","j","je","jm","jo","join","jp","k","ke","kg","kh","ki","km","kn","kp","kr","kw","ky","kz","l","la","last","later","latter","lb","lc","least","less","let","let's","li","like","likely","lk","ll","lr","ls","lt","ltd","lu","lv","ly","m","ma","made","make","makes","many","maybe","mc","md","me","meantime","meanwhile","mg","mh","microsoft","might","mil","million","miss","mk","ml","mm","mn","mo","more","moreover","most","mostly","mp","mq","mr","mrs","ms","msie","mt","mu","much","must","mv","mw","mx","my","myself","mz","n","na","namely","nc","ne","neither","net","netscape","never","nevertheless","new","next","nf","ng","ni","nine","ninety","nl","no","nobody","none","nonetheless","noone","nor","not","nothing","now","nowhere","np","nr","nu","nz","o","of","off","often","om","on","once","one","one's","only","onto","or","org","other","others","otherwise","our","ours","ourselves","out","over","overall","own","p","pa","page","pe","per","perhaps","pf","pg","ph","pk","pl","pm","pn","pr","pt","pw","py","q","qa","r","rather","re","recent","recently","reserved","ring","ro","ru","rw","s","sa","same","sb","sc","sd","se","seem","seemed","seeming","seems","seven","seventy","several","sg","sh","she","she'd","she'll","she's","should","shouldn","shouldn't","si","since","site","six","sixty","sj","sk","sl","sm","sn","so","some","somehow","someone","something","sometime","sometimes","somewhere","sr","st","still","stop","su","such","sv","sy","sz","t","taking","tc","td","ten","text","tf","tg","test","th","than","that","that'll","that's","the","their","them","themselves","then","thence","there","there'll","there's","thereafter","thereby","therefore","therein","thereupon","these","they","they'd","they'll","they're","they've","thirty","this","those","though","thousand","three","through","throughout","thru","thus","tj","tk","tm","tn","to","together","too","toward","towards","tp","tr","trillion","tt","tv","tw","twenty","two","tz","u","ua","ug","uk","um","under","unless","unlike","unlikely","until","up","upon","us","use","used","using","uy","uz","v","va","vc","ve","very","vg","vi","via","vn","vu","w","was","wasn","wasn't","we","we'd","we'll","we're","we've","web","webpage","website","welcome","well","were","weren","weren't","wf","what","what'll","what's","whatever","when","whence","whenever","where","whereafter","whereas","whereby","wherein","whereupon","wherever","whether","which","while","whither","who","who'd","who'll","who's","whoever","NULL","whole","whom","whomever","whose","why","will","with","within","without","won","won't","would","wouldn","wouldn't","ws","www","x","y","ye","yes","yet","you","you'd","you'll","you're","you've","your","yours","yourself","yourselves","yt","yu","z","za","zm","zr","10","z",);
		$splitstr = @explode(" ", truncate_string(seo_simple_strip_tags(str_replace(array(",",".")," ", $str)), $length));
		$new_splitstr = array();
		foreach ($splitstr as $spstr) {
			if (strlen($spstr) > 2 && !(in_array(strtolower($spstr), $new_splitstr)) && !(in_array(strtolower($spstr), $exclude))) {
				$new_splitstr[] = strtolower($spstr);
			}
		}
		return @implode(",", $new_splitstr);
	}
	
	function seo_simple_strip_tags($str)
	// Simple Strip HTML Tags function for seo functions above.
	{
		$untagged = "";
		$skippingtag = false;
		for ($i = 0; $i < strlen($str); $i++) {
			if (!$skippingtag) {
				if ($str[$i] == "<") {
					$skippingtag = true;
				} else {
					if ($str[$i]==" " || $str[$i]=="\n" || $str[$i]=="\r" || $str[$i]=="\t") {
						$untagged .= " ";
					} else {
						$untagged .= $str[$i];
					}
				}
			} else {
				if ($str[$i] == ">") {
					$untagged .= " ";
					$skippingtag = false;
				}
			}
		}
		$untagged = preg_replace("/[\n\r\t\s ]+/i", " ", $untagged); // remove multiple spaces, returns, tabs, etc.
		if (substr($untagged,-1) == ' ') { $untagged = substr($untagged,0,strlen($untagged)-1); } // remove space from end of string
		if (substr($untagged,0,1) == ' ') { $untagged = substr($untagged,1,strlen($untagged)-1); } // remove space from start of string
		if (substr($untagged,0,12) == 'DESCRIPTION ') { $untagged = substr($untagged,12,strlen($untagged)-1); } // remove 'DESCRIPTION ' from start of string
		return $untagged;
	}
	
	function truncate_string($string, $length = 70)
	// This function will truncate a string to a specified length.
	{
	  if (strlen($string) > $length) {
		$split = preg_split("/\n/", wordwrap($string, $length));
		return ($split[0]);
	  }
	  return ($string);
	}


	function ucfirst_title($string) { 
	  // Split the words (\W) by delimiters, ucfirst and then recombine with delimiters.
	  $temp = preg_split('/(\W)/', $string, -1, PREG_SPLIT_DELIM_CAPTURE );
	  foreach ($temp as $key=>$word) {
			$temp[$key] = ucfirst(strtolower($word));
	  }
	  $new_string = join ('', $temp);
	  // Do the Search and Replacements on the $new_string.
	  $search  = array (' And ',' Or ',' But ',' At ',' In ',' On ',' To ',' From ',' Is ',' A ',' An ',' Am ',' For ',' Of ',' The ',"'S", 'Ac/', 
			'Ito ', 'Fpd ', 'Tft ', 'Lcd ', 'Tn ', 'Std ', ' Id ');
	  $replace = array (' and ',' or ',' but ',' at ',' in ',' on ',' to ',' from ',' is ',' a ',' an ',' am ',' for ',' of ',' the ',"'s", 'AC/', 
			'ITO ', 'FPD ', 'TFT ', 'LCD ', 'TN ', 'STD ', ' ID ');
	  $search  = array (' And ',' Or ',' But ',' At ',' In ',' On ',' To ',' From ',' Is ',' A ',' An ',' Am ',' For ',' Of ',' The ',"'S", 'Ac/');
	  $replace = array (' and ',' or ',' but ',' at ',' in ',' on ',' to ',' from ',' is ',' a ',' an ',' am ',' for ',' of ',' the ',"'s", 'AC/');
	  $new_string = str_replace($search, $replace, $new_string);
	  // Several Special Replacements ('s, McPherson, McBain, etc.) on the $new_string.
	  $new_string = preg_replace("/Mc([a-z]{3,})/e", "\"Mc\".ucfirst(\"$1\")", $new_string);
	  // Another Strange Replacement (example: "Pure-Breed Dogs: the Breeds and Standards") on the $new_string.
	  $new_string = preg_replace("/([:;])\s+([a-zA-Z]+)/e", "\"$1\".\" \".ucfirst(\"$2\")", $new_string);
	  // If this is a very low string ( > 60 char) then do some more replacements.
	  if (strlen($new_string > 60)) {
		$search  = array (" With "," That ");
		$replace = array (" with "," that ");
		$new_string = str_replace($search, $replace, $new_string);
	  }
	  return ($new_string);
	}
	
	function wordwrap_excluding_html($str, $cols = 30, $cut = "&shy;")
	// This is a simple HTML-excluding, max-column/character, word wrap function!
	// This function will split a word, that is longer that $cols and is outside 
	// any HTML tags, by the string $cut.  Lines with whitespace in them are ok, only 
	// single words over $cols length are split. (&shy; = safe-hyphen)
	{
		$len = strlen($str);
		$tag = 0;
		for ($i = 0; $i < $len; $i++) {
			$chr = $str[$i];
			if ($chr == '<') {
				$tag++;
			} elseif ($chr == '>') {
				$tag--;
			} elseif ((!$tag) && ($chr==" " || $chr=="\n" || $chr=="\r" || $chr=="\t")) {
				$wordlen = 0;
			} elseif (!$tag) {
				$wordlen++;
			}
			if ((!$tag) && ($wordlen) && (!($wordlen % $cols))) {
				$chr .= $cut;
			}
			$result .= $chr;
		}
		return $result;
	}
	
	
	function truncate_string_excluding_html($str, $len = 150)
	// Last Modified - 12/15/2004
	// This function will truncate a string to a specified length
	// "excluding" any HTML tags in the length calculation.
	// Split on HTML delimiters, count and then recombine with delimiters.
	{
		$wordlen = 0; // Total text length.
		$resultlen = 0; // Total length of HTML and text.
		$len_exceeded = false;
		$cnt = 0;
		$splitstr = array (); // String split by HTML tags including delimiter.
		$open_tags = array(); // Array for Simple HTML Tags
		$str = str_replace(array("\n","\r","\t"), array (" "," "," "), $str); // Replace returns/tabs with spaces
		$splitstr = preg_split('/(<[^>]*>)/', $str, -1, PREG_SPLIT_DELIM_CAPTURE );
		//var_dump($splitstr);
		if (count($splitstr) > 0 && strlen($str) > $len) { // split
			while ($wordlen <= $len && $cnt <= 200 && !$len_exceeded) {
				$part = $splitstr[$cnt];
				if (preg_match('/^<[A-Za-z]{1,}/', $part, $match)) {
					$open_tag = strtolower(substr($match[0],1));
					if ($open_tag != "img" && $open_tag != "li" && $open_tag != "br" && $open_tag != "p") {
						$open_tags[] = $open_tag;
						$prev_open_tag = $open_tag;
					}
				} else if (preg_match('/^<\/[A-Za-z]{1,}/', $part, $match)) {
					$close_tag = strtolower(substr($match[0],2));
					$tmp = array_reverse($open_tags);
					$rev_open_tag_pos = array_search($close_tag, $tmp);
					if ($rev_open_tag_pos >= 0) {
						$tmp = $open_tags;
						$open_tag_pos = count($tmp)-$rev_open_tag_pos-1;
						$open_tags = array ();
						$tmp_pos = 0;
						foreach ($tmp as $tmp_tag) {
							if ($tmp_pos != $open_tag_pos) $open_tags[] = $tmp_tag;
							$tmp_pos++;
						}
					}
				} else if (strlen($part) > $len-$wordlen) { // truncate remaining length
					$tmpsplit = explode("\n", wordwrap($part, $len-$wordlen));
					$part = $tmpsplit[0]; // Define the truncated part.
					$len_exceeded = true;
					$wordlen += strlen($part);
				} else {
					$wordlen += strlen($part);
				}
				$result .= $part; // Add the part to the $result
				$resultlen = strlen($result);
				$cnt++;
				//echo "<h2>($cnt) ".htmlentities($part)." </h2>";
				//var_dump($open_tags);
			}
			//echo "wordlen: $wordlen, resultlen: $resultlen<br>";
			// Close the open HTML Tags (Simple Tags Only!). This excludes IMG, LI, and BR tags.
			foreach ($open_tags as $value) {
				if (!empty($value)) {
					$result .= "</".$value.">";
					//echo "<h2> Open Tag: ".htmlentities($value)." </h2>";
				}
			}
		} else {
			$result = $str;
		}
		return $result;
	}

}
	
?>