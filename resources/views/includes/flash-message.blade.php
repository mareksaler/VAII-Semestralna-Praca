@if (session('status'))
<div class="alert alert-success col-6" role="alert">
    <p style="color: green;">{{ session()->get('status') }}</p>
</div>
@endif
