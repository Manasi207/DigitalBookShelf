<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>Bookish</title>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&display=swap" rel="stylesheet">
  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Philosopher' , sans-serif;
            background-color: hsl(20, 43%, 93%);
        }
        .card{
            position: relative; /* Allow absolute positioning for dropdown */
            
            overflow: visible; /* Ensure dropdown is visible */
        }
        .card-text{
            font-size: 20px;
            color:hsl(305, 16%, 42%);
            font-weight: bold;
            text-align: center;
        }
        .card-body p{
            text-align: center;
        }
        .card-body button{
            border: none;
            background: none;
            font-size: 20px;
            
        }
        .card-body i{
            color: rgba(18, 130, 63, 0.63);
        }

        .language-dropdown {
            display: none; /* Initially hidden */
            position: inherit;
            z-index: 2000;
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
        }
        .language-dropdown select {
            margin: 100px 10;
            padding: 5px;
            font-size: 14px;
            width: 100%;
            cursor: pointer;
        }
        .voice-button{
            border: none;
            background:none ;
        }
        .voice-button i {
            font-size: 30px;
            color: rgb(52, 193, 125);
        }
/* Modal Styles */
/* Modal Styles */
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Overlay effect */
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

/* Blur Effect for Background */
.blur {
    filter: blur(5px);
}

    </style> 
</head>
  <body >
    <div class="container" id="results-list">

    
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">Spiritual</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" id="search-bar" onkeyup="searchFunction()" placeholder="Search" aria-label="Search">
                    <button type="button" class="voice-button" onclick="startVoiceSearch()"><i class="fa fa-microphone"></i></button>
                    <button class="btn btn-outline-success" type="button" onclick="performSearch()">Search</button>
                </form>
                <!-- <button onclick="changeFontSize('increase')">+</button>
                <button onclick="changeFontSize('decrease')">-</button> -->
            
            </div>
        </nav>
  
    <div class="row" style="margin-top: 24px; justify-content: center;">

    <div class="col">
    <div class="card" style="width: 18rem;">
        <img src="images/s4.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
        <div class="card-body">
            <p class="card-text">अध्यात्माच्या उंबरठयावार</p>
            <p>
                <!-- View Icon -->
                <button onclick="viewContent()">
                    <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
                </button>
                <!-- Download Icon with modal trigger -->
                <button onclick="showModal('अध्यात्माच्या उंबरठयावार')">
    <i class="fas fa-download"></i>
</button>

                <!-- TTS Icon -->
                <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
                <div class="language-dropdown" id="language-dropdown">
                    <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                        <option value="en-US">English</option>
                        <option value="hi-IN">Hindi</option>
                        <option value="mr-IN">Marathi</option>
                    </select>
                </div>
            </p>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="downloadModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Download Form</h2>
        <form action="SubmitForm.php" method="post">
        <label for="bookname">Book Name:</label>
            <input type="text" id="bookname" name="bookname" required readonly> <!-- Readonly field -->
           
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <label for="paymentid">Payment ID:</label>
            <input type="text" id="paymentid" name="paymentid" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

        
         
    <div class="col">
      <div class="card" style="width: 18rem;">
          <img src="images/s2.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
          <div class="card-body">
              <p class="card-text">Bhagavad Gita</p>
              <p>
                  <button onclick="viewContent()">
                      <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
                  </button>
                  <button onclick="viewContent()">
                      <a class="view-icon" href="books/WT_Pr2.pdf" download="Book1_TheAdventuresOfJohnDoe.pdf"><i class="fas fa-download"></i></a>
                  </button>
                  <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
                  <div class="language-dropdown" id="language-dropdown">
                      <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                          <option value="en-US">English</option>
                          <option value="hi-IN">Hindi</option>
                          <option value="mr-IN">Marathi</option>
                      </select>
                  </div>
              </p>
          </div>
      </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
        <img src="images/s2.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
        <div class="card-body">
            <p class="card-text">Bhagavad Gita</p>
            <p>
                <button onclick="viewContent()">
                    <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
                </button>
                <button onclick="viewContent()">
                    <a class="view-icon" href="books/WT_Pr2.pdf" download="Book1_TheAdventuresOfJohnDoe.pdf"><i class="fas fa-download"></i></a>
                </button>
                <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
                <div class="language-dropdown" id="language-dropdown">
                    <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                        <option value="en-US">English</option>
                        <option value="hi-IN">Hindi</option>
                        <option value="mr-IN">Marathi</option>
                    </select>
                </div>
            </p>
        </div>
    </div>
