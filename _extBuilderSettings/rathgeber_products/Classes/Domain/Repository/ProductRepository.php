<?php
/**
 * class Tx_RathgeberProducts_Domain_Repository_ProductRepository
 *
 * Repository >> Product
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */
	
	class Tx_RathgeberProducts_Domain_Repository_ProductRepository
		extends Tx_Extbase_Persistence_Repository {
	
			
    	public function findProductsByType($type) {	
        	$query = $this->createQuery();		
        	$query->matching($query->equals('type', $type));
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
    	    return $query->execute();
    	}	
		
		public function findVariationsByUid($variante) {
        	$query = $this->createQuery();
            $query->getQuerySettings()->setRespectSysLanguage(FALSE);
        	$query->matching($query->equals('variante', $variante));
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
    	    return $query->execute();
    	}	
		
		public function findProductsByCategory($uid) {	
        	$query = $this->createQuery();		
        	$query->matching($query->logicalAnd($query->equals('categories.uid', $uid),$query->equals('type',0)));
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
    	    return $query->execute();
    	}
		
		public function findProductsAndVariationsByCategory($uid) {	
        	$query = $this->createQuery();		
        	$query->matching($query->logicalAnd($query->equals('categories.uid', $uid),$query->logicalOr($query->equals('type',0),$query->equals('type',2))));
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
    	    return $query->execute();
    	}	

		public function findProductsWithCatpreviewByCategory($uid) {	
        	$query = $this->createQuery();		
	    	$query->statement("SELECT prod.uid, prod.name, prod.catpreview
	    		FROM tx_rathgeberproducts_domain_model_product AS prod
	    		INNER JOIN tx_rathgeberproducts_product_category_mm AS cat
	    		ON prod.uid = cat.uid_foreign
	    		WHERE
	    			cat.uid_local = '" . $uid . "'
	    			AND prod.catpreview != ''"
			);
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
    	    return $query->execute();
    	}	
		
		public function findFiltered ( $arguments, $productRepositoryId = null ) {
			$query = $this->createQuery();		
			
			$whereString = 'deleted = 0 AND hidden = 0 ';
			$joinString = '';
			$groupString = 'tx_rathgeberproducts_domain_model_product.uid';

			if ($productRepositoryId != null) {
				$whereString .= ' AND tx_rathgeberproducts_domain_model_product.pid = ' . $productRepositoryId;
			}

			foreach ($arguments as $label => $values) {
					
				switch ($label) {
					case 'colour':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_colour_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_colour_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_colour_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'form':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_forms_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_forms_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_forms_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'size':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_size_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_size_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_size_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'strength':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_strength_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_strength_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_strength_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'material':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_material_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_material_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_material_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'printing':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_printing_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_printing_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_printing_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'fixation':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_fixation_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_fixation_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_fixation_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'surfacerefinement':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_surfacerefinement_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_surfacerefinement_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_surfacerefinement_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'certification':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_certification_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_certification_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_certification_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'identification':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_identification_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_identification_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_identification_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'productname':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_productname_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_productname_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_productname_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;
					case 'frequency':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_frequency_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_frequency_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_frequency_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;						
					case 'imprint':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_imprint_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_imprint_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_imprint_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;						
					case 'metal':
						if (!empty($values)) {
							$joinString .= 'LEFT JOIN tx_rathgeberproducts_product_metal_mm ON ( tx_rathgeberproducts_domain_model_product.uid = tx_rathgeberproducts_product_metal_mm.uid_foreign) ';
							$whereString .= ' AND tx_rathgeberproducts_product_metal_mm.uid_local IN ('. implode(',',$values) .') ';
						}
						break;						
					
				}
			}

			$query->statement('SELECT tx_rathgeberproducts_domain_model_product.* FROM tx_rathgeberproducts_domain_model_product ' . $joinString . ' WHERE ' . $whereString . ' GROUP BY ' . $groupString);
			
	        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
			
    	    return $query->execute();
		}

		public function findProductsFromMM($appId) {
			$query = $this->createQuery();
			$query->statement("SELECT app.uid
							FROM tx_rathgeberproducts_domain_model_product AS app
							INNER JOIN tx_rathgeberproducts_application_product_mm AS prod
							ON app.uid = prod.uid_local
							WHERE prod.uid_foreign ='".$appId ."'"
			);

			// $query->setOrderings(array('sorting_foreign' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
			return $query->execute();
		}


		/*
		 public function findByUid($uid) {
			 $query = $this->createQuery();
			 $query->getQuerySettings()->setRespectSysLanguage(FALSE);
			 //$query->getQuerySettings()->setRespectStoragePage(TRUE);
			 $object = $query
					 ->matching(
						 $query->equals('uid', $uid)
					 )
					 ->execute()
					 ->getFirst();
			 return $object;
		 }
*/
		// public function findByUid2($uid) {
			// $query = $this->createQuery();		
		    	// $query->statement("SELECT name, description, headline, technologies, images, thumbsheadline, variante, motherdescription, mothername, motherthumbsheadline, motherheadline, video, videocaption, thumbnails, categories, catpreview, preview, verarbeitung, short, uploadedpdf, uploadedpdfname, uid, forms, printing, material, size, strength, colour, fixation, delivery, resistance, temperature, pcolour, flexdata, imagecaption, _localizedUid, _languageUid, pid
		    		    		// FROM tx_rathgeberproducts_domain_model_product
					    		// WHERE uid ='".$uid ."'"
				// );

		   		// $query->setOrderings(array('sorting_foreign' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
			    // return $query->execute();
		// }	
	}
?>
