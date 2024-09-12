<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <center>
        
        <h3>Customer Name : {{$data->name}} <br></h3>
        <h3>Address : {{$data->rec_address}} <br></h3>
        <h3>Phone : {{$data->phone}} <br></h3>
        <h2>Product Title : {{$data->product->title}}</h2>
        <h2>Price : {{$data->product->price}}</h2>
        <img height="250px" width="300px" src="products/{{$data->product->image}}" alt="">
    </center>

</body>
</html>