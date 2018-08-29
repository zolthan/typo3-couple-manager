<?php
/**
 * class Tx_RathgeberProducts_Controller_FilterController
 *
 * Controller >> Filter
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

	class Tx_RathgeberProducts_Controller_FilterController 
		extends Tx_Extbase_MVC_Controller_ActionController {
			
		/**
		 * action show
		 *
		 * @param 
		 * @return 
		 */
		public function showAction()  {
			$colourRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ColourRepository');
			$colours = $colourRepository->findAllFilterable();

			$formsRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_FormsRepository');
			//$forms = $formsRepository->findAll();
			$forms = $formsRepository->findAllFilterable();
			
			$materialRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_MaterialRepository');
			$materials = $materialRepository->findAllFilterable();
			
			$sizeRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_SizeRepository');
			$sizes = $sizeRepository->findAllFilterable();
				
			$strengthRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_StrengthRepository');
			$strengths = $strengthRepository->findAllFilterable();
			
			$printingRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_PrintingRepository');
			$printings = $printingRepository->findAllFilterable();
			
			$fixationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_FixationRepository');
			$fixations = $fixationRepository->findAllFilterable();			
			
			$temperatureRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_TemperatureRepository');
			$temperatures = $temperatureRepository->findAllFilterable();
			
			$deliveryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_DeliveryRepository');
			$deliveries = $deliveryRepository->findAllFilterable();		
			
			$resistanceRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ResistanceRepository');
			$resistances = $resistanceRepository->findAllFilterable();
			
			$pcolourRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_PcolourRepository');
			$pcolours = $pcolourRepository->findAllFilterable();
			
			$frequencyRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_FrequencyRepository');
			$frequencies = $frequencyRepository->findAllFilterable();
			
			$surfacerefinementRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_SurfacerefinementRepository');
			$surfacerefinements = $surfacerefinementRepository->findAllFilterable();
			
			$certificationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CertificationRepository');
			$certifications = $certificationRepository->findAllFilterable();
			
			$ProductnameRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductnameRepository');
			$productnames = $ProductnameRepository->findAllFilterable();
			
			$identificationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_IdentificationRepository');
			$identifications = $identificationRepository->findAllFilterable();
			
			$dimensionRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_DimensionRepository');
			$dimensions = $dimensionRepository->findAllFilterable();							
						
			$imprintRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ImprintRepository');
			$imprints = $imprintRepository->findAllFilterable();
			
			$metalRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_MetalRepository');
			$metals = $metalRepository->findAllFilterable();
						
			$args = $this->request->getArguments();
			foreach ($args as $k => $v) {
				if (is_array($v))
					$checks[$k] = $v;
			}
			
			foreach ($colours as $val) {
				if($checks['colour'] && in_array($val->getUid(), $checks['colour'])) {
					$val->checked = 1;
				}
			}
			foreach ($forms as $val) {
				if($checks['form'] && in_array($val->getUid(), $checks['form'])) {
					$val->checked = 1;
				}
			}
			foreach ($materials as $val) {
				if($checks['material'] && in_array($val->getUid(), $checks['material'])) {
					$val->checked = 1;
				}
			}
			foreach ($sizes as $val) {
				if($checks['size'] && in_array($val->getUid(), $checks['size'])) {
					$val->checked = 1;
				}
			}
			foreach ($strengths as $val) {
				if($checks['strength'] && in_array($val->getUid(), $checks['strength'])) {
					$val->checked = 1;
				}
			}
			foreach ($printings as $val) {
				if($checks['printing'] && in_array($val->getUid(), $checks['printing'])) {
					$val->checked = 1;
				}
			}
			foreach ($fixations as $val) {
				if($checks['fixation'] && in_array($val->getUid(), $checks['fixation'])) {
					$val->checked = 1;
				}
			}
			foreach ($temperatures as $val) {
				if($checks['temperature'] && in_array($val->getUid(), $checks['temperature'])) {
					$val->checked = 1;
				}
			}
			foreach ($deliveries as $val) {
				if($checks['delivery'] && in_array($val->getUid(), $checks['delivery'])) {
					$val->checked = 1;
				}
			}
			foreach ($resistances as $val) {
				if($checks['resistance'] && in_array($val->getUid(), $checks['resistance'])) {
					$val->checked = 1;
				}
			}
			foreach ($pcolours as $val) {
				if($checks['pcolour'] && in_array($val->getUid(), $checks['pcolour'])) {
					$val->checked = 1;
				}
			}
			foreach ($frequencies as $val) {
				if($checks['frequency'] && in_array($val->getUid(), $checks['frequency'])) {
					$val->checked = 1;
				}
			}
			foreach ($surfacerefinements as $val) {
				if($checks['surfacerefinement'] && in_array($val->getUid(), $checks['surfacerefinement'])) {
					$val->checked = 1;
				}
			}
			foreach ($certifications as $val) {
				if($checks['certification'] && in_array($val->getUid(), $checks['certification'])) {
					$val->checked = 1;
				}
			}
			foreach ($productnames as $val) {
				if($checks['productname'] && in_array($val->getUid(), $checks['productname'])) {
					$val->checked = 1;
				}
			}
			foreach ($identifications as $val) {
				if($checks['identification'] && in_array($val->getUid(), $checks['identification'])) {
					$val->checked = 1;
				}
			}
			foreach ($dimensions as $val) {
				if($checks['dimension'] && in_array($val->getUid(), $checks['dimension'])) {
					$val->checked = 1;
				}
			}
			foreach ($imprints as $val) {
				if($checks['imprint'] && in_array($val->getUid(), $checks['imprint'])) {
					$val->checked = 1;
				}
			}
			foreach ($metals as $val) {
				if($checks['metal'] && in_array($val->getUid(), $checks['metal'])) {
					$val->checked = 1;
				}
			}
			
			$this->view->assign('colours',$colours);
			$this->view->assign('forms',$forms);
			$this->view->assign('materials',$materials);
			$this->view->assign('sizes',$sizes);
			$this->view->assign('strengths',$strengths);
			$this->view->assign('printings',$printings);
			$this->view->assign('fixations',$fixations);
			$this->view->assign('temperatures',$temperatures);
			$this->view->assign('deliveries',$deliveries);
			$this->view->assign('resistances',$resistances);
			$this->view->assign('pcolours',$pcolours);
			$this->view->assign('surfacerefinements',$surfacerefinements);
			$this->view->assign('certifications',$certifications);
			$this->view->assign('productnames',$productnames);
			$this->view->assign('identifications',$identifications);
			$this->view->assign('frequencies',$frequencies);
			$this->view->assign('dimensions',$dimensions);
			$this->view->assign('imprints',$imprints);
			$this->view->assign('metals',$metals);
			
		}				

		/**
		 * action list
		 *
		 * @param 
		 * @return 
		 */
		public function listAction()  {

			$args = $this->request->getArguments();

			$websiteId = $GLOBALS['TSFE']->tmpl->rootLine[0]['uid'];
			$productRepositoryId = 89;	// RATHGEBER product repository ID
			// use other product repository ID for Smart-Tec
			if ($websiteId == 162) {
				$productRepositoryId = 213;
			}

			// remove empty filter arguments
			foreach ($args as $key => $arg) {
				if ($arg == '') {
					unset($args[$key]);
				}
			}

			$productsRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
			$products = $productsRepository->findFiltered($args, $productRepositoryId);


			$jscript = true;
			if($websiteId == 162) {
				$jscript = false;
			}

			$this->view->assign('javascript',$jscript);
			$this->view->assign('products',$products);
		}			
	}
?>