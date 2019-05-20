function viewChange() {
  var view = document.getElementById("filter").value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      document.getElementById("output").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "setView.php?q=" + view, true);
  xmlhttp.send();
}

function courseSignUp() {
  var numSignUp = document.getElementById("numCourses");

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      document.getElementById("courseSelect").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "signUp.php?q=" + numSignUp, true);
  xmlhttp.send();
}