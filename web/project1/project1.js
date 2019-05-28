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
  xmlhttp.open("GET", "signUp.php?q=" + numSignUp, true);
  xmlhttp.send();
}

/******************************************************************************
* Function: sectionSignUp()  
* Description: 
******************************************************************************/
function sectionSignUp(i) {
  var postfix = document.getElementById("courseSelect_"+i).value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      //document.getElementById("signUp_"+i).innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "signUp.php?r=" + postfix, true);
  xmlhttp.send();
}




function courseSignUpVerify() {
  var c = document.getElementById("courseSelect").children;

  for (var i = 0; i < c.length; i++) {
    for (var j = i + 1; j < c.length; j++) {
      if(c[i].value == c[j].value) {
        alert("Please make sure you are not selecting a course twice.");
        return;
      }
    }
  }

}



