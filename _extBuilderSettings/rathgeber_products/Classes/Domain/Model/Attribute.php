<?php
/**
 * class Tx_RathgeberProducts_Domain_Model_Attribute
 *
 * Attribute
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */
 
	class Tx_RathgeberProducts_Domain_Model_Attribute extends Tx_Extbase_DomainObject_AbstractEntity {
		
		/**
		 * @var string
		 */		
		protected $name = '';
		
		public function __construct ($name = '') {
			$this->setName($name);			
		}	
		
		public function setName($name) {
			$this->name = (string)$name;
		}
		
		public function getName() {
			return $this->name;
		}
	
	}

?>