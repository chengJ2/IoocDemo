<?php 
	
class Db{
	static private $_instance;
	static private $_connectSource;
	
	private $_dbConfig = array(
		'host' => '127.0.0.1',
		'user'=>'root',
		'password'=>'sandy',
		'database'=>'db_php',
	);
	
	private function __construct(){
		
	}
	
	/**
	 * ʵ����
	 */
	static public function getInstance(){
		// �ж��Ƿ�ʵ����
		if (!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	/**
	 * ���ݿ�����
	 */
	public function connect(){
		if (!self::$_connectSource){
			// ���ݿ�����
			self::$_connectSource = @mysql_connect($this->_dbConfig['host'],
				$this->_dbConfig['user'],$this->_dbConfig['password']);
				
			if (!self::$_connectSource){
				throw new Exception('mysql connect error');
			}
			
			// ѡ��һ�����ݿ�
			mysql_select_db($this->_dbConfig['database'],self::$_connectSource);
			mysql_query("set names UTF8",self::$_connectSource);
		}
		return self::$_connectSource;
	}
	
}
?>