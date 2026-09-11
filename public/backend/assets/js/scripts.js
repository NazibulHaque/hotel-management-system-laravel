function blockBodyOnAjaxRequest() {
    $.blockUI({
        message: '<div class="feather icon-refresh-cw icon-spin font-medium-2"></div>',
        overlayCSS: {
            backgroundColor: '#FFF',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}

function deleteData(url) {
    Swal.fire({
        title: "Are you sure?",
        text: "You want to delete this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: 'No',
        confirmButtonText: "Yes",
        confirmButtonClass: "btn btn-warning mr-10",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: false,
    }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {
                        "_token": $('#csrfToken').val(),
                    },
                    beforeSend: function () {
                        blockBodyOnAjaxRequest();
                    },
                    complete: function () {
                        $('body').unblock();
                    },

                    success: function (res) {
                        Swal.fire({
                            title: res.title,
                            text: res.msg,
                            type: res.type,
                            confirmButtonClass: "btn btn-success"
                        }).then(function () {
                            location.reload();
                        });
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Cancelled",
                    text: "No action taken 🙂",
                    type: "error",
                    confirmButtonClass: "btn btn-success"
                });
            }
    });
}

function statusChange(url) {
    Swal.fire({
        title: "Are you sure?",
        text: "You want to change the status!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, change it!",
        confirmButtonClass: "btn btn-success mr-10",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "_token": $('#csrfToken').val(),
                },
                dataType: "json",

                beforeSend: function () {
                    blockBodyOnAjaxRequest();
                },
                complete: function () {
                    $('body').unblock();
                },
                success: function (res) {
                    Swal.fire({
                        title: res.title,
                        text: res.msg,
                        type: res.type,
                        confirmButtonClass: "btn btn-success"
                    }).then(function () {
                        location.reload();
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: "Cancelled",
                text: "Your imaginary file is safe 🙂",
                type: "error",
                confirmButtonClass: "btn btn-success"
            }).then(function () {
                location.reload();
            });
        }
    });
}

function checkConsoleStatus(url){
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",

        beforeSend: function () {
            blockBodyOnAjaxRequest();
        },
        complete: function () {
            $('body').unblock();
        },
        success: function (res) {
            Swal.fire({
                title: res.title,
                text: res.msg,
                type: res.type,
                confirmButtonClass: "btn btn-success"
            });
        },


        error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);

            // Handle error
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                var title = xhr.responseJSON.message;
                var errorMessages = [];

                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        // Add line break after each error key
                        errorMessages.push(errors[key][0]);
                    }
                }

                swal.fire({
                    title: title,
                    type: 'error',
                    text: errorMessages,
                });

            } else {
                swal.fire({
                    title: "500",
                    type: 'error',
                    text: "Internal Server Error",
                });
            }
        }
    });
}
