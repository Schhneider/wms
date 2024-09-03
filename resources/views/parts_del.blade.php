<!DOCTYPE html>
<html>
<div class="background-image"></div>
<link href="/css/main.css" rel="stylesheet">
 <script type="text/javascript" src="/js/main.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
 <title>Stock out</title>
</head>
<body>
<input class="logo" type="image" onclick="logo()" name="BlueShock-Logo" src="/css/WMS_Button.png" alt="HOME">  
<h1 style="color:gray;font-size:80%;text-align:center">BLUE SHOCK RACE WAREHOUSE MANAGMENT SYSTEM</h1>
<h1>STOCK OUT</h1>
<div class="in_out">
 <form method="POST" 
action="{{action([App\Http\Controllers\Parts2Controller::class, 'store']) }}">
 @csrf
 <label for="part_nr">ITEM NR: </label>
 <input type="text" name="part_nr" id="part_nr" placeholder="INSERT ITEM NR.">
 <br>
 <label for="name">QUANTITY: </label>
 <input type="text" name="quantity" id="quantity" placeholder="INSERT QUANTITY">
 <br>
 <label for="name">LOCATION: </label>
 <input type="text" name="location" id="location" placeholder="INSERT LOCATION">
 <br>
 <label for="name">COMMENT: </label>
 <input type="text" name="commentary" id="commentary" placeholder="ADD COMMENT">
 <br>
 <input class="submit" type="submit" value="OUT">
 </form>
</div>
</body>
</html>