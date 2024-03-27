$('#myTable').DataTable();
$('.shelf').on('click', function() {
    let area_shelf = $(this).closest('.card').find('.area_shelf').val();
    let area_id = $(this).closest('.card').find('.area').val();
    let shelf_id = $(this).attr('data-id');
    $('#exampleModalLabel').text(area_shelf);
    $.ajax({
        url: data,
        type: 'GET',
        data: {
            area_id: area_id,
            shelf_id: shelf_id
        },
        success: function(response) {
            if ($.fn.DataTable.isDataTable('#myTable')) {
                $('#myTable').DataTable().destroy();
            }
            $('#myTable tbody').html(``);
            response.forEach(element => {
                $('#myTable tbody').append(`<tr><td>${element.level.name}</td><td>${element.product.item_code}</td><td>${element.product.description}</td><td>${element.used_qty}</td></tr>`);
            });
            $('#myTable').DataTable();
        }
    });
});