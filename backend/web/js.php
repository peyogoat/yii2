<script type="text/javascript">
//var wsServer = 'ws://'+location.host+':9501';
var wsServer = 'ws://localhost:5000';
var websocket = new WebSocket(wsServer);
console.log("test!");
websocket.onopen = function (evt) {
    console.log("Connected to WebSocket server.");
	websocket.send("{\"deviceid\":\"xxx\",\"onoff\":1}");
};

websocket.onclose = function (evt) {
    console.log("Disconnected");
};

websocket.onmessage = function (evt) {
    console.log('Retrieved data from server: ' + evt.data);
};

websocket.onerror = function (evt, e) {
    console.log('Error occured: ' + evt.data);
};
</script>
