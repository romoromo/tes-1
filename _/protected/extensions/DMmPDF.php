<?php

/**
 * Diginet Media mPDF wrapper
 *
 * @package reporting
 * @author Diginet Media
 **/

require_once(dirname(__FILE__).'/mpdf60/mpdf.php');
spl_autoload_unregister(array('YiiBase','autoload'));
spl_autoload_register(array('YiiBase','autoload'));


class DMmPDF extends CApplicationComponent
{
	private $_mpdf;

	private $_html;

	public static function set($arrayConfig=array())
	{
		if (!is_array($arrayConfig)) {
			# jika setup config manual
			return new mPDF('utf-8', 'A4', 0, '', 5, 5, 5, 1, 1, 1, '');
		}
		$default= array(
			'mode' => ''
			, 'format' => 'A4-P' // kertas - orientasi
		);
		$setting = array_merge($default,$arrayConfig);
		extract($setting);
		return new mPDF($mode, $format);
	}
}
?>