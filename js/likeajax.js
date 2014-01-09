$(document).ready(function(e) {
	$("#like-project").click(function(){
		var $_SESSION = <?php echo json_encode($_SESSION); ?>
		
			$.post( "php/likeproject.php" );		
			$this = $(this);
			$this.attr("disabled", "disabled");
			toastr.success("test","123");
	});
});