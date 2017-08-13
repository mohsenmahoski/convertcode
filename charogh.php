<?php 
 if($conn = mysql_connect('localhost' , 'root' , ''));
{
   $products=array();

   $q = 'use charogh';
   mysql_query($q , $conn);
  
   mysql_set_charset('utf8',$conn);
   $q = 'select* from tbl_products limit 1';
   $result = mysql_query($q);
    
    if (!$result) {
    die('Could not query:' . mysql_error());
    }
    while ($row = mysql_fetch_object($result)) {
     $product = array();


     $product['title'] = $row->title;
     $product['cat'] = $row->cat_id;
     $product['producer'] = $row->producer_id;
     $product['price'] = $row->price1;
     $product['s-price'] = $row->price2;
     $product['desc'] = $row->des;
     $product['quantity'] = $row->quantity;
     $product['pic1'] = $row->pic1;
     $product['pic2'] = $row->pic2;
     $product['pic3'] = $row->pic3;
     $product['pic4'] = $row->pic4;
     $product['pic5'] = $row->pic5;
     $product['disable'] = $row->disable;
     $product['priority'] = $row->priority;
     $product['visits'] = $row->visits;
     $product['likes'] = $row->likes;
     $product['purchases'] = $row->purchases;
     $product['weight'] = $row->weight;
     $product['show_in_home'] = $row->show_in_home;

     $product['related'] = array();
     $product['related'] = explode('-' , $row->related);
    
     $product['commission'] = $row->commission;
  
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
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 102;
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 85;
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 87;
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 88;
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 89;
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 70;
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 71;
          
        elseif($product['cat'] == 1 )
             $product['cat'] = 64;
          
        elseif($product['cat'] == 2 )
             $product['cat'] = 66;
          
        elseif($product['cat'] == 2 )
             $product['cat'] = 83;
          
        elseif($product['cat'] == 2 )
             $product['cat'] = 20;
          
        elseif($product['cat'] == 2 )
             $product['cat'] = 22;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 79;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 91;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 84;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 86;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 86;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 72;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 80;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 77;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 74;
          
        elseif($product['cat'] == 3 )
             $product['cat'] = 95;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 23;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 96;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 76;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 75;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 97;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 104;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 65;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 69;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 73;
          
        elseif($product['cat'] == 4 )
             $product['cat'] = 90;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 82;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 103;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 24;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 106;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 99;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 100;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 101;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 98;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 78;
          
        elseif($product['cat'] == 5 )
             $product['cat'] = 93;
          
        elseif($product['cat'] == 6 )
             $product['cat'] = 9;
          
        elseif($product['cat'] == 6 )
             $product['cat'] = 21;
          
        elseif($product['cat'] == 6 )
             $product['cat'] = 107;
          
        elseif($product['cat'] == 6 )
             $product['cat'] =108;
          
       
     
      
     array_push($products, $product);
    }

    
   var_dump($products);
   mysql_close($conn);
}





//Mohsen Mahoski
//create csv file
$details = '';
foreach ($products as $product) {
 $details .= PHP_EOL.'"admin","base","Default","simple","4,'.$product['cat'].'","ch'.$product['priority'].'","0","'.$product['title'].'","متا","فوق توصیف","/1/_/'.$product['pic1'].'","/1/_/'.$product['pic1'].'","/1/_/'.$product['pic1'].'","کلید","کلید/","","بدون به روز رسانی‌های آرایش","ستون اطلاعات محصول","","","","اروگوئه","استفاده از پیکربندی","استفاده از پیکربندی","خیر","1000.0000","99999.0000","88888.0000","","ممکن‌شده","کاتالوگ، جستجو","برند2","بلی","تایید شده","555555","555555","هیچ یک","خیر","توصیف","شرح کوتاه","فوق واژه","","2017-08-12 00:00:00","2017-09-12 00:00:00","2017-08-12 00:00:00","2017-11-12 00:00:00","","","10.0000","0.0000","1","0","0","1","1.0000","1","0.0000","1","1","","0.0000","1","0","1","0","1","0.0000","1","0","0","0","1","محصول","0","simple","","","","","","",""';
}
$all = '"store","websites","attribute_set","type","category_ids","sku","has_options","name","meta_title","meta_description","image","small_image","thumbnail","url_key","url_path","custom_design","page_layout","options_container","image_label","small_image_label","thumbnail_label","country_of_manufacture","msrp_enabled","msrp_display_actual_price_type","gift_message_available","weight","price","special_price","msrp","status","visibility","vesbrand","featured","product_status","domestic_shipping_cost","international_shipping_cost","tax_class_id","is_recurring","description","short_description","meta_keyword","custom_layout_update","news_from_date","news_to_date","special_from_date","special_to_date","custom_design_from","custom_design_to","qty","min_qty","use_config_min_qty","is_qty_decimal","backorders","use_config_backorders","min_sale_qty","use_config_min_sale_qty","max_sale_qty","use_config_max_sale_qty","is_in_stock","low_stock_date","notify_stock_qty","use_config_notify_stock_qty","manage_stock","use_config_manage_stock","stock_status_changed_auto","use_config_qty_increments","qty_increments","use_config_enable_qty_inc","enable_qty_increments","is_decimal_divided","stock_status_changed_automatically","use_config_enable_qty_increments","product_name","store_id","product_type_id","product_status_changed","product_changed_websites","website","_media_image","_media_lable","_media_position","_media_is_disabled"'
.$details."'";
$fp = fopen("c:xampp\htdocs\charogh\myText.csv","wb");
fwrite($fp,$all);
fclose($fp);
echo "Your Fiile Created Successfull";
?>
