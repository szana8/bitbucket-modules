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
            this.form.post('api/v1/authentication/database/login')
                .then(response => alert('yeee'));
        }
    }
});