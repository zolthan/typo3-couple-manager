<?php
/**
 * class Tx_RathgeberProducts_Controller_CategoryController
 *
 * Controller >> Category
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

	class Tx_RathgeberProducts_Controller_CategoryController 
		extends Tx_Extbase_MVC_Controller_ActionController {
			
		/**
		 * action list
		 *
		 * @param 
		 * @return 
		 */
		public function listAction()  {

			if ($this->request->hasArgument('catid')) {

				$catId = $this->request->getArgument('catid');
				
				$categoryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CategoryRepository');
				$categories = $categoryRepository->findByUid($catId);
				$this->view->assign('categories',$categories);	
	 
				if ($categories->cattype==0 || $categories->cattype == 2) {
					$productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
					$products = $productRepository->findProductsByCategory($catId);
					if ($_SERVER['REMOTE_ADDR'] == '46.237.229.208') {
						//Tx_Extbase_Utility_Debugger::var_dump ($products,"prod");
					}
					$this->view->assign('products',$products);
				} elseif ($categories->cattype==1 || $categories->cattype == 3) {
					$applicationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ApplicationRepository');
					$products = $applicationRepository->findApplicationByCategory($catId);
					$this->view->assign('products',$products);
				}
			}
		}

        /**
         * action mobil
         *
         * @param
         * @return
         */
        public function mobilAction()  {

            if ($this->request->hasArgument('catid')) {

                $catId = $this->request->getArgument('catid');

                $categoryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CategoryRepository');
                $categories = $categoryRepository->findByUid($catId);

                $this->view->assign('categories',$categories);
                if ($categories->cattype==0) {
                    $productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
                    $products = $productRepository->findProductsByCategory($catId);
                    if ($_SERVER['REMOTE_ADDR'] == '46.237.229.208') {
                        Tx_Extbase_Utility_Debugger::var_dump ($products,"prod");
                    }
                    $this->view->assign('products',$products);
                } elseif ($categories->cattype==1) {
                    $applicationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ApplicationRepository');
                    $products = $applicationRepository->findApplicationByCategory($catId);
                    $this->view->assign('products',$products);
                }
            }

            //var_dump(__METHOD__);
        }
    }
?>