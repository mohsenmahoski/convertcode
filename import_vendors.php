<?php 
$mageFilename = 'app/Mage.php';
    if (!file_exists($mageFilename)) {
        echo $mageFilename." was not found";
        exit;
    }
    require_once $mageFilename;
    Mage::app();
function gen_uid(){
    $l=4;
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $l);
}
function vendors()
{
  if($conn = mysql_connect('localhost' , 'root' , ''));
	{
	   $q = 'use charogh';
	   mysql_query($q , $conn);
	  
	   mysql_set_charset('utf8',$conn);
	   //query of all products with limit
	   $q = 'select* from tbl_producers';
	   $result = mysql_query($q);
	    
	    if (!$result) {
	      die('Could not query:' . mysql_error());
	    }
	   $sellers = array();
	    while ($row = mysql_fetch_object($result)) {
	        $seller=array();
	        $seller['id'] = $row->id;
	        $url = trim($row->name);
	        $url = str_replace(' ', '-' , $url);
	        $url = str_replace('--', '-' , $url);
	        $url = $row->id.'/'.$url;
	        $seller['url'] = $url;
	        $seller['username'] = trim($row->name);
	        $seller['name'] = trim($row->real_name);
          if ($seller['name'] == Null) {
              $seller['name'] = $seller['username'];
          }
          $row->des = trim($row->des);
	        $seller['desc'] = $row->des;
          if ($seller['desc'] == '') {
            $seller['desc'] = 'با محصولات فروشگاه '.$seller['username'].' آشنا شوید. ';
          }
	        if ($row->picture == Null) {
	        	$seller['logo'] = 'default.jpg';
	        }else{ $seller['logo'] = $row->picture;}
	        $seller['disable'] = $row->disable;
	        $seller['tel'] = trim($row->tel);
	        if ($seller['tel'] == Null) {
            $seller['tel'] = '123';
          }
          if (is_numeric($row->email)) {
             $seller['email'] = Null;
          }
          else{
             $seller['email'] = trim($row->email);
          }
	        $seller['honors'] = $row->honors;
        
	        array_push($sellers, $seller);
	    }
	 }
	 mysql_close($conn);
	 return $sellers;
}
function admin_user($ar_user){
        try {
            //create new user by providing details below
            $user = Mage::getModel('admin/user')
                ->setData(array(
                    'username'  => trim($ar_user['username']),
                    'firstname' => trim($ar_user['name']),
                    'lastname'  => 'نام خانوادگی',
                    'email'     => $ar_user['email'],
                    'password'  => 'admin123456',
                    'is_active' => 0
                ))->save();

              

        }catch(Exception $e){
          
          
        
              
        }
  }









$sellers = vendors();

 $i=0;
foreach ($sellers as $key) {
  
    	admin_user($key);

       if ($key['username'] != 'admin') {
         
          $user = Mage::getModel('admin/user')->load( $key['username'] , 'username');
        
          $user->setRoleIds(array(8))
          ->setRoleUserId($user->getUserId())
          ->saveRelations();
       
          $manthan_seller = Mage::getModel('marketplace/seller')
                              ->setShopName($key['username'])
                              ->setShopDescription($key['desc'])
                              ->setUrlPath($key['url'])
                              ->setTelephone($key['tel'])
                              ->setImage($key['logo'])
                              ->setPostcode('123')
                              ->setCountry('IR')
                              ->setAdminCommissionByPercentage('15')
                              ->setUserId($user['user_id'])
                              ->save();
                            
         }
         else{ echo 'Error in Record: '.$key['username']; }
       ++$i;
  }
echo $i." Records Added .</br>";
echo ' completed!! ';
?>