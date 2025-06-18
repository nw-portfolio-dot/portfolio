<?php
// メール送信先
$to = "natsuki.wada15@gmail.com";

// POSTデータの受け取り
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$message = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");

// メール件名
$subject = "お問い合わせが届きました";

// メール本文
$body = <<<EOT
以下の内容でお問い合わせが届きました。

お名前: $name
メールアドレス: $email

メッセージ:
$message
EOT;

// メールヘッダー
$headers = "From: $email";

// メール送信
if (mail($to, $subject, $body, $headers)) {
    echo "<p>送信が完了しました。ありがとうございました。</p>";
    echo '<p><a href="contact.html">戻る</a></p>';
} else {
    echo "<p>送信に失敗しました。後ほどお試しください。</p>";
    echo '<p><a href="contact.html">戻る</a></p>';
}
?>