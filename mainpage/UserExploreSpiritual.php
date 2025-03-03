<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookish</title>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        // Set the workerSrc to use the PDF.js worker
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';
    </script>

    <!-- Other Scripts and Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    
 

    <style>
        body {
            font-family: 'Philosopher', sans-serif;
            background-color: hsl(20, 43%, 93%);
        }
        .card {
            position: relative; 
            overflow: visible; 
            margin-bottom: 10px; 
        }
        .card-text {
            font-size: 20px;
            color: hsl(305, 16%, 42%);
            font-weight: bold;
            text-align: center;
        }
        .card-body p {
            text-align: center;
        }
        .card-body button {
            border: none;
            background: none;
            font-size: 20px;
        }
        .card-body i {
            color: rgba(18, 130, 63, 0.63);
        }
        .language-dropdown {
            display: none; 
            position: inherit;
            z-index: 2000;
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
        }
        .language-dropdown select {
            padding: 5px;
            font-size: 14px;
            width: 100%;
            cursor: pointer;
        }
        .voice-button {
            border: none;
            background: none;
            size
        }
        .voice-button i {
            font-size: 30px;
            color: rgb(52, 193, 125);
         }
       /* .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0, 0, 0, 0.4); 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        } */
       
    .mic {
        cursor: pointer;
        margin-left: 5px;
        font-size: 27px; /* Increase icon size */
    }

        :root {
    --chinese-violet_30: hsla(304, 14%, 46%, 0.3);
    --chinese-violet: hsl(304, 14%, 46%);
    --sonic-silver: hsl(208, 7%, 46%);
    --old-rose_30: hsla(357, 37%, 62%, 0.3);
    --ghost-white: hsl(233, 33%, 95%);
    --light-pink: hsl(357, 93%, 84%);
    --light-gray: hsl(0, 0%, 80%);
    --old-rose: hsl(357, 32%, 56%);
    --seashell: hsl(20, 43%, 93%);
    --charcoal: hsl(203, 30%, 26%);
    --white: hsl(0, 0%, 100%);
    --ff-philosopher: 'Philosopher', sans-serif;
    --ff-poppins: 'Poppins', sans-serif;
}

/* Modal Background */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
    transition: opacity 0.3s; /* Smooth transition */
}

/* Modal Content */
.modal-content {
    background-color: var(--ghost-white); /* Use the ghost white color */
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid var(--chinese-violet); /* Border using Chinese violet */
    width: 90%; /* Could be more or less, depending on screen size */
    max-width: 600px; /* Maximum width */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
    animation: fadeIn 0.5s; /* Fade-in animation */
}

/* Close Button */
.close {
    color: var(--sonic-silver); /* Sonic silver color */
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: var(--charcoal); /* Darker color on hover */
    text-decoration: none;
}

/* Modal Heading */
h2 {
    color: var(--old-rose); /* Old rose color for headings */
    font-family: var(--ff-philosopher); /* Font style */
}

/* Form Styling */
.modal form {
    display: flex;
    flex-direction: column;
}

/* Input Fields */
input[type="text"],
input[type="email"],
input[type="password"] {
    padding: 10px;
    
    margin-right: 48px;
    border: 1px solid var(--light-gray); /* Light gray border */
    border-radius: 5px;
    transition: border 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border: 1px solid var(--chinese-violet); /* Change border color on focus */
}

/* Submit Button */
input[type="submit"] {
    background-color: var(--old-rose); /* Use the old rose color */
    color: var(--white);
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: var(--chinese-violet); /* Darker shade on hover */
}

/* Fade-in animation */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

    </style>
</head>
<body>
    <div class="container" id="results-list">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">Spiritual</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" id="search-bar" onkeyup="searchFunction()" placeholder="Search" aria-label="Search">
                    <button type="button" class="voice-button" onclick="startVoiceSearch()"><i class="fa fa-microphone"></i></button>
                    <button class="btn btn-outline-success" type="button" onclick="performSearch()">Search</button>
                </form>
            </div>
        </nav>

        <?php
        $conn = new mysqli('localhost', 'root', 'root2714', 'bookshelf');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM allbooks";
        $result = $conn->query($sql);
        ?>
        <div class="row" style="margin-top: 24px; justify-content: center;">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['coverimage']; ?>" class="card-img-top" alt="<?php echo $row['bookname']; ?>" style="object-fit: fill;height: 185px;">
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['bookname']; ?></p>
                            <p>
                                <!-- View Icon -->
                                <button onclick="viewContent('<?php echo $row['pdffile']; ?>')">
                                    <a class="view-icon"><i class="fas fa-eye"></i></a>
                                </button>
                                <!-- Download Icon with modal trigger -->
                                <button onclick="showModal('<?php echo $row['bookname']; ?>','<?php echo $row['price']; ?>')">
                                    <i class="fas fa-download"></i>
                                </button>
                                <!-- TTS Icon -->
                                <button class="tts-icon" onclick="toggleLanguageDropdown(event, '<?php echo $row['id']; ?>')">
                                    <i class="fas fa-volume-up"></i>
                                </button>
                                <div class="language-dropdown" id="language-dropdown-<?php echo $row['id']; ?>">
                                    <select id="language-select-<?php echo $row['id']; ?>" onchange="selectLanguageAndRead('<?php echo $row['pdffile']; ?>', '<?php echo $row['id']; ?>')">
                                        <option value="en-US">English</option>
                                        <option value="hi-IN">Hindi</option>
                                        <option value="mr-IN">Marathi</option>
                                    </select>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No books found.</p>
            <?php endif; ?>
        </div>
        
        <!-- Modal Structure -->
        <div id="downloadModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Download Form</h2>
        <form action="SubmitForm.php" method="post" class="df">

            <label for="bookname">Book Name:</label>
            <input type="text" id="bookname" name="bookname" required readonly> 
            <span class="mic" onclick="startRecognition('bookname')">🎤</span> <!-- Microphone Icon -->

            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            <span class="mic" onclick="startRecognition('fullname')">🎤</span> <!-- Microphone Icon -->

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="mic" onclick="startRecognition('email')">🎤</span> <!-- Microphone Icon -->

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="mic" onclick="startRecognition('password')">🎤</span> <!-- Microphone Icon -->

            <label for="paymentid">Payment ID:</label>
            <input type="text" id="paymentid" name="paymentid" required>
            <span class="mic" onclick="startRecognition('paymentid')">🎤</span> <!-- Microphone Icon -->
            
            <label for="price">Price (Rs.):</label>
            <input type="text" id="price" name="price" required>
            <span class="mic" onclick="startRecognition('price')">🎤</span> <!-- Microphone Icon -->


            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<script>
