<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Leo Unglaub 2012
 * @author     Leo Unglaub <leo@leo-unglaub.net>
 * @package    ac_core
 * @license    LGPL
 * @filesource
 */


/**
 * Class AutoCompleter
 * Provide mathods for the auto completer
 * 
 * @copyright  Leo Unglaub 2012
 * @author     Leo Unglaub <leo@leo-unglaub.net>
 * @package    ac_core
 */
abstract class AutoCompleter extends Controller
{
	/**
	 * Formular id
	 * @var sting
	 */
	protected $strFormId;

	/**
	 * Config array
	 * @var array
	 */
	protected $arrConfig = array();

	/**
	 * Contain all valid and supported config options
	 * @var array
	 */
	protected $arrConfigOptions = array();

	/**
	 * additional url parameter
	 * @var string
	 */
	protected $strUrlAdditional;

	/**
	 * set a object property or a config option
	 * 
	 * @param string $strKey
	 * @param mixed $varValue
	 * @return void
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'formId':
				$this->strFormId = $varValue;
				break;

			case 'urlAdditional':
				$this->strUrlAdditional = $varValue;
				break;

			default:
				// if $strKey is a valid config option, set them
				if (in_array($strKey, $this->arrConfigOptions))
				{
					$this->arrConfig[$strKey] = $varValue;
					break;
				}

				throw new Exception(sprintf('Invalid argument "%s"', $strKey));
				break;
		}
	}

	/**
	 * return a object property or a config option
	 * 
	 * @param string $strKey
	 * @return mixed
	 */
	public function __get($strKey)
	{
		switch ($strKey)
		{
			case 'formId':
				return $this->strFormId;
				break;

			case 'urlAdditional':
				return $this->strUrlAdditional;
				break;

			default:
				if (in_array($strKey, $this->arrConfig))
				{
					return $this->arrConfig[$strKey];
					break;
				}

				return null;
				break;
		}
	}

	/**
	 * @return string
	 */
	protected function generateConfig()
	{
		return json_encode($this->arrConfig);
	}

	/**
	 * @return mixed
	 */
	abstract public function generate();
}

?>