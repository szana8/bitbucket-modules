<script>
    class Errors {

        /**
         * Create new Errors instance
         */
        constructor() {
            this.errors = {};
        }


        /**
         * Determine if an errors exists for the givven field.
         *
         * @param field
         */
        has(field) {
            return this.errors.hasOwnProperty(field);
        }


        /**
         * Determine if we have any errors.
         *
         * @returns {boolean}
         */
        any() {
            return Object.keys(this.errors).length > 0;
        }


        /**
         * Retreive the error message for a field.
         *
         * @param field
         */
        get(field) {
            if (this.errors[field]) {
                return this.errors[field][0];
            }
        }


        /**
         * Record new errors.
         *
         * @param {object} errors
         */
        record(errors) {
            this.errors = errors;
        }


        /**
         * Clear one or all error fields.
         *
         * @param {string|null} field
         */
        clear(field) {
            if (field) {
                delete this.errors[field];
                return;
            }
            this.errors = {};
        }
    }


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
            let data = Object.assign({}, this);

            delete data.originalData;
            delete data.errors;

            return data;
        }


        /**
         * Reset the form fields.
         */
        reset() {
            for (let field in this.originalData) {
                this[field] = '';
            }

            this.errors.clear();
        }

        /**
         * Submit the form.
         *
         * @param {string} requestType
         * @param {string} url
         */
        submit(requestType, url) {
            return new Promise((resolve, reject) => {
                axios[requestType](url, this.data())
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
            alert(data.message);

            this.reset();
        }


        /**
         * Handle failed form submission.
         *
         * @param {object} error
         */
        onFail(error) {
            console.log(error);
            this.errors.record(error.errors);
        }

    }


    new Vue({
        el: '#metadata_app',

        components: {
            module: module,
            modal: modal
        },

        data: {
            form: new Form({
                id: null,
                api_token: "{{ Auth::user()->api_token }}",
                type: "",
                key: null,
                value: null,
                description: null,
                enabled: 'Y'
            })
        },

        methods: {
            onSubmit() {
                this.form.submit('post', '{!! url('api/v1/metadata') !!}')
                    .then(data => console.log(data))
                    .catch(error => console.log(error));
            }

        }
    });
</script>