<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
</head>
<body>
    <h1>Order Details PDF</h1>
    <p><strong>Customer Name: </strong> {{$orders->name}}</p>
    <p><strong>Customer Email: </strong> {{$orders->email}}</p>
    <p><strong>Customer Phone: </strong> {{$orders->phone}}</p>
    <p><strong>Customer Address: </strong> {{$orders->address}}</p>
    <p><strong>Customer ID: </strong> {{$orders->user_id}}</p>
    <h1>Product Details </h1>
    <p><strong>Product Tile: </strong> {{$orders->product_title}}</p>
    <p><strong>Product Price: </strong> {{$orders->price}}</p>

    <p><strong>Product Quantity: </strong> {{$orders->quantity}}</p>
    <p><strong>Product Payment Status: </strong> {{$orders->payment_status}}</p>
    {{-- <p><strong>Product Image: </strong>  </p>
    <img class="img-fluid" src="{{ asset($orders->image) }}" alt=""> --}}
</body>
</html>
