<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>Bookshelf</title>
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
            margin:5px;
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
        .card-body button i:hover{
            
            color: white;
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

/* Labels */
label {
    margin: 10px 0 5px;
    font-weight: bold;
    color: var(--charcoal);
}

/* Input Fields */
input[type="text"],
input[type="email"],
input[type="password"],
input[type="file"],
textarea {
    padding: 10px;
    margin: 8px 0;
    border: 1px solid var(--light-gray); /* Light gray border */
    border-radius: 5px;
    transition: border 0.3s;
    font-family: var(--ff-poppins); /* Font style */
}

/* Textarea Specific */
textarea {
    resize: vertical; /* Allow vertical resizing only */
}

/* Focus State */
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="file"]:focus,
textarea:focus {
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
  <body >
    <div class="container" id="results-list">

    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">Motivational</a>
        <form class="d-flex" role="search">
            <!-- Upload Icon -->
            <button type="button" class="btn btn-outline-success" style="margin-right:15px;" onclick="showUploadModal()">
                <i class="fas fa-upload" style="font-size:20px;"></i> 
            </button>
            <input class="form-control me-2" type="search" id="search-bar" onkeyup="searchFunction()" placeholder="Search" aria-label="Search">
            <button type="button" class="voice-button" onclick="startVoiceSearch()"><i class="fa fa-microphone"></i></button>
            <button class="btn btn-outline-success" type="button" onclick="performSearch()">Search</button>
        </form>
    </div>
</nav>


<?php
// Connect to your database
$conn = new mysqli('localhost', 'root', 'root2714', 'bookshelf');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch books from the database

$sql = "SELECT * FROM allbooks";
$result = $conn->query($sql);
?><div class="row" style="margin-top: 24px; justify-content: center;">
<?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $row['coverimage']; ?>" class="card-img-top" alt="<?php echo $row['bookname']; ?>" style="object-fit: fill;height: 185px;">
                <div class="card-body">
                    <p class="card-text"><?php echo $row['bookname']; ?></p>
                    <!-- Add icons for update and delete actions -->
                    <button onclick="showUpdateModal(<?php echo $row['id']; ?>)" class="btn btn-outline-success"><i class="fas fa-edit"></i> Update</button>
                    <button onclick="deleteBook(<?php echo $row['id']; ?>)" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>
</div>


<div id="uploadModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUploadModal()">&times;</span>
        <h2>Upload Book</h2>
        <form action="UploadBook.php" method="post" enctype="multipart/form-data">
            <label for="uploadBookName">Book Name:</label>
            <input type="text" id="uploadBookName" name="bookName" required><br>

            <label for="uploadDescription">Description:</label>
            <textarea id="uploadDescription" name="description" required></textarea><br>

            <label for="uploadPdfFile">Upload PDF:</label>
            <input type="file" id="uploadPdfFile" name="pdfFile" accept=".pdf" required><br>

            <label for="uploadCoverImage">Upload Cover Image:</label>
            <input type="file" id="uploadCoverImage" name="coverImage" accept="image/*" required><br>
        
            <label for="price">Price :</label>
            <input type="text" id="price" name="price" required><br>

            <input type="submit" value="Upload Book">
        </form>
    </div>
</div>






<!-- Update Modal Structure -->

<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUpdateModal()">&times;</span>
        <h2>Update Book</h2>
        <form action="UpdateBook.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="updateBookId" name="bookId">
            
            <label for="updateBookName">Book Name:</label>
            <input type="text" id="updateBookName" name="bookName" required><br>

            <label for="updateDescription">Description:</label>
            <textarea id="updateDescription" name="description" required></textarea><br>

            <label for="updatePdfFile">Upload PDF (optional):</label>
            <input type="file" id="updatePdfFile" name="pdfFile" accept=".pdf"><br>

            <label for="updateCoverImage">Upload Cover Image (optional):</label>
            <input type="file" id="updateCoverImage" name="coverImage" accept="image/*"><br>

            <label for="price">Price :</label>
            <input type="text" id="price" name="price" required><br>


            <input type="submit" value="Update Book">
        </form>
    </div>
</div>

</div>
<script>
function showUploadModal() {
    document.getElementById('uploadModal').style.display = 'block';
}

function closeUploadModal() {
    document.getElementById('uploadModal').style.display = 'none';
}










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

        function deleteBook(bookId) {
    if (confirm('Are you sure you want to delete this book?')) {
        window.location.href = 'DeleteBook.php?id=' + bookId;
    }
}

function showUpdateModal(bookId) {
    // Show the modal for updating
    document.getElementById('updateBookId').value = bookId;
    document.getElementById('updateModal').style.display = 'block';
}

function closeUpdateModal() {
    document.getElementById('updateModal').style.display = 'none';
}

</script>

</body>
</html>

        