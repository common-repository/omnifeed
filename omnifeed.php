<?php

/*
Plugin Name: OmniFeed
Description: List a RSS-Feed in your WordPress-Blog.
Author: OmnisourceTech.com
Version: 1.1
License: GPL
Author URI: http://www.OmnisourceTech.com
Update Server: http://www.OmnisourceTech.com/omnifeed
Min WP Version: 2.5
Max WP Version: 2.9.2
*/ 

// Add a new shortcode for omnifeed
add_shortcode('omnifeed', 'omnifeed_func');

require_once(ABSPATH.'wp-includes/rss-functions.php');

//define('MAGPIE_CACHE_ON', false);

function extractUrl($link){
if (preg_match('/href="([^"]*)"/i', $link , $regs))
{
	$result = $regs[1];
} else {
	$result = $link;
}
return $result ;
}
function getRSS($display,$rss_feed_url,$displaydescriptions,$truncatetitle,$newwindow,$displayfeedname,$boxwidth,$titlefontsize,$fonttype,$channelfontcolor,$titlefontcolor,$descriptionfontsize,$descriptionfontcolor) {
    $string = " ";
	$feedurl=extractUrl($rss_feed_url);
  if ( $feedurl == 'undefined' ) {
  	$string .="The Feed Url isn't defined";
   } else {
   	echo '
   	<style type="text/css">
   	.cDescription{
   	padding-top:5px;
   	}
	.cDescription img{
	margin:0 5px 0 0;
	}
	</style>
   	';
    $rss = fetch_feed( $feedurl );
    $rss->set_cache_class('SimplePie_Cache');
	$rss->enable_cache(false);
	$rss->init();
	
	 if ($rss == false){ 
	    $string .= "[Cannot retrieve feed: ".substr($feedurl,0,40)."...]"; 
	    return $string; 
	 }
	 
	if(is_int((int)$boxwidth)) $sBoxWidth=$boxwidth; else $sBoxWidth="400";
	if(is_int((int)$titlefontsize)) $sFontSize="font-size:".$titlefontsize."px;"; else $sFontSize="";
	if($fonttype!=null) $sFontType="font-family:".$fonttype.";"; else $sFontType="";
	if($channelfontcolor!=null) $sChannelColor="color:".$channelfontcolor.";"; else $sChannelColor="";
	if($titlefontcolor!=null) $sTitleColor="color:".$titlefontcolor.";"; else $sTitleColor="";
	if(is_int((int)$descriptionfontsize)) $sDescriptionFontSize="font-size:".$descriptionfontsize."px;"; else $sDescriptionFontSize="";
	if($descriptionfontcolor!=null) $sDescriptionColor="color:".$descriptionfontcolor.";"; else $sDescriptionColor="";
	 $channelStyle="style='font-weight:bold;width:".$sBoxWidth."px;".$sFontSize.$sFontType.$sChannelColor."'";
	 $titleStyle="style='".$sFontSize.$sFontType.$sTitleColor."'";
	 $descriptionStyle="style='".$sDescriptionFontSize.$sFontType.$sDescriptionColor."'";
	 if($newwindow == 'true' || $newwindow == '1') 
	 {
	 	$target = "_blank";
		} else {
			$target = "_self";
	}
	
		if ( $displayfeedname == 'true' ) {
		$string .= "<br /><br /><a ". $channelStyle." href='" . $rss->get_link() ."' target=".$target." >" . $rss->get_title() ." - ". $rss->get_description();"</a> <br />";
		}
		$string.='<div style="width:'.$sBoxWidth.'px;margin-top:10px;">';
				foreach ($rss->get_items() as $item) {
								if ($display == 0) {
								break;
								}
								$href = $item->get_permalink();
								$desc = trim($item->get_description());
								$fulltitle=$item->get_title();
								$desc=html_entity_decode($desc);
								if( is_numeric($truncatetitle) ){
										if(strlen($fulltitle)>$truncatetitle)
												{
														$fulltitle=substr($fulltitle,0,$truncatetitle)." ... ";
												}
								}						
								

								$string .= '<div style="width:'.$sBoxWidth.'px;margin-top:10px;float:left;"><a href="'.$href.'" target="'.$target.'" title="'.$fulltitle.'" '.$titleStyle.'>'.$fulltitle.'</a></div>';


								if($displaydescriptions == 'true' && $desc<>"") {$string .= "<div ".$descriptionStyle." class='cDescription'>";$string .= $desc.'</div>';}
								$display--;
				}
		 }
    $string .= "</div>";
    return $string;
}

// ###

function omnifeed_func($atts) {
	$rssf=$atts[1];
	
	extract(shortcode_atts(array(
		'display' => '10',
		'rss_feed_url' => 'undefined',
		'displaydescriptions' => true,
		'truncatetitle' => false,
		'newwindow' => false,
        'displayfeedname' => true,
        'boxwidth' => '400',
        'titlefontsize' => false,
        'fonttype' => false,
        'channelfontcolor' => false,
        'titlefontcolor' => false,
        'descriptionfontsize' => false,
        'descriptionfontcolor' => false,
		
	), $atts));
	if($rssf!=NULL){ $rss_feed_url=extractUrl($rssf); }
	return getRSS($display,$rss_feed_url,$displaydescriptions,$truncatetitle,$newwindow,$displayfeedname,$boxwidth,$titlefontsize,$fonttype,$channelfontcolor,$titlefontcolor,$descriptionfontsize,$descriptionfontcolor);
}
						
?>
