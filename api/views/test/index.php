<?php
api\assets\AppAsset::register($this);
$this->context->layout = false;
phpinfo();

?>

<?php $this->beginPage() ?> <-- 必需 -->
<html>

<-- 视图代码块 -->

<body>
<?php $this->beginBody() ?> <-- 必需 -->

<-- 视图代码块 -->

<?php $this->endBody() ?> <-- 必需 -->
</body>
</html>
<?php $this->endPage() ?> <-- 必需 -->
