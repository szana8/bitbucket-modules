<script>

    new Vue({
        el: '#listOfValues_app',

        /**
         * Set the Vue components
         */
        components: {
            module: module,
            modal: modal
        },

        /**
         * Vue attributes
         */
        data: {

            alert: new Alert({}),
            api_token: "{{ Auth::user()->api_token }}",
            columns: [],
            values: null,
            lov_list: "",
            modal: new ModalHelper({
               id: 'new-list-of-values-modal'
            }),
            form: new Form({
                api_token: "{{ Auth::user()->api_token }}",
                id: null,
                datatype: 1,
                old_datatype: null,
                name: null,
                table: "",
                column: "",
                lookups: [],
                condition: ""
            })

        },

        /**
         * Vue methods
         */
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
                this.form.post('{!! url('api/v1/ListOfValues') !!}')
                    .then(data => {
                        console.log(data);
                        this.alert.setMessage(data.message).setType('success').showAlert();
                        this.modal.hideModal();
                    })
                    .catch(error => {
                        console.log(error);
                        this.alert.setMessage(error.error.message).setType('error').showAlert();
                    });
            },


            /**
             * Default update function forthe REST api.
             */
            update() {
                this.form.patch('{!! url('api/v1/ListOfValues') !!}/' + this.form.id)
                    .then(data => {
                        this.alert.setMessage(data.message).setType('success').showAlert();
                        this.modal.hideModal();
                    })
                    .catch(error => {
                        console.log(error);
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

                this.form.get('{!! url('api/v1/ListOfValues') !!}/' + id)
                    .then(data => {
                        this.setFormAttributes(data.data);
                        this.modal.showModal();
                    })
                    .catch(error => {
                        console.log(error);
                        this.alert.setMessage(error.message).setType('alert').showAlert();
                    });
            },


            /**
             * Set the columns of the selected table
             */
            getColumns(defaultValue) {
                if(this.form.datatype != 1)
                    return;

                axios.get('{!! url('ListOfValues/getTableColumns') !!}/' + this.form.table)
                    .then(response => {
                        this.columns = response.data;
                        this.form.column = "";
                        var message = "{{ trans('ListOfValues::lang.Message.Info.ColumnsLoaded') }}";
                        this.alert.setMessage(message.replace('%s', this.form.table)).setType('success').showAlert();
                        this.form.errors.clear('lov_table');

                        if(defaultValue)
                            this.form.column = defaultValue;
                    })
                    .catch(error => {
                        console.log(error);
                        var message = "{{ trans('ListOfValues::lang.Message.Error.ColumnsLoaded') }}";
                        this.alert.setMessage(message.replace('%s', this.form.table)).setType('error').showAlert();
                    });
            },


            /**
             * Add the given value to the lookups object
             */
            setValues() {
                if( Helpers.arrayObjectIndexOf(this.form.lookups, this.values, "value") < 0 && this.values) {
                    this.form.lookups.push({
                        value : this.values,
                        id: this.values.toLowerCase().replace(' ', ''),
                        list_of_values_id: this.form.id ? this.form.id : null

                    });
                    this.values = "";
                }
            },


            /**
             * Remove the selected value from the lookups object
             * @param {event} value
             */
            removeLookup(event) {
               var index = Helpers.arrayObjectIndexOf(this.form.lookups, event.target.parentElement.parentElement.id, "id");
               this.form.lookups.splice(index, 1);
            },


            /**
             * Set the form attributes to the appropriate value
             * @param data
             */
            setFormAttributes(data) {
                this.form.datatype = data.datatype;
                this.form.old_datatype = data.datatype;
                this.form.name = data.name;
                this.form.table = data.table ? data.table : "";

                if( data.datatype == 1 ) {
                    this.getColumns(data.column);
                    $('#lov-tab a[href="#database"]').tab('show') // Select tab by name
                }

                this.form.id = data.id;

                if( data.datatype == 2 ) {
                    this.setLookupsValue(data.lookups, data.id);
                    $('#lov-tab a[href="#list"]').tab('show') // Select tab by name
                }

                this.form.api_token = this.api_token;
            },


            /**
             *
             * @param lookups
             */
            setLookupsValue(lookups, lov_id) {

                var lookupList = [];

                for( value in lookups )
                {
                    var tmp = {};
                    tmp.id = lookups[value].id;
                    tmp.list_of_values_id = lov_id;
                    tmp.value = lookups[value].value;
                    lookupList.push(tmp);
                }

                this.form.lookups = lookupList;

            },


            /**
             * Set the form default attributes.
             */
            setAttributeDefaults() {
                this.form.reset();
                this.form.api_token = this.api_token;
            }

        }

    });

</script>