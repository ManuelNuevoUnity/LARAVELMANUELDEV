@extends('layouts.app')  <!-- Asegúrate de tener este layout base -->

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Telefonos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="contenedor">
            <h1 class="logo">Mi Tienda</h1>
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Informacion</a></li>
            </ul>
        </div>
    </nav>

    <main class="contenedor sombra">
        <section id="catalogo">
            <h2>Catálogo de Libretas</h2>
            <div class="catalogo">
                @isset($productos)
                    @foreach ($productos as $producto)
                        <div class="producto">
                            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->name }}">
                            <h3>{{ $producto->name }}</h3>
                            <p>{{ $producto->description }}</p>
                            <p class="precio">${{ number_format($producto->precio, 2) }}</p>
                            <button class="cta-button" data-id="{{ $producto->id }}" data-nombre="{{ $producto->name }}" data-precio="{{ $producto->precio }}">
                                Agregar al Carrito
                            </button>
                        </div>
                    @endforeach
                @else
                    <p>No hay productos disponibles.</p>
                @endisset
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="contenedor">
            <p>&copy; {{ date('Y') }} Mi Tienda. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
@endsection
