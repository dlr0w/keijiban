<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
        mb_internal_encoding("utf8");
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
        $stmt = $pdo->query("select * from 4each_keijiban");
    ?>
    <div><img src="4eachblog_logo.jpg"></div>
    
    <header>    
        <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</
        </ul>
    </header>

    <main>
        <div class = "container">
            <div class ="left">
                <h1>プログラミングに役立つ掲示板</h1>
                <form method="post" action="insert.php">
                    <h2>入力フォーム</h2>
                    <div>
                        <p>ハンドルネーム</p>
                        <input type="text" name="handlename">
                    </div>
                    
                    <div>
                        <p>タイトル</p>
                        <input type="text" name="title">
                    </div>
                    
                    <div>
                    <p>コメント</p>
                    <textarea class="text" rows="7" cols="40" name="comments"></textarea>
                    </div>

                    <div>
                        <input class="sumbit" type="submit" value="投稿する">
                    </div>
                </form>
                
                <?php
                    while($row = $stmt->fetch()) {
                        echo "<div class='box'>";
                            echo "<div class='kiji'>";
                                echo "<h3>".$row['title']."</h3>";
                                echo "<div class='comments'>";
                                    echo $row['comments'];
                                    echo "<div class ='handlename'>posted by".$row['handlename']." </div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";         
                    }
                    
                ?>
            
            </div>

            <div class="right">
                <div class="link">
                    <h2>人気の記事</h2>
                    <ul>
                        <li>PHPオススメ本</li>
                        <li>PHP MyAdminの使い方</li>
                        <li>今人気のエディタTop5</li>
                        <li>HTMLの基礎</li>
                    </ul>
                </div>

                <div class="link">
                <h2>オススメリンク</h2>
                    <ul>
                        <li>インターノウス株式会社</li>
                        <li>XAMPPのダウンロード</li>
                        <li>Eclipseのダウンロード</li>
                        <li>Bracketsのダウンロード</li>
                    </ul>
                </div>

                <div class="link">
                    <h2>カテゴリ</h2>
                    <ul>
                        <li>HTML</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer">
            copyright © internous | 4each blog the which A to Z about programming.
        </div>
    </footer>

</body>
</html>