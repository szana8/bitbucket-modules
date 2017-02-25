class ModalHelper {

    constructor(data) {

        this.data = data;

    }

    showModal() {
        $("#" + this.data.id).modal('show');
        return this;
    }

    hideModal() {
        $("#" + this.data.id).modal('hide');
        return this;
    }

}

export default ModalHelper;