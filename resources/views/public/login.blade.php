@extends('theme.publicbase')

@section('content')


<section>
    <div class="subscription-box">
        
        <!-- Ensure this is the correct path to your image -->
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST" class="subscription-form">
            @csrf
            <div class="row justify-content-center">
                <div class="col-8  mb-2 mb-md-0">
                    <input type="text" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="usuario" required name="email">
                  </div>
                  <div class="col-8 mb-2 mb-md-0">
                    <input type="password" class="form-control mb-2" id="password" aria-describedby="emailHelp" placeholder="Password" required name="password">
                  </div>
                <div class="col-8 ">
                    <button class="btn btn-primary w-100" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection