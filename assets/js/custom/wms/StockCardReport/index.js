$('#myTable').DataTable();
$('#generate').on('click', function () {
    let start_date = $('#start_date').val();
    let end_date = $('#end_date').val();
    let item_code = $('#item_code').val();
    if (start_date != null && end_date != null && item_code != null) {
        if (start_date >= end_date) {
            alert('Start Date should be < End Date!');
        } else {
            $.ajax({
                url: data,
                type: 'GET',
                data: {
                    item_code: item_code,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (response) {
                    if ($.fn.DataTable.isDataTable('#myTable')) {
                        $('#myTable').DataTable().destroy();
                    }
                    $('#myTable tbody').html(``);
                    let index = 1;
                    let balance = 0;
                    response.good_receiving.forEach(element => {
                        const receiving_qty = element.receiving_qty ? element.receiving_qty : 0;
                        balance += receiving_qty;
                        $('#myTable tbody').append(`<tr><td>${index}</td><td>${element.date}</td><td>Good Receiving</td><td>${element.doc_no}</td><td>${element.item_code}</td><td>${element.description}</td><td>${element.base_uom}</td><td>+${receiving_qty}</td><td>${balance}</td></tr>`);
                        index++;
                    });
                    response.manage_transfer_b.forEach(element => {
                        const transfer_qty = element.transfer_qty ? element.transfer_qty : 0;
                        balance += transfer_qty;
                        $('#myTable tbody').append(`<tr><td>${index}</td><td>${element.date}</td><td>Manage Transfer</td><td>${element.ref_no}</td><td>${element.item_code}</td><td>${element.description}</td><td>${element.base_uom}</td><td>-${transfer_qty}</td><td>${balance}</td></tr>`);
                        index++;
                    });
                    response.manage_transfer_c.forEach(element => {
                        const transfer_qty = element.transfer_qty ? element.transfer_qty : 0;
                        balance += transfer_qty;
                        $('#myTable tbody').append(`<tr><td>${index}</td><td>${element.date}</td><td>Manage Transfer</td><td>${element.ref_no}</td><td>${element.item_code}</td><td>${element.description}</td><td>${element.base_uom}</td><td>-${transfer_qty}</td><td>${balance}</td></tr>`);
                        index++;
                    });
                    response.manage_transfer_d.forEach(element => {
                        const transfer_qty = element.transfer_qty ? element.transfer_qty : 0;
                        balance += transfer_qty;
                        $('#myTable tbody').append(`<tr><td>${index}</td><td>${element.date}</td><td>Manage Transfer</td><td>${element.ref_no}</td><td>${element.item_code}</td><td>${element.description}</td><td>${element.base_uom}</td><td>-${transfer_qty}</td><td>${balance}</td></tr>`);
                        index++;
                    });
                    response.stock_in.forEach(element => {
                        const qty = element.qty ? element.qty : 0;
                        balance += qty;
                        $('#myTable tbody').append(`<tr><td>${index}</td><td>${element.date}</td><td>Stock In</td><td>${element.ref_no}</td><td>${element.item_code}</td><td>${element.description}</td><td>${element.base_uom}</td><td>+${qty}</td><td>${balance}</td></tr>`);
                        index++;
                    });
                    response.stock_transfer.forEach(element => {
                        const qty = element.qt? element.qty : 0;
                        balance += qty;
                        $('#myTable tbody').append(`<tr><td>${index}</td><td>${element.date}</td><td>Stock Transfer</td><td>${element.ref_no}</td><td>${element.item_code}</td><td>${element.description}</td><td>${element.base_uom}</td><td>-${qty}</td><td>${balance}</td></tr>`);
                        index++;
                    });
                    $('#myTable').DataTable();
                }
            });
        }
    } else {
        alert('Fill all the fileds!');
    }
});

$('#item_code').on('change', function () {
    let description = $(this).find('option:selected').attr('data-id');
    $('#description').val(description);
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
    link.setAttribute("download", "stock_card.csv");
    document.body.appendChild(link);
    link.click();
}

document.getElementById("export-btn").addEventListener("click", exportToExcel);
