@extends('layouts.plantilla')
@section('title','Inicio')
@section('content')
<header class="masthead text-center text-white">
    <div class="masthead-content">
<div class="container px-5">
    <h1 class="display-4">¡Bienvenido a Math-Match!</h1>
    <h2>Plataforma para el aprendizaje lúdico matemático de la I.E Playa Rica</h2>
    <a class="btn btn-light btn-xl rounded-pill mt-5" href="{{route('register')}}">¡Regístrate como estudiante!</a>
</div>
</div>
<div class="bg-circle-1 bg-circle"></div>
<div class="bg-circle-2 bg-circle"></div>
<div class="bg-circle-3 bg-circle"></div>
<div class="bg-circle-4 bg-circle"></div>
</header>
<!-- Content section 1-->
<section id="scroll">
<div class="container px-5">
<div class="row gx-5 align-items-center">
    <div class="col-lg-6 order-lg-2">
        <div class="p-5"><img class="img-fluid" src="{{asset('images/math.png')}}" alt="..." /></div>
    </div>
    <div class="col-lg-6 order-lg-1">
        <div class="p-5">
            <h2 class="display-4">¿Qué es Math-Match?</h2>
            <p> Math-Match es un aplicativo web que surgió tras la problemática de que el área de Matemáticas es en la cual más porcentaje de pérdida se presenta a nivel nacional. Teniendo en cuenta ese orden de ideas Math-Match es una nueva opción de aprendizaje.</p>
        </div>
    </div>
</div>
</div>
</section>
<!-- Content section 2-->
<section>
<div class="container px-5">
<div class="row gx-5 align-items-center">
    <div class="col-lg-6">
        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/02.jpg" alt="..." /></div>
    </div>
    <div class="col-lg-6">
        <div class="p-5">
            <h2 class="display-5">Aprende matemáticas de una forma más divertida</h2>
            <p>Bien sabemos que existen personas que no quieren estudiar, los que les da sueño y los que definitivamente no les entra, para atacar estos problemas diseñamos el aplicativo, usando los videojuegos como aliado juntando esto con la parte educativo.</p>
        </div>
    </div>
</div>
</div>
</section>
<!-- Content section 3-->
<section>
<div class="container px-5">
<div class="row gx-5 align-items-center">
    <div class="col-lg-6 order-lg-2">
        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/03.jpg" alt="..." /></div>
    </div>
    <div class="col-lg-6 order-lg-1">
        <div class="p-5">
            <h2 class="display-4">¿Qué se quiere lograr en Math-Match?</h2>
            <p>Para responder esto primero vale la pena aclarar que, mediante Math-Match NO vamos a reemplazar la educación tradicional, simplemente lo que queremos es promover este método de aprendizaje de una manera un poco más lúdica.</p>
        </div>
    </div>
</div>
</div>
</section>
<!-- Footer-->
<footer class="py-5 bg-black">
    <div class="container px-5"><p class="m-0 text-white small">Copyright &copy; Math-Match 2021</p>
        <a href="">Preguntas frecuentes</a><br>
        <a href="">Apóyanos</a>
    </div>
    </footer>
@endsection
