<?php
/**
 * class Tx_RathgeberProducts_Domain_Repository_CategoryRepository
 *
 * Repository >> Category
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */
	
	class Tx_RathgeberProducts_Domain_Repository_CategoryRepository
		extends Tx_Extbase_Persistence_Repository {
			
	 	public function findProductsByCategory($uid) {	
        	
        	$query = $this->createQuery();		
        	$query->matching($query->equals('tx_rathgeberproducts_product_category_mm.uid_local', $uid));
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));				
    	    return $query->execute();
    	}	
		
		public function findAllApplicationCategories () {
			$query = $this->createQuery();
        	$query->matching(
                    $query->logicalAnd(
                        $query->equals('cattype', 1),
                        $query->logicalNot(
                            $query->equals('startpage', 0)
                        )
                    )
                );
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));			
    	    return $query->execute();
		}
		
		public function findAllSmart() {	
        	
        	$query = $this->createQuery();		
        	$query->matching($query->equals('pid', '189'));
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));				
    	    return $query->execute();
    	}	
	}
?>
