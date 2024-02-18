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
                d.order = d.order || [null, null]; // Add sorting information with a default value
                d.columnsData = columnsData;

            }
        }, // URL to fetch data
        columns: [{
                data: 'sr_no',
                name: 'sr_no',
                orderable: false
            }, {
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
                data: 'machine',
                name: 'machine',
            },
            {
                data: 'section',
                name: 'section',
            },
            {
                data: 'section_plate',
                name: 'section_plate',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'A') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'section_plate',
                name: 'section_plate',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'B') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'section_plate',
                name: 'section_plate',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'A/B') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_1',
                name: 'warna_1',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_2',
                name: 'warna_2',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_3',
                name: 'warna_3',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_4',
                name: 'warna_4',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_5',
                name: 'warna_5',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_6',
                name: 'warna_6',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_7',
                name: 'warna_7',
            },
            {
                data: 'warna_8',
                name: 'warna_8',
            },
            {
                data: 'warna_9',
                name: 'warna_9',
            },
            {
                data: 'warna_10',
                name: 'warna_10',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_11',
                name: 'warna_11',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_12',
                name: 'warna_12',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
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
                data: 'machine',
                name: 'machine',
            },
            {
                data: 'section',
                name: 'section',
            },
            {
                data: 'section_plate',
                name: 'section_plate',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'A') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'section_plate',
                name: 'section_plate',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'B') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'section_plate',
                name: 'section_plate',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'A/B') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_1',
                name: 'warna_1',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_2',
                name: 'warna_2',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_3',
                name: 'warna_3',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_4',
                name: 'warna_4',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_5',
                name: 'warna_5',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_6',
                name: 'warna_6',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_7',
                name: 'warna_7',
            },
            {
                data: 'warna_8',
                name: 'warna_8',
            },
            {
                data: 'warna_9',
                name: 'warna_9',
            },
            {
                data: 'warna_10',
                name: 'warna_10',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_11',
                name: 'warna_11',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
            },
            {
                data: 'warna_12',
                name: 'warna_12',
                "render": function(data, type, row, meta) {
                    // Check if section_plate is 'A', then display checkmark
                    if (data === 'yes') {
                        return '<i class="fa fa-check"></i>';
                    } else  {
                        return '';
                    }
                }
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
