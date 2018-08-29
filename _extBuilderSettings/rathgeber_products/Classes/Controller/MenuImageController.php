<?php
/**
 * class Tx_RathgeberProducts_Controller_MenuImageController
 *
 * Controller >> MenuImage
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

	class Tx_RathgeberProducts_Controller_MenuImageController 
		extends Tx_Extbase_MVC_Controller_ActionController {
			
		/**
		 * action show
		 *
		 * @param 
		 * @return 
		 */
		public function showAction() {
			$categoryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CategoryRepository');

			$products = array();

			$catIdArray = explode(',', $this->settings['menucat']);
			foreach($catIdArray as $catId) {
				$category = $categoryRepository->findByUid($catId);

				if ($category->cattype === 0 || $category->cattype === 2) {
					$repository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
					$selectMethod = 'findProductsWithCatpreviewByCategory';
				}
				elseif ($category->cattype === 1 || $category->cattype === 3) {
					$repository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ApplicationRepository');
					$selectMethod = 'findApplicationsWithCatpreviewByCategory';
				}
				else {
					continue;
				}

				foreach($repository->$selectMethod($catId) as $product) {
					$product->catid = $catId;
					$product->cattype = $category->cattype;
					$products[] = clone $product;
				}
			}
			
			//Tx_Extbase_Utility_Debugger::var_dump($products, '$products');
			$this->view->assign('products', $products);
		}				
		
	}
?>