

$(document).ready(function() {
	var ws;
	
	$('#connectForm').on('submit', function() {
		ws = new WebSocket($('#wsServer').val(),'boat-steering-protocol');
		
		 ws.onopen = function() {
			$('#console-content').append('<br><span class="badge badge-success">Websocket opened</span>');
			$('#prompt').removeAttr('disabled');
			$('#prompt').removeAttr('placeholder');

		};
		

		return false;
	});
	
	$('#sendForm').on('submit', function() {
			var message = $('#message').val();
			ws.send(message);
			$('#console-content').append('<br><span class="badge badge-success">' + message +' </span>');
		
		return false;
	});	

	$('#disconnect').on('click', function() {
		ws.close();
		$('#console-content').append('<br><span class="badge badge-danger"> Disconnected</span>');
		return false;
	});
	
	  $('#commandLine').on('submit', function() {
			var message = $('#prompt').val();
			ws.send(message);
			
			/*
			var byteArray = new Uint8Array(arrayBuffer);
			byteArray = 255;
			$('#log').append('<li>sended: <span class="badge">' + byteArray + '</span></li>');
		   
			var buffer = new Uint8Array(2);
			buffer[0] = 127;
			buffer[1] = 127;
			ws.send(buffer);
			 */
			
			
			/*
			setInterval(function () {
				$('#log').append('<li>sended: <span class="badge">' + buffer[0] + '</span></li>');
				$('#log').append('<li>sended: <span class="badge">' + buffer[1] + '</span></li>');
			}, 3000);
			*/

		
			return false;
            });
});
	


/*
  $(document).ready(function() {
	var ws;

	$('#connectForm').on('submit', function() {
		if ("WebSocket" in window) {
			ws = new WebSocket($('#wsServer').val(),'boat-steering-protocol');
			
			ws.onopen = function() {
				$('#log').append('<li><span class="badge badge-success">websocket opened</span></li>');
				$('#wsServer').attr('disabled', 'disabled');
				$('#connect').attr('disabled', 'disabled');
				$('#disconnect').removeAttr('disabled');
				$('#message').removeAttr('disabled').focus();
				$('#send').removeAttr('disabled');
			};

			ws.onerror = function() {
				$('#log').append('<li><span class="badge badge-important">websocket error</span></li>');
			};

			ws.onmessage = function(event) {
				$('#log').append('<li>recieved: <span class="badge">' + event.data + '</span></li>');
			};

			ws.onclose = function() {
				$('#log').append('<li><span class="badge badge-important">websocket closed</span></li>');
				$('#wsServer').removeAttr('disabled');
				$('#connect').removeAttr('disabled');
				$('#disconnect').attr('disabled', 'disabled');
				$('#message').attr('disabled', 'disabled');
				$('#send').attr('disabled', 'disabled');
			};
		} else {
			$('#log').append('<li><span class="badge badge-important">WebSocket NOT supported in this browser</span></li>');
		}

		return false;
	});
	
	$('#sendForm').on('submit', function() {
		var message = $('#message').val();
		ws.send(message);
		$('#log').append('<li>sended: <span class="badge">' + message + '</span></li>');

		return false;
	});
	
	$('#disconnect').on('click', function() {
		ws.close();
		return false;
	});
}); */