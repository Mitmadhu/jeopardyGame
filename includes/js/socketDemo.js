let socket = io('http://localhost:3000', {
	secure: true,
	transports: ['websocket', 'polling']
});

socket.on('socket told to start game', data => {
	const boardId = $('#board');
	boardId.html(data.boardHtml);
	
	// let uriContent = "data:application/octet-stream," + encodeURIComponent(data.boardHtml);
	// newWindow = window.open(uriContent, 'neuesDokument');

	// empty the previous modals
	// $('.reveal-overlay').get().forEach((el, index, array) => {
	// 	el.innerHTML = '';
	// });


	// $('#all-question-model').html(data.modelHtml);
	// $('#modal-from-io').html(data.modelHtml);
	boardId.show();
	$('#control').html('');

});

socket.on('get question', payload => {

	// ajax call to create the modal
	$.post('/jeopardy/create-modal', {database: payload.database, id: payload.questionId}).done((response) => {
		// append the modal
		$('#all-question-model').html(response);
	});
	$('#openModal').click();
	// start timer
	startTimer(payload.database + '-' + payload.questionId + '-td');
});

socket.on('final score', data => {
	// for end game
	showWinner(data);

});

socket.on('update score card', userObj => {
	const scoreObj = $('#score-card');

	scoreObj.html('');
	userObj.forEach(el => {
		scoreObj.append(getScoreTemplete(el));
	});
})

socket.on('show start btn', () => {
	$('#control').html('<button onclick="startGame()" class="button success">Start Game</button>');
});

socket.on('wait msg', () => {
	$('#control').html('Please wait for game admin to the start game');
});

/*socket.on('new joined', data => {
	console.log('new');
	updateScoreCard(data)
});

socket.on('others info', data => {
	console.log('self')
	updateScoreCard(data, 'others')
});*/

let room;
let total_seconds;

function joinRoom(userRoom, username) {
	room = userRoom
	socket.emit('join room', {room: room, username: username});
}

function startGame(){
	const boardId = $('#board');
	let modelHtml = '';
	// let revealClass = $('.reveal-overlay');


	// const head = '<div class="reveal-overlay">';
	// const tail = '</div>';

	// revealClass.get().forEach((el, index, array) => {
	// 	// console.log(el.innerHTML);
	// 	//console.log(modelHtml.prop('outerHTML'));
	// 	modelHtml += head + el.innerHTML + tail;
	// 	// console.log(el.id);

	// 	// modelHtml += el;
	// });

	// empty the previous modals
	// $('.reveal-overlay').get().forEach((el, index, array) => {
	// 	el.innerHTML = '';
	// });

	socket.emit('start game', {room : room, data: boardId.html(), modelHtml: modelHtml});
	boardId.show();
	$('#control').html('<button onclick="endGame()" class="button alert">End Game</button>');
}

function startTimer(tdId) {
	let c_minutes = 1;
	let c_seconds = 0;
	total_seconds = 18;
	let idSelector = $("#game-time-left");
	let intervalVariable;

	function CheckTime(){
		$("#game-time-left").html('Time Left: ' + c_minutes + ' minutes ' + c_seconds + ' seconds ');
		if(total_seconds <=0){
		    clearInterval(intervalVariable);
		    $('.close-button').click();

		    tdId = $('#' + tdId);
		    if (tdId.children().hasClass('button')) {
			    tdId.css('background-color', '#cc4b37');
				tdId.html(`<span class="response-span animate__animated animate__wobble">000</span>`);
		    }


		} else{
		    total_seconds = total_seconds -1;
		    c_minutes = parseInt(total_seconds / 60);
		    c_seconds = parseInt(total_seconds % 60);
		}

		if (total_seconds < 15) {
			$('#game-time-left').removeClass('green');
		}
	}	
	intervalVariable = setInterval(CheckTime,1000);
}


function trigerQuestion(question) {
	if (total_seconds > 0) {
		alert('Wait for timer expire');
		// console.log('cant move', total_seconds);
		// $('#alert-msg').fadeIn().delay(2000).fadeOut();
		return false;
	}
	const btn = $(question);
	const data = btn.attr('data-open').split('-');
	socket.emit('show question', {room : room, database: data[0], questionId: data[1]});

	$.post('/jeopardy/create-modal', {database: data[0], id: data[1]}).done((response) => {
		// append the modal
		$('#all-question-model').html(response);
	});
	$('#openModal').click();


	// start timer
	startTimer(data[0] + '-' + data[1] + '-td');
}

function updateScoreCard(userArray) {
	usreArray.forEach(el => {
		console.log(el);
	});

	// <div class='cell'>
	// <div class='card game-card'>
	//   <img src='/jeopardy/includes/images/correct.jpg' width='50' height='100'>
	//   <div class='card-section'>
	// 	  	<p>Correct</p>
	// 	    <p id='total-correct'>0</p>
	// 	  </div>
	// 	</div>
	// </div>
}

function updateServer(username, correct, incorrect, marks) {
	socket.emit('update marks', {room: room, username: username, correct: correct, incorrect: incorrect, marks: marks});
}

function endGame() {
	socket.emit('end game', room);
}

function getScoreTemplete(payload) {
	return `<div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div></div>`;
}

function winnerTemplete(payload) {
	return `<div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div><div class="sticker"><aside class="sticker cyan">1st</aside></div></div>`;
}

function showWinner(data) {
	winnerList = [];
	let maxi = 0, index = 0;
	data.forEach(el => {
		if (maxi < el[3]) {
			maxi = el[3];
			winnerList = [el];
		}
		else if (maxi == el[3]) {

			winnerList.push(el);
		}
	});
	$('#board').html('');
	$('#control').html('');

	const winnerObj = $('#winner');

	if(winnerList.length == 1)
		$('#winner-text').html('<p><img src="includes/images/trofee.gif" style="height: 65px; margin-right: 10px;">Our winner is</p>');
	else
		$('#winner-text').html('<p><img src="includes/images/trofee.gif" style="height: 65px; margin-right: 10px;">Our winners are</p>');

	winnerList.forEach(el => {
		winnerObj.append(winnerTemplete(el));
	});

	// save data to database
	saveToDb(winnerList, data);
}

function saveToDb(winnerList, data) {
	let myScore = 0;
	data.forEach(el => {
		if (userLoggedIn == el[0]) {
			myScore = el[3];
		}
	});
	
	let amIwinner = false;
	winnerList.forEach(el => {
		if (userLoggedIn == el[0]) {
			amIwinner = true;
		}
	});
	// update myscore
	$.post('/jeopardy/game/updateScore', {score: myScore});

	// update won list
	if (amIwinner) {
		$.post('/jeopardy/game/winnerInc');
	}
	console.log(winnerList);
	console.log(data);
	console.log(myScore);
}