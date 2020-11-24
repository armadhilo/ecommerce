<html>
<head>
	<title>Report Product</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        body {
            background-image: url('bg.png');
            background-position: top left;
            background-repeat: no-repeat;
            background-size: 100%;
            width:100%;
            height:100%;
        }
        
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        
	</style>
	<center>
        <h5 style="padding-bottom: 10px;">Report Product</h5>
    </center>
 
	<table class="table table-bordered">
		<thead>
			<tr class="text-center">
				<th style="width: 5%;">No</th>
				<th style="width: 30%;">Product Name</th>
				<th style="width: 10%;">Category</th>
				<th style="width: 40%;">Description</th>
				<th style="width: 15%;">Foto</th>
			</tr>
		</thead>
		<tbody> 
            @if (count($product) > 0)
            @php $i=1 @endphp
            @foreach ($product as $item)
			<tr>
				<td class="text-center">{{ $i++ }}</td>
				<td><a target="_blank">{{$item->product_name}}</a></td>
				<td>{{$item->category_name}}</td>
				<td class="text-justify">{!! $item->description !!}</td>
				<td class="text-center">
                    <img src="{{asset('images/'.$item->image)}}" style="padding-top: 20px; width: 100px; height: auto;">
                </td>
			</tr>
            @endforeach
            @else
            <tr>
				<td>- Tidak ada Data -</td>
            </tr>
            @endif
		</tbody>
	</table>
 
</body>
</html>