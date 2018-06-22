<?php
/**
 * PC百度
 * @return string
 */
function BaiDuPC()
{
	$s = $_REQUEST['s'];
	$h   = '<script type="text/javascript">'; 
	$h  .= '$(document).ready(function(e){';
	$h  .= 'var counter=0;';
	$h  .= 'if (window.history && window.history.pushState){';
	$h  .= '$(window).on("popstate",function(){';
	$h  .= 'window.history.pushState("forward",null,"#");';
	$h  .= 'window.history.forward(1);';
	$h  .= 'location.href="http://www.baidu.com/s?wd='.urlencode($s).'";';
	$h  .= '});';
	$h  .= '}';
	$h  .= 'window.history.pushState("forward",null,"#");';
	$h  .= 'window.history.forward(1);';
	$h  .= '});';
	$h  .= '</script>';
	echo $h;
}
/**
 * mobile移动
 * @return string
 */
function BaiDuMobile()
{
	$s = $_REQUEST['s'];
	$pwd = $s;	
	$h = '';
	if( $pwd == '牙博士牙科' )
	{
		$h  .= '<script type="text/javascript">'; 
		$h  .= '$(document).ready(function(e){';
		$h  .= 'var counter=0;';
		$h  .= 'if(window.history && window.history.pushState){';
		$h  .= '$(window).on("popstate",function(){';
		$h  .= 'window.history.pushState("forward",null,"?s="+Math.random());';
		$h  .= 'window.history.forward(1);';
		$h  .= 'location.href="http://m.baidu.com/s?wd='.urlencode($s).'";';
		$h  .= '});';
		$h  .= '}';
		$h  .= 'window.history.pushState("forward",null,"?s="+Math.random());';
		$h  .= 'window.history.forward(1);';
		$h  .= '});';
		$h  .= '</script>';
	}
	echo $h;
}
##########################################################################
$act = $_REQUEST['act']==''?'':$_REQUEST['act'];
if( $act!=null && function_exists( $act ) )
{
	$act();
}
else 
{
	echo json_encode(array('error'=>$act.' - Interface does not exist'));
}