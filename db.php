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
	 * 实例化
	 */
	static public function getInstance(){
		// 判断是否被实例化
		if (!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	/**
	 * 数据库连接
	 */
	public function connect(){
		if (!self::$_connectSource){
			// 数据库连接
			self::$_connectSource = @mysql_connect($this->_dbConfig['host'],
				$this->_dbConfig['user'],$this->_dbConfig['password']);
				
			if (!self::$_connectSource){
				throw new Exception('mysql connect error');
			}
			
			// 选择一个数据库
			mysql_select_db($this->_dbConfig['database'],self::$_connectSource);
			mysql_query("set names UTF8",self::$_connectSource);
		}
		return self::$_connectSource;
	}
	
}
?>