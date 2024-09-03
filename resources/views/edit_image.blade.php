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

<h1 style="color:gray;font-size:80%;text-align:center">BLUE SHOCK RACE WAREHOUSE MANAGMENT SYSTEM</h1>

<form method="POST" 
action="{{action([App\Http\Controllers\ImagesController::class, 'store']) }}">
 @csrf
 <input type="hidden" name="part_id" value="{{ $image->part_id }}">
 <label for="part_nr">DESCRIPTION: </label>
 <input type="text" name="description" id="description" value="{{ $image->description }}">
 <br>
 <label for="name">IMAGE LINK: </label>
 <input type="text" name="img_link" id="img_link" value="{{ $image->img_link }}">
 <input class="submit" type="submit" value="IN">
 </form>
</div>
 <script>
 </script>
 <style>

.background-image {
  position: fixed;
  left: 0;
  right: 0;
  z-index: 1;
  display: block;
  background-image: url('https://irliepaja.lv/mda/img/type_articles/42826/1605776981_m.jpg');
  opacity:0.5;
  width: 1200px;
  height: 800px;
  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
}
.button:hover{
  background-color:gray;
}

 .content {
  position: fixed;
  left: 0;
  right: 0;
  z-index: 9999;
  margin-left: 20px;
  margin-right: 20px;
}
</style>
<script>
    function newPart(){
      window.location.href = "/partin"
    }
    function remPart(){
      window.location.href = "/partout"
    }
    function allPart(){
      window.location.href = "/allstock"
    }
</script>
</body>
</html>