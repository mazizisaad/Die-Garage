$("#addressPostcode").focusout( function() 
	{
			var location = [
					   	{ "postcode":"40450","city":"Shah Alam","state":"Selangor"},
					   	{ "postcode":"40000","city":"Shah Alam","state":"Selangor"},
					   	{ "postcode":"40100","city":"Shah Alam","state":"Selangor"},
					   	{ "postcode":"42300","city":"Puncak Alam","state":"Selangor"}
					   ];


		$.each(location, function(i, item){
			if(location[i].postcode == $("#addressPostcode").val())
			{
				var ct = location[i].city;
				var st = location[i].state;

				$("#addressCity").val(ct);
				$("#addressState").val(st);
			}
			else
			{
				$("#addressCity").val();
				$("#addressState").val();
			}
		});
	});