<script>
    export default {

    }
</script>

<template id="modal-template">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <slot name=header></slot>
                    </h4>
                </div>

                <div class="modal-body" id="metadata-modal">
                    <slot></slot>
                </div>

                <div class="modal-footer">
                    <slot name=footer></slot>
                </div>

            </div>
        </div>
    </div>
</template>