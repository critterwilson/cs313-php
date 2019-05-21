function viewChange() {
  // get how the user wants to view their data
  var view = document.getElementById("filter").value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //console.log(this.responseText);
      document.getElementById("output").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "setView.php?q=" + view, true);
  xmlhttp.send();
}

function courseSignUp_Class() {
  // get the number of courses the professor wants to sign up for
  var numSignUp = document.getElementById("numCourses").value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //console.log(this.responseText);
      document.getElementById("courseSelect").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "signUp.php?q=" + numSignUp, true);
  xmlhttp.send();
}


function courseSignUp_Section() {
  

}