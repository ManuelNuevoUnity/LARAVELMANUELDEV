<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectricVibes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #00aaff, #00ff88);
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #005577;
            color: white;
            padding: 20px;
            text-align: center;
            text-align: center;
        }
        header h1 {
            margin: 0;
            text-align: center;
        }

        .header-menu {
            display: flex;
            gap: 15px;
            text-align: center;
            
        }

        .header-menu a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .header-menu a:hover {
            background-color: #007766;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #003344;
            padding: 15px;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            margin: 0 10px;
        }
        nav a:hover {
            background-color: #007766;
        }
        .catalogo {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }
        .producto {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            width: 250px;
            text-align: center;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .producto img {
            width: 100%;
            height: auto;
        }
        .producto button {
            padding: 10px 15px;
            margin: 10px 0;
            background-color: #005577;
            color: white;
            border: none;
            cursor: pointer;
        }
        .producto button:hover {
            background-color: #007766;
        }
        #carrito {
            position: fixed;
            top: 50px;
            right: 20px;
            width: 300px;
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
        }
        #carrito h2 {
            margin-top: 0;
        }
        #carrito ul {
            list-style-type: none;
            padding: 0;
        }
        #carrito ul li {
            padding: 5px 0;
        }
        #total {
            font-weight: bold;
            margin-top: 10px;
        }
        .carrito-buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<header>
    <h1>ElectricVibes</h1>
</header>

<nav>
    <a href="ofertas.html">Ofertas</a>
    <a href="soporte.html">Soporte Técnico</a>
    <a href="catalogo.blade.php">Inicio</a>
    <a href="registro.php">Registrarse</a>
    <a href="login.php">Iniciar Sesion</a>
    <a href="productos.php">Ver mas Productos</a>
</nav>

<section class="catalogo">
    <div class="producto">
        <img src="imagenes/descarga.png" alt="Laptop">
        <h3>Laptop Tuff Gaming</h3>
        <p>$17000</p>
        <button onclick="agregarAlCarrito('Laptop XYZ', 17000)">Comprar</button>
        <button onclick="agregarAlCarrito('Laptop XYZ', 17000)">Agregar al Carrito</button>
    </div>
    <div class="producto">
        <img src="imagenes/81YsWA0K3RL._AC_UF894,1000_QL80_.jpg" alt="Computadora de escritorio">
        <h3>PC Gamer Yeyian </h3>
        <p>$14500</p>
        <button onclick="agregarAlCarrito('PC Gamer ABC', 14500)">Comprar</button>
        <button onclick="agregarAlCarrito('PC Gamer ABC', 14500)">Agregar al Carrito</button>
    </div>
    <div class="producto">
        <img src="imagenes/lnfmv13jwu5nb0xzzmczeytk58lh6e366455.avif" alt="Laptop">
        <h3>Laptop Lenovo</h3>
        <p>$9500</p>
        <button onclick="agregarAlCarrito('Laptop XYZ', 9500)">Comprar</button>
        <button onclick="agregarAlCarrito('Laptop XYZ', 9500)">Agregar al Carrito</button>
    </div>
    <div class="producto">
        <img src="imagenes/D_NQ_NP_716781-MLM69187416118_052023-O.webp" alt="Laptop">
        <h3>Laptop Acer</h3>
        <p>$12000</p>
        <button onclick="agregarAlCarrito('Laptop XYZ', 12000)">Comprar</button>
        <button onclick="agregarAlCarrito('Laptop XYZ', 12000)">Agregar al Carrito</button>
    </div>
    <div class="producto">
        <img src="imagenes/ALIENWARE_A14I7_875LC_ICECAT_3088136.jpg" alt="Laptop">
        <h3>Laptop Alien Ware</h3>
        <p>$33000</p>
        <button onclick="agregarAlCarrito('Laptop XYZ', 33000)">Comprar</button>
        <button onclick="agregarAlCarrito('Laptop XYZ', 33000)">Agregar al Carrito</button>
    </div>
    <div class="producto">
        <img src="imagenes/dmitry-chernyshov-mp7apsum7ae-unsplash-scaled.webp" alt="Laptop">
        <h3>Laptop Macbook</h3>
        <p>$17000</p>
        <button onclick="agregarAlCarrito('Laptop XYZ', 17000)">Comprar</button>
        <button onclick="agregarAlCarrito('Laptop XYZ', 17000)">Agregar al Carrito</button>
    </div>
    <div class="producto">
        <img src="imagenes/22B53LA-1_T1679634869.avif" alt="Laptop">
        <h3>Laptop HP</h3>
        <p>$8100</p>
        <button onclick="agregarAlCarrito('Laptop XYZ', 8100)">Comprar</button>
        <button onclick="agregarAlCarrito('Laptop XYZ', 8100)">Agregar al Carrito</button>
    </div>
    <div class="producto">
        <img src="imagenes/239511249256478.avif" alt="Laptop">
        <h3>Laptop Asus</h3>
        <p>$7500</p>
        <button onclick="agregarAlCarrito('Laptop XYZ', 7500)">Comprar</button>
        <button onclick="agregarAlCarrito('Laptop XYZ', 7500)">Agregar al Carrito</button>
    </div>
</section>

<div id="carrito">
    <h2>Carrito de Compras</h2>
    <ul id="lista-carrito">
    </ul>
    <p id="total">Total: $0</p>
    <div class="carrito-buttons">
        <button onclick="pagar()">Pagar</button>
        <button onclick="vaciarCarrito()">Eliminar Carrito</button>
    </div>
</div>

<script>
    let carrito = [];
    let total = 0;

    function agregarAlCarrito(nombre, precio) {
        carrito.push({ nombre, precio });
        actualizarCarrito();
    }

    function actualizarCarrito() {
        const listaCarrito = document.getElementById('lista-carrito');
        listaCarrito.innerHTML = '';
        total = 0;

        carrito.forEach((producto, index) => {
            const li = document.createElement('li');
            li.textContent = `${producto.nombre} - $${producto.precio}`;
            const eliminarBtn = document.createElement('button');
            eliminarBtn.textContent = 'Eliminar';
            eliminarBtn.onclick = () => eliminarDelCarrito(index);
            li.appendChild(eliminarBtn);
            listaCarrito.appendChild(li);
            total += producto.precio;
        });

        document.getElementById('total').textContent = `Total: $${total}`;
        document.getElementById('carrito').style.display = 'block';
    }

    function eliminarDelCarrito(index) {
        carrito.splice(index, 1);
        actualizarCarrito();
    }

    function vaciarCarrito() {
        carrito = [];
        actualizarCarrito();
        document.getElementById('carrito').style.display = 'none';
    }

    function pagar() {
        alert(`Pagando un total de $${total}`);
        window.location.href = 'pago.html';
    }
</script>
<nav>
    <a href="#">Ofertas</a>
    <a href="#">Soporte Técnico</a>
    <a href="#">Ver Otras Ofertas</a>
    <a href="">Inicio</a>
    <a href="">Registrarse</a>
    <a href="">Iniciar Sesion</a>
</nav>
</body>
</html>
