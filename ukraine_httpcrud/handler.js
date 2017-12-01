$(document).ready(function(){

	$(".table_name_btn").click(function(){
						//
						window.location = "http://18.221.89.44/amazon_httpcrud/?table_name=" + $(this).attr('id');
    		});


    		$("input").click(function(){
    			$(this).keyup(function(){

			    	var x = event.keyCode;
					var class_name = $(this).attr('class').substr(0, $(this).attr('class').indexOf(" "));
				    if (x == 13) {

						$.ajax({
						  	type: 'POST',
						 	url: '',
						    data: 'update_field=' + class_name + '&update_id=' + $(this).attr('id') + '&update_value=' + $(this).val(),
						    dataType: 'html'
						});
			    		//alert('update_field=' + class_name + '&update_id=' + $(this).attr('id') + '&update_value=' + $(this).val());
			    		$(this).blur();
			    	}
				});
    		});


    		$("button").click(function(){

						$.ajax({
						  	type: 'POST',
						 	url: '',
						    data: 'delete_id=' + $(this).attr('id'),
						    dataType: 'html'
						});
			    		//alert("Id: "+ $(this).attr('id') +" Field: " + $(this).attr('class') + " Value: "+ $(this).val());
			    		$("#row" + $(this).attr('id')).remove();
    		});

    		$("#add").submit(function(){

    			var data = $(this).serialize();
    			$.ajax({ // инициaлизируeм ajax зaпрoс
				   type: 'POST', // oтпрaвляeм в POST фoрмaтe, мoжнo GET
				   url: 'add.php', // путь дo oбрaбoтчикa, у нaс oн лeжит в тoй жe пaпкe
				   dataType: 'json', // oтвeт ждeм в json фoрмaтe
				   data: data, // дaнныe для oтпрaвки
			       success: function(data){
			       	//	}
			       	//	else { // eсли всe прoшлo oк
			       			//alert(data + '  OK'); // пишeм чтo всe oк
			       			console.log(data);

			       	//	}
			         },
			       error: function (xhr, ajaxOptions, thrownError) { // в случae нeудaчнoгo зaвeршeния зaпрoсa к сeрвeру
			            alert(xhr.status + ":" + thrownError); // пoкaжeм oтвeт сeрвeрa
			         }

			     });
				//alert(data);
			    $("#reload").load(location.href + " #reload");
    			return false;
    		});

    	});
