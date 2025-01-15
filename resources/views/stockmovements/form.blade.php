@section('content')
<div class="col-md-2 sidebar" id="sidebar" style="background-color: #343a40; color: #f8f9fa; min-height: 100vh; padding: 15px;">
    <h2 style="color: #f8f9fa;">Menu</h2>
    <a href="{{ route('dashboard') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
       Dashboard <i class="fas fa-tachometer-alt"></i> 
    </a>
    <a href="{{ route('categories.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
       Categories <i class="fas fa-th"></i> 
    </a>
    <a href="{{ route('products.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
         Products <i class="fas fa-cogs"></i>
    </a>
    <a href="{{ route('suppliers.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
         Suppliers <i class="fas fa-truck"></i>
    </a>
    <a href="{{ route('stockmovements.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
         Stock Movements <i class="fas fa-exchange-alt"></i>
    </a>
    <a href="{{ route('reports.inventory') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
        Reports  <i class="fas fa-chart-line"></i>
    </a>
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('users.index') }}" style="color: #f8f9fa; display: block; margin-bottom: 10px;">
             Users <i class="fas fa-users"></i>
        </a>
    @endif
    <div class="toggle-btn" id="toggle-btn" 
     style="color: #f8f9fa; background-color: #495057; padding: 5px 10px; cursor: pointer; border: none; outline: none; box-shadow: none;">
    ☰
</div>

</div>




<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->     

        <!-- Main Content -->
        <div class="col-md-10 offset-md-2 main-content" id="main-content">

        <form action="{{ $action }}" method="POST">
    @csrf
    @method($method)

    <div class="form-group">
        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" class="form-control" required>
            <option value="" disabled selected>Select a product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" 
                    @isset($stockMovement) 
                        @if($stockMovement->product_id == $product->id) selected @endif 
                    @endisset
                >
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
        @error('product_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $stockMovement->quantity ?? '') }}" required>
        @error('quantity') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="type">Movement Type</label>
        <select name="type" id="type" class="form-control" required>
            <option value="inward" @isset($stockMovement) @if($stockMovement->type == 'inward') selected @endif @endisset>Inward</option>
            <option value="outward" @isset($stockMovement) @if($stockMovement->type == 'outward') selected @endif @endisset>Outward</option>
            <option value="damaged" @isset($stockMovement) @if($stockMovement->type == 'damaged') selected @endif @endisset>Damaged</option>
        </select>
        @error('type') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="description">Reason</label>
        <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $stockMovement->description ?? '') }}">
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>


@endsection
