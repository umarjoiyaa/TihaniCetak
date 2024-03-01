$(document).ready(function () {
    let bool = true;
    $('.datatable').DataTable({
        perPageSelect: [5, 10, 15, ["All", -1]],
        processing: true,
        serverSide: true,
        language: {
            processing: 'Processing',
            zeroRecords: "No results found",
            emptyTable: "No data available in the table" // Custom processing text
        },
        ajax: {
            url: data, // URL for your server-side data endpoint
            type: 'GET',
            data: function (d) {
                // Include server-side pagination parameters
                d.draw = d.draw || 1; // Add 'draw' parameter with a default value
                d.start = d.start || 0; // Add 'start' parameter with a default value
                d.length = d.length || 10; // Add 'length' parameter with a default value
                if (bool) {
                    d.order = [null, null];
                } else {
                    d.order = d.order || [null, null]; // Add sorting information with a default value
                }
            }
        }, // URL to fetch data
        columns: [
            {
                data: 'date',
                name: 'date',
            },
            {
                data: 'time',
                name: 'time',
            },
            {
                data: 'sale_order.order_no',
                name: 'sale_order.order_no',
            },
            {
                data: 'sale_order.kod_buku',
                name: 'sale_order.kod_buku',
            },
            {
                data: 'sale_order.description',
                name: 'sale_order.description',
            },
            {
                data: 'file_artwork_1',
                name: 'file_artwork_1',
            },
            {
                data: 'file_artwork_2',
                name: 'file_artwork_2',
            },
            {
                data: 'file_artwork_3',
                name: 'file_artwork_3',
            },
            {
                data: 'file_artwork_4',
                name: 'file_artwork_4',
            },
            {
                data: 'file_artwork_5',
                name: 'file_artwork_5',
            },
            {
                data: 'file_artwork_6',
                name: 'file_artwork_6',
            },
            {
                data: 'file_artwork_7',
                name: 'file_artwork_7',
            },
            {
                data: 'file_artwork_8',
                name: 'file_artwork_8',
            },
            {
                data: 'impositions_1',
                name: 'impositions_1',
            },
            {
                data: 'impositions_2',
                name: 'impositions_2',
            },
            {
                data: 'impositions_3',
                name: 'impositions_3',
            },
            {
                data: 'impositions_4',
                name: 'impositions_4',
            },
            {
                data: 'impositions_5',
                name: 'impositions_5',
            },
            {
                data: 'impositions_6',
                name: 'impositions_6',
            },
            {
                data: 'impositions_7',
                name: 'impositions_7',
            },
            {
                data: 'impositions_8',
                name: 'impositions_8',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            },
        ],
        paging: true
        // Other DataTables options go here
    });
    bool = false;
});

function AjaxCall(columnsData) {

    $('.datatable').DataTable().destroy();

    $('.datatable').DataTable({
        perPageSelect: [5, 10, 15, ["All", -1]],
        processing: true,
        serverSide: true,
        language: {
            processing: 'Processing',
            zeroRecords: 'No results found',
            emptyTable: 'No data available in the table' // Custom processing text
        },
        ajax: {
            url: data, // URL for your server-side data endpoint
            type: 'GET',
            data: function (d) {
                // Include server-side pagination parameters
                d.draw = d.draw || 1; // Add 'draw' parameter with a default value
                d.start = d.start || 0; // Add 'start' parameter with a default value
                d.length = d.length || 10; // Add 'length' parameter with a default value
                d.order = d.order || [null, null]; // Add sorting information with a default value
                d.columnsData = columnsData;

            }
        }, // URL to fetch data
        columns: [
            {
                data: 'date',
                name: 'date',
            },
            {
                data: 'time',
                name: 'time',
            },
            {
                data: 'sale_order.order_no',
                name: 'sale_order.order_no',
            },
            {
                data: 'sale_order.kod_buku',
                name: 'sale_order.kod_buku',
            },
            {
                data: 'sale_order.description',
                name: 'sale_order.description',
            },
            {
                data: 'file_artwork_1',
                name: 'file_artwork_1',
            },
            {
                data: 'file_artwork_2',
                name: 'file_artwork_2',
            },
            {
                data: 'file_artwork_3',
                name: 'file_artwork_3',
            },
            {
                data: 'file_artwork_4',
                name: 'file_artwork_4',
            },
            {
                data: 'file_artwork_5',
                name: 'file_artwork_5',
            },
            {
                data: 'file_artwork_6',
                name: 'file_artwork_6',
            },
            {
                data: 'file_artwork_7',
                name: 'file_artwork_7',
            },
            {
                data: 'file_artwork_8',
                name: 'file_artwork_8',
            },
            {
                data: 'impositions_1',
                name: 'impositions_1',
            },
            {
                data: 'impositions_2',
                name: 'impositions_2',
            },
            {
                data: 'impositions_3',
                name: 'impositions_3',
            },
            {
                data: 'impositions_4',
                name: 'impositions_4',
            },
            {
                data: 'impositions_5',
                name: 'impositions_5',
            },
            {
                data: 'impositions_6',
                name: 'impositions_6',
            },
            {
                data: 'impositions_7',
                name: 'impositions_7',
            },
            {
                data: 'impositions_8',
                name: 'impositions_8',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            },
        ],
        paging: true
        // Other DataTables options go here
    });

}

var typingTimer;
var doneTypingInterval = 1000; // Adjust the time interval as needed (in milliseconds)

$('.table .all_column').on('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(() => {
        var columnIndex = $(this).closest('th').index();

        // Collect all column indices and values in an array
        var columnsData = $('.table .all_column').map(function () {
            var index = $(this).closest('th').index();
            var value = $(this).val();
            return {
                index: index,
                value: value
            };
        }).get();
        AjaxCall(columnsData);

        // Focus on the input in the same column after making the Ajax call
        $(this).closest('tr').find('th').eq(columnIndex).find('input').focus();
    }, doneTypingInterval);
});
