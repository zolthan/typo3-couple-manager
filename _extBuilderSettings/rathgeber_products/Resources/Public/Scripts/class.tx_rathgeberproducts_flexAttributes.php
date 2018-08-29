<?php

//'path' => 'tx_rathgeberproducts_domain_model_product/columns/flexdata/config/ds/default',

class tx_rathgeberproducts_flexAttributes		{

	var $DCA = array (
		0 => array (
				// set the basic path! This is the field inside the TCA where everything is performed in
			'path' => 'tx_rathgeberproducts_domain_model_product/columns/flexdata/config/ds/default',
			'modifications' => array (
				

				
				array (
					'method' => 'add',
					'path' => 'ROOT/el',
					'type' => 'fields',
					'source' => 'db',								// where came the data from?
					'source_type' => 'entry_count',					// how should it be handled?
					'source_config' => array (						// define it a little bit more detailed, get it from
						'table' => 'tx_rathgeberproducts_domain_model_attribute',						// table
						'select' => 'uid,pid,name',					// which fields should be fetched?
						'where' => 'rateable=1 AND deleted=0 AND hidden=0',							// which fields should be fetched?
					),
					// keep in mind, that you can create more than one field at once. See the step above
					'field_config' => array (						// define what is inserted for each dataset from source
						'name' => '###uid###',				// replace ###uid### with uid from dataset
						'label' => 'Bewertung für ###name### (für Website ID: ###pid### --- RATHGEBER = 88, smart-TEC = 254)',	// same with ###username###
						'config' => array (
							'type' => 'select',
							'items' => array(
								array('Nicht anzeigen', 0),
								array('1', 1),
								array('2', 2),
								array('3', 3),
								array('4', 4),
								array('5', 5),
								array('6', 6),
								array('7', 7),
								array('8', 8),
								array('9', 9),
								array('10', 10),						
							),
							'size' => 1,
							'maxitems' => 1,
						)
					)
				),
			)
		)
		
	);
	
		var $cleanUpField = 'flexdata';
}
?>

