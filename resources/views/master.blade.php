<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>@yield('title') | BWW</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="source/assets/img/favicon.jpg">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>
    <!-- Syntax Highlighter -->
    <link rel="stylesheet" type="text/css" href="source/Doc/syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="source/Doc/syntax-highlighter/styles/shThemeDefault.css" media="all">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="source/Doc/css/font-awesome.min.css">
    <!-- Normalize/Reset CSS-->
    <link rel="stylesheet" href="source/Doc/css/normalize.min.css">
    <link rel="stylesheet" href="source/Doc/css/main.css">
</head>

<body id="welcome">
    <aside class="left-sidebar">
        <div class="logo">
            <a href="/">
                <h1>BWW | ADMIN</h1>
            </a>
        </div>
        <nav class="left-nav">
            <ul id="nav">
                <li class="current"><a href="{{asset('product')}}">Update product</a></li>
                <li><a href="{{asset('cart')}}">Create Bill</a></li>
            </ul>
        </nav>
    </aside>
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="main-content">
            <section>
                @yield('content')
            </section>
        </div>
    </div>

<!-- Essential JavaScript Libraries
    ==============================================-->
    <script type="text/javascript" src="source/Docjs/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="source/Docjs/jquery.nav.js"></script>
    <script type="text/javascript" src="source/Doc/syntax-highlighter/scripts/shCore.js"></script> 
    <script type="text/javascript" src="source/Doc/syntax-highlighter/scripts/shBrushXml.js"></script> 
    <script type="text/javascript" src="source/Doc/syntax-highlighter/scripts/shBrushCss.js"></script> 
    <script type="text/javascript" src="source/Doc/syntax-highlighter/scripts/shBrushJScript.js"></script> 
    <script type="text/javascript" src="source/Doc/syntax-highlighter/scripts/shBrushPhp.js"></script> 
    <script type="text/javascript">
        SyntaxHighlighter.all()
    </script>
    <script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
