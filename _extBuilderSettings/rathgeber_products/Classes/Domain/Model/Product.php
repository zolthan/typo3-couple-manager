<?php
/**
 * class Tx_RathgeberProducts_Domain_Model_Product
 *
 * Product
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */


	class Tx_RathgeberProducts_Domain_Model_Product extends Tx_Extbase_DomainObject_AbstractEntity {
		
		/**
		 * @var string
		 */		
		public $name = '';
		
		/**
		 * @var string
		 */		
		public  $description = '';
		
		/**
		 * @var string
		 */		
		public  $appdescription = '';
		
		/**
		 * @var string
		 */		
		public  $headline = '';
		
		/**
		 * @var string
		 */		
		public  $metatitle = '';
		
		/**
		 * @var string
		 */		
		protected $technologies = '';
		
		/**
		 * @var string
		 */
		public $images;
		
		/**
		 * @var string
		 */
		public $thumbsheadline;
		
		/**
		 * @var integer
		 */
		public $variante;
				
		/**
		 * @var integer
		 */
		public $productid;

		/**
		 * @var string
		 */
		public $motherdescription;
		
		/**
		 * @var string
		 */
		public $mothername;
		
		/**
		 * @var string
		 */
		public $motherthumbsheadline;
				
		/**
		 * @var string
		 */
		public $motherheadline;
		
		/**
		 * @var string
		 */
		public $video;
		
		/**
		 * @var string
		 */
		public $videocaption;
				
		/**
		 * @var string
		 */
		public $thumbnails;
		
		/**
		 * 
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Category>
		 */
		public $categories;
		
		/**
		 * @var string
		 */
		public $catpreview;
				
		/**
		 * @var string
		 */
		public $preview;
		
		/**
		 * @var string
		 */		
		protected $verarbeitung;		
		
		/**
		 * @var string
		 */
		public $short;
		
		/**
		 * @var string
		 */		
		public $uploadedpdf;	
			
		/**
		 * @var string
		 */		
		public $uploadedpdfname;	
		
		/**
		 * @var integer
		 */		
		public $uid;			
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Forms>
		 */
		public $forms;
				
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Printing>
		 */
		public $printing;	
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Material>
		 */
		public $material;
				
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Size>
		 */
		public $size;	
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Strength>
		 */
		public $strength;
				
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Colour>
		 */
		public $colour;			
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Fixation>
		 */
		public $fixation;
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Delivery>
		 */
		public $delivery;		
								
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Resistance>
		 */
		public $resistance;			

		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Temperature>
		 */
		public $temperature;	

		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Pcolour>
		 */
		public $pcolour;
						
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Frequency>
		 */
		public $frequency;
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Surfacerefinement>
		 */
		public $surfacerefinement;

		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Certification>
		 */
		public $certification;

		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Identification>
		 */
		public $identification;
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Productname>
		 */
		public $productname;
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Dimension>
		 */
		public $dimension;				

		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Imprint>
		 */
		public $imprint;			
		
		/**
		 * @lazy
		 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_RathgeberProducts_Domain_Model_Metal>
		 */
		public $metal;
					
		/**
		* @var string
		**/
		protected $flexdata;		
		
		/**
		* @var string
		**/
		public $imagecaption;



        public function __construct ($name = '', $description = '', $headline = '', $metatitle = '', $technologies = '', $images = '', $thumbsheadline = '', $variante = '', $productid = '', $categories = '', $verarbeitung = '') {
			$this->setName($name);
			$this->setDescription($description);
			$this->setHeadline($headline);
			$this->setMetatitle($metatitle);
			$this->setTechnologies($technologies);
			$this->setImages($images);
			$this->setThumbsheadline($thumbsheadline);
			$this->setVariante($variante);
			$this->setProductid($productid);
			$this->setCategory($categories);
			
		}	
		
		public function setName($name) {
			$this->name = (string)$name;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function setDescription($description) {
			$this->description = (string)$description;
		}
		
		public function getDescription() {
			return $this->description;
		}
		
		public function setAppdescription($appdescription) {
			$this->appdescription = (string)$appdescription;
		}
		
		public function getAppdescription() {
			return $this->appdescription;
		}
	
		public function setHeadline($headline) {
			$this->headline = (string)$headline;
		}
		
		public function getHeadline() {
			return $this->headline;
		}
		
		public function setMetatitle($metatitle) {
			$this->metatitle = (string)$metatitle;
		}
		
		public function getMetatitle() {
			return $this->metatitle;
		}
		
		public function setTechnologies($technologies) {
			$this->technologies = (string)$technologies;
		}
		
		public function getTechnologies() {
			return $this->technologies;
		}
		
		public function setImages($images) {
			$this->images = (string)$images;
		}
		
		public function getImages() {
			return $this->images;
		}
		
		public function setShort($short) {
			$this->short = (string)$short;
		}
		
		public function getShort() {
			return $this->short;
		}
		
		public function setThumbsheadline($thumbsheadline) {
			$this->thumbsheadline = (string)$thumbsheadline;
		}
		
		public function getThumbsheadline() {
			return $this->thumbsheadline;
		}
		
		public function setVariante($variante) {
			$this->variante = (integer)$variante;
		}
		
		public function getVariante() {
			return $this->variante;
		}
		
		public function setProductid($productid) {
			$this->productid = (integer)$productid;
		}
		
		public function getProductid() {
			return $this->productid;
		}
		
		public function setCategory(Tx_Extbase_Persistence_ObjectStorage $categories) {
			$this->categories = $categories;
		}
		
		public function getCategory() {
			return $this->categories;
		}
		
		public function setVerarbeitung($verarbeitung) {
			$this->verarbeitung = (string)$verarbeitung;
		}
		
		public function getVerarbeitung() {
			return $this->verarbeitung;
		}
	
		/**
		* @param string $flexdata
		**/
		public function setFlexdata($flexdata) {
			$this->flexdata = $flexdata;
		}
		
		public function getFlexdata() {
			return $this->flexdata;
		}	
		
	}

?>