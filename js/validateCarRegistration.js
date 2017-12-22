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
			$('#nextInsuranceInfo').on('click', function(e) {
					$('.setup-panel li a:eq(1)').removeClass('disabled');
					$('.setup-panel li a[href="#carInsurance"]').trigger('click');
			})

			$('#backCarInformation').on('click', function(e) {
					$('.setup-panel li a[href="#carInformation"]').trigger('click');
			})

			$('#nextServiceInformation').on('click', function(e) {
					$('.setup-panel li a:eq(2)').removeClass('disabled');
					$('.setup-panel li a[href="#carService"]').trigger('click');
			})

			$('#backInsuranceInformation').on('click', function(e) {
					$('.setup-panel li a[href="#carInsurance"]').trigger('click');
			})

			$('#nextServiceInformation').on('click', function(e) {
					$('.setup-panel li a:eq(2)').removeClass('disabled');
					$('.setup-panel li a[href="#carService"]').trigger('click');
			})
		});