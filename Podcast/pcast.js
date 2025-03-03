const hamburger = document.getElementById("hamburger");
const navbar = document.getElementById("navbar");

hamburger.addEventListener("click", () => {
    navbar.classList.toggle("active");
});

let availableKeywords = [
    'Ikigai',
    'Atomic Habits',
    'How to talk to anyone',
    'The story of Indian Startups',
    'Money Matters',
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("search");

inputBox.addEventListener("keyup", function() {
    let result = [];
    let input = inputBox.value;
    
    console.log("Input value:", input); // Debugging input
    
    // Check if input has text, otherwise clear results
    if (input.length) {
        result = availableKeywords.filter((keyword) => {
            return keyword.toLowerCase().includes(input.toLowerCase());
        });
        console.log("Filtered Results:", result); // Debugging filtered results
    }

    display(result);

    // If the result is empty, clear the box
    if (!result.length) {
        resultsBox.innerHTML = ""; // Clear the result box if no results
        resultsBox.style.display = 'none'; // Hide the result box when no results
    } else {
        resultsBox.style.display = 'block'; // Ensure the result box is visible
    }
});

function display(result) {
    if (result.length) {
        const content = result.map((list) => {
            return `<li class="result-item">${list}</li>`;
        }).join(''); // Join removes the extra comma between items

        resultsBox.innerHTML = `<ul>${content}</ul>`;

        document.querySelectorAll('.result-box').forEach((item)=>{
            item.addEventListener('click',function(){
                inputBox.value=this.textContent;
                resultsBox.innerHTML="";
                resultsBox.style.display="none";
            })
        })
    }
}
const podcasts = [
    {
        id: 0,
        title: 'Ikigai',
        iframe: '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/show/3JpFZV2C7XRKOxAfOOH09h?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
    },
    {
        id: 1,
        title: 'Atomic Habits',
        iframe: '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/6n85fPGHx20CrzKrA9Afkk?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
    },
    {
        id: 2,
        title: 'How to talk to anyone',
        iframe: '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/0XiEeNXjt60KSZSoNy2QPr?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
    },
    {
        id: 3,
        title: 'The story of Indian Startups',
        iframe: '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DWWYU1hafNQFA?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
    },
    {
        id: 4,
        title: 'Money Matters',
        iframe: '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DX00fuhzH2zuj?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
    }
];

// Display all podcasts initially
const categories = [...new Set(podcasts.map((item) => item))];

document.getElementById('search').addEventListener('keyup', (e) => {
    const searchData = e.target.value.toLowerCase();
    
    // Filter podcasts based on search input
    const filteredData = categories.filter((item) => {
        return item.title.toLowerCase().includes(searchData);
    });
    
    displayPodcasts(filteredData); // Display filtered results
});

// Function to display the podcasts
const displayPodcasts = (items) => {
    const podcastList = document.getElementById('podcastList');
    podcastList.innerHTML = items.map((item) => {
        return (
            `<div class='podcast-episode'>
                <h3>${item.title}</h3>
                ${item.iframe}
            </div>`
        );
    }).join('');
};

// Initial display of all podcasts
displayPodcasts(categories);

// Function to trigger voice recognition and handle input
function voice() {
    // Check if the browser supports speech recognition
    if (!('webkitSpeechRecognition' in window)) {
        alert("Your browser does not support speech recognition.");
        return;
    }

    var recognition = new webkitSpeechRecognition();
    recognition.lang = "en-GB"; // You can adjust the language if needed
    recognition.interimResults = false; // To capture only the final result, not intermediate ones
    recognition.maxAlternatives = 1; // To return the most likely result only

    // Event handler for when speech recognition has a result
    recognition.onresult = function (event) {
        console.log(event);
        let voiceInput = event.results[0][0].transcript; // Capture the spoken text
        document.getElementById("search").value = voiceInput; // Set it to the search box

        // Automatically trigger the keyup event to filter the podcasts
        let inputEvent = new Event('keyup');
        inputBox.dispatchEvent(inputEvent); // Trigger the search filter
    };

    recognition.onerror = function (event) {
        console.error("Speech recognition error: ", event.error);
        alert("Error occurred in speech recognition: " + event.error);
    };

    recognition.start(); // Start the speech recognition
}

