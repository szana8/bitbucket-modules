new Vue({
    el: '#login-form',

    data: {
        form: new Form({
            email: '',
            password: ''
        })
    },

    methods: {
        onSubmit() {
            this.form.post('login')
                .then(response => {
                    console.log(response);
                });
        }
    }
});