</div>
<div class="col">
  <div class="card" style="width: 18rem;">
      <img src="images/s3.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
      <div class="card-body">
          <p class="card-text">Myths are real reality </p>
          <p>
              <button onclick="viewContent()">
                  <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
              </button>
              <button onclick="viewContent()">
                  <a class="view-icon" href="books/WT_Pr2.pdf" download="Book1_TheAdventuresOfJohnDoe.pdf"><i class="fas fa-download"></i></a>
              </button>
              <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
              <div class="language-dropdown" id="language-dropdown">
                  <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                      <option value="en-US">English</option>
                      <option value="hi-IN">Hindi</option>
                      <option value="mr-IN">Marathi</option>
                  </select>
              </div>
          </p>
      </div>
  </div>
</div>


  </div>



  <div class="row" style="margin-top: 24px; justify-content: center;">

        
    <div class="col">
      <div class="card" style="width: 18rem;">
          <img src="images/s4.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
          <div class="card-body">
              <p class="card-text">अध्यात्माच्या उंबरठयावार</p>
              <p>
                  <button onclick="viewContent()">
                      <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
                  </button>
                  <button onclick="viewContent()">
                      <a class="view-icon" href="books/WT_Pr2.pdf" download="Book1_TheAdventuresOfJohnDoe.pdf"><i class="fas fa-download"></i></a>
                  </button>
                  <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
                  <div class="language-dropdown" id="language-dropdown">
                      <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                          <option value="en-US">English</option>
                          <option value="hi-IN">Hindi</option>
                          <option value="mr-IN">Marathi</option>
                      </select>
                  </div>
              </p>
          </div>
      </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
        <img src="images/s5.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
        <div class="card-body">
            <p class="card-text">Spiritual Anatomy</p>
            <p>
                <button onclick="viewContent()">
                    <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
                </button>
                <button onclick="viewContent()">
                    <a class="view-icon" href="books/WT_Pr2.pdf" download="Book1_TheAdventuresOfJohnDoe.pdf"><i class="fas fa-download"></i></a>
                </button>
                <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
                <div class="language-dropdown" id="language-dropdown">
                    <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                        <option value="en-US">English</option>
                        <option value="hi-IN">Hindi</option>
                        <option value="mr-IN">Marathi</option>
                    </select>
                </div>
            </p>
        </div>
    </div>
</div>
<div class="col">
  <div class="card" style="width: 18rem;">
      <img src="images/s3.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
      <div class="card-body">
          <p class="card-text">Myths are real reality</p>
          <p>
              <button onclick="viewContent()">
                  <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
              </button>
              <button onclick="viewContent()">
                  <a class="view-icon" href="books/WT_Pr2.pdf" download="Book1_TheAdventuresOfJohnDoe.pdf"><i class="fas fa-download"></i></a>
              </button>
              <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
              <div class="language-dropdown" id="language-dropdown">
                  <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                      <option value="en-US">English</option>
                      <option value="hi-IN">Hindi</option>
                      <option value="mr-IN">Marathi</option>
                  </select>
              </div>
          </p>
      </div>
  </div>
