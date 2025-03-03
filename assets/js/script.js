'use strict';

const addEventOnelem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navToggler = document.querySelector("[data-nav-toggler]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  navToggler.classList.toggle("active");
}

addEventOnelem(navToggler, 'click', toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  navToggler.classList.remove("active");
}

addEventOnelem(navbarLinks, "click", closeNavbar);

const header = document.querySelector("[data-header]");

const activeHeader = function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
}

addEventOnelem(window, "scroll", activeHeader);


if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
  const searchBox = document.getElementById('searchBox');
  const micButton = document.getElementById('micButton'); // Ensure this button exists in your HTML
  const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

  recognition.continuous = false;  // Stop after one recognition
  recognition.interimResults = false;  // No interim results
  recognition.lang = 'en-US';  // Set language

  // Start voice recognition when the microphone button is clicked
  micButton.addEventListener('click', () => {
    recognition.start();
  });

  // Handle the result of the voice recognition
  recognition.onresult = (event) => {
    const command = event.results[0][0].transcript.toLowerCase(); // Get recognized text
    searchBox.value = command; // Set the search box value to recognized text

    // Check for the command to navigate to the achievements or home page
    if (command.includes('go to achievements')) {
      window.location.href = 'achievement.html'; // Navigate to achievements page
    } else if (command.includes('go to home')) {
      window.location.href = 'index.html'; // Navigate to home page
    } else {
      alert('Please say "GO TO Achievements" or "GO TO HOME" to navigate.');
    }
  };

  // Handle errors
  recognition.onerror = (event) => {
    console.error('Speech recognition error:', event.error);
    alert('An error occurred. Please try again.');
  };

} else {
  console.error('Speech recognition not supported in this browser.');
  alert('Speech recognition is not supported in this browser. Please try another browser.');
}
