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
    @php $edit = $edit ?? false; @endphp

    @if($edit)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Supplier Name</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control" 
            value="{{ old('name', $supplier->name ?? '') }}" 
            required
        >
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Supplier Email</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            class="form-control" 
            value="{{ old('email', $supplier->email ?? '') }}"
        >
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input 
            type="text" 
            name="phone" 
            id="phone" 
            class="form-control" 
            value="{{ old('phone', $supplier->phone ?? '') }}"
        >
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea 
            name="address" 
            id="address" 
            class="form-control" 
            rows="3"
        >{{ old('address', $supplier->address ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ $edit ? 'Update Supplier' : 'Create Supplier' }}
    </button>
</form>

<a href="{{ route('suppliers.index') }}" class="btn btn-secondary mt-3">Back to Supplier List</a>
