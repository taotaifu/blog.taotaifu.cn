<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/blog_taotaifu_cn/public/../application/admin/view/login/login.html";i:1547566253;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/static/admin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
	<link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <section class="">
        <div class="message">x-admin2.0-管理登录</div>
        <div id="darkbannerwrap"></div>
        <form method="post" class="layui-form" action="">
            <input name="admin_username" placeholder="用户名"  type="text" lay-verify="" class="layui-input" >
            <hr class="hr15">
            <input name="admin_password" lay-verify="" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src=this.src+'?'+Math.random()" />
            <input name="code" placeholder="验证码"  type="text" lay-verify="" class="layui-input" >
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
       </section>
    </div>

    <!--<script>-->
        <!--$(function  () {-->
            <!--layui.use('form', function(){-->
              <!--var form = layui.form;-->
              <!--// layer.msg('玩命卖萌中', function(){-->
              <!--//   //关闭后的操作-->
              <!--//   });-->
              <!--//监听提交-->
              <!--form.on('submit(login)', function(data){-->
                <!--// alert(888)-->
                <!--layer.msg(JSON.stringify(data.field),function(){-->
                    <!--location.href='index.html'-->
                <!--});-->
                <!--return false;-->
              <!--});-->
            <!--});-->
        <!--})-->

        <!---->
    <!--</script>-->
</body>
</html>