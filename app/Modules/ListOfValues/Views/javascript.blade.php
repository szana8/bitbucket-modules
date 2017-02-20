<script>

    new Vue({
        el: '#listOfValues_app',

        /**
         * Set the Vue components
         */
        components: {
            module: module,
            modal : modal
        },

        /**
         * Vue attributes
         */
        data: {
            api_token: "{{ Auth::user()->api_token }}",
            form: new Form({
                api_token: "{{ Auth::user()->api_token }}",
                id: null,
                type: 1,
                name: null,
                table: "",
                column: "",
                lov_values: [],
            })
        },

        /**
         * Vue methods
         */
        methods: {
            submit() {
                if (this.form.id)
                    this.update();
                else
                    this.store();
            },

            store() {
                this.form.post('{!! url('api/v1/ListOfValues') !!}')
                    .then(data => {
                        $("#new-list-of-values-modal").modal('hide');
                    })
                    .catch(error => {
                        console.log(error);
                        //this.alert.setMessage(error.error.message).setType('error').showAlert();
                    });
            }

        }

    });

</script>