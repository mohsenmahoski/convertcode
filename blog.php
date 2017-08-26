<?php
 if($conn = mysql_connect('localhost' , 'root' , '')){
   $q = 'set charset utf8';
   mysql_query($q);

   $q = 'use charogh';
   mysql_query($q);

   $q = 'select* from tbl_articles limit 1';
   $result = mysql_query($q);
   
   $articles =  array();
   $article = array();
   while ($row = mysql_fetch_object($result)) {

        $article['title'] = $row->title;
        $article['des'] = $row->des;
        $article['cat_id'] = $row->cat_id;
        $article['picture'] = $row->picture;
        $article['views'] = $row->views;

        if ($article['cat_id'] == 1) {
           $article['cat_id'] = 8;
        }
        else($article['cat_id'] == 2) {
           $article['cat_id'] = 9;
        }
        else ($article['cat_id'] == 3) {
           $article['cat_id'] = 10;
        }
        else($article['cat_id'] == 4) {
           $article['cat_id'] = 11;
        }
        else ($article['cat_id'] == 5) {
           $article['cat_id'] = 12;
        }
        else ($article['cat_id'] == 6) {
           $article['cat_id'] = 13;
        }
        else ($article['cat_id'] == 7) {
           $article['cat_id'] = 14;
        }
        else ($article['cat_id'] == 8) {
           $article['cat_id'] = 15;
        }
        else ($article['cat_id'] == 9) {
           $article['cat_id'] = 16;
        }
        else ($article['cat_id'] == 10) {
           $article['cat_id'] = 17;
        }
        else ($article['cat_id'] == 11) {
           $article['cat_id'] = 18;
        }
        else ($article['cat_id'] == 12) {
           $article['cat_id'] = 19;
        }
        else ($article['cat_id'] == 13) {
           $article['cat_id'] = 20;
        }
        else ($article['cat_id'] == 14) {
           $article['cat_id'] = 21;
        }
        else ($article['cat_id'] == 15) {
           $article['cat_id'] = 22;
        }
        array_push($articles, $article)
   }
 }
 else{
 	echo mysql_error();
 }
?>