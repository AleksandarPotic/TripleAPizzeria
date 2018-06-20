							$(document).ready(function () {	
								
								$("input[name='topping-name']").each( function () {

									if($(this).is(':checked')){
										var id = $(this).attr('id');
										var fullId = "#" + id;
										$(fullId).click();
										$(fullId).click();

										var val = $(this).attr('value');

										$("select[id="+val+"]").prop('disabled', false);

										var mainDivName = $(this).parents('.element-container').attr('id');
										var fullmainDivName = "#" + mainDivName;

										$(fullmainDivName+ ' .primary').css('background-color', '#01181E');
										$(fullmainDivName+ ' .customize').css('display', 'block');
										$(fullmainDivName+ ' .labela').css('color','white');
									}

									$(fullmainDivName+ ' .customize').click(function(){

									var counter = $(fullmainDivName+ ' .counter');

									var parsedValue = parseInt(counter.attr('value'));

									if(parsedValue%2==0){
										$(fullmainDivName+ ' .drop').css('display', 'flex');
										$(fullmainDivName+ ' .plus-minus').text("-");
									}

									else{
										$(fullmainDivName+ ' .drop').css('display','none');
										$(fullmainDivName+ ' .plus-minus').text("+");
									}
									parsedValue++;

									$(counter).val(parsedValue);

									});
								});

								$("input[name='size-radio']").each( function () {

									if($(this).is(':checked')){
										var id = $(this).attr('id');
										var fullId = "#" + id;
										$(fullId).click();
										$(fullId).click();

										var mainDivName = $(this).parents('.element-container').attr('id');
										var fullmainDivName = "#" + mainDivName;

										$(fullmainDivName+ ' .primary').css('background-color', '#01181E');
										$(fullmainDivName+ ' .customize').css('display', 'block');
										$(fullmainDivName+ ' .labela').css('color','white');
									}

									if($('#size2').is(':checked')){
										$('#glutenfree').css('display','block');
									}
								});
							});

								

							function clickInputSauce(div){
								var link = $(div).closest(":has(div input)").find('input');
								var value = ($(link).attr("value")); 
								console.log(link);

								var id = ($(link).attr("id"));
								var fullId = "#" + id;

								var mainDivName = $(div).parents('.element-container').attr('id');
								var fullmainDivName = "#" + mainDivName;


								if (!($(fullId).is(':checked'))) {
									$(fullId).click();
									console.log("cekirano" + value);
										$(fullmainDivName+ ' .primary').css('background-color', '#01181E');
										$(fullmainDivName+ ' .customize').css('display', 'block');
										$(fullmainDivName+ ' .labela').css('color','white');
								}
								else if($(fullId).is(':checked')){
									$(fullId).click();
									console.log("odcekirano" + value);
										$(fullmainDivName+ ' .primary').css('background-color', 'white');
										$(fullmainDivName+ ' .customize').css('display', 'none');
										$(fullmainDivName+ ' .labela').css('color','#01181E');
								}
							}


							function clickInput(div){
								var link = $(div).closest(":has(div input)").find('input');
								var value = ($(link).attr("value")); 
								console.log(link);

								var id = ($(link).attr("id"));
								var fullId = "#" + id;

								var mainDivName = $(div).parents('.element-container').attr('id');
								var fullmainDivName = "#" + mainDivName;


								if (!($(fullId).is(':checked'))) {
									$(fullId).click();
									console.log("cekirano" + value);
										$(fullmainDivName+ ' .primary').css('background-color', '#01181E');
										$(fullmainDivName+ ' .customize').css('display', 'block');
										$(fullmainDivName+ ' .labela').css('color','white');
										$("select[id="+value+"]").prop('disabled', false);
								}
								else if($(fullId).is(':checked')){
									$(fullId).click();
									console.log("odcekirano" + value);
										$(fullmainDivName+ ' .primary').css('background', 'white');
										$(fullmainDivName+ ' .customize').css('display', 'none');
										$(fullmainDivName+ ' .labela').css('color','#01181E');
										$(fullmainDivName+ ' .drop').css('display','none');
										$(fullmainDivName+ ' .plus-minus').text("+");
										$("select[id="+value+"]").prop('disabled', 'disabled');
								}

								$(fullmainDivName+ ' .customize').click(function(){

									var counter = $(fullmainDivName+ ' .counter');

									var parsedValue = parseInt(counter.attr('value'));

									if(parsedValue%2==0){
										$(fullmainDivName+ ' .drop').css('display', 'flex');
										$(fullmainDivName+ ' .plus-minus').text("-");
									}

									else{
										$(fullmainDivName+ ' .drop').css('display','none');
										$(fullmainDivName+ ' .plus-minus').text("+");
									}
									parsedValue++;

									$(counter).val(parsedValue);

									});
							}

							function clickRadio(div){
								var link = $(div).closest(":has(div input)").find('input');
								var value = ($(link).attr("value")); 
								console.log(link);

								var id = ($(link).attr("id"));
								var fullId = "#" + id;


								if (!($(fullId).is(':checked'))) {
									$(fullId).click();

								}
								else if($(fullId).is(':checked')){
									$(fullId).click();
								}

								if($('#size1').is(":checked")){
									$('#size1').closest(":has(div label)").find('label').css('color','white');
									$('#size1').parents('.primary').css('background-color','#01181E');
									$('#size2').parents('.primary').css('background','white');
									$('#size3').parents('.primary').css('background','white');
									$('#size4').parents('.primary').css('background','white');
									$('#size2').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size3').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size4').closest(":has(div label)").find('label').css('color','#01181E');
								}
								else if($('#size2').is(":checked")){
									$('#size2').parents('.primary').css('background-color', '#01181E');
									$('#size2').closest(":has(div label)").find('label').css('color','white');
									$('#size1').parents('.primary').css('background','white');
									$('#size3').parents('.primary').css('background','white');
									$('#size4').parents('.primary').css('background','white');
									$('#size1').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size3').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size4').closest(":has(div label)").find('label').css('color','#01181E');
								}
								else if($('#size3').is(":checked")){
									$('#size3').parents('.primary').css('background-color', '#01181E');
									$('#size3').closest(":has(div label)").find('label').css('color','white');
									$('#size1').parents('.primary').css('background','white');
									$('#size2').parents('.primary').css('background','white');
									$('#size4').parents('.primary').css('background','white');
									$('#size2').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size1').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size4').closest(":has(div label)").find('label').css('color','#01181E');
								}
								else if($('#size4').is(":checked")){
									$('#size4').parents('.primary').css('background-color', '#01181E');
									$('#size4').closest(":has(div label)").find('label').css('color','white');
									$('#size1').parents('.primary').css('background','white');
									$('#size3').parents('.primary').css('background','white');
									$('#size2').parents('.primary').css('background','white');
									$('#size2').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size3').closest(":has(div label)").find('label').css('color','#01181E');
									$('#size1').closest(":has(div label)").find('label').css('color','#01181E');
								}

								var neededDiv = $('#crust-type1').closest(":has(div span)").find('.checkmark');

								if($('#size2').is(':checked')){
									$('#glutenfree').css('display','block');
								}
								else if(!($('#size2').is(':checked')) && ($('#crust-type3').is(':checked'))){
									$('#glutenfree').css('display','none');
									$(neededDiv).click();
								}
								else if(!($('#size2').is(':checked'))){
									$('#glutenfree').css('display','none');
									$(fullId).click();
								}
							}

							function clickRadioCrust(div){
								var link = $(div).closest(":has(div input)").find('input');
								var value = ($(link).attr("value")); 
								console.log(link);

								var id = ($(link).attr("id"));
								var fullId = "#" + id;

								if (!($(fullId).is(':checked'))) {
									$(fullId).click();
								}
								else if($(fullId).is(':checked')){
									$(fullId).click();
								}

								if($('#crust-type1').is(":checked")){
									$('#crust-type1').parents('.primary').css('background','#01181E');
									$('#crust-type1').closest(":has(div label)").find('label').css('color','white');
									$('#crust-type2').parents('.primary').css('background','white');
									$('#crust-type3').parents('.primary').css('background','white');
									$('#crust-type2').closest(":has(div label)").find('label').css('color','#01181E');
									$('#crust-type3').closest(":has(div label)").find('label').css('color','#01181E');
								}
								else if($('#crust-type2').is(":checked")){
									$('#crust-type2').parents('.primary').css('background','#01181E');
									$('#crust-type2').closest(":has(div label)").find('label').css('color','white');
									$('#crust-type1').parents('.primary').css('background','white');
									$('#crust-type3').parents('.primary').css('background','white');
									$('#crust-type1').closest(":has(div label)").find('label').css('color','#01181E');
									$('#crust-type3').closest(":has(div label)").find('label').css('color','#01181E');
								}
								else if($('#crust-type3').is(":checked")){
									$('#crust-type3').parents('.primary').css('background','#01181E');
									$('#crust-type3').closest(":has(div label)").find('label').css('color','white');
									$('#crust-type1').parents('.primary').css('background','white');
									$('#crust-type2').parents('.primary').css('background','white');
									$('#crust-type2').closest(":has(div label)").find('label').css('color','#01181E');
									$('#crust-type1').closest(":has(div label)").find('label').css('color','#01181E');
								}
							}

							function clickRadioCrustt(div){
								var link = $(div).closest(":has(div input)").find('input');
								var value = ($(link).attr("value")); 
								console.log(link);

								var id = ($(link).attr("id"));
								var fullId = "#" + id;

								if (!($(fullId).is(':checked'))) {
									$(fullId).click();
								}
								else if($(fullId).is(':checked')){
									$(fullId).click();
								}

								if($('#crustt1').is(":checked")){
									$('#crustt1').parents('.primary').css('background','#01181E');
									$('#crustt1').closest(":has(div label)").find('label').css('color','white');
									$('#crustt2').closest(":has(div label)").find('label').css('color','#01181E');
									$('#crustt2').parents('.primary').css('background','white');
								}
								else if($('#crustt2').is(":checked")){
									$('#crustt2').parents('.primary').css('background','#01181E');
									$('#crustt2').closest(":has(div label)").find('label').css('color','white');
									$('#crustt1').closest(":has(div label)").find('label').css('color','#01181E');
									$('#crustt1').parents('.primary').css('background','white');
								}
							}

							var counter1 = 0;
							var counter2 = 0;
							var counter3 = 0;
							var counter4 = 0;
							var counter5 = 0;


							function openCheese(){
								if(counter1%2==0){
									$('#cheese-category').css('display','block');
									$('#middle-line1').css('display','block');
									$('#open-close-plus').text("-");
								}
								else{
									$('#cheese-category').css('display','none');
									$('#middle-line1').css('display','none');
									$('#open-close-plus').text("+");
								}

								counter1++;
							}

							function openMeat(){	
								if(counter2%2==0){
									$('#meat-category').css('display','block');
									$('#middle-line2').css('display','block');
									$('#open-close-plus1').text("-");
								}
								else{
									$('#meat-category').css('display','none');
									$('#middle-line2').css('display','none');
									$('#open-close-plus1').text("+");
								}

								counter2++;
							}

							function openVeggie(){
								if(counter3%2==0){
									$('#veggie-category').css('display','block');
									$('#middle-line3').css('display','block');
									$('#open-close-plus2').text("-");
									$('#open-close-plus2').css('font-size','30px');
								}
								else{
									$('#veggie-category').css('display','none');
									$('#middle-line3').css('display','none');
									$('#open-close-plus2').text("+");
								}

								counter3++;
							}

							function openSauces(){
								if(counter4%2==0){
									$('#sauces-category').css('display','block');
									$('#open-close-plus3').text("-");
									$('#open-close-plus3').css('font-size','30px');
								}
								else{
									$('#sauces-category').css('display','none');
									$('#open-close-plus3').text("+");
								}

								counter4++;
							}