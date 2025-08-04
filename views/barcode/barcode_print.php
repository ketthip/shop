<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
  
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

  <title>POS</title>

  
    <? extend("layouts/header_index"); ?>
    
<style type="text/css">
canvas{
  width:20%;
  
}

</style>
</head>
<body>
  
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Barc <i class="fab fa-osi"></i>de</a>
<!--   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Me</a>
      </li>    
    </ul>
  </div>   -->
</nav>
  
  <div class="form-group w-75 mx-auto border py-4 px-2 rounded m-2 ">
      <label for="usr">ປ້ອນລະຫັດບາໂຄດ:</label>
      <input type="text" class="form-control" id="usr" name="username">
      <a href="#" class="btn btn-danger btn-lg mt-2" id="btn" onclick="go();">ສ້າງ barcode</a>
  </div>
  
  
  <div class="mx-auto w-75 p-4 text-center">
<!--     <svg id="barcode" ></svg> -->
    
    <canvas id="barcode" download >

    </canvas>
    
    <br>
    <a href="" class="btn btn-danger btn-lg mt-2" id="btn" download="Barcode.jpg" onclick="downloadBarCode(this).print();">Download barcode</a>
    
  </div>
  
  
  
  
  </div>
  

</body>
<script type="text/javascript">

    
/*document.getElementById("btn").addEventListner("click",function (){
var value = document.getElementById("usr").value;
JsBarcode("#barcode", value);
  
  });*/

function go(){
  
  var value = document.getElementById("usr").value;
  JsBarcode("#barcode", value);
}

downloadBarCode =function (el){
  var canvas = document.getElementById("barcode");
  var image = canvas.toDataURL("image/jpg");
  el.href = image;
};
</script>
</html>