function startRecognition(inputId) {
    // Check if the browser supports speech recognition
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (!SpeechRecognition) {
        alert("Speech Recognition not supported in this browser.");
        return;
    }

    const recognition = new SpeechRecognition();
    recognition.lang = 'en-US'; // Set language to English

    // Start speech recognition
    recognition.start();

    // When speech is detected
    recognition.onresult = function(event) {
        const spokenText = event.results[0][0].transcript; // Get the spoken text
        document.getElementById(inputId).value += spokenText; // Append text to the input field
    };

    // Handle any errors
    recognition.onerror = function(event) {
        console.error("Speech recognition error:", event.error);
    };
}
</script>





    </div>
    
    <script>







function toggleLanguageDropdown(event, id) {
        event.stopPropagation();
        const dropdown = document.getElementById('language-dropdown-' + id);
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    function selectLanguageAndRead(pdfFile, id) {
        const languageSelect = document.getElementById('language-select-' + id);
        const selectedLanguage = languageSelect.value;
        readPDFAndSpeak(pdfFile, selectedLanguage);
    }

    function readPDFAndSpeak(pdfFile, language) {
        const baseUrl = 'http://localhost/Mini%20Project/'; 
        const fullPath = baseUrl + pdfFile;

        pdfjsLib.getDocument(fullPath).promise.then(function (pdf) {
            let totalPages = pdf.numPages;
            let textPromises = [];

            for (let pageIndex = 1; pageIndex <= totalPages; pageIndex++) {
                textPromises.push(
                    pdf.getPage(pageIndex).then(function (page) {
                        return page.getTextContent().then(function (textContent) {
                            let pageText = textContent.items.map(item => item.str).join(' ');
                            return pageText;
                        });
                    })
                );
            }

            Promise.all(textPromises).then(function (pagesText) {
                let fullText = pagesText.join(' ');

                if (fullText.trim() === '') {
                    alert('No text found in the PDF to read.');
                    return;
                }

                let utterance = new SpeechSynthesisUtterance(fullText);
                utterance.lang = language || 'en-US'; // Default to 'en-US' if no language selected
                speechSynthesis.speak(utterance);
            });
        }).catch(function (error) {
            console.error('Error reading the PDF:', error);
        });
    }

    // Event listener to close the language dropdown when clicking outside
    document.addEventListener('click', function (event) {
        const dropdowns = document.querySelectorAll('.language-dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    });





            function showModal(bookName,price) {
                document.getElementById('bookname').value = bookName;
                document.getElementById('price').value = price;
                document.getElementById('downloadModal').style.display = 'block';
            }

            function closeModal() {
                document.getElementById('downloadModal').style.display = 'none';
            }

            function searchFunction() {
                let input = document.getElementById('search-bar').value.toLowerCase();
                let items = document.getElementById('results-list').getElementsByTagName('div');
                for (let i = 0; i < items.length; i++) {
                    let itemText = items[i].textContent || items[i].innerText;
                    items[i].style.display = itemText.toLowerCase().indexOf(input) > -1 ? "" : "none";
                }
            }

            function startVoiceSearch() {
                let recognition = new window.webkitSpeechRecognition();
                recognition.lang = "en-US";
                recognition.onresult = function(event) {
                    document.getElementById("search-bar").value = event.results[0][0].transcript;
                    searchFunction();
                };
                recognition.start();
            }

            function viewContent(pdfFile) {
                const baseUrl = 'http://localhost/Mini%20Project/'; 
                const fullPath = baseUrl + pdfFile; 
                window.open(fullPath, '_blank');
            }

            // function readPDFAndSpeak(pdfFile) {
            //     pdfjsLib.getDocument(pdfFile).promise.then(function(pdf) {
            //         let totalPages = pdf.numPages;
            //         let textPromises = [];

            //         for (let pageIndex = 1; pageIndex <= totalPages; pageIndex++) {
            //             textPromises.push(
            //                 pdf.getPage(pageIndex).then(function(page) {
            //                     return page.getTextContent().then(function(textContent) {
            //                         let pageText = textContent.items.map(item => item.str).join(' ');
            //                         return pageText;
            //                     });
            //                 })
            //             );
            //         }

            //         Promise.all(textPromises).then(function(pagesText) {
            //             let fullText = pagesText.join(' ');

            //             if (fullText.trim() === '') {
            //                 alert('No text found in the PDF to read.');
            //                 return;
            //             }

            //             let utterance = new SpeechSynthesisUtterance(fullText);
            //             utterance.lang = 'en-US'; // Default language
            //             speechSynthesis.speak(utterance);
            //         });
            //     });
            // }
        </script>


</body>
</html>
