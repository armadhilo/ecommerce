<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
	
<style>
  @page { margin: 0in; }
  body {
    background-image: url('bcg.png');
    background-position: top left;
    background-repeat: no-repeat;
    background-size: 100%;
    width:100%;
    height:100%;
    padding:0;
    margin:0;
  }
  .page_break { page-break-before: always; }

 
</style>

<center>
    <h1 style="margin-top:40%">Report Product</h1>
    <img src="{{asset('logo.png')}}" alt="" width="30%" style="margin-top:-50px ">
</center>


@foreach ($product as $item)
    <div class="container page_break" style="margin-top:8%">
	<center>
		<h3>{{$item->category_name}}</h3>
		<h5><a target="_blank">{{$item->product_name}}</a></h5>
    
        <br>
        <br>
        <img src="{{asset('images/'.$item->image)}}" alt="" width="40%"> 
        {{-- <table class="table" width="100%" style="margin-right:10px">
            <thead>
                <tr>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%">  </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                </tr>
                <br>
                <tr>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%">  </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                    <th><img src="{{asset('images/16050071042.78a8055e.png')}}" alt="" width="10%"> </th>
                </tr>
            </thead>
        </table> --}}
        <div style="border:2px dashed black;padding: 25px;text-align: center;">
        <b>Description</b>
        <br>
        <p>{!! $item->description !!}</p>
        </div>
    </center>
    </div>
@endforeach
 
</body>
</html>