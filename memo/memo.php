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
        
        $id = $_REQUEST['id'];
        if(!is_numeric($id) || $id <= 0) {
            echo '1以上の数字で指定してください';
            exit();
        }

        $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
        $memos->execute(array($_REQUEST['id']));
        $memo = $memos->fetch();   
        ?>
        <article>
            <pre><?php echo $memo['memo']; ?></pre>
            <a href="update.php?id=<?php echo $memo['id']; ?>">編集する</a>
            |
            <a href="delete.php?id=<?php echo $memo['id']; ?>">削除する</a>
            |
            <a href="index.php">戻る</a>
        </article>


    </main>
</body>

</html>