<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
#include
$this->title = 'Welcome to Smartlife!';


?>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js"></script>
<script>
new Clipboard('.btn');
</script>


<div class="box box-solid box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Firstly,click to copy username</h3>
          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span> <button id='foo_1' class="btn btn-success btn-flat" data-clipboard-target="#username"><i class="fa fa-file-o"> copy username</i></button></span>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <span>Username:</span>
            <span id="username"><?php 
            if(Yii::$app->user->identity)
                echo(Yii::$app->user->identity->getUsername());
            else
                echo('you hav\'n logined');
?></span>
        </div><!-- /.box-body -->
</div><!-- /.box -->


<div class="box box-solid box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Secondly, connect your device's WiFi , then click the link below.</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <span>After you connect the device's Wifi,click:</span>
            <span>
                <?php 
            if(Yii::$app->user->identity)
                echo '<a href="http://192.168.3.1">click me to your device</a>';
            else
                echo('you hav\'n logined');
                ?>
            </span>
        </div><!-- /.box-body -->
</div><!-- /.box -->
<?php include_once('wsclient.php'); ?>
<input type="button" onclick="wsclient()" value="WSClient"/>

<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
            
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
          
        </div>

    </div>
</div>

    </body>
</html>