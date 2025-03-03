
 'use strict';
// Wait until the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function() {
  
    // Get all elements with the class 'tab-card'
    const tabs = document.querySelectorAll('.tab-card');
  
    // Loop through each tab-card
    tabs.forEach(tab => {
      tab.addEventListener('click', function() {
  
        // Remove the 'active' class from all tabs
        tabs.forEach(t => t.classList.remove('active'));
  
        // Add the 'active' class to the clicked tab
        this.classList.add('active');
      });
    });
  });
  




// /**
//  * add event on element
//  */

// const addEventOnelem = function (elem, type, callback) {
//   if (elem.length > 1) {
//     for (let i = 0; i < elem.length; i++) {
//       elem[i].addEventListener(type, callback);
//     }
//   } else {
//     elem.addEventListener(type, callback);
//   }
// }



// /**
//  * toggle navbar
//  */

// const navbar = document.querySelector("[data-navbar]");
// const navbarLinks = document.querySelectorAll("[data-nav-link]");
// const navToggler = document.querySelector("[data-nav-toggler]");

// const toggleNavbar = function () {
//   navbar.classList.toggle("active");
//   navToggler.classList.toggle("active");
// }

// addEventOnelem(navToggler, 'click', toggleNavbar);

// const closeNavbar = function () {
//   navbar.classList.remove("active");
//   navToggler.classList.remove("active");
// }

// addEventOnelem(navbarLinks, "click", closeNavbar);



// /**
//  * header active on scroll down to 100px
//  */

// const header = document.querySelector("[data-header]");

// const activeHeader = function () {
//   if (window.scrollY > 100) {
//     header.classList.add("active");
//   } else {
//     header.classList.remove("active");
//   }
// }

// addEventOnelem(window, "scroll", activeHeader);



// /**
//  * filter tab
//  */

// const tabCard = document.querySelectorAll("[data-tab-card]");

// let lastTabCard = tabCard[0];

// const navigateTab = function () {
//   lastTabCard.classList.remove("active");
//   this.classList.add("active");
//   lastTabCard = this;
// }

// addEventOnelem(tabCard, "click", navigateTab);
