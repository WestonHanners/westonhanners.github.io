function toggleNav() {
    var x = document.getElementById("topnav");
    if (x.className === "navitems") {
        x.className += " responsive";
    } else {
        x.className = "navitems";
    }
}