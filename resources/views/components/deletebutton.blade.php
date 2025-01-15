@if(Auth::user()->role === 'admin')
<form style="display: inline" action="{{ $action }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this?')">
        @if(isset($label))
            {{ $label }}
        @else
            Delete
        @endif
    </button>
</form>
@endif
