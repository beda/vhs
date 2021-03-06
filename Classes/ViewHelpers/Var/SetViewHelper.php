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
 ***************************************************************/

/**
 * Variable: Set
 *
 * @author Claus Due <claus@wildside.dk>, Wildside A/S
 * @package Vhs
 * @subpackage ViewHelpers\Var
 */
class Tx_Vhs_ViewHelpers_Var_SetViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Set (override) the variable in $name.
	 *
	 * Why is $value first? In order to support this, for example:
	 *
	 * {value -> vhs:format.plaintext() -> vhs:var.set(name: 'myVariable')}
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public function render($name, $value = NULL) {
		if ($value === NULL) {
			$value = $this->renderChildren();
		}
		if ($this->templateVariableContainer->exists($name) === TRUE) {
			$this->templateVariableContainer->remove($name);
		}
		$this->templateVariableContainer->add($name, $value);
		return NULL;
	}

}
