<?php
/**
 * class Tx_RathgeberProducts_Controller_SmartMenuController
 *
 * Controller >> SmartMenu
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

	class Tx_RathgeberProducts_Controller_SmartMenuController 
		extends Tx_Extbase_MVC_Controller_ActionController {
			
		/**
		 * action show
		 *
		 * @param 
		 * @return 
		 */
		public function showAction()  {

			$categoryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CategoryRepository');
			$categories = $categoryRepository->findAllApplicationCategories();
            // größe (höhe) für bildbereich ermitteln
			$countCat =  count($categories);
			$sizes['complete'] = 45*$countCat+($countCat-1);
			
			if ($_SERVER['REMOTE_ADDR'] == '46.223.67.28') {
				// Tx_Extbase_Utility_Debugger::var_dump ($categories);
			}
						
			$this->view->assign('categories',$categories);
			$this->view->assign('sizes',$sizes);
		}				
	}
?>