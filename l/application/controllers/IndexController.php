<?php
class IndexController extends Zend_Controller_Action{

	public function init(){
		/*
		 * Initialize action controller here
		 */
	}

	public function indexAction(){
// 		$em = Zend_Registry::get("em");
// 		$qb= $em->createQueryBuilder();
// 		$qb->select("u","DATE_ADD(u.dateCreated,INTERVAL '((DAYOFWEEK(u.dateCreated))+1)', 'day') as weekday")->from("Entities\\Users","u")->addOrderBy('weekday');
// 		$query = $qb->getQuery();
// 		var_dump($query);
// 		$user = $query->getResult();
// 		foreach($user as $u){
// 			var_dump($u[0]->getDateCreated());
// 			echo "--".$u['weekday'];

// 		}
// 		var_dump($user);
// 		exit();
		/* $option = Zend_Registry::get('client');
		try {
			$client = new Zend_Soap_Client(null, $option);
			$result = $client->getProducts();
			print_r($result);
		} catch (SoapFault $s) {echo "<pre>";print_r($s);
			die('ERROR: [' . $s->faultcode . '] ' . $s->faultstring);
		} catch (Exception $e) {
			die('ERROR: ' . $e->getMessage());
		}  */
	 /*$em = Zend_Registry::get("sqlsrvEm");

		$connectionParams = array('dbname'=>'resource_management', 'user'=>'root', 'password'=>'', 'host'=>'localhost', 'driver'=>'pdo_mysql');
		$config = new \Doctrine\ORM\Configuration();
		$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver('D:\orchard'));
		$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
		$config->setProxyDir(__DIR__ . '/Proxies');
		$config->setProxyNamespace('Proxies');
		$config->setAutoGenerateProxyClasses(true);
		$em = \Doctrine\ORM\
		EntityManager::create($connectionParams, $config);

		// custom datatypes (not mapped for reverse engineering)
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('longblob', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('blob', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('varbinary', 'string');
		$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('tinyint', 'integer');

		// fetch metadata
		$driver = new \Doctrine\ORM\Mapping\Driver\
		DatabaseDriver($em->getConnection()->getSchemaManager());
		$em->getConfiguration()->setMetadataDriverImpl($driver);
		$cmf = new \Doctrine\ORM\Tools\
		DisconnectedClassMetadataFactory($em);
		$cmf->setEntityManager($em);
		$classes = $driver->getAllClassNames();
		$metadata = $cmf->getAllMetadata();
		$generator = new \Doctrine\ORM\Tools\
		EntityGenerator();
		$generator->setUpdateEntityIfExists(true);
		$generator->setGenerateStubMethods(true);
		$generator->setGenerateAnnotations(true);
		$generator->generate($metadata, 'D:\orchard\SRM\resource');
		echo "done";
		exit;*/
		// action body
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		if(isset($userSessionData->userName)){
			$controller = 'user';
			if($userSessionData->isAdmin)
				$controller = 'admin';

			$routeArgs = array ('controller' => $controller, 'action' => 'index');
			$this->_helper->redirector->gotoRoute ( $routeArgs );
		}
	}
}