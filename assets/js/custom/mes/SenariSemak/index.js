$(document).ready(function () {
    let bool = true;
    $('.datatable').DataTable({
        perPageSelect: [5, 10, 15, ["All", -1]],
        processing: true,
        serverSide: true,
        language: {
            processing: 'Processing' // Custom processing text
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
        columns: [{
                data: 'sr_no',
                name: 'sr_no',
                orderable: false
            }, {
                data: 'sale_order.order_no',
                name: 'sale_order.order_no',
            },
            {
                data: 'sale_order.description',
                name: 'sale_order.description',
            },
            {
                data: 'sale_order.kod_buku',
                name: 'sale_order.kod_buku',
            },
            {
                data: 'date',
                name: 'date',
            },
            {
                data: 'user.user_name',
                name: 'user.user_name',
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
            processing: 'Processing' // Custom processing text
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
        columns: [{
                data: 'sr_no',
                name: 'sr_no',
                orderable: false
            }, {
                data: 'sale_order.order_no',
                name: 'sale_order.order_no',
            },
            {
                data: 'sale_order.description',
                name: 'sale_order.description',
            },
            {
                data: 'sale_order.kod_buku',
                name: 'sale_order.kod_buku',
            },
            {
                data: 'date',
                name: 'date',
            },
            {
                data: 'user.full_name',
                name: 'user.full_name',
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

$('.datatable .all_column').on('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(() => {
        var columnIndex = $(this).closest('th').index();

        // Collect all column indices and values in an array
        var columnsData = $('.datatable .all_column').map(function () {
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
