<?php
	function is_logged_in($role = 0) {
	    $CI =& get_instance();
	    return ((isset($CI->session->userdata['logged_in']) && $CI->session->userdata['role'] == $role) === TRUE);
	}