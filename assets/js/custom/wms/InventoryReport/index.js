$('#myTable').DataTable();
$('#generate').on('click', function () {
    let item_code = $('#item_code').val();
    let area = $('#area').val();
    let shelf = $('#shelf').val();
    let level = $('#level').val();
    $.ajax({
        url: data,
        type: 'GET',
        data: {
            product_id: item_code,
            area_id: area,
            shelf_id: shelf,
            level_id: level
        },
        success: function (response) {
            if ($.fn.DataTable.isDataTable('#myTable')) {
                $('#myTable').DataTable().destroy();
            }
            $('#myTable tbody').html(``);
            response.forEach((element, index) => {
                $('#myTable tbody').append(`<tr><td>${index+1}</td><td>${element.product.item_code}</td><td>${element.product.description}</td><td>${element.product.base_uom}</td><td>${element.used_qty}</td><td>${element.area.name}</td><td>${element.shelf.name}</td><td>${element.level.name}</td></tr>`);
            });
            $('#myTable').DataTable();
        }
    });
});

function exportToExcel() {
    const table = document.getElementById("myTable");
    const rows = table.querySelectorAll("tr");
    let csv = [];
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].querySelectorAll("td, th");
        let row = [];
        for (let j = 0; j < cells.length; j++) {
            row.push('"' + cells[j].innerText.replace(/"/g, '""') + '"');
        }
        csv.push(row.join(","));
    }
    const csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "inventory.csv");
    document.body.appendChild(link);
    link.click();
}

document.getElementById("export-btn").addEventListener("click", exportToExcel);
