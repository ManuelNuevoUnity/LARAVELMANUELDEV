<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ElectricVibes Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f7fa;
        }

        .navbar {
            background-color: #003366;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .nav-link {
            color: #d1e7ff;
        }

        .nav-link.active {
            color: #ffffff;
        }

        .btn-primary, .btn-success {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success:hover {
            background-color: #28a745;
        }

        .logout-button {
            background-color: #ff4d4d;
            border: none;
        }

        .logout-button:hover {
            background-color: #ff1a1a;
        }

        /* Estilo de los cards del dashboard */
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #003366;
            color: white;
        }

        .form-group label {
            font-weight: bold;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        /* Animación de botones de acción */
        .btn-danger {
            background-color: #ff4d4d;
        }

        .btn-danger:hover {
            background-color: #ff1a1a;
        }

        .modal-content {
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ElectricVibes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Modo Administrador</a>
                    </li>
                </ul>
                <form action="{{ route('catalogo') }}" method="GET" class="d-flex me-3">
                <button type="submit" class="btn btn-primary">Inicio</button>
                </form>

                <!-- Botón de Cerrar Sesión -->
                <form action="{{ route('logout') }}" method="POST" class="d-flex">
                @csrf
                <button type="submit" class="logout-button btn btn-danger">Cerrar sesión</button>
                </form>

               
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Mensaje de éxito al crear/editar/eliminar producto -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Card del formulario para crear o editar productos -->
        <div class="card">
            <div class="card-header">
                <h4>{{ isset($producto) ? 'Editar Producto' : 'Crear Producto' }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ isset($producto) ? route('productos.update', $producto->id) : route('productos.store') }}" 
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($producto))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <!-- Nombre del producto -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Descripción del producto -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="description">Descripción</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ old('description', $producto->description ?? '') }}" required>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Imagen del producto -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" name="imagen" id="imagen" {{ isset($producto) ? '' : 'required' }}>
                            @if(isset($producto) && $producto->imagen)
                                <img src="{{ asset('assets/' . $producto->imagen) }}" alt="Imagen del producto" width="100" class="mt-2">
                            @endif
                            @error('imagen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Precio del producto -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio" value="{{ old('precio', $producto->precio ?? '') }}" required>
                            @error('precio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Botón de enviar -->
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">{{ isset($producto) ? 'Actualizar' : 'Crear' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de productos -->
        <div class="card mt-5">
            <div class="card-header">
                <h4>Productos</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->name }}</td>
                                <td><img src="{{ asset($producto->imagen) }}" alt="Imagen del producto" width="50"></td>
                                <td>{{ $producto->description }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editProduct({{ $producto->id }})">
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteProduct({{ $producto->id }})">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal de edición -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario para editar producto (inicialmente oculto) -->
                        <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="edit_name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="edit_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_description">Descripción</label>
                                <input type="text" class="form-control" name="description" id="edit_description" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_precio">Precio</label>
                                <input type="number" class="form-control" name="precio" id="edit_precio" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_imagen">Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="edit_imagen">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="submitEditForm()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script>
        // Función para cargar los datos del producto en la modal
        function editProduct(id) {
            // Llama a una ruta para obtener los datos del producto
            fetch(`/productos/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_description').value = data.description;
                    document.getElementById('edit_precio').value = data.precio;
                    document.getElementById('editForm').action = `/productos/${id}`;
                });
        }

        // Función para enviar el formulario de edición
        function submitEditForm() {
            document.getElementById('editForm').submit();
        }
    </script>

<script>
    let deleteProductId;

    // Función para establecer el ID del producto a eliminar
    function setDeleteProduct(id) {
        deleteProductId = id; // Guarda el ID del producto
    }

    // Función para enviar la solicitud de eliminación
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteProductId) {
            // Crea un formulario para enviar la solicitud de eliminación
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/productos/${deleteProductId}`;
            form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            document.body.appendChild(form);
            form.submit(); // Envía el formulario
        }
    });
</script>

</body>

</html>
