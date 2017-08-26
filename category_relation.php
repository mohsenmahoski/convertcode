<?php
require_once('app\Mage.php');
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$categoryId = 4;
$category = Mage::getModel('catalog/category')->load($categoryId);
$_categories = $category->getChildrenCategories();



foreach ($_categories as $key) {
	
	$collection = Mage::getModel('catalog/category')
                    ->load($key->getId())
                    ->getProductCollection()->getData();
    
    foreach ($collection as $value ) {

	 die(var_dump($value));
    }   
}
?>