@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session()->get('status') }}
</div>
@endif

@if (session('status-warning'))
<div class="alert alert-warning" role="alert">
    {{ session()->get('status-warning') }}
</div>
@endif
