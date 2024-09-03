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
      <style>
              /* The Modal (background) */
              .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: auto; /* Full height */
                overflow: auto; /* Enable scroll if needed */


              }

              /* Modal Content */
              .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                max-width: 80%;
              }

              /* The Close Button */
              .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
              }

              .close:hover,
              .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
              }
              .history_style{
                width: 50%;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                background-color: rgba(53,101,158,0.6)
}
      </style>
    

         
      <table class="allstock">
      <thead>
      <tr>
      <td> Part Nr. </td>
      <td> Quantity </td>
      <td> Location </td>
  
      </tr>
        </thead>
        <tbody>
      @foreach ($parts as $part)
      
      <tr>
      <td> {{ $part->part_nr }} </td>
      <td> {{ $part->quantity }} </td>
      <td> {{ $part->location }} </td>
      <td> 
        <button id="myBtn">PICTURE</button>
          <div id="myModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <img style="max-width: 50vh" src="/images/{{$part->part_nr}}.png" alt="image">
              <h3>{{ $part->part_nr }}</h3>
            </div>
          </div>
        </td>
      @endforeach
        </tbody>
      </table>
      <script>
          var modal = document.getElementById("myModal");
          var btn = document.getElementById("myBtn");
          var span = document.getElementsByClassName("close")[0];
          btn.onclick = function() {
            modal.style.display = "block";
          }
          span.onclick = function() {
            modal.style.display = "none";
          }
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }
        </script>
          <h1 style="color:black;font-size:80%;text-align:center">HISTORY</h1>
      <table class="history_style">
      <thead>
      <tr>
      <td> Part Nr. </td>
      <td> Quantity </td>
      <td> Location </td>
      <td> PO Number </td>
      <td> Commentary </td>
      <td> Time </td>
      </tr>
        </thead>
        <tbody>
      @foreach ($history as $histories)
      <tr>
      <td> {{ $histories->part_nr }} </td>
      <td> {{ $histories->quantity }} </td>
      <td> {{ $histories->location }} </td>
      <td> {{ $histories->po_number }} </td>
      <td> {{ $histories->commentary }} </td>
      <td> {{ $histories->created_at }} </td>
      @endforeach
        </tbody>
      </table>

</body>
</html>