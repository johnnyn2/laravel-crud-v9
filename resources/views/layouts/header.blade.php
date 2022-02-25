<img src="{{ URL('images/laravel-crud-v9-icon.jpg') }}" sizes="20" alt="">
<ul>
    <li>
        <a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">Home</a>
    </li>
    <li>
        <a href="/introduction" class="{{ request()->is('introduction') ? 'active' : '' }}">Introduction</a>
    </li>
    <li>
        <a href="/posts" class="{{ request()->is('posts') || request()-> is('posts/*') ? 'active' : '' }}">Posts</a>
    </li>
    <li>
        <a href="/brands" class="{{ request()->is('brands') || request()-> is('brands/*') ? 'active' : '' }}">Brands</a>
    </li>
    <li>
        <a href="/products" class="{{ request()->is('products') || request()-> is('products/*') ? 'active' : '' }}">Products</a>
    </li>
    <li>
        <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a>
    </li>
</ul>
