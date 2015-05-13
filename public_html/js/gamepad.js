var controller;
var rAF = window.requestAnimationFrame;

var radius = 20;
var currentX = 0.0;
var currentY = 0.0;
var forwardKeyCode = 87;
var backwardsKeyCode = 83;
var leftKeyCode = 65;
var rightKeyCode = 68;
var nrIncrements = 4;

function setupCanvas() {
	updateCanvas(currentX, currentY);
}

function clearCanvas() {
	var canvas = document.getElementById('steeringCanvas');
	var centerX = canvas.width / 2;
	var centerY = canvas.height / 2;
	var ctx = canvas.getContext('2d');
	
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	
	ctx.beginPath();
	ctx.moveTo(centerX,10);
	ctx.lineTo(centerX, canvas.height - 10);
	ctx.lineWidth=1;
	ctx.strokeStyle= "#888888";
	ctx.stroke();
	
	ctx.beginPath();
	ctx.moveTo(10, centerY);
	ctx.lineTo(canvas.width - 10, centerY);
	ctx.stroke();
}

function keyEvent(e) {
	if (controller == null) {
		switch (e.keyCode) {
		case backwardsKeyCode:
			if (currentY < 1.0) {
				currentY += 1 / nrIncrements;
				updateCanvas(currentX, currentY);
			}
			break;
		case forwardKeyCode:
			if (currentY > -1.0) {
				currentY -= 1 / nrIncrements;
				updateCanvas(currentX, currentY);
			}
			break;
		case rightKeyCode:
			if (currentX < 1.0) {
				currentX += 1 / nrIncrements;
				updateCanvas(currentX, currentY);
			}
			break;
		case leftKeyCode:
			if (currentX > -1.0) {
				currentX -= 1 / nrIncrements;
				updateCanvas(currentX, currentY);
			}
			break;
		}
	}
}

function updateCanvas(x, y) {
	var canvas = document.getElementById('steeringCanvas');
	var ctx = canvas.getContext('2d');
	clearCanvas();

	var centerX = canvas.width / 2;
	var centerY = canvas.height / 2;

	var offsetX = Math.round(x * ((canvas.width / 2) - radius));
	var offsetY = Math.round(y * ((canvas.height / 2) - radius));

	ctx.beginPath();
	ctx.arc(centerX + offsetX, centerY + offsetY, radius, 0, 2 * Math.PI);
	ctx.fillStyle = '#FFFFFF';
	ctx.fill();
}

function connecthandler(e) {
	addgamepad(e.gamepad);
}

function addgamepad(gamepad) {
	if (controller == null) {
		controller = gamepad;
		currentX = 0;
		currentY = 0;
		var p = document.getElementById("controlsInfo");
		p.innerHTML = "Steer With Controller";
		rAF(showControllerPos);
	}
}

function showControllerPos() {
	if (controller != null) {
		updateCanvas(controller.axes[0], controller.axes[1]);

		if (controller.buttons[9].pressed) {
			console.log("stop");
			removegamepad();
			setupCanvas();
		} else {
			rAF(showControllerPos);
		}
	}
}

function disconnecthandler(e) {
	removegamepad();
}

function removegamepad() {
	controller = null;
	var p = document.getElementById("controlsInfo");
	p.innerHTML = "Steer with WASD";
}

window.addEventListener("gamepadconnected", connecthandler);
window.addEventListener("gamepaddisconnected", disconnecthandler);