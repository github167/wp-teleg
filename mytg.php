<?php
/*
Plugin Name: Add space for Chinese
Description: It will add a space between each Chinese character
Version: 0.1
Author: C.T. Leung
License: GPL2
*/


add_filter('gwptb_post_draft_content', 'filter_text', 99 );

add_filter('gwptb_post_draft_title', 'filter_text', 99 );

function filter_text($input) {
	return $input . "=bye bye";
}

add_filter('gwptb_supported_commnds_list', 'modify_command', 11 );

function modify_command($commands) {
	$commands['def'] = 'newfun';
	return $commands;
}

function newfun($upd_data) {
	$result = array();	
	
	//get help text from options		
	$result['text'] = '<b>hello</b> world';
	$result['text'] = str_replace('%%home%%', "<a href='".home_url()."'>".home_url()."</a>", $result['text']);
	
	$result['text'] = apply_filters('gwptb_output_html', $result['text']);
	$result['parse_mode'] = 'HTML';
		
	return $result;
}

add_filter('the_content', 'add_space_for_chinese1', 11 );

function add_space_for_chinese($content) {
   $convmap = array(0x80, 0xffff, 0, 0xffff);
   $output = mb_encode_numericentity($content, $convmap, 'UTF-8');
   $output = preg_replace('/(\&\#[0-9]{5}\;)/', '\\1'.'*', $output);
   return $output;
}

function add_space_for_chinese1($content) {
   return $content."helloworld and abc=".$_GET['abc'];
}



?>
