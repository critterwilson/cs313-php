function courseSignUp() {
    var h = document.getElementByI("courseSignUp");
    for (var i = 0; i < 6; i++) {
        var courseNum = "courseSignUp_" + i;
        if (i < document.getElementById("numCourses").value) {
            str = "Hello";
            h.insertAdjacentHTML("afterend",str);
        }
    }
}
}