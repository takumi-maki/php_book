<?php require('dbconnect.php'); ?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initia-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css">

    <title>memo</title>
</head>

<body>
    <header>
        <h1 class="font-weight-normal">memo</h1>
    </header>

    <main>

        <?php
        $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
        $statement->execute(array($_POST['memo']));
        echo 'メモの内容が登録されました';
        ?>
        <br>
        <a href="index.php">メモ一覧へ</a>

    </main>
</body>

</html>