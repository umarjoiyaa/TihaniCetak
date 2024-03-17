$('#myTable').DataTable();
$('#generate').on('click', function () {
    let item_code = $('#item_code').val();
    let area = $('#area').val();
    let shelf = $('#shelf').val();
    let level = $('#level').val();
    if (item_code.length <= 0 || area.length <= 0 || shelf.length <= 0 || level.length <= 0) {
        alert("Can't Search without fill the all fields!");
    } else {
        $.ajax({
            url: data,
            type: 'GET',
            data: {
                item_code: item_code,
                area_id: area,
                shelf_id: shelf,
                level_id: level
            },
            success: function (response) {
                $('#myTable tbody').html(``);
                if ($.fn.DataTable.isDataTable('#myTable')) {
                    $('#myTable').DataTable().destroy();
                }
                response.forEach((element, index) => {
                    $('#myTable tbody').append(`<tr><td>${index+1}</td><td>${element.item_code}</td><td>${element.description}</td><td>${element.uom}</td><td>${element.used_qty}</td><td>${element.area.name}</td><td>${element.shelf.name}</td><td>${element.level.name}</td></tr>`);
                });
                $('#myTable').DataTable();
            }
        });
    }
});
