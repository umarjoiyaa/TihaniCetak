$('.submit').on('click', function () {
    if ($('#from').val() == $('#to').val()) {
        swal({
            title: "",
            text: "From and To UOM should be unique!",
            type: "warning",
            buttonsStyling: false,
            confirmButtonText: "Okay!",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
            }
        });
    } else {
        $(this).closest('form').submit();
    }
});
