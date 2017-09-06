<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Self Devourer</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../../plugin/responsive-nav/responsive-nav.css">
        <link rel="stylesheet" href="../../../../plugin/responsive-nav/styles.css">
        <link rel="stylesheet" href="../../../../global/styles.css">
        <style>
            .blog-content {
                font-size: 15px;
                line-height: 180%;
            }
            hr {
                border: 1px solid #eee;
            }
            blockquote {
                padding: 3px 20px;
                margin: 8px 5px;
            }
            blockquote p {
                float: none;
                font-size: 15px;
                color: #999999;
            }
            @media (min-width: 768px) { 
                .col-lg-11{
                    border: 1px solid LightGrey;
                } 
                .blog-content {
                    padding: 40px 40px;
                }
            }
            pre {
                padding: 8px 9.5px;
                margin: 1em 0px;
                word-break: keep-all;
            }
        </style>
    </head>
    <body>
        <div role="navigation" id="nav" class="nav-collapse">
            <ul>
                <li>
                    <a href="../../../../index.php">博客</a>
                </li> 
                <li class="active">
                    <a href="../../../../technology_blog.php">技术博客</a>
                </li>
                <li>
                    <a href="../../../../timeline.php">Timline</a>
                </li>
                <li>
                    <a href="#about">联系</a>
                </li>
            </ul>
        </div>
        <div role="main" class="main">
            <a href="#nav" class="nav-toggle" style="z-index: 1;">Menu</a>
            <div class="container-fluid">
                <div class="row" id="blog">
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-offset-1 col-lg-11">
                        <div class="blog-content">
                            <h1>Maven安装和配置</h1><hr>
                            <h4>系统的Maven安装和配置</h4>
                            <p>  Maven下载地址：<a href="http://mirrors.hust.edu.cn/apache/maven/maven-3/" title="http://mirrors.hust.edu.cn/apache/maven/maven-3/" target="_blank">http://mirrors.hust.edu.cn/apache/maven/maven-3/</a>，选择合适版本下载至本地后解压至安装路径，我的安装路径是：<strong>D:\Tools\Maven</strong>。<br>
  配置Maven环境变量：MAVEN_HOME系统变量和Path用户变量：
                            <div class="img-rounded col-lg-6"><img src="http://selfdevourer.org/images/MAVEN_HOME.png"></div>
                            <div class="img-rounded col-lg-6"><img src="http://selfdevourer.org/images/Path.png"></div>
                            <br>
  确定变量配置完成后，打开命令行输入：<code>mvn -version</code>，如果能输出Maven版本号和操作系统信息则说明配置完成：<div class="img-rounded"><img src="http://selfdevourer.org/images/Maven-version-and-system-infomation.png"></div><br>
  Maven仓库默认创建在 <code>%USER_HOME%/.m2/repository</code>, 修改默认仓库需要打开 <code>%MAVEN_HOME%/conf/setting.xml</code>：<div class="col-lg-11"><img class="img-rounded" src="http://selfdevourer.org/images/Maven-new-local-repository.png"></div><br>
  在&nbsp;<code>&lt;setting&gt;</code>&nbsp;后添加&nbsp;<code>&lt;localRepository&gt;</code>&nbsp;，输入新仓库路径后完成修改。<br>
  确定默认仓库修改完成后，打开命令行输入：<code>mvn help:system</code>，会从远程服务器下载依赖文件。  
                            </p>
                            <h4>Eclipse的Maven安装和配置</h4>
                            <p>  在线安装Maven插件，打开&nbsp;<code>Help -&gt; Install New Software...</code>，点击&nbsp;<code>Add..</code>&nbsp;输入插件地址：<a href="http://m2eclipse.sonatype.org/sites/m2e" title="http://m2eclipse.sonatype.org/sites/m2e" target="_blank">http://m2eclipse.sonatype.org/sites/m2e</a>。<br>
  打开&nbsp;<code>Window -&gt; Preferences</code>，如果能看到&nbsp;<code>Maven</code>&nbsp;，说明安装完成。<br>
  Eclipse与本地Maven对接，打开&nbsp;<code>Installations -&gt; Add... -&gt; Directory...</code>，选择至本地Maven的安装路径：<div class="img-rounded"><img src="http://selfdevourer.org/images/Eclipse-Maven-Installations.png"></div><br>
  Eclipse的Maven仓库与本地Maven仓库对接，打开&nbsp;<code>User Settings</code>，点击&nbsp;<code>User Settings</code>的&nbsp;<code>Browse...</code>，选择本地Maven的setting.xml，这样Eclipse的Maven仓库就换成了自己选择的Maven仓库：<div class="img-rounded"><img src="http://selfdevourer.org/images/Eclipse-local-repository.png"></div></p>
                        </div>    
                    </div>
                </div>
            </div>
            <script src="../../../../plugin/responsive-nav/responsive-nav.min.js"></script>
            <!-- <script src="plugin/responsive-nav/responsive-nav.js"></script> -->
            <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                var navigation = responsiveNav("nav", {
                    customToggle: ".nav-toggle"
                });
                $(function () {
                    $('#nav a').click(function () {
                        $(this).parent().addClass('active').siblings().removeClass('active');
                        var height = $($(this).attr('href')).offset().top - 290;
                        $('body').animate({
                            scrollTop: height
                        }, 248);
                        return false;
                    });
                })
            </script>
    </body>
</html>
