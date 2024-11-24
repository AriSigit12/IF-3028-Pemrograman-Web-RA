<?php
session_start();
if (!isset($_SESSION['data'])) {
    header('Location: form.php');
    exit;
}

$data = $_SESSION['data'];
$browser = $_SESSION['browser'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table border="1">
        <tr><th>Nama</th><td><?= htmlspecialchars($data['name']) ?></td></tr>
        <tr><th>Email</th><td><?= htmlspecialchars($data['email']) ?></td></tr>
        <tr><th>Umur</th><td><?= htmlspecialchars($data['age']) ?></td></tr>
        <tr><th>Browser</th><td><?= htmlspecialchars($browser) ?></td></tr>
    </table>

    <h2>Isi File:</h2>
    <table border="1">
        <tr><th>Baris</th><th>Isi</th></tr>
        <?php foreach ($data['fileData'] as $index => $line): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
