$(document).ready(() =>{
	$("#profilePic").on('click', () => {
		// show image option
		$("#modal-btn").click();
	});

	// change avatar
	$(".imageContainer").on('click', (event) => {
		const avatarId = $(event.target).parent().attr("id");
		$.post('/jeopardy/profile/changeImage', {image: avatarId});
		window.location.reload();
	});
});





function isAvailable(btn) {
	btn = $(btn);

	let username = btn.val();
	$.post('checkUsername', {username: username}, function(data){
		if (data == 'false') {
			btn.siblings("p").removeClass("hideit");
		}
		else{
			btn.siblings("p").addClass("hideit");
		}
	});
}


/*function checkResponse(btn) {
	const correct = $('#total-correct'); 
	const incorrect = $('#total-incorrect'); 
	const score = $('#total-score'); 
	const btnObj = $(btn);
	const id = btnObj.parent().attr('id');
	const database_id = id.split('-');
	const option = btnObj.serialize().split('=');


	$.post('checkResponse', {database: database_id[0], ques_id : database_id[1], option: option[1]}, function(response){
				// alert(response);
			response = jQuery.parseJSON(response);
			const tdId = $('#' + id + '-td');
			tdId.removeClass('remain');
			
			if (response.result ==  true){
				let curr = correct.text() * 1;
				correct.html(curr + 1);

				curr = score.text() * 1;
				score.html(curr + (response['marks'] * 1));

				
				tdId.css('background-color', 'green');
				tdId.html(`<span class="response-span animate__animated animate__heartBeat">${response['marks']}</span>`);
			}
			else{
				let curr = incorrect.text() * 1;
				incorrect.html(curr + 1);

				tdId.css('background-color', '#cc4b37');
				$('#' + id + '-td').html(`<span class="response-span animate__animated animate__wobble">000</span>`);
			}
	});
	$('.close-button').click();
	return false;
}*/


function checkJoinInput() {
	const codeId = $('#code');
	if(codeId.val().length == 0){
		codeId.css('border', '2px solid red');
		return false;
	}

}

function checkResponseById(db, id, btn, username) {
	const option = $(btn).serialize().split('=');

	$.post('checkResponse', {database: db, ques_id : id, option: option[1]}, function(response){
			response = jQuery.parseJSON(response);
			const tdId = $('#' + db + '-' + id + '-td');
			//tdId.removeClass('remain');
			
			if (response.result ==  true){
				
				tdId.css('background-color', 'green');
				tdId.html(`<span class="response-span animate__animated animate__heartBeat">${response['marks']}</span>`);
				// update server
				updateServer(username, 1, 0, response['marks'], true);
			}
			else{
				tdId.css('background-color', '#cc4b37');
				tdId.html(`<span class="response-span animate__animated animate__wobble">000</span>`);
				
				// update server
				updateServer(username, 0, 1, response['marks']);
			}

	});
	$('.close-button').click();
	return false;
}

function generateCode(){
	var code1 = (Math.floor(Math.random() * 10000) + 10000).toString().substring(2);
	var code2 = Math.random().toString(36).substring(10);
	$('#code').attr('value', code1 + code2);
	return false;
}