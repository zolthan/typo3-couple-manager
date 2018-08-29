<?php
/**
 * class Tx_RathgeberProducts_Domain_Repository_ApplicationRepository
 *
 * Repository >> Application
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */
	
class Tx_RathgeberProducts_Domain_Repository_ApplicationRepository
	extends Tx_Extbase_Persistence_Repository {
		
	
	public function findApplicationByCategory($uid) {	
    	$query = $this->createQuery();		
    	$query->matching($query->equals('categories.uid', $uid));
        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
	    return $query->execute();
	}	

	
	public function findApplicationByCategorySmart($uid) {
    	$query = $this->createQuery();	
		
/*			
		$storagePageIds = array('189');
		$querySettings = t3lib_div::makeInstance('Tx_Extbase_Persistence_Typo3QuerySettings');
		$querySettings->setStoragePageIds($storagePageIds);	
		$query->setQuerySettings($querySettings);
		Tx_Extbase_Persistence_Typo3QuerySettings::setStoragePageIds($storagePageIds);	
    	// $query->matching($query->equals('categories.uid', $uid));

    	
    	$query->matching($query->logicalAnd($query->equals('categories.uid', $uid),$query->equals('categories.pid','189')));		
        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
		
		
		*/
		
		$query->statement("SELECT app.uid, app.name
    		FROM tx_rathgeberproducts_domain_model_category AS app
    		INNER JOIN tx_rathgeberproducts_application_category_mm AS cat
    		ON app.uid = cat.uid_foreign
    		WHERE app.cattype = 1 AND app.pid = '189' AND cat.uid_local = '" . $uid . "'"
		);
		if ($_SERVER['REMOTE_ADDR'] == '46.223.67.28') {
			// Tx_Extbase_Utility_Debugger::var_dump ($query);
		}
				
	    return $query->execute();
	}	

	public function findApplicationsWithCatpreviewByCategory($uid) {	
    	$query = $this->createQuery();		
    	$query->statement("SELECT app.uid, app.name, app.catpreview
    		FROM tx_rathgeberproducts_domain_model_application AS app
    		INNER JOIN tx_rathgeberproducts_application_category_mm AS cat
    		ON app.uid = cat.uid_foreign
    		WHERE
    			cat.uid_local = '" . $uid . "'
    			AND app.catpreview != ''"
		);
        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
	    return $query->execute();
	}	
	
	


}

?>
