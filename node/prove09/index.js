const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 5000
const url = require('url')

var app = express();
// app.use(express.static(path.join(__dirname, 'public')));
// app.set('views', path.join(__dirname, 'views'));
// app.set('view engine', 'ejs');
app.get('/getRate', (req, res) => res.render('pages/getRate.ejs'));

app.use(express.static("public"));
app.set("views", "views");
app.set("view engine", "ejs");
app.listen(PORT, () => console.log(`Listening on ${ PORT }`));

app.get("getRate", function(req, res) {
	console.log("Received a request for the home page");
	// Controller
	var q = url.parse(req.url, true);
	var qdata = q.query;
	var cost = calculateData(qdata);
	var params = {weight: qdata.weight, type: qdata.type, price: cost};
	console.log(params);
	res.render("/getRate", params);
});

// model
function calculateData(get) {
	if (get.type == 'package') {
		if (get.weight < 4)
			return 3.66;
		else 
			return (3.66 + ((get.weight - 3) * 0.15));
	} else if (get.type == 'stamped') {
		return (0.55 + (get.weight * 0.15));
	} else if (get.type == 'metered') {
		return (0.50 + (get.weight * 0.15));
	} else if (get.type == 'flats') {
		return (1 + (get.weight * 0.15));
	}
}