@if (session()->has('custom_success'))
<div class="alert alert-success custom-error" role="alert">
    <strong>Well done!</strong> {!! session()->get('custom_success') !!}
</div>
@endif