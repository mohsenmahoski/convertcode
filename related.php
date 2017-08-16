<?php 
umask(0);
require 'app/Mage.php';
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$conn = mysql_connect('localhost' , 'root' , '');

if($conn);
{
	//connect to database
	 $q = 'use test';
	mysql_query($q , $conn);
	mysql_set_charset('utf8',$conn);

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
	function insert($c , $array){

			  foreach ($array as $key) {
			    //query of all products relation
				$q ="INSERT INTO `catalog_product_link` (`link_id`, `product_id`, `linked_product_id`, `link_type_id`) VALUES (NULL, '".$key[0]."', '".$key[1]."', '4');";

				 $result = mysql_query($q , $c);
					    
				 if (!$result) {
					  die('Could not query:' . mysql_error());
				 }	    
			 }
	}
	  

	$array_id = [['دستبد نقره طرح دو دست','گردنبند نقره طرح پازل _ آب طلا ','دستبند نقره با طرح قیچی']];
	 
	$array_id = replace_name_id($array_id);
    $array_id = convert($array_id);
    $array_id = insert($conn,$array_id);
     
    mysql_close($conn);
    echo "<h1 style='background:green;color:#fff;'>All Relation Recorded</h1>";
}

?>