</div>
<div class="col">
<div class="card" style="width: 18rem;">
    <img src="images/s2.png" class="card-img-top" alt="..." style="object-fit: fill;height: 200px;">
    <div class="card-body">
        <p class="card-text">Bhagavad Gita</p>
        <p>
            <button onclick="viewContent()">
                <a class="view-icon" href="books/WT_Pr2.pdf"><i class="fas fa-eye"></i></a>
            </button>
            <button onclick="viewContent()">
                <a class="view-icon" href="books/WT_Pr2.pdf" download="Book1_TheAdventuresOfJohnDoe.pdf"><i class="fas fa-download"></i></a>
            </button>
            <button class="tts-icon" onclick="toggleLanguageDropdown(event)"><i class="fas fa-volume-up"></i></button>
            <div class="language-dropdown" id="language-dropdown">
                <select id="language-select" onchange="selectLanguageAndRead('books/WT_Pr2.pdf')">
                    <option value="en-US">English</option>
                    <option value="hi-IN">Hindi</option>
                    <option value="mr-IN">Marathi</option>
                </select>
            </div>
        </p>
    </div>
</div>
</div>


</div>
        
                    </div>


        </div>
     
        
    
    
    <script>
    //    function readPDF(pdfUrl) {
    //         const loadingTask = pdfjsLib.getDocument(pdfUrl);
    //         loadingTask.promise.then(pdf => {
    //             let textContent = '';

    //             // Read the first page (you can modify this to read more pages if needed)
    //             pdf.getPage(1).then(page => {
    //                 return page.getTextContent();
    //             }).then(text => {
    //                 text.items.forEach(item => {
    //                     textContent += item.str + ' '; // Concatenate text strings
    //                 });

    //                 // Use Web Speech API for TTS
    //                 const utterance = new SpeechSynthesisUtterance(textContent);
    //                 window.speechSynthesis.speak(utterance);
    //             });
    //         }).catch(error => {
    //             console.error('Error loading PDF:', error);
    //         });
    //     }
//     let voices = [];

// // Load available voices
// function loadVoices() {
//     voices = speechSynthesis.getVoices();
//     const languageSelect = document.getElementById('language-select');

//     // Clear existing options
//     languageSelect.innerHTML = '';

//     // Populate the dropdown with available voices
//     voices.forEach(voice => {
//         const option = document.createElement('option');
//         option.value = voice.lang;
//         option.textContent = voice.name + ' (' + voice.lang + ')';
//         languageSelect.appendChild(option);
//     });
// }

// // Show/hide the language dropdown
// function toggleLanguageDropdown() {
//     const languageSelect = document.getElementById('language-select');
//     languageSelect.style.display = languageSelect.style.display === 'none' || languageSelect.style.display === '' ? 'block' : 'none';
//     loadVoices(); // Load voices when dropdown is shown
// }
//             // Read PDF and speak text in selected language
//         function readPDF(pdfUrl) {
//             const loadingTask = pdfjsLib.getDocument(pdfUrl);
//             loadingTask.promise.then(pdf => {
//                 let textContent = '';

//                 // Read the first page (you can modify this to read more pages if needed)
//                 pdf.getPage(1).then(page => {
//                     return page.getTextContent();
//                 }).then(text => {
//                     text.items.forEach(item => {
//                         textContent += item.str + ' '; // Concatenate text strings
//                     });

//                     // Use Web Speech API for TTS
//                     const utterance = new SpeechSynthesisUtterance(textContent);
//                     const selectedLanguage = document.getElementById('language-select').value;

//                     // Find the voice that matches the selected language
//                     const selectedVoice = voices.find(voice => voice.lang === selectedLanguage);
//                     if (selectedVoice) {
//                         utterance.voice = selectedVoice; // Set the voice
//                     }

//                     // Speak the text
//                     window.speechSynthesis.speak(utterance);
//                 });
//             }).catch(error => {
//                 console.error('Error loading PDF:', error);
//             });
//         }


// function changeFontSize(action) {
//             const body = document.body;
//             let currentFontSize = parseFloat(window.getComputedStyle(body).fontSize);
//             if (action === 'increase') {
//                 body.style.fontSize = (currentFontSize + 1) + 'px';
//             } else if (action === 'decrease') {
//                 body.style.fontSize = (currentFontSize - 1) + 'px';
//             }
//         }


let voices = [];

// Load available voices
function loadVoices() {
    voices = speechSynthesis.getVoices();
    if (voices.length > 0) {
        window.speechSynthesis.onvoiceschanged = null; // Stop reloading voices
    }
}

