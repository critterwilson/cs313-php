function show(id) {
	switch (id) {
		case 1:
		  document.getElementById("contact-rel-list").style.display = "block";
		  document.getElementById("contact-rel").style.display = "block";	  

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