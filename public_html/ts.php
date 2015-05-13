<!DOCTYPE html>
<html>
<head>
    <title>Websocket client</title>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="page-header">Websocket client</h1>

        <form action="" class="form-inline" id="connectForm">
            <div class="input-append">
                <input type="text" class="input-large" value="ws://10.0.0.5:8888" id="wsServer">
                <button class="btn" type="submit" id="connect">Connect</button>
                <button class="btn" disabled="disabled" id="disconnect">Disconnect</button>
            </div>
        </form>
        <form action="" id="sendForm">
            <div class="input-append">
                <input class="input-large" type="text" placeholder="message" id="message" disabled="disabled">
                <button class="btn btn-primary" type="submit" id="send" disabled="disabled">send</button>
            </div>
        </form>
        <hr>
        <ul class="unstyled" id="log"></ul>
    </div>
    <script type="text/javascript">

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
                /*var message = $('#message').val();
                ws.send(message);
                var byteArray = new Uint8Array(arrayBuffer);
                byteArray = 255;
                $('#log').append('<li>sended: <span class="badge">' + byteArray + '</span></li>');
                */
                var buffer = new Uint8Array(2);
                buffer[0] = 127;
                buffer[1] = 127;
                ws.send(buffer);
                setInterval(function () {
                    $('#log').append('<li>sended: <span class="badge">' + buffer[0] + '</span></li>');
                    $('#log').append('<li>sended: <span class="badge">' + buffer[1] + '</span></li>');
                }, 3000);
                

            
                return false;
            });
            $('#disconnect').on('click', function() {
                ws.close();

                return false;
            });
        });
    </script>
</body>
</html>