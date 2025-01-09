@if (session('success'))
    <div role="alert" class="alert alert-success mb-4" id="alert">
        <button class="btn btn-sm btn-circle" onclick="this.parentElement.style.display='none';">✕</button>
        <span>{{ session('success') }}</span>
    </div>
@endif