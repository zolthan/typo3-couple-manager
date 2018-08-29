<?php
/**
 * class Tx_RathgeberProducts_Controller_MenuController
 *
 * Controller >> Menu
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

	class Tx_RathgeberProducts_Controller_MenuController 
		extends Tx_Extbase_MVC_Controller_ActionController {
			
		/**
		 * action show
		 *
		 * @param 
		 * @return 
		 */
		public function showAction()  {
			$categoryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CategoryRepository');
			$catId = $this->settings['menucat'];
			
			$categories = $categoryRepository->findByUid($catId);
			$this->view->assign('categories',$categories);	
 
			if ($categories->cattype==0) {
				$productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
				$products = $productRepository->findProductsByCategory($catId);
			} elseif ($categories->cattype==1) {
				$applicationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ApplicationRepository');
				$products = $applicationRepository->findApplicationByCategory($catId);
			} elseif ($categories->cattype==2) {
                $productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
                $products = $productRepository->findProductsByCategory($catId);
            }elseif ($categories->cattype==3) {
                $applicationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ApplicationRepository');
                $products = $applicationRepository->findApplicationByCategory($catId);
            }
		
			if ($_SERVER['REMOTE_ADDR'] == '46.223.67.28') {
				// Tx_Extbase_Utility_Debugger::var_dump ($categories,"products");

			}

			
			$this->view->assign('products',$products);
			
		}
	}
?>