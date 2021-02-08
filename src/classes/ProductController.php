<?php 
class ProductController {
	private $data;

	public function __construct($data) {
		$this->data = $data;
	}

	public function getProduct() {
		$product = $this->data->product;

		return [
			'template' => 'product.html.php',
			'variables' => [
				'product' => $product,
			],
		];
	}

	public function sendMail() {
		if (!empty($_POST)) {
			$to = 'some@mail.com';
			$subject = "Product order";
			$message = "";

			foreach ($_POST as $key => $value) {
				$message .= $key . ": " . $value . "\r\n";
			}

			$message = rtrim($message);

			$headers = 'From: ' . $_POST['email'];

			mail($to, $subject, $message);
		}

		header('Location: /success');
	}

	public function getSuccessMsg() {
		return [
			'template' => 'success.html.php',
		];
	}
}