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
                            <h1>Maven搭建SSM</h1>
                            <hr>
                            <p>  使用Maven搭建 Struts2 + Spring + MyBaties。<br>
  首先创建 Web 项目，名称随意。我取名为 <code>example-ssm</code>，然后执行操作： <code>项目右键 -&gt; Configure -&gt; Convert to Maven project</code>（如果已经在 Eclipse 上安装了 M2E 插件，那么必然会有 <code>Convert to Maven project</code> 选项，如果没有，请参考我的另一篇Blog：<a href="http://selfdevourer.org/cn/2016/12/07/Maven_Install_And_Config.php" target="_blank">Maven安装和配置</a>），会弹出 <code>Create new POM</code> 框，关于 <code>POM</code> 的解释请点击<a href="#POM" title="这里" target="_blank">这里</a>。<img src="http://selfdevourer.org/images/Create-new-POM.png"><br>
  输入 <code>Group Id、Artfact Id</code> 等信息后 <code>pom.xml</code> 会创建在项目根目录下。<br>
  <code>pom.xml</code> 创建好后需要配置项目依赖的 <code>jar</code> 包，我的配置如下：</p>
                            <pre><code>&lt;!-- Start: About Struts2 --&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.apache.struts&lt;/groupId&gt;
    &lt;artifactId&gt;struts2-core&lt;/artifactId&gt;
    &lt;version&gt;2.5.5&lt;/version&gt;
&lt;/dependency&gt;
&lt;!-- &lt;dependency&gt;
    &lt;groupId&gt;org.apache.struts&lt;/groupId&gt;
    &lt;artifactId&gt;struts2-spring-plugin&lt;/artifactId&gt;
    &lt;version&gt;2.5.5&lt;/version&gt;
&lt;/dependency&gt; --&gt;
&lt;!-- End: About Struts2 --&gt;
&lt;!-- Start: About MyBatis --&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.mybatis&lt;/groupId&gt;
    &lt;artifactId&gt;mybatis&lt;/artifactId&gt;
    &lt;version&gt;3.4.1&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.mybatis&lt;/groupId&gt;
    &lt;artifactId&gt;mybatis-spring&lt;/artifactId&gt;
    &lt;version&gt;1.3.0&lt;/version&gt;
&lt;/dependency&gt;
&lt;!-- End: About MyBatis --&gt;
&lt;!-- Start: JDBC and Pool --&gt;
&lt;dependency&gt;
    &lt;groupId&gt;mysql&lt;/groupId&gt;
    &lt;artifactId&gt;mysql-connector-java&lt;/artifactId&gt;
    &lt;version&gt;5.1.38&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;c3p0&lt;/groupId&gt;
    &lt;artifactId&gt;c3p0&lt;/artifactId&gt;
    &lt;version&gt;0.9.1.2&lt;/version&gt;
&lt;/dependency&gt;
&lt;!-- End: JDBC and Pool --&gt;
&lt;!-- Start: About Spring --&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-core&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-web&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-jdbc&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-beans&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-context&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-tx&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-aop&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;dependency&gt;
    &lt;groupId&gt;org.springframework&lt;/groupId&gt;
    &lt;artifactId&gt;spring-expression&lt;/artifactId&gt;
    &lt;version&gt;3.2.17.RELEASE&lt;/version&gt;
&lt;/dependency&gt;
&lt;!-- End: About Spring --&gt;
</code></pre>

                            <p>  如果你足够细心就会发现我把 <code>struts2-spring-plugin</code> 给注释了，这是为了能够先测试 Struts2 是否搭建成功所做的，如果不将其暂时注释，Struts2 管理 Bean 的方式就会因为 <code>struts2-spring-plugin</code> 的导入而移交给 Spring。<br>
  保存后 Eclipse 会自动下载 jar 包，在 <code>Package Explorer</code> 视图的项目里，能看到 <code>Maven Dependencies</code>，里面存放着 Maven 下载的 jar。另外，如果觉得以上配置的 jar 包版本低，可以在 <a href="https://mvnrepository.com/" target="_blank">MVNREPOSITORY</a> 查看各种 jar 的版本信息。<br>
  接下来配置 Struts2，只要能够接受 WEB 请求就算成功。<br>
  首先需要指定使用 Struts2 的过滤器，打开 <code>WEB-INF/web.xml</code> 加入以下文本：</p>
                            <pre><code> &lt;filter&gt;
    &lt;filter-name&gt;struts2&lt;/filter-name&gt;
    &lt;filter-class&gt;org.apache.struts2.dispatcher.filter.StrutsPrepareAndExecuteFilter&lt;/filter-class&gt;
