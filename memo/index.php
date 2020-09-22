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
        <a href="index.html"><img src="memo.png" alt="memo作成へ" width=50px></a>
    </header>
    <main>


        <?php
        if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        }else {
            $page = 1;
        }

        $start = 5 * ($page - 1);
        $memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ? ,5');
        $memos->bindParam(1, $start, PDO::PARAM_INT);
        $memos->execute();
        ?>
        <article>

            <?php while ($memo = $memos->fetch()): ?>
            <p>
                <?php echo mb_substr($memo['memo'], 0,50); ?>
                <?php echo (mb_strlen($memo['memo']) > 50 ? '...' : '' ); ?>
                <a href="memo.php?id=<?php echo $memo['id']; ?>">
                    <p>詳しくみる</p>
                </a>
            </p>
            <time><?php echo $memo['created_at']; ?></time>
            <hr>
            <?php endwhile; ?>
            <?php if($page >= 2) : ?>
            <a href="index.php?page=<?php echo $page-1; ?> "><?php echo $page - 1; ?> ページ目へ</a>
            <?php endif; ?>
            |
            <?php 
            $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
            $count = $counts->fetch();
            $max_page = ceil($count['cnt'] / 5);
            if($page < $max_page): ?>
            <a href="index.php?page=<?php echo $page + 1; ?> "><?php echo $page + 1; ?> ページ目へ</a>
            <?php endif; ?>
        </article>
        <?php
        #データの挿入
        // $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210,keyword="缶詰,ピンク,甘い", sales=0, created="2020-09-09",modified="2020-09-09"');
        // echo $count. '件のデータを挿入しました。';
        
        #データの削除
        // $count = $db->exec('DELETE FROM my_items WHERE id=6');
        // echo $count . '件削除しました.';
        
        // $records = $db->query('SELECT * FROM my_items');
        // while($record = $records->fetch()) {
        //     echo $record['id']. $record['item_name']."\n";
        // }
        ?>

    </main>
</body>

</html>