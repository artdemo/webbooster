import Modal from "./modules/modal.js";

const modal = new Modal({
	modalClass: "is-modal-visible",
	payload: document.querySelector(".modal__payload"),
	closeButton: document.querySelector(".modal__button"),
});

modal.init();

const productControl = document.getElementById("product-name");

document.body.addEventListener("click", (e) => {
	//Put a product name into a form field beforehand
	if (e.target.classList.contains("js-button_open-module")) {
		productControl.value = e.target.dataset.product;
		//Show a popup window
		modal.showModal();
		e.stopPropagation();
	}
});
