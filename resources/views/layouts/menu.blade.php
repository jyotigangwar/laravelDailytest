<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
@if(auth()->user()->is_admin)
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <p>User</p>
    </a>
</li>
@endif
<li class="nav-item">
    <a href="/category" class="nav-link active">
        <p>Category</p>
    </a>
</li>
<li class="nav-item">
    <a href="/products" class="nav-link active">
        <p>Products</p>
    </a>
</li>
