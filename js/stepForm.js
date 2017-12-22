$(document).ready(function() {

			var navListItems = $('.setup-panel li a'),
					allWells = $('.setup-content');

			allWells.hide();

			navListItems.click(function(e)
			{
					e.preventDefault();
					var $target = $($(this).attr('href')),
							$item = $(this).closest('a');

					if (!$item.hasClass('disabled')) {
							navListItems.closest('a').removeClass('active');
							$item.addClass('active');
							allWells.hide();
							$target.show();
					}
			});

			$('ul.setup-panel li a.active').trigger('click');

			// DEMO ONLY //
			$('#nextAddressInfo').on('click', function(e) {
					$('.setup-panel li a:eq(1)').removeClass('disabled');
					$('.setup-panel li a[href="#addressInfo"]').trigger('click');
			})

			$('#backPersonalInfo').on('click', function(e) {
					$('.setup-panel li a[href="#personalInfo"]').trigger('click');
			})

			$('#nextLicenseInfo').on('click', function(e) {
					$('.setup-panel li a:eq(2)').removeClass('disabled');
					$('.setup-panel li a[href="#licenseInfo"]').trigger('click');
			})

			$('#backAddressInfo').on('click', function(e) {
					$('.setup-panel li a[href="#addressInfo"]').trigger('click');
			})

			$('#nextAgreement').on('click', function(e) {
					$('.setup-panel li a:eq(3)').removeClass('disabled');
					$('.setup-panel li a[href="#agreement"]').trigger('click');
			})

			$('#backLicenseInfo').on('click', function(e) {
					$('.setup-panel li a[href="#licenseInfo"]').trigger('click');
			})

			$('#nextLicenseInfo').on('click', function(e) {
					$('.setup-panel li a:eq(2)').removeClass('disabled');
					$('.setup-panel li a[href="#licenseInfo"]').trigger('click');
			})
		});