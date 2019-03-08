/**
 * topPanel.js
 *
 * Handles opening and collapsing the advertising top panel.
 */


// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("masthead");
var navlogo =  document.getElementById("headerLogo");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("parkIt")

  } else {
    navbar.classList.remove("parkIt");
   
  }
}
