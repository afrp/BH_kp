jQuery(document).ready(function($){
	// tampilkan semua mahasiswa dan chart
	lihatMahasiswa();
	chart();

	// saat '.pagination a' di klik..
	$('#mahasiswa').on('click', '.pagination a', function(e) {
		e.preventDefault();
		
		$('.preloader').fadeIn('slow');
		var page = $(this).attr("data-page");
		$('#mahasiswa').load('fetch_page.php', {"page":page}, function(){
			$('.preloader').fadeOut('slow');
		});
	});

	$('#lihat').on("click", function (e) {
		e.preventDefault();
		lihatMahasiswa();
		chart();
	});

	$(document).on('submit', '#buat', function () {
		$.post('buat.php', $(this).serialize())
			.done(function (response) {
				$('#info').addClass('alert alert-info').html(response).fadeOut('slow').fadeIn('slow');
				lihatMahasiswa();
				chart();
			});

		return false;
	});

});


function lihatMahasiswa() {
	$('.preloader').fadeIn('slow');
	$('#mahasiswa').load('fetch_page.php' ,function () {
		$('.preloader').fadeOut('slow');
	});
}

function chart() {
	$('.chart').load('chart.php', function() { $(this).fadeIn('slow')});
}




