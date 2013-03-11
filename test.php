<LINK REL = Stylesheet TYPE ="text/css" HREF ="arrayViewer.css">
<style>
.cls1{
	width: 100px; height: 50px;
	background: green;
}
.cls2{
	width: 100px; height: 50px;
	background: red;
}
</style>
<?php 	
	include("arrayViewer.php");
	$arr=array(1=>"item1",2=>"item2",3=>"item3");
	$arr1=array("item1","item2","item3",array("sub-item1","sub-item2",array("sub_sub_item1","sub_sub_item2")));
	$arr2=array("one"=>"item1","tow"=>"item2","three"=>"item3");
	$arr3=array("html1"=>"<div class='cls1'></div>","tow"=>"<div class='cls2'></div>","sub"=>array("<div class='cls1'></div>"));
	view_r($arr)."<br />======================<br />";
	view_r($arr1)."<br />=====================<br />";
	view_r($arr2)."<br />=====================<br />";
	view_r($arr3)."<br />=====================<br />";
	view_r($arr3,"",false)."<br />=====================<br />";
	view_r($arr3,"",true,"class")."<br />=====================<br />";
	view_r($arr3,"",true,"class","font-size: 30;")."<br />=====================<br />";

?>
