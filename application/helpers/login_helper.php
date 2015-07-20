<?php

	function is_logged_in($role = 0) {
	    $CI =& get_instance();

	    $check = $role === 1
	    			? isset($CI->session->userdata['logged_in']) && $CI->session->userdata['role'] == $role
	    			: isset($CI->session->userdata['logged_in']);

	    return $check === TRUE;
	}