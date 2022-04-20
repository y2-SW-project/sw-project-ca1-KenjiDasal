var mysql = require('mysql');

var con = mysql.createConnection({
    host: "127.0.0.1",
    user: "root",
    password: "",
    database: "music_streaming"
});

con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT * FROM songs", function(err, result) {
        if (err) throw err;
        let data = [result]
        console.log(data);
    });
});