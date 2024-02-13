$('.form-select').select2()

$('.submit').on('click', function () {
    if ($('#from').val() == $('#to').val()) {
        Swal.fire({
            text: "From and To UOM should be unique!",
            icon: "warning",
            buttonsStyling: false,
            confirmButtonText: "Okay!",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
            }
        }).then(function (result) {
            if (result.value) {}
        });
    } else {
        $(this).closest('form').submit();
    }
});
