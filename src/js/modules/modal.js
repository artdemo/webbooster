class Modal {
	constructor({ modalClass, payload, closeButton }) {
		this.modalClass = modalClass;
		this.payload = payload;
		this.closeButton = closeButton;
		this._body = document.body;
		this._topOffset = null;
	}

	freezeBody() {
		this._topOffset = window.pageYOffset;
		this._body.style.marginRight =
			window.innerWidth - document.documentElement.clientWidth + "px";
		this._body.style.position = "fixed";
		this._body.style.top = -this._topOffset + "px";
	}

	unfreezeBody() {
		this._body.style.position = "";
		this._body.style.marginRight = "0px";
		window.scrollTo(0, this._topOffset);
	}

	showModal() {
		if (!this._body.classList.contains(this.modalClass)) {
			this._body.classList.add(this.modalClass);

			this.freezeBody();
		}
	}

	closeModal() {
		if (this._body.classList.contains(this.modalClass)) {
			this._body.classList.remove(this.modalClass);
			this.unfreezeBody();
		}
	}

	init() {
		window.addEventListener("click", (e) => {
			if (this.payload.contains(e.target) && e.target !== this.closeButton)
				return;

			this.closeModal();
		});
	}
}

export default Modal;
