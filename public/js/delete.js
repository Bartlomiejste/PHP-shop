$(function () {
    $(".delete").click(function () {
        Swal.fire({
            title: "Na pewno chcesz usunąć ten rekord?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Tak, usuń to!",
            cancelButtonText: "Anuluj",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id"),
                })
                    .done(function (data) {
                        Swal.fire({
                            title: "Usunięto!",
                            text: "Twój rekord został usunięty",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false,
                        }).then(function () {
                            window.location.reload();
                        });
                    })
                    .fail(function (data) {
                        Swal.fire(
                            "Problem z usunięciem rekordu!",
                            data.responseJSON.message,
                            data.responseJSON.status
                        );
                    });
            }
        });
    });
});
