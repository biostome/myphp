<?php
$cat=$_GET['cat'];
$year=intval($_GET['year']);
if($year==0)$year='';
$area=$_GET['area'];
$pageno=intval($_GET['pageno']);
if($pageno==0){$pageno=1;}
$act=$_GET['act'];  //演员

    if($leixing=="dongman"){
		$url="http://www.360kan.com/dongman/list?cat=$cat&year=$year&area=$area&pageno=$pageno";
	}elseif($leixing=="zongyi"){
		$url="http://www.360kan.com/zongyi/list?cat=$cat&area=$area&act=$act&pageno=$pageno";
    }else{
		$url="http://www.360kan.com/$leixing/list?cat=$cat&area=$area&act=$act&year=$year&pageno=$pageno";
    }
    //echo $url;
	$info=getwy($url);	
//echo $info;	
//判断当前页面最大页数
preg_match_all("#<a href='(.*?)pageno=(.*?)'#",$info,$pagearr);
if(count($pagearr[2])>0)$top = array_search( max($pagearr[2]) ,$pagearr[2]);$maxpage=$pagearr[2][$top];
preg_match_all("#<a target='_self' class='on'>(.*?)</a>#", $info,$yearr); 
$top=intval($yearr[1][0]);
if($maxpage<$top)$maxpage=$top;
if(intval($maxpage)==0)$maxpage=1;	
?>
