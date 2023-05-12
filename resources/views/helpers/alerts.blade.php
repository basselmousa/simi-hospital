@if(session()->has("success"))

<div class="alert alert-success fade show" role="alert">{{ session("success") }}</div>
@endif
@if(session()->has("errors"))

<div class="alert alert-danger fade show" role="alert">Something went wrong try again please!</div>
@endif
@if(session()->has("error"))

    <div class="alert alert-danger fade show" role="alert">
        {{ session("error") }}
    </div>
@endif
