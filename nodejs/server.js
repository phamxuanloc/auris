var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(8890);

// app.get('/', function (req, res) { res.send('Hello World!')});

// app.listen(8890, function() { console.log('Example app listening on port 3010!'); });

io.on('connection', function (socket) {

    console.log("New client connected");

    var redisClient = redis.createClient();

    redisClient.subscribe('auris');

    redisClient.on("message", function(channel, message) {
        console.log("New message: " + message + ". In channel: " + channel);
        socket.emit(channel, message);
    });

    socket.on('disconnect', function() {
        redisClient.quit();
    });

});