<?php 
class Routes {
	private $dataObject;

	public function __construct() {
		$json = file_get_contents(__DIR__ . '/../data/product.json');
		$this->dataObject = json_decode($json);
	}

	public function getRoutes() {
		require_once __DIR__ . '/ProductController.php';
		$productController = new productController($this->dataObject);

		return [
			'' => [
				'controller' => $productController,
				'action' => 'getProduct',
			],

			'order' => [
				'controller' => $productController, 
				'action' => 'sendMail',
			],

			'success' => [
				'controller' => $productController,
				'action' => 'getSuccessMsg',
			],
		];
	}
}