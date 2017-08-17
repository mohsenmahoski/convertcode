<?php 
$mageFilename = 'app/Mage.php';
    if (!file_exists($mageFilename)) {
        echo $mageFilename." was not found";
        exit;
    }
    require_once $mageFilename;
    Mage::app();

function vendors()
{
  if($conn = mysql_connect('localhost' , 'root' , ''));
	{
	   $q = 'use charogh';
	   mysql_query($q , $conn);
	  
	   mysql_set_charset('utf8',$conn);
	   //query of all products with limit
	   $q = 'select* from tbl_producers limit 3';
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
	        $seller['desc'] = trim($row->des);
	        if ($row->picture == Null) {
	        	$seller['logo'] = 'default.jpg';
	        }else{ $seller['logo'] = $row->picture;}
	        $seller['disable'] = $row->disable;
	        $seller['tel'] = trim($row->tel);
	        $seller['email'] = trim($row->email);
	        $seller['honors'] = $row->honors;

	        array_push($sellers, $seller);
	    }
	 }
	
	 mysql_close($conn);
	 return $sellers;
}

$sellers = vendors();

foreach ($sellers as $key) {
	

 

    try {
        //create new user by providing details below
        $user = Mage::getModel('admin/user')
            ->setData(array(
                'username'  => $key['username'],
                'firstname' => $key['name'],
                'lastname'  => 'نام خانوادگی',
                'email'     => $key['email'],
                'password'  => 'admin123',
                'is_active' => 0
            ))->save();

    }catch(Exception $e){
           echo $e->message; 
           exit;
    }
    
   try {
   	 $user = Mage::getModel('admin/user')->loadByUsername($key['username'])->getData();
   	
   } catch (Exception $e) {
   	  echo $e->message; 
           exit;
   }

    try {
    	 $role = Mage::getModel("admin/roles")
                ->setName($user['username'])
                ->setUserId($user['user_id'])
                ->setParentId('8')
                ->setTreeLevel('2')
                ->setRoleType('U')
                ->setSortOrder('0')
                ->save();
    } catch (Exception $e) {
    	echo $e->message; 
           exit;
    }
    try {
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
    } catch (Exception $e) {
    	echo $e->message; 
           exit;
    }
  
 }
    echo 'Vendors sucessfully created!<br /><br /><b>THIS FILE WILL NOW TRY TO DELETE ITSELF, BUT PLEASE CHECK TO BE SURE!</b>';
   
?>