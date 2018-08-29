<?php
/**
 * class Tx_RathgeberProducts_Domain_Repository_ResistanceRepository
 *
 * Repository >> Forms
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */
	
	class Tx_RathgeberProducts_Domain_Repository_ResistanceRepository
		extends Tx_Extbase_Persistence_Repository {
			
	    	public function findAllFilterable() {	
	        	$query = $this->createQuery();		
	        	$query->matching($query->equals('filterable', 1));
		        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
					
	    	    return $query->execute();
	    	}	
	}
?>
