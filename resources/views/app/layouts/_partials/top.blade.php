
<div class="top">

    <div class="logo">
        <img src="{{ asset('img/logo.png')}}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('customer.index') }}">Customer</a></li>
            <li><a href="{{ route('order.index') }}">Order</a></li>
            <li><a href="{{ route('app.supplier.list') }}">Supplier</a></li>
            <li><a href="{{ route('product.index') }}">Product</a></li>
            <li><a href="{{ route('contact.index') }}">Contacts</a></li>
            <li><a href="{{ route('app.exit') }}">Exit</a></li>
        </ul>
    </div>
</div>
