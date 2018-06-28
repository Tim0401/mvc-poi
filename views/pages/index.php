<?php require_once(APPPATH . "views/template/header.php"); ?>

    <h1><?php echo $title ?></h1>



<div id = "player" >
    <video id="my-video" class="video-js" controls preload="auto" width="640" height="360"data-setup="{}">
        <source src="<?php echo MOVIEPATH ?>stream/stream.m3u8" type='application/x-mpegurl'>
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
</div>

    <script src="https://vjs.zencdn.net/7.0.3/video.js"></script>
    <script src="<?php echo BASEPATH ?>js/videojs-contrib-hls.min.js"></script>

    <script>

        videojs("my-video").ready(function(){
            var player = this;
            console.log(player);
            player.play();//自動再生

            $("#ctime").click(function(){
                //current time
                var t=player.currentTime();
                alert("current TIme is "+t +" seconds!");
            });

            $("#gtime").click(function(){
                //先頭から10秒目に移動
                player.currentTime(10);
            });

            $("#next").click(function(){
                //+10秒進む
                var t=player.currentTime();
                player.currentTime(t+10);

            });

            $("#prev").click(function(){
                //-10秒戻る
                var t=player.currentTime();
                player.currentTime(t-10);
            });
            $("#change").click(function(){
                //動画変更
                player.src('<?php echo MOVIEPATH ?>test2.mp4');
            });
        });
    </script>
    <h3>クリックしてください↓</h3>
    <p id="ctime">current time</p>
    <p id="gtime">先頭から10秒目に移動</p>
    <p id="next">+10秒進む</p>
    <p id="prev">-10秒戻る</p>
    <p id="change">動画変更</p>
<?php require_once(APPPATH . "views/template/footer.php"); ?>