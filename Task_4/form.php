<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Form Pendaftaran</h1>
    <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="age">Umur:</label>
        <input type="number" id="age" name="age" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" minlength="6" required>
        
        <label for="file">Upload File:</label>
        <input type="file" id="file" name="file" accept=".txt" required>
        
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
