<script>
    new Vue({
        el: '#metadata_app',

        components: {
            module: module,
            modal: modal
        },

        data: {
            alert: new Alert({}),
            modal: new ModalHelper({ id: 'new-metadata-modal' }),
            list: {!! $list !!},
            api_token: "{{ Auth::user()->api_token }}",
            form: new Form({
                api_token: "{{ Auth::user()->api_token }}",
                id: null,
                method: null,
                type: "",
                key: null,
                value: null,
                description: null,
                enabled: 'Y'
            })
        },

        methods: {
            /**
             * Save button triggered function
             */
            submit() {
                if (this.form.id)
                    this.update();
                else
                    this.store();
            },


            /**
             * Default make function for the REST api
             */
            store() {
                this.form.post('{!! url('api/v1/metadata') !!}')
                    .then(data => {
                        this.alert.setMessage(data.message).setType('success').showAlert().forceRefresh(5000);
                        this.modal.hideModal();
                    })
                    .catch(error => {
                        this.alert.setMessage(error.error.message).setType('error').showAlert();
                    });
            },


            /**
             * Call the metadata REST API to return the proper object
             *
             * @param {integer} id
             */
            show(id) {
                this.form.api_token = this.api_token;

                this.form.get('{!! url('api/v1/metadata') !!}/' + id)
                    .then(data => {
                        this.setFormAttributes(data);
                        this.modal.showModal();
                    })
                    .catch(error => {
                        this.alert.setMessage(error.message).setType('alert').showAlert();
                    });
            },


            /**
             * Update an existing metadata
             */
            update() {
                this.form.patch('{!! url('api/v1/metadata') !!}/' + this.form.id)
                    .then(data => {
                        this.alert.setMessage(data.message).setType('success').showAlert().forceRefresh(5000);
                        this.modal.hideModal();
                    })
                    .catch(error => console.log(error));
            },


            /**
             * Destroy an existing metadata
             *
             * @param {integer} id
             */
            destroy(id) {
                this.form.delete('{!! url('api/v1/metadata') !!}/' +id)
                    .then(data => {
                        this.alert.setMessage(data.message).setType('success').showAlert();
                        this.modal.hideModal();
                    })
                    .catch(error => console.log(error));
            },


            /**
             * After the save we set the default value for some of the attributes.
             */
            setAttributeDefaults() {
                this.form.reset();
                this.form.api_token = this.api_token;
                this.form.enabled = 'Y';
            },


            /**
             * After the get request setting the from attributes.
             *
             * @param {object} data
             */
            setFormAttributes(data) {
                this.form.id = data.data.id;
                this.form.method = 'patch';
                this.form.type = data.data.type;
                this.form.key = data.data.key;
                this.form.value = data.data.value;
                this.form.description = data.data.description;
                this.form.enabled = data.data.enabled;
                this.form.api_token = this.api_token;
            }
        }
    });
</script>