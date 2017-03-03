class Alert {
    /**
     * Create new Alert instance.
     *
     * @param {object} setting
     */
    constructor(setting) {

        this.title = '';

        this.message = '';

        this.type = 'info';

        this.settings = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": 'toast-top-right',
            "preventDuplicates": false,
            "onclick": null,
            "showDuration":  300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        };
        toastr.options = this.settings;
    }


    /**
     * Set the type of the alert.
     *
     * @param {string} type
     * @returns {Alert}
     */
    setType(type) {
        this.type = type;
        return this;
    }


    /**
     * Set the alert message.
     *
     * @param {strings} message
     * @returns {Alert}
     */
    setMessage(message) {
        this.message = message;
        return this;
    }


    /**
     * Return the type of the alert.
     * @returns {string|string|*}
     */
    getType() {
        return this.type;
    }


    /**
     * Return the alert message.
     * @returns {string|strings|*}
     */
    getMessage() {
        return this.message;
    }


    /**
     * Show the alert message on the screen.
     */
    showAlert() {
        toastr[this.type](this.message);
        return this;
    }

    /**
     * Refresh the page.
     * @param time in microseconds
     */
    forceRefresh(time) {
        if( time )
        {
            toastr['info']('The page will be refresh after ' + time / 1000 + ' second(s).');
            setTimeout(function () {
                location.reload();
            }, time);
        }
        else {
            location.reload();
        }

        return this;
    }
}

export default Alert;