const time = [
    3000,
    5000,
    3000,
    7000
];

const tooltip = [
    "Javascript Cookbook",
    "Learning Perl",
    "Modern PHP",
    "MySQL Cookbook"
];

const images = [
    "./JavascriptCookbook.jpg",
    "./learningPerl.jpg",
    "./modernPHP.jpg",
    "./mysqlCookbook.jpg"
];


var x = -1;

function displayNextImage() {
    x = (x === images.length - 1) ? 0 : x + 1;
    update();
    resetTimer();

}
function displayPreviousImage() {
    x = (x <= 0) ? images.length - 1 : x - 1;
    update();
    resetTimer();

}
function update(){
    document.getElementById("img").src = images[x];
    document.getElementById("img").setAttribute("width", "800px");
    document.getElementById("img").setAttribute("height", "295px");
    document.getElementById("img").setAttribute("title", tooltip[x]);
    document.getElementById("img").onclick = function() {
      window.location.href = images[x];
    };
}

// interval(displayNextImage, time[x]);


// function interval(func, wait, times){
//     var interv = function(w, t){
//         return function(){
//             if(typeof t === "undefined" || t-- > 0){
//                 setTimeout(interv, time[x]);
//                 try{
//                     func.call(null);
//                 }
//                 catch(e){
//                     t = 0;
//                     throw e.toString();
//                 }
//             }
//         };
//     }(time[x], times);
//     setTimeout(interv, time[x]);
// }

var timerId = -1;

function resetTimer() {
    if(timerId >= 0) // If the timer is already set/running...
        clearTimeout(timerId); // stop the timer.

    // Set a new timer for the timer function, with the time to wait being
    // defined by the timeouts array.
    timerId = setTimeout(timer, time[x]);
}
function timer() {
    x = (x + 1) % images.length;

    update();

    resetTimer();
}
resetTimer();

document.querySelector("#next").addEventListener("click", displayNextImage);
document.querySelector("#prev").addEventListener("click", displayPreviousImage);
