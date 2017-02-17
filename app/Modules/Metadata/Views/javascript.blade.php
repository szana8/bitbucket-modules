<script>
    new Vue({
        el: '#metadata_app',

        components: {
            module: module,
            modal: modal
        },

        data: {
            api_token: "{{ Auth::user()->api_token }}",
            form: new Form({
                api_token: null,
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
            submit() {
                this.form.post('{!! url('api/v1/metadata') !!}')
                    .then(data => console.log(data))
                    .catch(error => console.log(error));
            },

            edit(id) {
                this.form.api_token = this.api_token;

                this.form.get('{!! url('api/v1/metadata') !!}/' + id)
                    .then(data => {
                        console.log(data.data);

                        this.form.id = data.data.id;
                        this.form.method = 'patch';
                        this.form.type = data.data.type;
                        this.form.key = data.data.key;
                        this.form.value = data.data.value;
                        this.form.description = data.data.description;
                        this.form.enabled = data.data.enabled;

                        $("#new-metadata-modal").modal('show');
                    })
                    .catch(error => console.log(error));
            }

        }
    });
</script>