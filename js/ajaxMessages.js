$(document).ready(function() {

    $('.messages').click(function() {
		$.post('ajax/messages/indexMessage.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
});