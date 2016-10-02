<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'Replace quotes',
	'pi_version' =>'1.0',
	'pi_author' =>'Pete Heaney',
	'pi_description' => 'Replaces any quotes within a string with the equivalent HTML entity',
	'pi_usage' => Replace_quotes::usage()
);

class Replace_quotes {

	public function __construct()
	{
		$this->EE =& get_instance();
	}

	public function replace()
	{
		$step1 = str_replace( '"', '&quot;', $this->EE->TMPL->fetch_param('string') );
		$step2 = str_replace( "'", '&#39;', $step1 );
		return $step2;
	}

	static function usage()
  {
  ob_start();
  ?>

{exp:replace_quotes:replace string='this is a string with "quotes" in it'}

{exp:replace_quotes:replace string="{some_variable}"}

  <?php
  $buffer = ob_get_contents();

  ob_end_clean();

  return $buffer;
  }

}

/* End of file pi.replace_quotes.php */
