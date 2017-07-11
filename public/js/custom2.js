function sweet() {
	swal.queue([{
	  title: 'Your public IP',
	  confirmButtonText: 'Show my public IP',
	  text:
	    'Your public IP will be received ' +
	    'via AJAX request',
	  showLoaderOnConfirm: true,
	  preConfirm: function () {
	    return new Promise(function (resolve) {
	      $.get('https://api.ipify.org?format=json')
	        .done(function (data) {
	          swal.insertQueueStep(data.ip)
	          resolve()
	        })
	    })
	  }
	}])
}

function coba() {
	swal.setDefaults({
	  input: 'text',
	  confirmButtonText: 'Next &rarr;',
	  showCancelButton: true,
	  animation: false,
	  progressSteps: ['1', '2', '3']
	})

	var steps = [
	  {
	    title: 'Question 1',
	    text: 'Chaining swal2 modals is easy'
	  },
	  'Question 2',
	  'Question 3'
	]

	swal.queue(steps).then(function (result) {
	  swal.resetDefaults()
	  swal({
	    title: 'All done!',
	    html:
	      'Your answers: <pre>' +
	        JSON.stringify(result) +
	      '</pre>',
	    confirmButtonText: 'Lovely!',
	    showCancelButton: false
	  })
	}, function () {
	  swal.resetDefaults()
	})
}

function sukses() {
	swal({
		title: "ini title",
		text: "ini text",
		type: "error"
	}, function() {
		window.location.href = '/testcok';
		// location.href = '/testcok';
	});
}