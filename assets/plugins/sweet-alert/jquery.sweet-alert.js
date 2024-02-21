$(function(e) {

	//Basic
	$('#swal-basic').on('click', function () {
		swal('Welcome to Your Admin Page')
	});

	//A title with a text under
	$('#swal-title').click(function () {
		swal(
			{
				title: 'Here is  a title!',
				text: 'All are available in the template',
			}
		)
	});

	//Success Message
	$('#swal-success').click(function () {
		swal(
			{
				title: 'Well done!',
				text: 'You clicked the button!',
				type: 'success',
				confirmButtonColor: '#57a94f'
			}
		)
	});

	//Warning Message
	$(document).on('click','#swal-warning',function (e) {
        const Url = e.target.getAttribute('data-delete');
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            customClass: {
                confirmButton: "btn btn-danger", // Add your custom class for the confirm button
                cancelButton: "btn btn-secondary" // Add your custom class for the cancel button
            }
        },
        function(isConfirmed) {
            if (isConfirmed) {
                swal("Deleted!", "Your record has been deleted.", "success");
                var anchor = document.createElement("a");
                anchor.href = Url;
                anchor.click();
                // console.log("File deleted successfully!");
            } else {
                // swal("Cancelled", "Record was not deleted", "error");
                // swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });


	//Parameter
	$('#swal-parameter').click(function () {
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this imaginary file!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm) {
		  if (isConfirm) {
			swal("Deleted!", "Your imaginary file has been deleted.", "success");
		  } else {
			swal("Cancelled", "Your imaginary file is safe :)", "error");
		  }
		});
	});

	//Custom Image
	$('#swal-image').click(function () {
		swal({
			title: 'Lovely!',
			text: 'your image is uploaded.',
			imageUrl: '../assets/img/brand/logo.png',
			animation: false
		})
	});

	//Auto Close Timer
	$('#swal-timer').click(function () {
		swal({
			title: 'Auto close alert!',
			text: 'I will close in 1 seconds.',
			timer: 1000
		}).then(
			function () {
			},
			// handling the promise rejection
			function (dismiss) {
				if (dismiss === 'timer') {
					console.log('I was closed by the timer')
				}
			}
		)
	});


	//Ajax with Loader Alert
	$('#swal-ajax').click(function () {
		swal({
		  title: "Ajax request example",
		  text: "Submit to run ajax request",
		  type: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true
		}, function () {
		  setTimeout(function () {
			swal("Ajax request finished!");
		  }, 2000);
		});
	});

});
