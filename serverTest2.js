const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);

const s_port = 5134;
const dgram = require("dgram");
const server = dgram.createSocket("udp4");

const firebase = require("firebase-admin");
const serviceAccount = require("./testnb-f5810-firebase-adminsdk-ge5px-8b29c65e9d.json");

firebase.initializeApp({
	apiKey: "AIzaSyDj_ZcH06mmxoVSJb5hV_08P-s5be8wCt0",
    authDomain: "nb-iot-c6c42.firebaseapp.com",
	credential: firebase.credential.cert(serviceAccount),
    databaseURL: "https://testnb-f5810.firebaseio.com/"
});

var result = "1";
var db = firebase.database();
var temperture = "";
var humid = "";
var imei = "";
var port = "5314";
var server_add = "45.32.69.11";

//##########################################################################
var d = new Date();
//start set time
var utc_offset = d.getTimezoneOffset();
	d.setMinutes(d.getMinutes() + utc_offset);
var thai_offset = 7 * 60;
	d.setMinutes(d.getMinutes() + thai_offset);
	console.log("TIME(thai): " + d);
//end set time
//##############################################################################

//หน้าควบคุม graph
app.get('/test/:id', function (req, res) {
    var x = req.param('id')
    console.log("ผลลัพธ์ : " + x);
    if (x == 0) {
        console.log("id " + x);
        res.send("close");
    }
    else if (x == 1) {
        console.log("id " + x);
        res.send("open");
    }
});

//###############################################################################

//ส่งข้อมูลไปหา browser sohk ้นทำ ของ website
// app.get('/', function (req, res) {
//     //res.sendFile(__dirname + '/client.html');
//     res.sendFile(__dirname + '/control_and_monitoring.php');
// });
app.listen(process.env.port || 7755);
console.log('Running at Port 7755');
//#############################################################################

//start send data from web to board
io.on('connection', function(socket){
	console.log('one user connected' + socket.id);

	//receive data from website to board
	socket.on('MsgReceive', function(data){
		console.log('====== MsgReceive ======');
		console.log(data);
		socket.emit('MsgReceive',data);
		result = data;
		console.log(result);

		var result_str = JSON.stringify(result);
		var ack = new Buffer(msg);
		console.log(result);
		console.log(result_str);

		// ส่งข้อความ Settings time จาก application ไป Arduino
		var ack = new Buffer(result_str);
		server.send(ack,0,ack.length, p, server_add, function(err,bytes){
			console.log("send back" + result_str);
		});
	});
	socket.on('disconnect', function(){
		console.log('one user disconnected ' + socket.id);
	});
});

//end 
//###########################################################################################

//start
http.listen(s_port, function () {
        console.log('server listening on port 5314');
});
// ref.once("value", function (snapshot) {
//         console.log(snapshot.val());
// });
server.on("listening", function () {
    var address = server.address();
    console.log("server listening " + address.address + ":" + address.port);
});

//############################################################################################
// ส่งข้อความ GPS จาก Arduino ไป Firebase
io.on("message", function(msg, rinfo){
	console.log("server got a message from " + rinfo.address + ":" + rinfo.port);
	p = rinfo.port;
	server_add = rinfo.address;

	//-------------------------------------------
    // set time send to database  
    var d = new Date();
    var utc_offset = d.getTimezoneOffset();
    d.setMinutes(d.getMinutes() + utc_offset);
    var thai_offset = 7 * 60;
    d.setMinutes(d.getMinutes() + thai_offset);

    console.log("server got: " + msg + " from " + rinfo.address + ":" + rinfo.port);
    var ack = new Buffer(msg);
    server.send(ack, 0, ack.length, rinfo.port, rinfo.address, function (err, bytes) {
        console.log("sent ACK.");
        console.log("msg : " + new Buffer(msg).toString("ascii"));
    });
    //-----------------------------------------
    // รับค่าจาก NB-IoT แปลงเป็น String
    var split_msg = new Buffer(msg).toString();
    var split_value = split_msg.split(' ');

    console.log("Humidity = " + split_value[1]);
    //console.log("typeH = "+typeof split_msg[1]);
    console.log("Temperature = " + split_value[2]);
    //console.log("typeT = "+typeof split_msg[1]);
    d = d.toString('ascii').substr(0, 24)
    console.log("dateTime = " + d)
    console.log(typeof split_msg);

    //-------------------------------------------

    // การส่งการแจ้งเตือน
    // split ส่งขึ้น firebase
     firebase.database().ref('/testnb-f5810').orderByKey().limitToLast(1).once("value", function (snap) {
        temp = parseFloat(split_value[2]);
        humid = parseFloat(split_value[1]);
        let vals = snap.val();
        let humidity;
        let temp2;
        for (var i in vals) {
            val = vals[i];
            console.log(val);

            humidity = val.Humidity;
            temp2 = val.Temperature;
        };
        console.log(humid);
        console.log(humidity);
        abs_temp = Math.abs(temp - temp2);
        abs_humid = Math.abs(humid - humidity);

        // console.log(abs_temp);
        console.log(abs_humid);
        if ((split_value[2] < 50 || split_value[2] > 60 || split_value[1] > 50) && (abs_temp > 1 || abs_humid > 1)) {
            
            temp = split_value[2];
            humid = split_value[1];
            //abs_temp = Math.abs(temp - parseFloat(split_value[2]));
            //abs_humid = Math.abs(humid - parseFloat(split_value[1]));

            request({
                method: 'POST',
                uri: 'https://notify-api.line.me/api/notify',
                header: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                auth: {
                    bearer: 'Qw2hOC1kqnfkygouZczAso7cEUW8Fs9uBKSvtjit1ry', //token
                },
                form: {
                    message: "ค่าอุณหภูมิและค่าความชื้นของคุณผิดปกติ" + "\n" + "อุณหภูมิ : " + split_value[2] + " องศา" + "\n" + "ความชื้น : " + split_value[1] + "%" + "\n" + "ต้องการควบคุม กรุณาคลิ๊ก " + "URL : " + "www.thaisunco.com" + "\n",//ข้อความที่จะส่ง
                },
            }, (err, httpResponse, body) => {
                if (err) {
                    console.log(err)
                } else {
                    console.log(body)
                }
            });
        }
    });
    // split ส่งขึ้น firebase
         firebase.database().ref('/testnb-f5810').push({
            Humidity: parseFloat(split_value[1]),
            Temperature: parseFloat(split_value[2]),
            dateTime: d
        });
    //----------------------------------------------------------------------------------------------------------------

});

//###################################################################################################

server.on("error", function (err) {
        console.log("server error: \n" + err.stack);
        server.close();
});

server.on("close", function () {
        console.log("closed.");
});

server.bind(s_port);