// Show/hide the language dropdown
function toggleLanguageDropdown(event) {
    const dropdown = document.getElementById('language-dropdown');
    dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
    loadVoices();
}

// Select language and read PDF
function selectLanguageAndRead(pdfUrl) {
    const dropdown = document.getElementById('language-dropdown');
    dropdown.style.display = 'none'; // Hide the dropdown after selection
    readPDF(pdfUrl);
}

// Read PDF and speak text in the selected language
function readPDF(pdfUrl) {
    const loadingTask = pdfjsLib.getDocument(pdfUrl);
    loadingTask.promise.then(pdf => {
        let textContent = '';

        pdf.getPage(1).then(page => {
            return page.getTextContent();
        }).then(text => {
            text.items.forEach(item => {
                textContent += item.str + ' '; // Concatenate text strings
            });

            const utterance = new SpeechSynthesisUtterance(textContent);
            const selectedLanguage = document.getElementById('language-select').value;

            // Find the voice that matches the selected language
            const selectedVoice = voices.find(voice => voice.lang === selectedLanguage) || voices.find(voice => voice.lang === 'en-US'); // Fallback to English
            if (selectedVoice) {
                utterance.voice = selectedVoice; // Set the voice
            }

            // Speak the text
            window.speechSynthesis.speak(utterance);
        });
    }).catch(error => {
        console.error('Error loading PDF:', error);
    });
}

// Load voices when the page is ready
window.speechSynthesis.onvoiceschanged = loadVoices;

       


        // Function to search through the list
        function searchFunction() {
          // Get the value of the input field
          let input = document.getElementById('search-bar').value.toLowerCase();
          
          // Get the list of items
          let items = document.getElementById('results-list').getElementsByTagName('div');
          
          // Loop through the list and hide/show items based on search query
          for (let i = 0; i < items.length; i++) {
            let itemText = items[i].textContent || items[i].innerText;
            if (itemText.toLowerCase().indexOf(input) > -1) {
              items[i].style.display = "";
            } else {
              items[i].style.display = "none";
            }
          }
        }
        function performSearch() {
            const searchQuery = document.getElementById('search-bar').value;
            alert('You searched for: ' + searchQuery);
        }
        function startVoiceSearch() {
            if ('webkitSpeechRecognition' in window) {
                const recognition = new webkitSpeechRecognition();
                recognition.lang = 'en-US'; // Change this to your desired language
                recognition.continuous = false;
                recognition.interimResults = false;

                recognition.onstart = function() {
                    console.log('Voice recognition started. Speak now...');
                };

                recognition.onresult = function(event) {
                    const transcript = event.results[0][0].transcript;
                    document.getElementById('search-bar').value = transcript; // Set the recognized text in search bar
                    console.log('Recognized text:', transcript);
                    performSearch(); // Automatically perform search
                };

                recognition.onerror = function(event) {
                    console.error('Voice search error:', event.error);
                    alert('Voice search error: ' + event.error);
                };

                recognition.onend = function() {
                    console.log('Voice recognition ended.');
                };

                recognition.start(); // Start the speech recognition
            } else {
                alert('Voice search is not supported in this browser. Please use Chrome or any modern browser.');
            }
        }














        // Function to show the modal and blur the background
       // Function to show the modal and blur the background
      // Function to show the modal and blur the background
function showModal(bookName) {
    // Set the book name in the input field of the modal
    document.getElementById('bookname').value = bookName; // Assuming you have an input with id 'bookname'
    
    // Display the modal
    document.getElementById('downloadModal').style.display = 'block';
    
    // Add blur effect to the background
    document.querySelector('.col').classList.add('blur');
}

// Function to close the modal and remove the blur effect
function closeModal() {
    // Hide the modal
    document.getElementById('downloadModal').style.display = 'none';
    
    // Remove blur effect from the background
    document.querySelector('.col').classList.remove('blur');
}



// Function to close the modal and remove the blur effect
function closeModal() {
    document.getElementById('downloadModal').style.display = 'none';
    document.querySelector('.col').classList.remove('blur');
}



      </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
</body>
</html>