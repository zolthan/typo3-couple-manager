<?php
/**
 * class Tx_RathgeberProducts_Controller_ApplicationController
 *
 * Controller >> Application
 *
 * @package rathgeber_products
 * @author Marc Becker <marc.becker@7thsense.de>
 * @version 0.0.1
 */

class Tx_RathgeberProducts_Controller_ApplicationController
    extends Tx_Extbase_MVC_Controller_ActionController {

    /**
     * downloadmanagement
     *
     * @param $object
     * @return
     */

    function getDownloads($prodObj, $varianten = '') {

        if ($prodObj->uploadedpdf == '')
        {
            if ($varianten != '') {
                foreach ($varianten as $k => $v) {
                    $tempArr[$k] = array('file'=>'index.php?id=70&type=123&tx_rathgeberproducts_products[productid]='.$v->uid, 'name' => $prodObj->name . ' ' . $v->name, 'type' => '0');
                    $this->view->assign('no_variant_language_id', "&L=" . $GLOBALS['TSFE']->sys_language_uid);
                }
            } else {
                $tempArr[0] = array('file'=>'index.php?id=70&type=123&tx_rathgeberproducts_products[productid]='.$prodObj->uid, 'name' => $prodObj->name, 'type' => '0');
                $this->view->assign('no_variant_language_id', "&L=" . $GLOBALS['TSFE']->sys_language_uid);
            }
        } else {
            $tempPdfArr = explode(',',$prodObj->uploadedpdf);
            $tempCaption = nl2br($prodObj->uploadedpdfname);
            $tempCapArr = t3lib_div::trimExplode('<br />',$tempCaption);

            foreach ($tempPdfArr as $key => $file)
            {
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
        $applicationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ApplicationRepository');
        $productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
        $categoryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CategoryRepository');

        # $productId = $this->request->getArgument('appid');
        $appId = $this->request->getArgument('appid');

        $applications = $applicationRepository->findByUid($appId);

        // checken, ob productid mit übergeben wurde ("interner aufruf")
        if (($this->request->hasArgument('productid')) && ($this->request->getArgument('productid') != '')) {
            $productId = $this->request->getArgument('productid');
            $product = $productRepository->findByUid($productId);
        } else {
            //wenn nicht: "initialaufruf" (erstes produkt anzeigen)
            $productCompl = $applications->products;
            if($productCompl) {
                $productCompl->rewind();
                $product   = $productCompl->current();
                $productId = $product->uid;
            }
        }

        // Add active flag for the currently active product
        foreach ($applications->products as $p) {
            if ($p->uid == $productId) {
                $p->active = 'active';
            }
        }

        $variante = $productRepository->findVariationsByUid($productId);

        if ($variante[0] != '') {
            $this->getDownloads($product, $variante);
        } else {
            $this->getDownloads($product);
        }

        $appProdsTmp = $applications->products;
        $thumbsTmp = explode(',',$applications->thumbnails);

        foreach ($appProdsTmp as $k => $v) {
            $appProds[] = $v;
        }

        $prodTmp = $productRepository->findProductsFromMM($appId);
        foreach ($prodTmp as $k => $v) {
            $appProds[$k] = (array)$v;
        }
        foreach ($thumbsTmp as $k => $v) {
            $appProds[$k]['preview'] = $v;
            $thumbs[$k+1] = $v;
        }

        if ($k > 4) {
            $this->view->assign('slidenav', 1);
        }

        $tempImgCaption = nl2br($applications->imagecaption);
        $tempImgCapArr = t3lib_div::trimExplode('<br />',$tempImgCaption);
        $tempThumbs = explode(',',$applications->thumbnails);

        // if ($_SERVER['REMOTE_ADDR'] == '109.193.46.5') {
        // Tx_Extbase_Utility_Debugger::var_dump ($product);
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
            if($product) {
                if ($product->$propertyName->count() > 0) {
                    $properties[$index]['propertyname']  = $propertyName;
                    $properties[$index]['propertyvalue'] = $product->$propertyName;
                }
            }
        }

        // calculate the "middle" that is used for splitting the properties into 2 columns
        $properties_split_count = ceil(count($properties) / 2);

        $slider = explode(',', $applications->images);
        foreach ($slider as $key => $imgName) {
            $imgCaptionCombined[$key] = array($imgName, $tempImgCapArr[$key]);
        }

        $tmp = $product->categories;
        foreach ($tmp as $k => $v) {
            $tmpArr[] = $v;
        }
        $this->view->assign('catid', $tmpArr[0]);
        $this->view->assign('rootline', $GLOBALS["TSFE"]->page['pid']);
        $this->view->assign('thumbs', $tempThumbs);
        $this->view->assign('imagecaption', $tempImgCapArr);
        $this->view->assign('variations', $variante);
        $this->view->assign('applications', $applications);
        //$this->view->assign('slider',explode(',', $applications->images));
        $this->view->assign('slider',$imgCaptionCombined);
        $this->view->assign('appprods', $appProds);
        $this->view->assign('products', $product);
        $this->view->assign('slide_count', count($tempThumbs));
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
        $applicationRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ApplicationRepository');
        $productRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_ProductRepository');
        $categoryRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_CategoryRepository');
        $attributeRepository = t3lib_div::makeInstance('Tx_RathgeberProducts_Domain_Repository_AttributeRepository');

        # $productId = $this->request->getArgument('appid');
        $appId = $this->request->getArgument('appid');

        $applications = $applicationRepository->findByUid($appId);

        // checken, ob productid mit übergeben wurde ("interner aufruf")
        if (($this->request->hasArgument('productid')) && ($this->request->getArgument('productid') != '')) {
            $productId = $this->request->getArgument('productid');
            $product = $productRepository->findByUid($productId);
        } else {
            //wenn nicht: "initialaufruf" (erstes produkt anzeigen)
            $productCompl = $applications->products;
            if($productCompl) {
                $productCompl->rewind();
                $product   = $productCompl->current();
                $productId = $product->uid;
            }
        }

        // Add active flag for the currently active product
        foreach ($applications->products as $p) {
            if ($p->uid == $productId) {
                $p->active = 'active';
            }
        }

        $variante = $productRepository->findVariationsByUid($productId);

        if ($variante[0] != '') {
            $this->getDownloads($product, $variante);
        } else {
            $this->getDownloads($product);
        }

        $appProdsTmp = $applications->products;
        $thumbsTmp = explode(',',$applications->thumbnails);

        foreach ($appProdsTmp as $k => $v) {
            $appProds[] = $v;
        }

        $prodTmp = $productRepository->findProductsFromMM($appId);
        foreach ($prodTmp as $k => $v) {
            $appProds[$k] = (array)$v;
        }
        foreach ($thumbsTmp as $k => $v) {
            $appProds[$k]['preview'] = $v;
            $thumbs[$k+1] = $v;
        }

        if ($k > 4) {
            $this->view->assign('slidenav', 1);
        }

        $flexdata = t3lib_div::xml2array($product->getFlexdata());

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

        $tempImgCaption = nl2br($applications->imagecaption);
        $tempImgCapArr = t3lib_div::trimExplode('<br />',$tempImgCaption);
        $tempThumbs = explode(',',$applications->thumbnails);

        // if ($_SERVER['REMOTE_ADDR'] == '109.193.46.5') {
        // Tx_Extbase_Utility_Debugger::var_dump ($product);
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
            if ($product->$propertyName->count() > 0) {
                $properties[$index]['propertyname'] = $propertyName;
                $properties[$index]['propertyvalue'] = $product->$propertyName;
            }
        }

        // calculate the "middle" that is used for splitting the properties into 2 columns
        $properties_split_count = ceil(count($properties) / 2);

        $slidertemp = explode(',', $applications->images);
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
        $tmp = $product->categories;
        foreach ($tmp as $k => $v) {
            $tmpArr[] = $v;
        }
        $this->view->assign('catid', $tmpArr[0]);
        $this->view->assign('rootline', $GLOBALS["TSFE"]->page['pid']);
        $this->view->assign('thumbs', $tempThumbs);
        $this->view->assign('imagecaption', $tempImgCapArr);
        $this->view->assign('variations', $variante);
        $this->view->assign('applications', $applications);
        //$this->view->assign('slider',explode(',', $applications->images));
        $this->view->assign('slider',$imgCaptionCombined);
        $this->view->assign('appprods', $appProds);
        $this->view->assign('products', $product);
        $this->view->assign('attributes', $attributes);
        $this->view->assign('slide_count', count($tempThumbs));
        $this->view->assign('properties', $properties);
        $this->view->assign('properties_split_count', $properties_split_count);
        $this->view->assign('language_id', $GLOBALS['TSFE']->sys_language_uid);
    }
}
?>