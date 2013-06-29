<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package   
 * @author    Simon Kusterer
 * @license   LGPL
 * @copyright Simon Kusterer 2013
 */

class MootoolsAutoCompleter extends AutoCompleter
{

	/**
	 * Set some default parameters and call the
	 * parent cunstructor
	 */
	public function __construct()
	{
		$this->indicatorClass = 'autocompleter-loading';
		parent::__construct();
	}

	/**
	 * Contains all valid and supported config options
	 * @var array
	 */
	protected $arrConfigOptions = array
	(
		'minLength', 'markQuery', 'width', 'maxChoices', 'visibleChoices', 'className', 'zIndex', 'delay', 'autoSubmit', 'overflow',
		'overflowMargin', 'selectFirst', 'forceSelect', 'selectMode', 'multiple', 'separator', 'autoTrim', 'allowDupes', 'cache',
		'relative', 'indicatorClass'
	);

	/**
	 * @throws Exception
	 */
	public function generate()
	{
		// check if the formularfield id is set
		if ($this->strFormId == '')
		{
			throw new Exception('Missing the form field id. Please set the form field id like $objAc->formId = "foo";');
		}

		// add the auto completer core to the site header
		if ($GLOBALS['TL_CONFIG']['debugMode'] === true || $GLOBALS['TL_CONFIG']['displayErrors'] === true)
		{
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/ac_core/html/ac_core.src.js';
		}
		else
		{
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/ac_core/html/ac_core.js';
		}

		$objTemplate = new \FrontendTemplate('mootools_autocompleter');
		$objTemplate->strFormId = $this->strFormId;
		$objTemplate->urlAdditional = $this->urlAdditional;
		$objTemplate->config = $this->generateConfig();

		$GLOBALS['TL_HEAD'][] = $objTemplate->parse();
	}

}