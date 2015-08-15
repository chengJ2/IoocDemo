<?php

class Response{
	
	const JSON='json';
	/**
	 * 
	* Enter 综合方式方式输出通信数据
	 * @param integer $code 状态码
	 * @param string $msg 提示信息
	 * @param array $data 数据
	 * @param string $type 数据类型
	 */
	public static function show($code=0,$msg='error',$data=array(),$type=self::JSON){
		if(!is_numeric($code)){
			return '';
		}
		$result = array(
			'code'=> $code,
			'msg'=>$msg,
			'data'=>$data,
		);
		
		$type=isset($_GET['type'])?$_GET['type']:self::JSON;
		
		if ($type=='json'){
			self::json($code,$msg,$data);
			exit;
		}elseif ($type=='array'){
			var_dump($result);
		}elseif ($type=='xml'){
			self::xmlEncode($code,$msg,$data);
			exit;
		}else{
			//TODO
		}
	}
	/**
	 * 
	 * Enter 按Json方式输出通信数据
	 * @param integer $code 状态码
	 * @param string $msg 提示信息
	 * @param array $data 数据
	 */
	public static function json($code=0,$msg='error',$data=array()){
		if(!is_numeric($code)){
			return '';
		}
		
		$result = array(
			'code'=> $code,
			'msg'=>$msg,
			'data'=>$data,
		);
		echo  json_encode($result);
		exit;
	}
	
	/**
	 * 
	 * Enter 按Xml方式输出通信数据
	 * @param integer $code 状态码
	 * @param string $msg 提示信息
	 * @param array $data 数据
	 */
	public static function xmlEncode($code=0,$msg='error',$data=array()){
		if(!is_numeric($code)){
			return '';
		}
	
		$result = array(
			'code'=> $code,
			'msg'=>$msg,
			'data'=>$data,
		);
		header("Content-Type:text/xml");
		$xml="<?xml version='1.0' encoding='utf-8'?>\n";
		$xml.="<root>";
		$xml.= self::xmlToEncode($result);
		$xml.="</root>";
		echo $xml;
	}
	
	public static function xmlToEncode($data){
		$xml = $attr ="";
		foreach ($data as $key=>$value){
			if (is_numeric($key)){
				$attr="id='{$key}'";
				$key="item ";
			}
			
			$xml.="<{$key}{$attr}>";
			$xml.=is_array($value)?self::xmlToEncode($value):$value;
			$xml.="</{$key}>\n";
		}
		return $xml;
	}
}
?>