const express = require('express');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http);
const port = 3000;

let userObj = {};
let roomAdmin = {}; 

io.on('connection', socket => {
	console.log('new user is connected');

	socket.on('join room', payload => {
		// join in personal room
		socket.join(payload.username);

		// join in common game room
		socket.join(payload.room);

		if (userObj[payload.room] != undefined) {
			let flag = false;
			userObj[payload.room].forEach(el => {
				if (el[0] == payload.username){
					flag = true;
				}

			});
			// He/she is not admin of the game
			if(flag == false){
				userObj[payload.room].push([payload.username, 0, 0, 0]);

				// show other user the new user has came
				socket.emit('update score card', userObj[payload.room]);
				// update ourself with data of other users
				socket.in(payload.room).emit('update score card', userObj[payload.room]);

				// show wait message
				socket.emit('wait msg');
			}

		}
		else{
			// first time join to this room by any user (i.e he/she is admin)
			roomAdmin[payload.room] = payload.username;
			userObj[payload.room] = [[payload.username, 0, 0, 0]];
			// show other user the new user has came
			socket.emit('update score card', userObj[payload.room]);
			// update ourself with data of other users
			socket.in(payload.room).emit('update score card', userObj[payload.room]);

			// this user is admin for this game
			socket.emit('show start btn');
		}
	});

	socket.on('start game', payload => {
		// if (payload.username == roomAdmin[payload.room]) {	
		// socket.in(payload.room).emit('socket told to start game', {boardHtml: payload.data, modelHtml: payload.modelHtml});
		// }
		socket.in(payload.room).emit('socket told to start game', {boardHtml: payload.data, modelHtml: payload.modelHtml});
	});

	socket.on('show question', payload => {
		socket.in(payload.room).emit('get question', payload);
	});


	socket.on('update marks', payload => {
		userObj[payload.room].forEach(el => {
			if (el[0] == payload.username) {
				el[1] += payload.correct;
				el[2] += payload.incorrect;
				el[3] += payload.marks;

			}
		});

		socket.emit('update score card', userObj[payload.room]);
		socket.in(payload.room).emit('update score card', userObj[payload.room]);
	});


	socket.on('end game', room => {
		// update other users by saying its name
		socket.in(room).emit('final score', userObj[room]);
		
		// update self data by not using 'in'
		socket.emit('final score', userObj[room]);
		delete userObj[room];
	});
});

http.listen(port);