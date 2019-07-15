
var time = [];
time[0] = 3000;
time[1] = 5000;
time[2] = 3000;
time[3] = 7000;

var tooltip = [];
tooltip[1] = "Javascript Cookbook";
tooltip[2] = "Learning Perl";
tooltip[3] = "Moddern PHP";
tooltip[0] = "MySQL Cookbook";

var images = [];
images[1] = "./JavascriptCookbook.jpg";
images[2] = "./learningPerl.jpg";
images[3] = "./modernPHP.jpg";
images[0] = "./mysqlCookbook.jpg";

var x = -1;

function displayNextImage() {
    x = (x === images.length - 1) ? 0 : x + 1;
    document.getElementById("img").src = images[x];
    document.getElementById("img").setAttribute("height", "800px");
    document.getElementById("img").setAttribute("width", "295px");
    document.getElementById("img").setAttribute("title", tooltip[x]);
    document.getElementById("img").onclick = function() {
      window.location.href = images[x];
    };
}
function displayPreviousImage() {
    x = (x <= 0) ? images.length - 1 : x - 1;
    document.getElementById("img").src = images[x];
}

function displayImages(){
  interval(displayNextImage, time[x]);
  document.onload = "displayImages()";
}

function interval(func, wait, times){
    var interv = function(w, t){
        return function(){
            if(typeof t === "undefined" || t-- > 0){
                setTimeout(interv, time[x]);
                try{
                    func.call(null);
                }
                catch(e){
                    t = 0;
                    throw e.toString();
                }
            }
        };
    }(time[x], times);
    setTimeout(interv, time[x]);
};
