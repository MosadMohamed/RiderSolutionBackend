@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-dismissible bg-danger d-flex flex-column align-items-center flex-sm-row py-0 px-4 mb-5">
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h4 class="mb-2 text-light">{{ $error }}</h4>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="fa-solid fa-xmark text-light"></i>
    </button>
</div>
@endforeach
@endif

@if (session()->has('Message'))
<div class="alert alert-dismissible bg-success d-flex flex-column align-items-center flex-sm-row py-0 px-4 mb-5">
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <h4 class="mb-2 text-light">{{ session()->get('Message') }}</h4>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="fa-solid fa-xmark text-light"></i>
    </button>
</div>
@endif