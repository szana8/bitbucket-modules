<script>
    export default {
        props: ['name', 'description']
    }
</script>

<template>
    <div class="col-md-12">
        <div class="row">
            <h3>{{name}}</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="bs-callout bs-callout-info" role="alert">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        <span v-html="description"></span>
                    </div>
                </div>
            </div>

            <div class="row module-button-section">
                <div class="col-md-12">
                    <slot name="module-buttons"></slot>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-8 col-md-4">
                    <slot name="module-search-form"></slot>
                </div>
            </div>

            <div class="row">
                <slot></slot>
            </div>

        </div>
    </div>
</template>