@if(!empty(session('success')))
    <div class="alert alert-success alert-dismissibl in" role="alert">
        {{ session('success') }}
    </div>
@endif
@if(!empty(session('error')))
    <div class="alert alert-danger alert-dismissible in" role="alert">
        {{ session('error') }}
    </div>
@endif
@if(!empty(session('payment-error')))
    <div class="alert alert-error alert-dismissible  in" role="alert">
        {{ session('payment-error') }}
    </div>
@endif
@if(!empty(session('warning')))
    <div class="alert alert-warning alert-dismissible  in" role="alert">
        {{ session('warning') }}
    </div>
@endif
@if(!empty(session('info')))
    <div class="alert alert-info alert-dismissible  in" role="alert">
        {{ session('info') }}
    </div>
@endif
@if(!empty(session('secondary')))
    <div class="alert alert-secondary alert-dismissible  in" role="alert">
        {{ session('secondary') }}
    </div>
@endif
@if(!empty(session('primary')))
    <div class="alert alert-primary alert-dismissible  in" role="alert">
        {{ session('primary') }}
    </div>
@endif