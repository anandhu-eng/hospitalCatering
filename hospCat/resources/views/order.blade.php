<!DOCTYPE html>
<html lang="english">
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=1000px, initial-scale=1.0" />
        <meta charset="utf-8" />
        <meta property="twitter:card" content="summary_large_image" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
<body>
    <link href="<?php echo asset('orderpg/car.css')?>" rel="stylesheet" />
        <div class="header">
            <span class="logo">Medimenu</span>
            <form method="get" action="/home">
                <button type="submit" class="home">Home</button>
            </form>
            <form method="get" action="/cart">
                <button type="submit" class="cart">Cart</button>
            </form>
            <select id="profiledp" name="profiledp" class="dropdown" onchange="handleProfileChange(this)">
                <option value="{{ route('order') }}">My Orders</option>
                <option value="{{ route('profile') }}">Profile</option>
                <option value="{{ route('login') }}">Logout</option>
            </select>
            <script>
                document.getElementById('profiledp').addEventListener('change', function(event) {
                window.location.href = event.target.value;
            });
            </script>
        </div>
        <div class="orderdetails">
        @foreach ($allOrders as $index => $order)
            <div class="order">
                <div class="one">
                    <span class="orderno">Order-ID:{{$order->OrderNo}}</span>
                    @if($order->DeliveryStatus =='1') 
                        <span class="delivery delivery1">Not yet delivered</span>
                    @elseif($order->DeliveryStatus =='2')
                        <span class="delivery delivery2">Delivered</span>
                    @endif
                </div>
                <div class="two">
                    <span class="foodname">{{$order->FName}}</span>
                    <span class="price">Rs.{{$order->Price}}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="desktop30-group7">
        <span class="desktop30-text08"><span>Medimenu</span></span>
        <span class="desktop30-text10">
            <span>medimenu@gmail.com</span>
        </span>
        <span class="desktop30-text12">
            <span>Privacy Policy | Terms and Condition</span>
        </span>
    </div>


<body>      

