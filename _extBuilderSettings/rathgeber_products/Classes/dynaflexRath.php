<?php
/************************************************************************
 * 
 * 
 * 
 * 
 * 
 ************************************************************************/

class tx_rathgeberproducts_dynaflexRath {
 	
	// var $rowChecks = array (
// 	
	// );
	
	var $DCA = array (
	
		0 => array (
		'path' => 'tx_rathgeberproducts_domain_model_product/columns/flexdata/config/ds/default',
 
			'modifications' => array (
 
				array (
					'method' => 'add',
					'type' => 'fields',
					'path' => 'ROOT/el',
					
					'source' => 'db',
					'source_type' => 'entry_count',
					'source_config' => array (
						'table' => 'tx_rathgeberproducts_product_attribute_mm',	
						'select' => 'uid_foreign',
						'where' => 'uid_local=###product### ORDER BY sorting'
					),
 
					'field_config' => array (	
						'label' => array(
							'table' => 'tx_rathgeberproducts_domain_model_attribute',	
							'select' => 'name',
							'where' => 'uid=###DATA###'
						),
						'name' => '###DATA###',
						'config' => array (
							'type' => 'input',
							'size' => '30'
						)
					)
				)
			)
 		)
  	);
 
	
	var $cleanUpField = 'flexdata';

	// var $hooks = array(
// 
		// 'EXT:dynaflex_tut/class.tx_dynaflextut_dcahooks.php:tx_dynaflextut_dcahooks'
// 
	// );
}
 
 
?>