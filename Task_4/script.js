document.getElementById('registrationForm').addEventListener('submit', function (e) {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];

    if (!file) {
        alert("File harus diunggah!");
        e.preventDefault();
        return;
    }

    if (file.size > 2 * 1024 * 1024) { // 2MB limit
        alert("Ukuran file maksimal 2MB!");
        e.preventDefault();
        return;
    }

    if (!file.name.endsWith('.txt')) {
        alert("Hanya file .txt yang diperbolehkan!");
        e.preventDefault();
    }
});
