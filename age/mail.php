<?php 
$email = 'assistant2370@gmail.com';
mb_language('japanese');
mb_internal_encoding('UTF-8');
$from = 'tontontonwasinton@yahoo.co.jp';
$subject = 'よくわかるPHPの教科書';
$body = 'このメールは「よくわかるPHPの教科書」から送信しています。';
$success = mb_send_mail($email, $subject, $body, 'From: '. $from);
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initia-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css">

    <title>よくわかるPHPの教科書 mail</title>
</head>

<body>
    <header>
        <h1 class="font-weight-normal">よくわかるPHPの教科書 mail</h1>
    </header>
    <main>
        <h2>Practice<h2>
                <pre>
        <?php if ($success) : ?>
            電子メールを送信しました。メールを確認ください。
        <?php else : ?>
            電子メールの送信に失敗しました。残念です。
        <?php endif; ?>
        </pre>
    </main>
</body>

</html>