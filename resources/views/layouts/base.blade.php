<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/static/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/static/css/base.css" rel="stylesheet" type="text/css"/>
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('appheader')
</head>

<body>
<!--顶部-->
<div id="app" class='container'>
    <div id="doc">
        <div id="hd">
            <div class="clearfix pagetitle">
                <h1 class="sitename"><a href="/" title="交流社区"></a></h1>

            </div>
            <div class="clearfix sitenav">
                <div class="clearfix menu-main">
                    <ul id="menuSitenav" class="clearfix list-inline">
                        <li class="first-item list-inline-item">
                        <a href="/" class="home"><span>首页</span></a>
                        </li>
                        <li class="list-inline-item">
                        <form class='form-inline' method='get' action='/search'>
                            <div class='form-group'>
                                <label for="keyword"></label>
                                <input type='text' class='form-control' name='keyword' placeholder='question'/>
                            </div>
                            <button type='submit' class='btn btn-primary'>search question</button>
                        </form>
                        </li>
                        @if(Auth::check())
                            <add-question></add-question>
                        @endif
                        <li class='pull-right list-inline-item'>
                        <ul id='user-inter' class='right list-inline block-inline'>
                            @if(Auth::check())
                                <li class=" list-inline-item">
                                <a href="/user/{{ Auth::id() }}" class="home"><span>{{ Auth::user()->username }}</span></a>
                                </li>
                                <li class=" list-inline-item">
                                <a href="/logout" class="btn-link"><span>logout</span></a>
                                </li>
                                <change-password></change-password>
                            @else
                                <login ref='loginbutton'></login>
                                <register></register>
                            @endif
                        </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <error ref='error'></error>

    <!--中间区块-->
    <div class="container">
        <div class="">
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
    </div>
</div>
<script src="/js/app.js"></script>
</body>
</html>
