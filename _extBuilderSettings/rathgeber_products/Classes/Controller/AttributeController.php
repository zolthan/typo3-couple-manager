<?php
/**
 * class Tx_RathgeberProducts_Controller_AttributeController
 *
 * Controller >> Attribute
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

	class Tx_RathgeberProducts_Controller_AttributeController 
		extends Tx_Extbase_MVC_Controller_ActionController {
			
		/**
		 * action list
		 *
		 * @param 
		 * @return 
		 */
		public function listAction()  {
			
			$attributeRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_AttributeRepository');
			$attributes = $attributeRepository->findAll();
			$this->view->assign('attributes',$attributes);			
		}				
	}
?>