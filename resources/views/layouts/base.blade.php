<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/static/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/static/css/base.css" rel="stylesheet" type="text/css"/>
<script src="/js/app.js"></script>
<title>@yield('title')</title>
@yield('appheader')
</head>
<body >
<!--顶部-->
<div id="doc">
    <div id="hd">
        <div class="clearfix pagetitle">
            <h1 class="sitename"><a href="/" title="交流社区"></a></h1>

        </div>
        <div class="clearfix sitenav">
            <div class="clearfix menu-main">
                <ul id="menuSitenav" class="clearfix list-inline">
                    <li class="first-item">
                    <a href="/" class="home"><span>首页</span></a>
                    </li>
                    <li>
                    <form class='form-inline'>
                        <div class='form-group'>
                            <label for="question"></label>
                            <input type='text' class='form-control' id='question' placeholder='question'/>
                        </div>
                        <button type='submit' class='btn btn-primary'>search question</button>
                    </form>
                    </li>
                    <a class='btn btn-primary' href='/question/create' role='button'>ask new question</a>
                    @if(Auth::check())
                        <li class="">
                        <a href="/user/{{ Auth::id() }}" class="home"><span>{{ Auth::user()->username }}</span></a>
                        </li>
                        <li class="">
                        <a href="/logout" class="home"><span>logout</span></a>
                        </li>
                        <li class="">
                        <a href="/changepassword" class="home"><span>change password</span></a>
                        </li>
                    @else
                        <li class="">
                        <a href="/login" class="home"><span>login</span></a>
                        </li>
                        <li class="">
                        <a href="/register" class="home"><span>register</span></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>


<!--中间区块-->
<div class="container">
    <div class="content-block-width">
        <div class="content-main">
            @yield('main')
        </div>
    </div>
    <!--底部-->
    <div id="ft">
        <div class="ft-inner"><div class="ft-menu"  id="ft-menu">
                <a href="/page/lianxiwomen" target="_self">联系我们</a> |  <a href="/list" target="_self">网站新闻</a> | <a href="/comments" target="_self">留言系统</a> |
                <a href="/links" target="_self">友情链接</a></div>
            <div class="siteinfo" id="ft-siteinfo">
                <a href="http://www.miibeian.gov.cn/"></a></p>
        </div></div>
    </div>
    </html>
