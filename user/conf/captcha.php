<?php
ob_clean();  //关键代码，防止出现'图像因其本身有错无法显示'的问题。

session_start();
require dirname(preg_replace('@\(.*\(.*$@', '', __FILE__)) . '/ValidateCode.class.php';  //先把类包含进来，实际路径根据实际情况进行修改。
$_vc = new ValidateCode();  //实例化一个对象
$_vc->doimg();  
$_SESSION['authnum_session'] = $_vc->getCode();//验证码保存到SESSION中
?>