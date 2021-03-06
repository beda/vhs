<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Claus Due <claus@wildside.dk>, Wildside A/S
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * Base class for ViewHelpers capable of relocating content,
 * i.e. relocation to footer or header of page.
 *
 * @author Claus Due <claus@wildside.dk>, Wildside A/S
 * @package Vhs
 * @subpackage ViewHelpers\Page
 */
abstract class Tx_Vhs_ViewHelpers_Page_AbstractRelocationViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerArgument('content', 'string', 'Content to relocate', FALSE, NULL);
		$this->registerArgument('name', 'string', 'Optional name of the content. If multiple occurrences of the same name happens, behavior is defined by argument "overwrite"');
		$this->registerArgument('overwrite', 'boolean', 'If set to FALSE and a relocated string with "name" already exists, does not overwrite the existing relocated string. Default behavior is to overwrite.', FALSE, TRUE);
	}

	/**
	 * @return boolean
	 */
	protected function getOverwrite() {
		return (boolean) $this->arguments['overwrite'];
	}

	/**
	 * @return string
	 */
	protected function getName() {
		if (isset($this->arguments['name'])) {
			$name = $this->arguments['name'];
		} else {
			$content = $this->getContent();
			$name = md5($content);
		}
		return $name;
	}

	/**
	 * @return string
	 */
	protected function getContent() {
		if (isset($this->arguments['content']) === FALSE) {
			$content = $this->renderChildren();
		} else {
			$content = $this->arguments['content'];
		}
		return $content;
	}

}
