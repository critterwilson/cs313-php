function show(id) {
	switch (id) {
		case 1:
		  document.getElementById("contact-rel-list").style.display = "block";
		  document.getElementById("contact-rel").style.display = "block";  
		  var x = document.getElementById("contact-rel").querySelectorAll(".contact-card");
		  for (var i = 0; i < x.length; i++) {
		  	x[i].style.display = "block";
		  }
		  var x = document.getElementById("contact-rel").querySelectorAll(".bio");
		  for (var i = 0; i < x.length; i++) {
		  	x[i].style.display = "none";
		  }

		  document.getElementById("contact-sni-list").style.display = "none";
		  document.getElementById("contact-sni").style.display = "none";

		  document.getElementById("contact-faq-list").style.display = "none";
		  document.getElementById("faq").style.display = "none";
		  break;

		case 2:
		  document.getElementById("contact-rel-list").style.display = "none";
		  document.getElementById("contact-rel").style.display = "none";	  

		  document.getElementById("contact-sni-list").style.display = "block";
		  document.getElementById("contact-sni").style.display = "block";
		  		  var x = document.getElementById("contact-sni").querySelectorAll(".contact-card");
		  for (var i = 0; i < x.length; i++) {
		  	x[i].style.display = "block";
		  }
		  var x = document.getElementById("contact-sni").querySelectorAll(".bio");
		  for (var i = 0; i < x.length; i++) {
		  	x[i].style.display = "none";
		  }

		  document.getElementById("contact-faq-list").style.display = "none";
		  document.getElementById("faq").style.display = "none";
		  break;

		case 3:
		  document.getElementById("contact-rel-list").style.display = "none";
		  document.getElementById("contact-rel").style.display = "none";	  

		  document.getElementById("contact-sni-list").style.display = "none";
		  document.getElementById("contact-sni").style.display = "none";

		  document.getElementById("contact-faq-list").style.display = "block";
		  document.getElementById("faq").style.display = "block";
		  break;
	}
}

function profInfo(id) {
	for (var i = 1; i <= 9; i++) {
		if (i != id) {
			document.getElementById(i).style.display = "none";
		}
		document.getElementById(id).style.display = "block";
		var x = document.getElementById(id).querySelectorAll(".bio");
		x[0].style.display = "block"
	}
}

function showA(id) {
	switch(id){
		case 1:
			document.getElementById('a1').style.display = "block";
			document.getElementById('a2').style.display = "none";
			document.getElementById('a3').style.display = "none";
			break;
		case 2:
			document.getElementById('a1').style.display = "none";
			document.getElementById('a2').style.display = "block";
			document.getElementById('a3').style.display = "none";
			break;
		break;
		case 3:
			document.getElementById('a1').style.display = "none";
			document.getElementById('a2').style.display = "none";
			document.getElementById('a3').style.display = "block";
			break;
		break;
	}
}