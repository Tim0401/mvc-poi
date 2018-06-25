<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="<?php echo BASEPATH ?>css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form class="col-auto" name="form1" method="post" action="<?php echo BASEPATH ?>index.php/top/view/index">
        <div class="form-group">
            名前：<input class="form-control" type="text" name="name" value="<?php echo h($name); ?>">
        </div>
        <p><?php echo $error['name'] ?></p>
        <div class="form-group">
            電話番号：<input class="form-control" type="text" name="tel" value="<?php echo h($tel); ?>">
        </div>
        <p><?php echo $error['tel'] ?></p>
        <div class="form-group">
            メールアドレス：<input class="form-control" type="text" name="email" value="<?php echo h($email); ?>">
        </div>
        <p><?php echo $error['email'] ?></p>
        <input class="btn btn-primary btn-block" type="submit" name="confirm" value="確認">
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="<?php echo BASEPATH ?>js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>
</html>