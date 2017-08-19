<?php 
//connect to database
 if($conn = mysql_connect('localhost' , 'root' , ''));
{
   $products=array();

   $q = 'use charogh';
   mysql_query($q , $conn);
  
   mysql_set_charset('utf8',$conn);
   //query of all products with limit
   $q = 'SELECT pr.* , prd.* FROM tbl_products as pr
LEFT JOIN tbl_producers as prd ON pr.producer_id = prd.id';
   $result = mysql_query($q);
    
    if (!$result) {
      die('Could not query:' . mysql_error());
    }
    //create a array for saving related products
   $array_related = array();
   $array_producers = array();
 //fetch data from query with while loop
    while ($row = mysql_fetch_object($result)) {
      
     $product = array();
     $product['id'] = $row->id;
     $product['title'] = $row->title;
     $product['url'] = $row->title;
     $product['url'] = trim($product['url']);
     $product['url'] = str_replace(' ','-', $product['url']);
     $product['url'] = str_replace('--','-', $product['url']);
     $product['cat'] = $row->cat_id;
     $product['producer'] = $row->name;
     $product['price'] = $row->price1;
     $product['s-price'] = $row->price2;
     if ($product['s-price'] == 0) {
         $product['s-price'] = '';
     }
     $product['desc'] = $row->des;
     $product['quantity'] = $row->quantity;
      $product['stock'] = 1;
     if ($product['quantity'] == 0) {
         $product['stock'] =0;
     }
     if ($row->pic1 == NUll) {
        $product['pic1'] = null;
     }
     else{

     }
     $product['pic1'] = $row->pic1;
     $product['pic2'] = $row->pic2;
     $product['pic3'] = $row->pic3;
     $product['pic4'] = $row->pic4;
     $product['pic5'] = $row->pic5;
     $product['disable'] = 1;

     if ($row->disable == 0) {
         $product['disable'] = 1;
     }elseif ($product['disable'] ==1) {
         $product['disable'] = 0;
     }
     if (($row->name != null) && ($row->title != null)) {
         $producer = [$row->name , $row->title];
         array_push($array_producers,$producer);
     }
     


     $product['priority'] = $row->priority;
     $product['visits'] = $row->visits;
     $product['likes'] = $row->likes;
     $product['purchases'] = $row->purchases;
     $product['weight'] = $row->weight;
     $product['show_in_home'] = $row->show_in_home;

     $product['related'] = array();
     $product['related'] = explode('-' , $row->related);
     
     
     if ($row->related != '') {
        
           $array=array();
        
         foreach ($product['related'] as $key) {

            $q = "select title from tbl_products where(id=".$key.")";
           
            $result2 = mysql_query($q);
            
            $title = mysql_result($result2 ,0); 
            
            array_push($array, $title);
       }
         array_push($array_related, $array);
     }
    
//change products id to correct id in magento store
     $product['comission'] = $row->comission;
  
        if($product['cat'] == 1 )
         $product['cat'] = 105;
          
        elseif($product['cat'] == 3 )
           $product['cat'] = 94;
          
        elseif($product['cat'] == 4 )
           $product['cat'] = 81;
          
        elseif($product['cat'] == 5 )
           $product['cat'] = 92;
          
        elseif($product['cat'] == 6 )
           $product['cat'] = 67;
          
        elseif($product['cat'] == 7 )
            $product['cat'] = 63;
          
        elseif($product['cat'] == 12 )
             $product['cat'] = 102;
          
        elseif($product['cat'] == 13 )
             $product['cat'] = 85;
          
        elseif($product['cat'] == 14 )
             $product['cat'] = 87;
          
        elseif($product['cat'] == 15 )
             $product['cat'] = 88;
          
        elseif($product['cat'] == 16 )
             $product['cat'] = 89;
          
        elseif($product['cat'] == 17 )
             $product['cat'] = 70;
          
        elseif($product['cat'] == 18 )
             $product['cat'] = 71;
          
        elseif($product['cat'] == 19 )
             $product['cat'] = 64;
          
        elseif($product['cat'] == 20 )
             $product['cat'] = 66;
          
        elseif($product['cat'] == 27 )
             $product['cat'] = 83;
          
        elseif($product['cat'] == 28 )
             $product['cat'] = 20;
          
        elseif($product['cat'] == 29 )
             $product['cat'] = 22;
          
        elseif($product['cat'] == 30 )
             $product['cat'] = 79;
          
        elseif($product['cat'] == 31 )
             $product['cat'] = 91;
          
        elseif($product['cat'] == 32 )
             $product['cat'] = 84;
          
        elseif($product['cat'] == 33 )
             $product['cat'] = 86;
          
        elseif($product['cat'] == 34 )
             $product['cat'] = 72;
          
        elseif($product['cat'] == 35 )
             $product['cat'] = 80;
          
        elseif($product['cat'] == 36 )
             $product['cat'] = 77;
          
        elseif($product['cat'] == 37 )
             $product['cat'] = 74;
          
        elseif($product['cat'] == 39 )
             $product['cat'] = 95;
          
        elseif($product['cat'] == 40 )
             $product['cat'] = 23;
          
        elseif($product['cat'] == 41 )
             $product['cat'] = 96;
          
        elseif($product['cat'] == 42 )
             $product['cat'] = 76;
          
        elseif($product['cat'] == 43 )
             $product['cat'] = 75;
          
        elseif($product['cat'] == 44 )
             $product['cat'] = 97;
          
        elseif($product['cat'] == 45 )
             $product['cat'] = 104;
          
        elseif($product['cat'] == 46 )
             $product['cat'] = 65;
          
        elseif($product['cat'] == 47 )
             $product['cat'] = 69;
          
        elseif($product['cat'] == 48 )
             $product['cat'] = 73;
          
        elseif($product['cat'] == 49 )
             $product['cat'] = 90;
          
        elseif($product['cat'] == 50 )
             $product['cat'] = 82;
          
        elseif($product['cat'] == 51 )
             $product['cat'] = 103;
          
        elseif($product['cat'] == 52 )
             $product['cat'] = 24;
          
        elseif($product['cat'] == 53 )
             $product['cat'] = 106;
          
        elseif($product['cat'] == 54 )
             $product['cat'] = 99;
          
        elseif($product['cat'] == 55 )
             $product['cat'] = 100;
          
        elseif($product['cat'] == 56 )
             $product['cat'] = 101;
          
        elseif($product['cat'] == 57 )
             $product['cat'] = 98;
          
        elseif($product['cat'] == 58 )
             $product['cat'] = 78;
          
        elseif($product['cat'] == 59 )
             $product['cat'] = 93;
          
        elseif($product['cat'] == 60 )
             $product['cat'] = 9;
          
        elseif($product['cat'] == 61 )
             $product['cat'] = 21;
          
        elseif($product['cat'] == 62 )
             $product['cat'] = 107;
          
        elseif($product['cat'] == 63 )
             $product['cat'] =108;
          
       
     
      //save the product details in products array
     array_push($products, $product);
    }

    
   //seave a file for related of producers
   mysql_close($conn);
   
   $str = '';
   $flag1 = true;
   foreach ($array_producers as $key) {
     $st = ''; 
     $flag2 = true;
     foreach($key as $value) {
       
       if ($flag2 == true) {
           $flag2 = false;
            $st .="'".$value."'";
       }
         else{
            $st .=",'".$value."'";
         }
            
      }
    if ($flag1 == true) {
        $flag1 = false;
        $str .= '[['.$st.']';
    }
      else{
          $str .= ',['.$st.']';
      }
    
   }
$str .= ']';
$fp = fopen("c:xampp\htdocs\charogh\\producers_names.txt","wb");
fwrite($fp,$str);
fclose($fp);
//save a file for products 
$str = '';
   $flag1 = true;
   foreach ($array_related as $key) {
     $st = ''; 
     $flag2 = true;
     foreach ($key as $value) {
       if ($flag2 == true) {
           $flag2 = false;
            $st .="'".$value."'";
       }
         else{
            $st .=",'".$value."'";
         }
            
      }
    if ($flag1 == true) {
        $flag1 = false;
        $str .= '[['.$st.']';
    }
      else{
          $str .= ',['.$st.']';
      }
    
   }
$str .= ']';
$fp = fopen("c:xampp\htdocs\charogh\\relations_names.txt","wb");
fwrite($fp,$str);
fclose($fp);

}



