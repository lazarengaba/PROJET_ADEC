$(document).ready(function() {

    $('.solderEcolage').click(function() {
		$.post('ajax/ecolage/solderEcolage.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });

    $('.etatSoldeEcolage').click(function() {
		$.post('ajax/ecolage/etatSoldeEcolage.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.engagementsEcolage').click(function() {
		$.post('ajax/ecolage/engagementsEcolage.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.impressionEcolage').click(function() {
		$.post('ajax/ecolage/impressionEcolage.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.aideEcolage').click(function() {
		$.post('ajax/ecolage/aideEcolage.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.autresEcolage').click(function() {
		$.post('ajax/ecolage/autresEcolage.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    
});