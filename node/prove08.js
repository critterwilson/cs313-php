var http = require('http');
var url = require('url');
var fs = require('fs');

function runServer(req, res) {
	// store the url from the req value
	var toParse = url.parse(req.url);
	// log it so we can see what we are working with
	console.log(toParse.pathname);

	// if we find /home by parsing toParse
	if (toParse.pathname == "/home") {
		// write an html header to the page
		res.write("<h1>Welcome to the Home Page</h1>");
		res.end();
	} else if (toParse.pathname == "/getData") {
		// write a json file
		fs.writeFile('data.json', '{"name":"C. Wilson","class":"cs313"}', function(err) {
    		if(err) {
	       		return console.log(err);
    		}
    		// let the user know it worked
    		console.log("The file was saved!");
		}); 
	} else {
		// write the error code if the above are not met.
		res.write("404: Page Not Found");
	}
	res.end();
}

// run the server
var server = http.createServer(runServer);
server.listen(8888);

// let the user know that it's running
console.log("The server is listening on port 8888...");