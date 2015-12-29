<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_phrase')){

	function get_phrase($phrase = ''){
		$CI	=&	get_instance();
		return $CI->lang->line($phrase);
	}
}