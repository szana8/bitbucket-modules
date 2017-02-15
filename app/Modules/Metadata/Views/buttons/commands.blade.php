<button class="btn btn-primary" id="create-metadata-btn" data-toggle="modal" data-target="#new-metadata-modal" @click="showModal = true">
    {{ trans('Core.Label.text.Create') }}
</button>

<div class="btn-group pull-right" role="group" aria-label="group1">
    <button class="btn btn-default">
        <i class="glyphicon glyphicon-import"></i> {{ trans('Core.Label.text.Import') }}
    </button>
    <button class="btn btn-default">
        <i class="glyphicon glyphicon-export"></i> {{ trans('Core.Label.text.Export') }}
    </button>
</div>