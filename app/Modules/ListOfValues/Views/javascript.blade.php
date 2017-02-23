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
            form: new Form({
                api_token: "{{ Auth::user()->api_token }}",
                id: null,
                type: 1,
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
            submit() {
                if (this.form.id)
                    this.update();
                else
                    this.store();
            },

            store() {
                this.form.post('{!! url('api/v1/ListOfValues') !!}')
                    .then(data => {
                        console.log(data);
                        this.alert.setMessage(data.message).setType('success').showAlert();
                        $("#new-list-of-values-modal").modal('hide');
                    })
                    .catch(error => {
                        console.log(error);
                        this.alert.setMessage(error.error.message).setType('error').showAlert();
                    });
            },

            getColumns() {
                axios.get('{!! url('ListOfValues/getTableColumns') !!}/' + this.form.table)
                    .then(response => {
                        this.columns = response.data;
                        this.form.column = "";
                        var message = "{{ trans('ListOfValues::lang.Message.Info.ColumnsLoaded') }}";
                        this.alert.setMessage(message.replace('%s', this.form.table)).setType('success').showAlert();
                        this.form.errors.clear('lov_table');
                    })
                    .catch(error => {
                        console.log(error);
                        var message = "{{ trans('ListOfValues::lang.Message.Error.ColumnsLoaded') }}";
                        this.alert.setMessage(message.replace('%s', this.form.table)).setType('error').showAlert();
                    });
            },

            setValues() {
                //console.log(this.form.lookups.indexOf(this.values));
                if( Helpers.arrayObjectIndexOf(this.form.lookups, this.values, "value") < 0 && this.values) {
                    this.form.lookups.push({value : this.values});
                    $("#lov_list").append('<div id="tag_' + this.values + '" class="tag label label-primary">' + this.values + ' <a @click="removeLookup(\'' + this.values + '\');"><i class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a></div> ');
                    this.values = "";
                }
                else {

                }
            },

            removeLookup(value) {
                //noinspection JSJQueryEfficiency
                //$("#lov_value_list-id option[value=\"" + value + "\"]").remove();
                $("#tag_" + value).remove();
            }

        }

    });

</script>