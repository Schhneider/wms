<!DOCTYPE html>
<html>
<link href="/css/main.css" rel="stylesheet">
 <script type="text/javascript" src="/js/main.js"></script>
<head>
 <title>Stock Report</title>

 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<input class="logo" type="image" onclick="logo()" name="BlueShock-Logo" src="/css/WMS_Button.png" alt="HOME">    

<h1 style="color:gray;font-size:80%;text-align:center">BLUE SHOCK RACE WAREHOUSE MANAGMENT SYSTEM</h1>
<h1>STOCK REPORT</h1>
<form class="search" type="get" action="{{url('/search_stock')}}">
     <input name="query" type="search" placeholder="SEARCH ITEM NR.">
     <button type="submit">Search</button>
</form>

</body>
</html>
