/******************************************************************************
* Function: viewChange()  [used by: readInfo.php]
* Description: retrieves the format that the user wants to view their info in
* and gets the proper data from setView.php
******************************************************************************/
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

/******************************************************************************
* Function: courseSignUp()  [used by: project1.php]
* Description: gets the number of courses desired, passes that to a php file
* and writes up to six <select> items that allow the professor to select from
* courses that have available sections
******************************************************************************/
function courseSignUp() {
  // get the number of courses the professor wants to sign up for
  var numSignUp = document.getElementById("numCourses").value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //console.log(this.responseText);
      document.getElementById("courseSelect").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("POST", "signUp.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("q=" + numSignUp);
}

/******************************************************************************
* Function: sectionSignUp()  [used by: project1.php]
* Parameter(s): the index corresponding to the course 
* Description: based on the select class, retrieves the proper number of 
* available sections and presents them to the user 
******************************************************************************/
function sectionSignUp(i) {
  // get whichever class has been selected
  var id = document.getElementById("courseSelect_" + i).value;

  // AJAX
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Show how many sections are being displayed
      document.getElementById("sectionSelect_"+i).innerHTML = this.responseText;
    }
  };
  xmlhttp.open("POST", "signUp.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("r=" + id + "&s=" + i);
}

/******************************************************************************
* Function: signUpVerify()  [used by: project1.php]
* Description: Verifies that all of the form data is valid in sign up
******************************************************************************/
function verifySignUp() {
  var numCourses = document.getElementById("numCourses").value;
  for (var i = 0; i < numCourses; i++) {
    for (var j = i + 1; j < numCourses; j++) {
      // check to make sure a course is selected first
      c1 = document.getElementById("courseSelect_" + i).value;
      c2 = document.getElementById("courseSelect_" + j).value;
      if (c1 == "" || c2 == "") {
        alert("Please ensure all form data is filled out.");
        return false;
      }
      // check to make sure the sections don't match
      s1 = document.getElementById("section_" + i).value;
      s2 = document.getElementById("section_" + j).value;
      console.log(s1 + ", " + s2);
      if(c1 == c2 && s1 == s2) {
        alert("Please ensure you are not selecting the same section of the same course twice.");
        return false;
      }
    }
  }
  return true;
}


