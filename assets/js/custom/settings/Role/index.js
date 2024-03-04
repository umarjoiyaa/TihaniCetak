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
                data: 'name',
                name: 'name',
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