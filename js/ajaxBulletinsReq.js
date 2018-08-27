$(document).ready(function() {

    $('.parcourirBulletins').click(function() {
		$.post('ajax/bulletins/parcourirBulletins.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });

    $('.rechercherBulletins').click(function() {
		$.post('ajax/bulletins/rechercherBulletins.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.impressionBulletins').click(function() {
		$.post('ajax/bulletins/impressionBulletins.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.aideBulletins').click(function() {
		$.post('ajax/bulletins/aideBulletins.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    $('.autresBulletins').click(function() {
		$.post('ajax/bulletins/autresBulletins.php', function(data) {
			$('.containerPersonalisee').html("<br /><br /><br /><center><img src='images/ajax-loader (3).gif' /></center>");
			$('.containerPersonalisee').html(data);
		});
    });
    
});