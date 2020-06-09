<!--<link href="/style/default.css" rel="stylesheet" media="screen" type="text/css" />-->

<!-- <script type="text/javascript" src="/jmeditor/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/jmeditor/JMEditor.js"></script> -->

<!DOCTYPE html>
<html>

<head>

    <!--阻止浏览器缓存-->
    <title><?php echo $this->context->title ?></title>
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache" content="no-cache">
    <!--禁止百度转码-->
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!-- Basic Page Needs
     ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏
    ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面
      ================================================== -->
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="<?php echo $this->context->keywords ?>。">
    <meta name="description" content="<?php echo $this->context->description ?>">
    <link rel="stylesheet" href="https://file.viplgw.cn/ui/book/cn/css/public.css?v=1.0.2">
    <link rel="stylesheet" href="https://file.viplgw.cn/ui/home/cn/css/animate.min.css">
    <link rel="stylesheet" href="https://file.viplgw.cn/ui/home/cn/css/index-3.css?v=2.1.11">
    <script>
        //        百度监控访问数据

    </script>
    <script type="text/javascript" src="https://file.viplgw.cn/ui/home/cn/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://file.viplgw.cn/ui/home/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="https://file.viplgw.cn/ui/book/cn/js/index.js"></script>
</head>

<?=$content?>

</body>
</html>