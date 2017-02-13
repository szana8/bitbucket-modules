<script>



    /**
     * Modal button click function definition.
     */
    $("#create-metadata-btn").click(function () {
        $("#new-metadata-modal").modal('show');
    });


    /**
     * Save user button click function.
     */
    $("#saveMetadataBtn").click(function () {

        if ($("#update_item_id").val() != "") {
            var type = "PATCH";
            var url = "{!! url('api/v1/metadata') !!}/" + $("#update_item_id").val();
        }
        else {
            var type = "POST";
            var url = "{!! url('api/v1/metadata') !!}";
        }

        $.ajax({
            type: type,
            async: false,
            url: url,
            data: $("#metadata-form-id").serialize(),
            beforeSend: function (jqXHR, settings) {
            },
            complete: function (jqXHR, textStatus) {
            },
            success: function (data, textStatus) {
                console.log(textStatus);
                if (data.status_code != 201) {
                    //setMessagePopup('success', data.title, data.message);
                    $("#metadata-form-id")[0].reset();
                    $("#new-metadata-modal").modal("hide");
                    setTimeout(function () {
                        location.reload();
                    }, 5000);
                }
                else {
                    //setMessagePopup('danger', data.title, data.message);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#responsDiv").html('<div>' + xhr.responseText + '</div>');
                console.log(xhr.status);
            }
        });
    });

    /**
     *
     * @param id
     * @returns {null}
     */
    function editMetadata(id) {
        if (id == "") {
            return null;
        }

        $.ajax({
            type: "GET",
            async: false,
            url: "{!! url('api/v1/metadata') !!}/" + id,
            datatype: "json",
            data: {'api_token' : '{!! \Auth::user()->api_token !!}'},
            beforeSend: function (jqXHR, settings) {
            },
            complete: function (jqXHR, textStatus) {
            },
            success: function (data) {
                $("#new-metadata-modal").modal("show");
                var obj = data.data;

                $("#update_item_id").val(obj.id);
                $("#type-id").val(obj.type);
                $("#key-id").val(obj.key);
                $("#value-id").val(obj.value);
                $("#description-id").val(obj.description);
                if (obj.enabled == 'Y')
                    $("#enabled-id").prop('checked', true);
                else
                    $("#enabled-id").prop('checked', false);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#responsDiv").html('<div>' + xhr.responseText + '</div>');
                console.log(xhr.status);
            }
        });
    }

    function deleteMetadata(id) {
        if (id == "") {
            return null;
        }

        if(confirm('{{ trans('Core.Message.Text.DeleteConfirm') }}') != true)
            return;

        $.ajax({
            type: "DELETE",
            async: false,
            url: "{!! url('api/v1/metadata') !!}/" + id,
            datatype: "json",
            data: {'api_token' : '{!! \Auth::user()->api_token !!}'},
            beforeSend: function (jqXHR, settings) {
            },
            complete: function (jqXHR, textStatus) {
            },
            success: function (data, textStatus) {
                console.log(data.status);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#responsDiv").html('<div>' + xhr.responseText + '</div>');
                console.log(xhr.status);
            }
        });
    }

</script>