
// document.getElementById("search").addEventListener("mouseover", function () {
//     var elements = document.getElementsByClassName("searchandfilter");
//     for (i = 0; i < elements.length; i++) {
//         elements[i].style.display = 'block';
//     }
// }, false);

// document.getElementById("search").addEventListener("mouseout", function () {
//     var elements = document.getElementsByClassName("searchandfilter");
//     for (i = 0; i < elements.length; i++) {
//         elements[i].style.display = 'none';
//     }
// }, false);

document.getElementById("search").addEventListener("click", function () {
    var elements = document.getElementsByClassName("searchandfilter");
    for (i = 0; i < elements.length; i++) {
        elements[i].style.display = 'block';
    }
    var close = document.getElementsByClassName("close");
    for (i = 0; i < close.length; i++) {
        close[i].style.display = 'block';
    }
}, false);

document.getElementById("close").addEventListener("click", function () {
    var elements = document.getElementsByClassName("searchandfilter");
    for (i = 0; i < elements.length; i++) {
        elements[i].style.display = 'none';
    }
    var close = document.getElementsByClassName("close");
    for (i = 0; i < close.length; i++) {
        close[i].style.display = 'none';
    }
}, false);
// document.getElementById("search").addEventListener("mouseout", function () {
//     var elements = document.getElementsByClassName("searchandfilter");
//     for (i = 0; i < elements.length; i++) {
//         elements[i].style.display = 'none';
//     }
// }, false);