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
        <link rel="stylesheet" href="plugin/responsive-nav/responsive-nav.css">
        <link rel="stylesheet" href="plugin/responsive-nav/styles.css">
        <link rel="stylesheet" href="global/styles.css">
    </head>
    <body>
        <div role="navigation" id="nav" class="nav-collapse">
            <ul>
                <li class="active">
                    <a href="index.php">博客</a>
                </li>
                <li>
                    <a href="technology_blog.php">技术博客</a>
                </li>
                <li>
                    <a href="timeline.php">Timline</a>
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
                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-offset-3 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Blog</div>
                            <div class="list-group">
                                <a href="cn/2016/08/01/Writer_And_Poet.php" class="list-group-item">文学家和诗人</a>
                            </div>
                            <div class="list-group">
                                <a href="cn/2016/07/18/Pelops_Family_History.php" class="list-group-item">Pelops家族史</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $ip = $_SERVER["REMOTE_ADDR"];

                function GetIp() {
                    $realip = '';
                    $unknown = 'unknown';
                    if (isset($_SERVER)) {
                        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)) {
                            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                            foreach ($arr as $ip) {
                                $ip = trim($ip);
                                if ($ip != 'unknown') {
                                    $realip = $ip;
                                    break;
                                }
                            }
                        } else if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)) {
                            $realip = $_SERVER['HTTP_CLIENT_IP'];
                        } else if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
                            $realip = $_SERVER['REMOTE_ADDR'];
                        } else {
                            $realip = $unknown;
                        }
                    } else {
                        if (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)) {
                            $realip = getenv("HTTP_X_FORWARDED_FOR");
                        } else if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)) {
                            $realip = getenv("HTTP_CLIENT_IP");
                        } else if (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)) {
                            $realip = getenv("REMOTE_ADDR");
                        } else {
                            $realip = $unknown;
                        }
                    }
                    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
                    return $realip;
                }

                function GetIpLookup($ip = '') {
                    if (empty($ip)) {
                        $ip = GetIp();
                    }
                    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
                    if (empty($res)) {
                        return false;
                    }
                    $jsonMatches = array();
                    preg_match('#\{.+?\}#', $res, $jsonMatches);
                    if (!isset($jsonMatches[0])) {
                        return false;
                    }
                    $json = json_decode($jsonMatches[0], true);
                    if (isset($json['ret']) && $json['ret'] == 1) {
                        $json['ip'] = $ip;
                        unset($json['ret']);
                    } else {
                        return false;
                    }
                    return $json;
                }

                $ip = GetIp();
                $ipinfo = GetIpLookup("119.122.247.24");
                $db = new mysqli("127.0.0.1", "loacalhost", "******", "selfdevourer_blog");
                if (mysqli_connect_errno()) {
                    echo "数据库连接异常";
                    exit;
                }
                $insert = 'insert into access(ip, access_time, country, province, city) values("'
                        . $ip . '", now(), "'
                        . $ipinfo['country'] . '", "'
                        . $ipinfo['province'] . '", "'
                        . $ipinfo['city'] . '");';
                $insert_result = $db->real_query($insert);
                ?>
            </div>
        </div>
        <script src="plugin/responsive-nav/responsive-nav.min.js"></script>
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
