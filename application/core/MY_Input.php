<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

class MY_Input extends CI_Input
{
    public function __construct()
    {
        parent::__construct();
    }

    public function post( $xss_clean = TRUE , $index = null)
    {
        return parent::post($index, $xss_clean);
    }
}

?>