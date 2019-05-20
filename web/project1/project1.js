function viewChange() {
  if( document.readyState !== 'loading' ) {
    var view = document.getElementById("viewType").value;
    var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          document.getElementById("viewInfo").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "setView.php?q=" + view, true);
      xmlhttp.send();
} else {
    document.addEventListener('DOMContentLoaded', function () {
      var view = document.getElementById("viewType").value;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("viewInfo").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "setView.php?q=" + view, true);
        xmlhttp.send();
 }
}


