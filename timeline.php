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
                <li>
                    <a href="index.php">博客</a>
                </li>
                <li>
                    <a href="technology_blog.php">技术博客</a>
                </li>
                <li class="active">
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
                <div id="say_something">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-offset-1 col-lg-10">
                            <ul class="timeline">
                                <?php
                                $db = new mysqli("127.0.0.1", "SelfDevourer", "c5xQc68dGeF3iXONZDZT", "selfdevourer_blog");
                                if (mysqli_connect_errno()) {
                                    echo "数据库连接异常";
                                    exit;
                                }
                                $select = 'SELECT t1.*, count(t2.id) as images_count, t2.title, 
                                    group_concat(t2.url) as urls FROM timeline t1 left join timeline_images t2
                                    on t1.id = t2.t_id group by t1.id order by t1.id desc;';
                                $select_result = $db->query($select);
                                $row_count = $select_result->num_rows;
                                $html = '<liCLASS>
                                            <div class="panel panel-default timeline-panel">
                                                <div class="panel-body">
                                                    CONTENTIMAGES
                                                </div>
                                                <div class="panel-footer">DAY</div>
                                            </div>
                                        </li>';

                                for ($i = 0; $i < $row_count; $i++) {
                                    $row = $select_result->fetch_object();
                                    $timeline = str_replace('DAY', $row->create_day, str_replace('CONTENT', $row->content, $html));
                                    if ($i % 2 == 0) {
                                        $timeline = str_replace('CLASS', ' class="timeline-inverted"', $timeline);
                                    } else {
                                        $timeline = str_replace('CLASS', '', $timeline);
                                    }
                                    if ($row->images_count == 0) {
                                        $timeline = str_replace('IMAGES', '', $timeline);
                                    } else {
                                        $image_html = '<div class="thumbnail" style="margin-bottom: 0px;">
                                                <img src="URL" alt="...">
                                            </div>';
                                        $images_html = '';
                                        foreach (explode(',', $row->urls) as $image_url) {
                                            $images_html .= str_replace('URL', $image_url, $image_html);
                                        }
                                        $timeline = str_replace('IMAGES', $images_html, $timeline);
                                    }
                                    echo $timeline;
                                }
                                ?>
                                <li class="clearfix no-float"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="about">
                    <!-- <p class="intro">生而殉道，比死而殉道，更难。</p> -->
                </div>
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
