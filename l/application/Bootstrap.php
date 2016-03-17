<?php

use Doctrine\ORM;
require 'Doctrine/Common/ClassLoader.php';
use Doctrine\ORM\EntityManager, Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	static $INI_DEFAULT_FILE = "db.resourcemanagement.shadow.ini";

	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');
	}

	protected function _initDoctrine()
	{
		$iniFile = self::$INI_DEFAULT_FILE;

		$config = new Zend_Config_Ini(CONFIG_PATH.$iniFile, APPLICATION_ENV);
		Zend_Registry::set("resource_managementConfig", $config);

		$configObj = new Zend_Config_Ini(CONFIG_PATH . '/config.ini', APPLICATION_ENV);
		Zend_Registry::set("config", $configObj);

		$resource_managementConfig = Zend_Registry::get("resource_managementConfig");
		//print_r($resource_managementConfig);exit;
		$zendAutoloader = Zend_Loader_Autoloader::getInstance();
		// Autoload the doctrine objects
		$autoloader = array(new \Doctrine\Common\ClassLoader('Doctrine'), 'loadClass');
		$zendAutoloader->pushAutoloader($autoloader, 'Doctrine');
		// Autoload the models
		$autoloader = array(new \Doctrine\Common\ClassLoader('Entities', APPLICATION_PATH), 'loadClass');
		$zendAutoloader->pushAutoloader($autoloader, 'Entities');

		$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
		$classLoader->register();

		/* if($resource_managementConfig->doctrine->cache){
			$cache = new \Doctrine\Common\Cache\ApcCache();
		}else{
			$cache = new \Doctrine\Common\Cache\ArrayCache();
		} */
		$cache = new \Doctrine\Common\Cache\ArrayCache();

		$entitiesPath = '../Entities';
		$proxiesPath    = '../proxies';

		$config = new \Doctrine\ORM\Configuration();
		$config->setMetadataCacheImpl($cache);
		$driverImpl = $config->newDefaultAnnotationDriver(APPLICATION_PATH . '/Entities');
		$config->setMetadataDriverImpl($driverImpl);
		$config->setQueryCacheImpl($cache);
		$config->setProxyDir(APPLICATION_PATH . '/Proxies');
		$config->setProxyNamespace('Proxies');
		$config->setEntityNamespaces(array('Entities'));

		if($resource_managementConfig->doctrine->proxy){
			$config->setAutoGenerateProxyClasses(true);
		}else{
			$config->setAutoGenerateProxyClasses(false);
		}

		$doctrineConfig = $this->getOption('doctrine');
		/* $connectionOptions = array(
			'driver'    => 'pdo_mysql',
			'user'        => 'root',
			'password'        => 'root',
			'dbname'    => 'test_db',
			'host'        => 'localhost'
		); */

		$connectionOptions = array('dbname'=>$resource_managementConfig->doctrine->dbname, 'user'=>$resource_managementConfig->doctrine->user,
			'password'=>$resource_managementConfig->doctrine->password, 'host'=>$resource_managementConfig->doctrine->host,
			'driver'=>$resource_managementConfig->doctrine->driver);
		$sqlsrvconnectionOptions = array('dbname'=>$resource_managementConfig->doctrine->sqlsrvdbname, 'user'=>$resource_managementConfig->doctrine->sqlsrvuser,
			'password'=>$resource_managementConfig->doctrine->sqlsrvpassword, 'host'=>$resource_managementConfig->doctrine->sqlsrvhost,
			'driver'=>$resource_managementConfig->doctrine->sqlsrvdriver);

		$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);
		$sqlsrvEm = \Doctrine\ORM\EntityManager::create($sqlsrvconnectionOptions, $config);
		Zend_Registry::set('em', $em);
		Zend_Registry::set('sqlsrvEm', $sqlsrvEm);


		return $em;
	}

	protected function _initAutoload(){
		$moduleLoader = new Zend_Application_Module_Autoloader(array('namespace'=>'', 'basePath'=>APPLICATION_PATH));
		/** auto load */
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->setFallbackAutoloader(true);
		return $moduleLoader;
	}
	protected function _initPluginload(){
		$controller = Zend_Controller_Front::getInstance();
		$controller->registerPlugin(new Web_Controller_Plugin_ResourceManagementOauth());
	}

	protected function _initDb(){
		$configObj = Zend_Registry::get("config");
		try{
			$db = Zend_Db::factory($configObj->database->adapter, $configObj->database->params->toArray());
			Zend_Db_Table::setDefaultAdapter($db);
			Zend_Registry::set('db', $db);
			$db->query("SET NAMES 'utf8'");
			return $db;
		}catch(Exception $e){
			return null;
		}
	}

	/**
	 * Methid to override url to avoid invalid string params
	 */
	public function _initCustomRoute()
	{
		$router = Zend_Controller_Front::getInstance()->getRouter();
		$route = new Zend_Controller_Router_Route('error', array(
			'controller' => 'error',
			'action'     => 'permissiondenied',
			'errorMsg'	 => 'You do not have permission to access this page!!'
		));
		$router->addRoute('default-override', $route);

	}
}

