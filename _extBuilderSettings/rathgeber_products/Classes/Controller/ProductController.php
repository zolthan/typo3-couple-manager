<?php
/**
 * class Tx_RathgeberProducts_Controller_ProductController
 *
 * Controller >> Product
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

class Tx_RathgeberProducts_Controller_ProductController 
	extends Tx_Extbase_MVC_Controller_ActionController {



	/**
	 * downloadmanagement
	 *
	 * @param $object 
	 * @return 
	 */

	function getDownloads($prodObj, $varianten = '') {

		// Tx_Extbase_Utility_Debugger::var_dump ($prodObj,"prodObj");
		if ($prodObj->uploadedpdf == '') {
			if ($varianten != '') {
				foreach ($varianten as $k => $v) {
					$tempArr[$k] = array('file'=>'index.php?type=123&tx_rathgeberproducts_products[productid]='.$v->uid, 'name' => /*$prodObj->name . ' ' .*/ $v->name, 'type' => '0');
					//$this->view->assign('no_variant_language_id', "&L=" . $GLOBALS['TSFE']->sys_language_uid);
				}
			} else {
				$tempArr[0] = array('file'=>'index.php?type=123&tx_rathgeberproducts_products[productid]='.$prodObj->uid, 'name' => $prodObj->name, 'type' => '0');
                $this->view->assign('no_variant_language_id', "&L=" . $GLOBALS['TSFE']->sys_language_uid);
			}
		} else {
			$tempPdfArr = explode(',',$prodObj->uploadedpdf);
			$tempCaption = nl2br($prodObj->uploadedpdfname);				
			$tempCapArr = t3lib_div::trimExplode('<br />',$tempCaption);
			
			foreach ($tempPdfArr as $key => $file) {
				$tempArr[$key] = array('file'=>'uploads/products/pdfs/'.$file, 'name' => $tempCapArr[$key], 'type' => '1');
			}
		}

		$this->view->assign('downloads',$tempArr);
	}

	/**
	 * action single
	 *
	 * @param 
	 * @return 
	 */
	public function singleAction()  {			

		$productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
		$attributeRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_AttributeRepository');
		
		if ($this->request->hasArgument('productid')) {
			$productId = $this->request->getArgument('productid');				
		}
		else $productId = 0;
		// product or anwendung

		$variante = $productRepository->findVariationsByUid($productId);

		// wenn variante eines produkts vorhanden, zeige initial nicht mutterdatensatz, sondern erste variante
		if (!empty($variante[0])) {
			$products = $productRepository->findByUid($variante);

		}
		else {					
			$products = $productRepository->findByUid($productId);
		}
		
		// wenn produkt eine variante ist, hole beschreibungstext, videos und downloads der mutter
		if ($products->variante != '0') {

			$motherProduct = $productRepository->findByUid($products->variante);
			$motherVariante = $productRepository->findVariationsByUid($products->variante);
			$products->motherdescription = $motherProduct->description;
			$products->mothername = $motherProduct->name;
			$products->motherthumbsheadline = $motherProduct->thumbsheadline;
			$products->motherheadline = $motherProduct->headline;
			$products->images = $motherProduct->images;
			$products->thumbnails = $motherProduct->thumbnails;
			$products->imagecaption = $motherProduct->imagecaption;
			$this->getDownloads($motherProduct, $motherVariante);

			// Add active flag for the currently active product
			foreach ($motherVariante as $p) {
				if ($p->uid == $products->uid) {
					$p->active = 'active';
				}
			}

			$this->view->assign('variations',$motherVariante);
		
		} else {
			$this->getDownloads($products);
			$this->view->assign('variations',$variante);
		}
		
		// wenn videos vorhanden => toArray (für fluid)
		if ($products->video != '') {
			$tempVid = nl2br($products->video);
			$tempCaption = nl2br($products->videocaption);
			$tempVidArr = t3lib_div::trimExplode('<br />',$tempVid);
			$tempCapArr = t3lib_div::trimExplode('<br />',$tempCaption);
			foreach ($tempVidArr as $key => $vidID) {
				if ($vidID != '') {
					$tmpArr[$key] = array('id' => $vidID, 'cap' => $tempCapArr[$key]);
				}
			}
			$this->view->assign('videos', $tmpArr);
		}
		
		$flexdata = t3lib_div::xml2array($products->getFlexdata());

		if (is_array($flexdata)) {
			$attrArr = $flexdata['data']['sDEF']['lDEF'];
			foreach ($attrArr as $keyAttr => $valAttr) {
				//$attributes[] = array('name' => $keyAttr, 'value' => $valAttr['vDEF']);
				// if ($_SERVER['REMOTE_ADDR'] == '109.193.46.5') {
					// echo $keyAttr.'<br>';
				// }
				$tmpArr = array();
				for ($i=0; $i < $valAttr['vDEF']; $i++) {
					$tmpArr[] = $i;
				}
				
				$attrNameRes = $attributeRepository->getNameByUid($keyAttr);
				if ($attrNameRes[0]) {
					$attrName = $attrNameRes[0]->getName();
				}
				else {
					$attrName = '';
				}
				
				if ($attrName != '') {
					$attributes[] = array('name' => $attrName, 'value' => $tmpArr);
				}
			}
		}
		
		$tempImgCaption = nl2br($products->imagecaption);
		$tempImgCapArr = t3lib_div::trimExplode('<br />', $tempImgCaption);
		$tempThumbs = explode(',', $products->thumbnails);

		// if ($_SERVER['REMOTE_ADDR'] == '109.193.46.5') {
			// Tx_Extbase_Utility_Debugger::var_dump($products, 'products');
		// }

		// define available product properties here
		$propertyNames = array(
			'productname',
			'material',
			'forms',
			'printing',
			'size',
			'strength',
			'colour',
			'resistance',
			'fixation',
			'temperature',
			'delivery',
			'pcolour',
			'frequency',
			'surfacerefinement',
			'identification',
			'dimension',
			'imprint',
			'metal',
			'certification'
		);
		
		// remove empty product properties
		$properties = array();
		foreach ($propertyNames as $index => $propertyName) {
			if ($products->$propertyName->count() > 0) {
				$properties[$index]['propertyname'] = $propertyName;
				$properties[$index]['propertyvalue'] = $products->$propertyName;
			}
		}
		
		// calculate the "middle" that is used for splitting the properties into 2 columns
		$properties_split_count = ceil(count($properties) / 2);



        $slider = explode(',', $products->images);


        foreach ($slider as $key => $imgName) {
            $imgCaptionCombined[$key] = array($imgName, $tempImgCapArr[$key]);
        }


		$this->view->assign('imagecaption', $tempImgCapArr);
		//$this->view->assign('slider',explode(',', $products->images));
		$this->view->assign('slider',$imgCaptionCombined);
		$this->view->assign('thumbs', $tempThumbs);
		$this->view->assign('slide_count', count($tempThumbs));
		$this->view->assign('products', $products);
		$this->view->assign('attributes', $attributes);
		$this->view->assign('properties', $properties);
		$this->view->assign('properties_split_count', $properties_split_count);
        $this->view->assign('language_id', $GLOBALS['TSFE']->sys_language_uid);

	}

    /**
     * action mobil
     *
     * @param
     * @return
     */
    public function mobilAction()  {

        $productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
        $attributeRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_AttributeRepository');

        if ($this->request->hasArgument('productid')) {
            $productId = $this->request->getArgument('productid');
        }
        else $productId = 0;
        // product or anwendung

        $variante = $productRepository->findVariationsByUid($productId);

		// wenn variante eines produkts vorhanden, zeige initial nicht mutterdatensatz, sondern erste variante
		if (!empty($variante[0])) {
			$products = $productRepository->findByUid($variante);
		}
		else {					
			$products = $productRepository->findByUid($productId);
		}
		
        // wenn produkt eine variante ist, hole beschreibungstext, videos und downloads der mutter
        if ($products->variante != '0') {

            $motherProduct = $productRepository->findByUid($products->variante);
            $motherVariante = $productRepository->findVariationsByUid($products->variante);
            $products->motherdescription = $motherProduct->description;
            $products->mothername = $motherProduct->name;
            $products->motherthumbsheadline = $motherProduct->thumbsheadline;
            $products->motherheadline = $motherProduct->headline;
            $products->images = $motherProduct->images;
            $products->thumbnails = $motherProduct->thumbnails;
            $products->imagecaption = $motherProduct->imagecaption;
            $this->getDownloads($motherProduct, $motherVariante);

            // Add active flag for the currently active product
            foreach ($motherVariante as $p) {
                if ($p->uid == $products->uid) {
                    $p->active = 'active';
                }
            }

            $this->view->assign('variations',$motherVariante);

        } else {
            $this->getDownloads($products);
            $this->view->assign('variations',$variante);
        }

        // wenn videos vorhanden => toArray (für fluid)
        if ($products->video != '') {
            $tempVid = nl2br($products->video);
            $tempCaption = nl2br($products->videocaption);
            $tempVidArr = t3lib_div::trimExplode('<br />',$tempVid);
            $tempCapArr = t3lib_div::trimExplode('<br />',$tempCaption);
            foreach ($tempVidArr as $key => $vidID) {
                if ($vidID != '') {
                    $tmpArr[$key] = array('id' => $vidID, 'cap' => $tempCapArr[$key]);
                }
            }
            $this->view->assign('videos', $tmpArr);
        }

        $flexdata = t3lib_div::xml2array($products->getFlexdata());

        if (is_array($flexdata)) {
            $attrArr = $flexdata['data']['sDEF']['lDEF'];
            foreach ($attrArr as $keyAttr => $valAttr) {
                //$attributes[] = array('name' => $keyAttr, 'value' => $valAttr['vDEF']);
                // if ($_SERVER['REMOTE_ADDR'] == '109.193.46.5') {
                // echo $keyAttr.'<br>';
                // }
                $tmpArr = array();
                for ($i=0; $i < $valAttr['vDEF']; $i++) {
                    $tmpArr[] = $i;
                }

                $attrNameRes = $attributeRepository->getNameByUid($keyAttr);
                if ($attrNameRes[0]) {
                    $attrName = $attrNameRes[0]->getName();
                }
                else {
                    $attrName = '';
                }

                if ($attrName != '') {
                    $attributes[] = array('name' => $attrName, 'value' => $tmpArr);
                }
            }
        }

        $tempImgCaption = nl2br($products->imagecaption);
        $tempImgCapArr = t3lib_div::trimExplode('<br />', $tempImgCaption);
        $tempThumbs = explode(',', $products->thumbnails);

        // if ($_SERVER['REMOTE_ADDR'] == '109.193.46.5') {
        // Tx_Extbase_Utility_Debugger::var_dump($products, 'products');
        // }

        // define available product properties here
        $propertyNames = array(
            'productname',
            'material',
            'forms',
            'printing',
            'size',
            'strength',
            'colour',
            'resistance',
            'fixation',
            'temperature',
            'delivery',
            'pcolour',
            'frequency',
            'surfacerefinement',
            'identification',
            'dimension',
            'imprint',
            'metal',
            'certification'
        );

        // remove empty product properties
        $properties = array();
        foreach ($propertyNames as $index => $propertyName) {
            if ($products->$propertyName->count() > 0) {
                $properties[$index]['propertyname'] = $propertyName;
                $properties[$index]['propertyvalue'] = $products->$propertyName;
            }
        }

        // calculate the "middle" that is used for splitting the properties into 2 columns
        $properties_split_count = ceil(count($properties) / 2);



        $slidertemp = explode(',', $products->images);
        $ulpath = 'uploads/slideshow/pics/';
        $slider = array();


        foreach($slidertemp as $key => $temp){
            $image = new Imagick();
            if(file_exists($ulpath.'thumbnail_'.$temp)){
                $slider[$key] = 'thumbnail_'.$temp;
            }else{
                $image->pingImage($ulpath.$temp);
                $image->readImage($ulpath.$temp);
                $image->thumbnailImage(320,180,null);
                $image->writeImage($ulpath.'thumbnail_'.$temp);
                $slider[$key] = 'thumbnail_'.$temp;
                $image->destroy();
            }
        }

        foreach ($slider as $key => $imgName) {
            $imgCaptionCombined[$key] = array($imgName, $tempImgCapArr[$key]);
        }


        $this->view->assign('imagecaption', $tempImgCapArr);
        //$this->view->assign('slider',explode(',', $products->images));
        $this->view->assign('slider',$imgCaptionCombined);
        $this->view->assign('thumbs', $tempThumbs);
        $this->view->assign('slide_count', count($tempThumbs));
        $this->view->assign('products', $products);
        $this->view->assign('attributes', $attributes);
        $this->view->assign('properties', $properties);
        $this->view->assign('properties_split_count', $properties_split_count);
        $this->view->assign('language_id', $GLOBALS['TSFE']->sys_language_uid);

    }
}
?>