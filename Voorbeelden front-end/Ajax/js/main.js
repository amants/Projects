
	$(document).ready(function(){

		var current_state = null;

		// CLICK op de map
		$('.map').find('path').on('click', function(e){

			e.preventDefault();
			current_state = this.getAttribute('id');
			showStateInfo( current_state );
		});

		// SUBMIT van het formulier
		$('.state-form').find('.submit').on('click', function(e){

			e.preventDefault();
			saveStateInfo(current_state, $('.state-form').find('.input_fname').val(), $('.state-form').find('.input_lname').val(), $('.state-form').find('.input_amount').val(), $('.state-form').find('.input_gemeentebelasting').val(), $('.state-form').find('.input_scholen').val());
		});
	});


	function showStateInfo(key){

		$.ajax({
		  type: "GET",
		  url: "getStateInfo.php?key="+key,
		  dataType: "json"

		}).done(function(data){
		
			var text = '';

			if(data.length == 1){

				text += '<h2>'+data[0].name+'</h2>';
				text += '<p>Aantal inwoners: '+data[0].amount+'</p>';
				text += '<p>Burgemeester: '+data[0].fname+' '+data[0].lname+'</p>';
				text += '<p>Gemeentebelasting: '+data[0].gemeentebelasting+' Euro </p>';
				text += '<p>Aantal scholen: '+data[0].scholen+'</p>';

				$('.state-form').find('.input_amount').val(data[0].amount);
				$('.state-form').find('.input_fname').val(data[0].fname);
				$('.state-form').find('.input_lname').val(data[0].lname);
				$('.state-form').find('.input_gemeentebelasting').val(data[0].gemeentebelasting);
				$('.state-form').find('.input_scholen').val(data[0].scholen);
				$('.state-form').show();

			}else{

				text += '<h2>Geen data gevonden</h2>';
			}

			$('.state-info').html(text).show();
		});
	}


	function saveStateInfo(key, fname, lname, amount, taxes, scholen){

		$.ajax({
		  type: "POST",
		  url: "saveStateInfo.php",
		  data: {
		  	'key' : key,
		  	'amount' : amount,
		  	'fname' : fname,
			'lname' : lname,
			'gemeentebelasting' : taxes,
			'scholen' : scholen
		  }

		}).done(function(data){

			alert(data);
			showStateInfo(key);
		});
	}










