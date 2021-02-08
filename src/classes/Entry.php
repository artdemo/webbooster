<?php 
class Entry {
	private $routes;
	private $route;

	public function __construct($routes, $route) {
		$this->routes = $routes;
		$this->route = $route;
	}

	public function getTemplate($template, $variables = []) {
		if (!empty($variables)) {
			extract($variables);
		}

		ob_start();
		include __DIR__ . "/../templates/" . $template;
		return ob_get_clean(); 
	}

	public function run() {
		$routes = $this->routes->getRoutes();
		$controller = $routes[$this->route]['controller'];
		$action = $routes[$this->route]['action'];

		$pageData = $controller->$action();

		extract($pageData);

		$output = $this->getTemplate($template, $variables);

		include __DIR__ . "/../templates/layout.html.php";
	}
}