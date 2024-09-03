<!DOCTYPE html>
<html>
<link href="/css/main.css" rel="stylesheet">
 <script type="text/javascript" src="/js/main.js"></script>
<div class="background-image"></div>
<head>
 <title>BSR</title>
</head>
<body>
<div class="content">
<input class="logo" type="image" onclick="logo()" name="BlueShock-Logo" src="/css/WMS_Button.png" alt="HOME">   
<h1 style="  text-align:center;">ALL STOCK</h1>
<h1 style="color:gray;font-size:80%;text-align:center">BLUE SHOCK RACE WAREHOUSE MANAGMENT SYSTEM</h1>
<table class="allstock">
<tr>
<td class="underline"> PART NR.</td>
<td class="underline"> DESCRIPTION.</td>
<td class="underline"> QUANTITY.</td>
<td></td>
</tr>

@foreach ($quantity_sum as $quantity)
<tr>
<td> {{ $quantity['part_nr'] }} </td>
<td> {{ $quantity['description'] }} </td>
<td> {{ $quantity['q'] }} </td>
@endforeach
</table>


</div>


</body>
</html>