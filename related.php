<?php 
umask(0);
require 'app/Mage.php';
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
$q = 'use test';
mysql_query($q , $conn);
mysql_set_charset('utf8',$conn);


if($conn = mysql_connect('localhost' , 'root' , ''));
{
	function getprid($name){
		$model = Mage::getModel('catalog/product'); //getting product model
		$model = Mage::getModel('catalog/product')->loadByAttribute('name', $name);
		$id = $model->getId();
		return $id;
	}
	function replace_name_id($array){

		$array_id = array();
			foreach ($array as $key) {
			  foreach ($key as $value => &$val) {
				    $key[$value] = getprid($val);
			  }
			  array_push($array_id , $key);
			}
	  return $array_id;
	} 
    function convert($array){
    	var_dump($array);
		echo "</br>";
	   $converted=array();
	    foreach ($array as $key ) {
	      for ($j=0; $j< count($key) ; $j++) { 
	          for ($i=$j+1; $i< count($key) ; $i++) { 
	        	array_push($converted, [ $key[$j] , $key[$i] ]);
	         }
	         for ($i=$j; $i > 0 ; $i--) { 
	         	array_push($converted, [ $key[$j] , $key[$i-1] ]);
	         }
	      }
	   }
       return $converted;
    }
	function insert($array){
	

			   //query of all products with limit
			   $q ="INSERT INTO `catalog_product_link` (`link_id`, `product_id`, `linked_product_id`, `link_type_id`) VALUES (NULL, '90', '91', '4');";
			   $result = mysql_query($q);
			    
			    if (!$result) {
			      die('Could not query:' . mysql_error());
			    }
	}
	  

	$array_id = [['دستبد نقره طرح دو دست','گردنبند نقره طرح پازل _ آب طلا ','دستبند نقره با طرح قیچی'],['دستبد نقره طرح دو دست','گردنبند نقره طرح پازل _ آب طلا ']];
	 
	$array_id = replace_name_id($array_id);
    $array_id = convert($array_id);
     var_dump($array_id);
}
mysql_close($array_id);
?>