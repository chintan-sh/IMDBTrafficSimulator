var http = require('http'); // for http request
var request = require('request'); //for POST call
var qs = require('querystring');//to retrieve value from POST variables

function handleRequest(req, res) {
    if (req.method == 'POST') {
        var received_message = '';
        var messageBody = {};
        var status = "ok";

        /* received_message :-
        count=2*/
        req.on('data', function (data) {
            received_message += data;
            // 1e6 === 1 * Math.pow(10, 6) === 1 * 1000000 ~~~ 1MB
            if (received_message.length > 1e6) { 
                // FLOOD ATTACK OR FAULTY CLIENT, NUKE REQUEST
                req.connection.destroy();
            }
        });

        req.on('end', function () {
            console.log('Got request, time to queue it ');
            var messageBody = qs.parse(received_message);
            var formattedData = decodeMessage(messageBody);
	    var count = formattedData['count'];
	    for(var i=0; i<count; i++){
		request("https://54.186.164.236/test/rest_user_login_simulation.php?username=max"+i+"&password=max");
		console.log("User loop index is " +  i);
	    }
            console.log('Count is ' + formattedData['count']);
        });

        res.setHeader('Access-Control-Allow-Origin', '*');
        res.setHeader('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
        res.setHeader('Access-Control-Allow-Headers', 'Content-Type');  
        res.writeHead(200, {'Content-Type': 'text/html', 'Content-Length': status.length});
        res.write(status);
        res.end('POST received');
    }
};

function decodeMessage(received_message){
   var messageArray = {}; //In order to create associative array, will use object
   /*received_message :- count=2*/
    messageArray['count'] = received_message.count;
    messageArray['count'] = messageArray['count'].replace(/["]+/g, '');//replace "" from count
    return messageArray;
}


server = http.createServer(handleRequest);
port = 3000;
host = '127.0.0.1'; //dont allow external connections
server.listen(port, host);
console.log('Listening at http://' + host + ':' + port);
