<?php

class Response{
	
	const JSON='json';
	/**
	 * 
	* Enter �ۺϷ�ʽ��ʽ���ͨ������
	 * @param integer $code ״̬��
	 * @param string $msg ��ʾ��Ϣ
	 * @param array $data ����
	 * @param string $type ��������
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
	 * Enter ��Json��ʽ���ͨ������
	 * @param integer $code ״̬��
	 * @param string $msg ��ʾ��Ϣ
	 * @param array $data ����
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
	 * Enter ��Xml��ʽ���ͨ������
	 * @param integer $code ״̬��
	 * @param string $msg ��ʾ��Ϣ
	 * @param array $data ����
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