&lt;/filter&gt;
&lt;filter-mapping&gt;
    &lt;filter-name&gt;struts2&lt;/filter-name&gt;
    &lt;url-pattern&gt;/*&lt;/url-pattern&gt;
&lt;/filter-mapping&gt; 
</code></pre>

                            <p>  然后在 <code>src</code> 里创建 Struts2 需要用到的配置文件 <code>struts.xml</code>，内容如下：</p>
                            <pre><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;  
&lt;!DOCTYPE struts PUBLIC
    "-//Apache Software Foundation//DTD Struts Configuration 2.0//EN"
    "http://struts.apache.org/dtds/struts-2.0.dtd"&gt;
&lt;struts&gt;
    &lt;constant name="struts.devMode" value="true" /&gt;
    &lt;package name="basicstruts2" extends="struts-default"&gt;
        &lt;action name="hello" class="org.ssm.action.HelloAction"&gt;
            &lt;result&gt;/hello.jsp&lt;/result&gt;
        &lt;/action&gt;
    &lt;/package&gt;
&lt;/struts&gt;
</code></pre>

                            <p>    <code>HelloAction</code> 的部分代码如下：</p>
                            <pre><code>public class HelloAction extends ActionSupport {

    private static final long serialVersionUID = 1L;

    public String execute() {
        System.out.println("Hello Action execute!");
        return SUCCESS;
    }
}
</code></pre>

                            <p>  现在尝试运行并访问 <code>/hello</code>，控制台内输出 <code>Hello Action execute!</code> 就表示 Struts2 搭建成功了。<br>
  下一步要让 Spring 进行管理 Bean 的工作，先把 <code>pom.xml</code> 里 <code>struts2-spring-plugin</code> 的注释取消，然后在 <code>web.xml</code> 里加入：</p>
                            <pre><code>&lt;listener&gt;
    &lt;listener-class&gt;org.springframework.web.context.ContextLoaderListener&lt;/listener-class&gt;
&lt;/listener&gt;
&lt;context-param&gt;
    &lt;param-name&gt;contextConfigLocation&lt;/param-name&gt;
    &lt;param-value&gt;/WEB-INF/applicationContext.xml&lt;/param-value&gt;
&lt;/context-param&gt;
</code></pre>

                            <p>  <code>web.xml</code> 的同文件夹里创建 <code>applicationContext.xml</code>，代码如下：</p>
                            <pre><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;beans xmlns="http://www.springframework.org/schema/beans"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:context="http://www.springframework.org/schema/context"
    xmlns:p="http://www.springframework.org/schema/p"
    xsi:schemaLocation="http://www.springframework.org/schema/beans   
    http://www.springframework.org/schema/beans/spring-beans-3.0.xsd  
    http://www.springframework.org/schema/context  
    http://www.springframework.org/schema/context/spring-context-3.0.xsd"&gt;

    &lt;bean id="c3p0DataSource" class="com.mchange.v2.c3p0.ComboPooledDataSource"
        destroy-method="close"&gt;
        &lt;property name="driverClass" value="com.mysql.jdbc.Driver" /&gt;
        &lt;property name="jdbcUrl"
            value="jdbc:mysql://127.0.0.1:3306/ssm?characterEncoding=utf8" /&gt;
        &lt;property name="user" value="root" /&gt;
        &lt;property name="password" value="root" /&gt;
    &lt;/bean&gt;

    &lt;bean id="sqlSessionFactory" class="org.mybatis.spring.SqlSessionFactoryBean"&gt;
        &lt;property name="dataSource" ref="c3p0DataSource" /&gt;
    &lt;/bean&gt;

    &lt;!-- Mapper Scanner --&gt;
    &lt;bean class="org.mybatis.spring.mapper.MapperScannerConfigurer"&gt;
        &lt;property name="basePackage" value="org.ssm.mapper" /&gt;
        &lt;property name="sqlSessionFactoryBeanName" value="sqlSessionFactory"&gt;&lt;/property&gt;
    &lt;/bean&gt;
&lt;/beans&gt; 
</code></pre>

                            <p>  在相同目录下创建 <code>Configuration.xml</code>，这是 MyBatis 的配置文件：</p>
                            <pre><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;!DOCTYPE configuration PUBLIC "-//mybatis.org//DTD Config 3.0//EN" "http://mybatis.org/dtd/mybatis-3-config.dtd"&gt;
&lt;configuration&gt;
    &lt;mappers&gt;
        &lt;mapper resource="org/ssm/mapper/UserMapper.xml" /&gt;
    &lt;/mappers&gt;
&lt;/configuration&gt;
</code></pre>

                            <p>  如 <code>&lt;mapper&gt;</code> 所示，在 <code>org/ssm/mapper</code> 下创建 <code>UserMapper.xml</code> 和同名接口：</p>
                            <pre><code>&lt;?xml version="1.0" encoding="UTF-8" ?&gt;
&lt;!DOCTYPE mapper PUBLIC "-//mybatis.org//DTD Mapper 3.0//EN" 
"http://mybatis.org/dtd/mybatis-3-mapper.dtd"&gt;

&lt;mapper namespace="org.ssm.mapper.UserMapper"&gt;
    &lt;select id="getUserById" parameterType="int" resultType="org.ssm.entity.User"&gt;
        select *
        from `user` where id = #{id}
    &lt;/select&gt;
&lt;/mapper&gt;
</code></pre>

                            <p>  UserMapper.java：</p>
                            <pre><code>public interface UserMapper {
    public User getUserById(int id);
}
</code></pre>

                            <p>  如 <code>resultType</code> 所示，创建 Bean： <code>org/ssm/entity/User</code>，字段与数据库的 <code>User</code> 表字段相同并设置 <code>getters.setters</code>。为了测试整个框架是否搭建成功，原先的 <code>HelloAction</code> 需要更新为：</p>
                            <pre><code>public class HelloAction extends ActionSupport {
    @Autowired
    private UserMapper userMapper;

    public String execute() {
        User user = userMapper.getUserById(1);
        System.out.println(user);
        System.out.println("Hello Action execute!");
        return SUCCESS;
    }
}
</code></pre>

                            <hr>  
                            <p>  TIPS：<br>
  Struts2 2.5 版本以后的 <code>&lt;filter-class&gt;</code> 从 <code>org.apache.struts2.dispatcher.ng.filter.StrutsPrepareAndExecuteFilter</code> 变更为 <code>org.apache.struts2.dispatcher.filter.StrutsPrepareAndExecuteFilter</code>。</p>
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
