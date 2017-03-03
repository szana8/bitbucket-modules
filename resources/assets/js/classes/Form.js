class Form {
    /**
     * Create new Form instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }


    /**
     * Fetch all relevant data for the form.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }


    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = "";
        }

        this.errors.clear();
    }


    /**
     * Submit the form with post.
     *
     * @param {string} url
     */
    post(url) {
        return new Promise((resolve, reject) => {
            axios.post(url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data.error);

                    reject(error.response.data);
                });
        });
    }


    /**
     * Submit the form with patch.
     *
     * @param {string} url
     */
    patch(url) {
        return new Promise((resolve, reject) => {
            axios.patch(url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data.error);

                    reject(error.response.data);
                });
        });
    }


    /**
     * Submit the form with delete.
     *
     * @param {string} url
     */
    delete(url) {
        return new Promise((resolve, reject) => {
            axios.delete(url, {
                params: this.data()
            })
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data.error);

                    reject(error.response.data);
                });
        });
    }


    /**
     * Create a get request.
     *
     * @param {string} url
     */
    get(url) {
        return new Promise((resolve, reject) => {
            axios.get(url, {
                params: this.data()
            })
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data.error);

                    reject(error.response.data);
                });
        });
    }


    /**
     * Handle successful form submission.
     *
     * @param {object} data
     */
    onSuccess(data) {
        console.log('Success: ' + data);

        this.reset();
    }


    /**
     * Handle failed form submission.
     *
     * @param {object} error
     */
    onFail(error) {
        console.log('Error: ' + error);
        this.errors.record(error.errors);
    }

}

export default Form;
