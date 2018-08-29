<?php
/**
 * class Tx_RathgeberProducts_Domain_Model_Category
 *
 * Category
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */
 
	class Tx_RathgeberProducts_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {
		
		/**
		 * @var string
		 */		
		protected $name = '';

		/**
		 * @var string
		 */		
		protected $metatitle = '';
		
		/**
		 * @var string
		 */		
		protected $image = '';
		
		/**
		 * @var string
		 */		
		protected $short = '';
		
		/* @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Product>
    	 * @lazy
    	 * @cascade remove
    	*/
    	protected $products;
		
		/**
		 * @var string
		 */		
		public $description = '';

		/**
		 * @var integer;
		 */		
		public $cattype = '';

        /**
         * @var integer;
         */
        public $startpage = '';
		
		
		public function __construct ($name = '', $metatitle = '', $image = '', $short = '', $products = '', $startpage = '') {
			$this->setName($name);
			$this->setMetatitle($metatitle);
			$this->setImage($image);
			$this->setShort($short);
			$this->setProducts($products);
            $this->setStartpage($startpage);
									
		}	
		
		public function setName($name) {
			$this->name = (string)$name;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function setMetatitle($metatitle) {
			$this->metatitle = (string)$metatitle;
		}
		
		public function getMetatitle() {
			return $this->metatitle;
		}
		
		public function setImage($image) {
			$this->image = (string)$image;
		}
		
		public function getImage() {
			return $this->image;
		}
	
		public function setShort($short) {
			$this->short = (string)$short;
		}
		
		public function getShort() {
			return $this->short;
		}
		
		public function setProducts(Tx_Extbase_Persistence_ObjectStorage $products) {
			$this->products = $products;
		}
		
		public function getProducts() {
			return $this->products;
		}

        public function setStartpage($startpage) {
            $this->startpage = $startpage;
        }

        public function getStartpage() {
            return $this->startpage;
        }
	}

?>