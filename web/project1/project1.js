function courseSignUp() {
    var h = document.getElementById("courseSignUp");
    for (i = 0; i < 6; i++) {
        var courseNum = "courseSignUp_" + i;
        if (i < document.getElementById("numCourses").value) {
            str = "Hello";
            h.insertAdjacentHTML("afterend",str);
        }
    }
}

function viewChange() {
	var view = document.getElementById("viewType");
	
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("viewInfo").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "setView.php?q=" + view, true);
    xmlhttp.send();
 }

