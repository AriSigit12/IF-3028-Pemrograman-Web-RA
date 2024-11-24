<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = (int) $_POST['age'];
    $password = trim($_POST['password']);
    $file = $_FILES['file'];

    $errors = [];

    // Validasi input teks
    if (empty($name) || strlen($name) < 3) $errors[] = "Nama harus lebih dari 3 karakter!";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid!";
    if ($age < 18) $errors[] = "Umur harus minimal 18 tahun!";
    if (strlen($password) < 6) $errors[] = "Password harus minimal 6 karakter!";

    // Validasi file
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "File gagal diunggah!";
    } elseif ($file['size'] > 2 * 1024 * 1024) {
        $errors[] = "Ukuran file maksimal 2MB!";
    } elseif (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'txt') {
        $errors[] = "Hanya file .txt yang diperbolehkan!";
    }

    if (!empty($errors)) {
        echo "<h3>Kesalahan:</h3><ul>";
        foreach ($errors as $error) echo "<li>$error</li>";
        echo "</ul>";
        exit;
    }

    // Baca isi file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileData = explode("\n", $fileContent);

    // Simpan data dan alihkan ke result.php
    session_start();
    $_SESSION['data'] = compact('name', 'email', 'age', 'password', 'fileData');
    $_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
    header('Location: result.php');
    exit;
}
?>
