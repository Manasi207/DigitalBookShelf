<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bookish</title>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&display=swap" rel="stylesheet">
  
    <script>
        // Set the workerSrc to use the PDF.js worker
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';
    </script>
    
    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    
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
            margin-bottom: 20px; 
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
        }
        .voice-button i {
            font-size: 30px;
            color: rgb(52, 193, 125);
        }
        .modal {
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
        $pdfDirectory = 'path/to/your/pdf/directory/'; // Update this path to where your PDFs are stored
        ?>
        <div class="row" style="margin-top: 24px; justify-content: center;">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $row['coverimage']; ?>" class="card-img-top" alt="<?php echo $row['bookname']; ?>" style="object-fit: fill;height: 200px;">
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['bookname']; ?></p>
                            <p>
                                <!-- View Icon -->
                                <button onclick="viewContent('<?php echo $pdfDirectory . $row['pdffile']; ?>')">
                                    <a class="view-icon"><i class="fas fa-eye"></i></a>
                                </button>
                                <!-- Download Icon with modal trigger -->
                                <button onclick="showModal('<?php echo $row['bookname']; ?>')">
                                    <i class="fas fa-download"></i>
                                </button>
                                <!-- TTS Icon -->
                                <button class="tts-icon" onclick="toggleLanguageDropdown(event, '<?php echo $row['id']; ?>')">
                                    <i class="fas fa-volume-up"></i>
                                </button>
                                <div class="language-dropdown" id="language-dropdown-<?php echo $row['id']; ?>">
                                    <select id="language-select-<?php echo $row['id']; ?>" onchange="selectLanguageAndRead('<?php echo $pdfDirectory . $row['pdffile']; ?>', '<?php echo $row['id']; ?>')">
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
                <form action="SubmitForm.php" method="post">
                    <label for="bookname">Book Name:</label>
                    <input type="text" id="bookname" name="bookname" required readonly> 
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
    </div>
    
    <script>
        function showModal(bookName) {
            document.getElementById('bookname').value = bookName;
            document.getElementById('downloadModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('downloadModal').style.display = 'none';
        }

        function searchFunction() {
            let input = document.getElementById('search-bar').value.toLowerCase();
            let items = document.getElementById('results-list').getElementsByTagName('div');
            for (let i = 0; i < items.length; i++) {
                let bookName = items[i].getElementsByClassName('card-text')[0];
                if (bookName) {
                    let txtValue = bookName.textContent || bookName.innerText;
                    items[i].style.display = txtValue.toLowerCase().indexOf(input) > -1 ? "" : "none";
                }
            }
        }

        function toggleLanguageDropdown(event, bookId) {
            const dropdown = document.getElementById(`language-dropdown-${bookId}`);
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            event.stopPropagation(); // Prevent the event from bubbling up to document
        }

        // Add TTS functionality
        function selectLanguageAndRead(pdfPath, bookId) {
            const selectedLanguage = document.getElementById(`language-select-${bookId}`).value;

            // Use PDF.js to read the PDF and extract text
            pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
                let textContent = '';
                let numPages = pdf.numPages;

                const extractText = (pageNum) => {
                    pdf.getPage(pageNum).then(page => {
                        page.getTextContent().then(text => {
                            text.items.forEach(item => {
                                textContent += item.str + ' ';
                            });

                            if (pageNum < numPages) {
                                extractText(pageNum + 1);
                            } else {
                                // After extracting all text, use SpeechSynthesis to read it
                                speakText(textContent, selectedLanguage);
                            }
                        });
                    });
                };

                extractText(1);
            });
        }

        function speakText(text, language) {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = language;
            speechSynthesis.speak(utterance);
        }

        document.addEventListener('click', function() {
            const dropdowns = document.getElementsByClassName('language-dropdown');
            for (let i = 0; i < dropdowns.length; i++) {
                dropdowns[i].style.display = 'none'; // Hide all dropdowns when clicking outside
            }
        });

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
            window.open(pdfFile, '_blank');
        }
    </script>
</body>
</html>
