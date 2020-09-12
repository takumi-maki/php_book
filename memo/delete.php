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
        if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $statement = $db->prepare('DELETE FROM memos WHERE id=?');
            $statement->execute(array($id));
        }
        
        ?>
        <p>メモが削除されました</p>
        <p><a href="index.php">戻る </a></p>

    </main>
</body>

</html>