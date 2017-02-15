<script>
    new Vue({
        el: '#metadata_app',

        components: {
            module: module,
            modal: modal
        },

        data: {
            showModal: false,
            id: null
        },

        methods: {
            editMetadata: function(id) {
                event.preventDefault();

                this.id = id;
                this.$http.get('api/v1/metadata/' + this.id, {api_token: "{{ Auth::user()->api_token }}"}, function(data, status, request) {
                    console.log(data);
                });
            }
        }
    });
</script>