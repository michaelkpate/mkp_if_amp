// TXP 4.6 tag registration
if (class_exists('Textpattern_Tag_Registry')) {
	Txp::get('Textpattern_Tag_Registry')
		->register('mkp_if_amp')
	;
}

function mkp_if_amp($atts, $thing='')
{

	global $variable;

	// preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')) was copied from the function preText in publish.php

	$parts = explode('/', preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')), 5);

	// if the url ends in 'amp' this will return true; otherwise false
	 
	return (end($parts) == 'amp') ? parse(EvalElse($thing, true)) : parse(EvalElse($thing, false));
}
