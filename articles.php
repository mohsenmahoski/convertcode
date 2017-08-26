<?php
 $mageFilename = 'app/Mage.php';
    if (!file_exists($mageFilename)) {
        echo $mageFilename." was not found";
        exit;
    }
    require_once $mageFilename;
    Mage::app();
    $post_ids = array();


function save_store($ar){
      foreach ($ar as $key => $value) {
        try {
        
            $q = 'use asai';
            mysql_query($q);
            $q = "INSERT INTO `ves_blog_post_store` (`post_id`, `store_id`) VALUES ('".$value."', '0');"; 

          $result = mysql_query($q);
          } catch (Exception $e) {
            echo $e->getMessage();
          }
      }
        
        

}



 if($conn = mysql_connect('localhost' , 'root' , '')){

   $q = 'set charset utf8';
   mysql_query($q);

   $q = 'use charogh';
   mysql_query($q);

   $q = 'select* from tbl_articles';
   $result = mysql_query($q);

   while ($row = mysql_fetch_object($result)) {
        $data = array();
        $data['post_id'] = null;
        $data['is_active'] = 1;
        $data['title'] = $row->title;
        $identifier = trim($row->title);
        $identifier = str_replace(' ', '-', $identifier);
        $data['identifier'] = $row->id.'/'.str_replace('--', '-', $identifier);
        $data['description'] = '';
        $content = $row->des;
        $content = str_replace('../files', './files', $content);
        $content = str_replace('http://www.charogh.com/files','./files', $content);
        $content = str_replace('../article', './article', $content);
        $data['detail_content'] = $content;
        $data['created'] = strtotime($row->date);
        $data['updated'] = strtotime($row->date);
        $data['user_id'] = 1;
         
        $cat_id = $row->cat_id;
        $data['file'] = $row->picture;
        $data['hits'] = $row->views;

        if ($cat_id == 1) {
           $cat_id = 8;
        }
        elseif($cat_id == 2) {
           $cat_id = 9;
        }
        elseif ($cat_id == 3) {
           $cat_id = 10;
        }
        elseif($cat_id == 4) {
           $cat_id = 11;
        }
        elseif ($cat_id == 5) {
           $cat_id = 12;
        }
        elseif ($cat_id == 6) {
           $cat_id = 13;
        }
        elseif ($cat_id == 7) {
           $cat_id = 14;
        }
        elseif ($cat_id == 8) {
           $cat_id = 15;
        }
        elseif ($cat_id == 9) {
           $cat_id = 16;
        }
        elseif ($cat_id == 10) {
           $cat_id = 17;
        }
        elseif ($cat_id == 11) {
           $cat_id = 18;
        }
        elseif ($cat_id == 12) {
           $cat_id = 19;
        }
        elseif ($cat_id == 13) {
           $cat_id = 20;
        }
        elseif ($cat_id == 14) {
           $cat_id = 21;
        }
        elseif ($cat_id == 15) {
           $cat_id = 22;
        }
        elseif ($cat_id == 16) {
           $cat_id = 24;
        }
        $data['category_id'] = $cat_id;

        $model = Mage::getModel( 'ves_blog/post' );
        $model->setData($data);
        $model->save();
        
        $id = $model->getId();
        
        array_push($post_ids , $id);     
        
       
        
   }
 }
 else{
 	echo mysql_error();
 }
 save_store($post_ids);
 mysql_close($conn);

 echo "<h1 style='background:green;'>All Record Added Successfully</h1>";
?>