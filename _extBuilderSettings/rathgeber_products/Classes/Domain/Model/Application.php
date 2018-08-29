<?php
/**
 * class Tx_RathgeberProducts_Domain_Model_Application
 *
 * Application
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */


	class Tx_RathgeberProducts_Domain_Model_Application extends Tx_Extbase_DomainObject_AbstractEntity {
		
		/**
		 * @var string
		 */		
		public $name;
		
		/**
		 * @var string
		 */		
		public  $description;
		
		/**
		 * @var string
		 */		
		public  $catpreview;		
		
		/**
		 * @var string
		 */		
		public $short;
		
		
		/**
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Category>
		 */		
		public $categories;			

		/**
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Product>
		 */
		public $products;

		/**
		 * @var string
		 */		
		public $thumbsheadline;
		
		/**
		 * @var string
		 */		
		public $appsheadline;
			
		/**
		 * @var string
		 */		
		public $images;			
		
		/**
		 * @var string
		 */		
		public $thumbnails;
					
		/**
		* @var string
		**/
		public $imagecaption;	
				
				
		public function __construct ($name = '', $description = '', $products = '') {
			$this->setName($name);
			$this->setProducts($products);
			$this->products = new Tx_Extbase_Persistence_ObjectStorage;
			$this->products->addAll();
		}	
		
		/**
		 * 
		 * @param Tx_Extbase_Persistence_ObjectStorage $products
		 */
		
		public function setProducts($products) {
			$this->products = $products;
		}
		
		/**
		 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Product>
		 */
		public function getProducts() {
			return $this->products;
		}

	}

?>