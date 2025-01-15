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
<form class="container-sm" action="{{ $action }}" method="POST">
    @csrf
    @isset($edit)
        @method('PUT')
    @endisset

    <div class="row g-3">
        <div class="col">
            <x-textfield name="fullname" label="FullName" type="text" placeholder="Enter User name" :value="old('fullname', $user->name ?? '')" />
        </div>
    </div>
    <div class="row g-3">
        <x-textfield name="email" label="User Email" type="email" placeholder="Enter user email" :value="old('email', $user->email ?? '')" />
    </div>
    <div>

    @unless(isset($edit))
    <x-textfield name="password" label="User Password" type="password" placeholder="Enter a user password" />
    <x-textfield name="password_confirmation" label="Confirm Password" type="password" placeholder="Confirm password" />
    @endunless


    @php
        $role = [
            ['value' => 'admin', 'label' => 'admin'],
            ['value' => 'staff', 'label' => 'staff'],
        ];
    @endphp

    <x-selectfield :options="$role" name="role" label="Select Role" :value="old('role', $user->role ?? '')" />
    
  
    <button type="submit" class="btn btn-primary">  {{ isset($edit) ? 'Update' : 'Create' }}</button>
   
</form>