//Mohsen Mahoski
//create csv file
$details = '';
foreach ($products as $product) {
 $details .= PHP_EOL.'"admin","base","Default","simple","4,'.$product['cat'].'","ch'.$product['id'].'","0","'.$product['title'].'","متا","فوق توصیف","'.$product['pic1'].'","'.$product['pic1'].'","'.$product['pic1'].'","product/'.$product['id'].'/'.$product['url'].'/","product/'.$product['id'].'/'.$product['url'].'/","","بدون به روز رسانی‌های آرایش","ستون اطلاعات محصول","","","","ایران","استفاده از پیکربندی","استفاده از پیکربندی","خیر","'.bcdiv($product["weight"],1000 , 4).'","'.$product['price'].'","'.$product['s-price'].'","","ممکن‌شده","کاتالوگ، جستجو","","خیر","تایید شده","","","هیچ یک","خیر","'.$product['desc'].'",".","فوق واژه","","","","","","","","'.($product['quantity'].'.0000').'","0.0000","1","0","0","1","1.0000","1","0.0000","1","'.$product['stock'].'","","0.0000","1","0","1","0","1","0.0000","1","0","0","0","1","'.$product['title'].'","0","simple","","","","","","",""';
 if ($product['pic2'] != NUll) {
    $details .= PHP_EOL.'"admin","","","","","ch'.$product['id'].'","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","/1/_/'.$product["pic2"].'","","2","0"';
 }
 if ($product['pic3'] != NUll) {
    $details .= PHP_EOL.'"admin","","","","","ch'.$product['id'].'","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","/1/_/'.$product["pic3"].'","","3","0"';
 }
 if ($product['pic4'] != NUll) {
    $details .= PHP_EOL.'"admin","","","","","ch'.$product['id'].'","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","/1/_/'.$product["pic4"].'","","4","0"';
 }
 if ($product['pic5'] != NUll) {
    $details .= PHP_EOL.'"admin","","","","","ch'.$product['id'].'","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","/1/_/'.$product["pic5"].'","","5","0"';
 }
}
$all = '"store","websites","attribute_set","type","category_ids","sku","has_options","name","meta_title","meta_description","image","small_image","thumbnail","url_key","url_path","custom_design","page_layout","options_container","image_label","small_image_label","thumbnail_label","country_of_manufacture","msrp_enabled","msrp_display_actual_price_type","gift_message_available","weight","price","special_price","msrp","status","visibility","vesbrand","featured","product_status","domestic_shipping_cost","international_shipping_cost","tax_class_id","is_recurring","description","short_description","meta_keyword","custom_layout_update","news_from_date","news_to_date","special_from_date","special_to_date","custom_design_from","custom_design_to","qty","min_qty","use_config_min_qty","is_qty_decimal","backorders","use_config_backorders","min_sale_qty","use_config_min_sale_qty","max_sale_qty","use_config_max_sale_qty","is_in_stock","low_stock_date","notify_stock_qty","use_config_notify_stock_qty","manage_stock","use_config_manage_stock","stock_status_changed_auto","use_config_qty_increments","qty_increments","use_config_enable_qty_inc","enable_qty_increments","is_decimal_divided","stock_status_changed_automatically","use_config_enable_qty_increments","product_name","store_id","product_type_id","product_status_changed","product_changed_websites","website","_media_image","_media_lable","_media_position","_media_is_disabled"'
.$details."'";
$fp = fopen("c:xampp\htdocs\charogh\Import.csv","wb");
fwrite($fp,$all);
fclose($fp);
echo "<h1 style='background:green;color:#fff;'>Your Fiile Created Successfull</h1>";
?>
