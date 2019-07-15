/*jslint browser:true */
var x=-1;
var y=-1;
var z=-1;
$(document).ready(function(){
    $("#black").click(function(){
        x = (x === color.length - 1) ? 0 : x + 1;
        $("#red").animate({left: move[x]}, "slow");
        $("#orange").animate({left: move[x]}, "slow");
        $("#yellow").animate({left: move[x]}, "slow");
        $("#green").animate({left: move[x]}, "slow");
        $("#black").animate({left: move[x]}, "slow");
        $("#blue").animate({left: move[x]}, "slow");
        $("#indigo").animate({left: move[x]}, "slow");
        $("#violet").animate({left: move[x]}, "slow");
    });

    $("#red").click(function(){
      y = (y === tdex.length - 2) ? 0 : y + 1;
      z = (z === zdex.length - 2) ? 0 : z + 1;
    	$("#red").animate({top: tdex[y]}, "slow");

      $("#red").css('z-index', zdex[z+1]);

      $("#violet").animate({top: tdex[y+1]}, "slow")

      $("#violet").css('z-index', zdex[z]);

    });


    $("#violet").click(function(){
      y = (y === tdex.length - 2) ? 0 : y + 1;
      z = (z === zdex.length - 2) ? 0 : z + 1;
      $("#red").animate({top: tdex[y]}, "slow");

      $("#red").css('z-index', zdex[z+1]);

      $("#violet").animate({top: tdex[y+1]}, "slow")

      $("#violet").css('z-index', zdex[z]);

    });
});

const zdex = [
  "1",
  "7",
  "1"
];
const tdex = [
  "+=600px",
  "-=600px",
  "+=600px",
];

const color = [
    "red",
    "orange",
    "yellow",
    "green",
    "blue",
    "indigo",
    "violet",
    "black"
];
const move = [
    "-=200px",
    "-=200px",
    '-=200px',
    '-=200px',
    '+=200px',
    '+=200px',
    '+=200px',
    '+=200px'
];
