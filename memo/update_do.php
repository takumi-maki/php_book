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
        $statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
        $statement->execute(array($_POST['memo'], $_POST['id']));
        ?>
        <p>メモの内容が更新されました</p>
        <p><a href="index.php">戻る</a></p>
    </main>
</body>

</html>