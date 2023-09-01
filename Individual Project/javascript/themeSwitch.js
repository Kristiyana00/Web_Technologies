function themeSwitch() {
    var element = document.getElementsByTagName("html");
    element[0].classList.toggle("dark-mode");
    var elem = document.getElementsByTagName("h4");
    for (let i = 0; i < elem.length; i++) {
        elem[i].classList.toggle("dark-mode-header");
    }
 }