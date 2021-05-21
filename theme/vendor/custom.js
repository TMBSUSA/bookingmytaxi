$(document).ready(function() {
	/*$('.submit').on('click', function() {
		var $this = $(this);
		$this.button('loading');
		setTimeout(function() {
		   $this.button('reset');
		}, 2000);
	});	*/
	
	var date_input=$('.datepicker'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
		format: 'dd-mm-yyyy',
		container: container,
		todayHighlight: true,
		autoclose: true,
		//startDate: new Date(),
		todayBtn: "linked"
	};
	date_input.datepicker(options);
	$('.higherdate').datepicker({startDate: new Date()});
});