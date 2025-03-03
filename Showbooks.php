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
?>

<div class="row" style="margin-top: 24px; justify-content: center;">
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="path/to/cover_images/<?php echo $row['pdffile']; ?>" class="card-img-top" alt="<?php echo $row['bookname']; ?>" style="object-fit: fill;height: 200px;">
                    <div class="card-body">
                        <p class="card-text"><?php echo $row['bookname']; ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No books found.</p>
    <?php endif; ?>
</div>
