<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Gallery - Inventario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#F9F9F9] text-[#1A1A1A]">

    <nav class="flex justify-between items-center px-12 py-6 bg-white border-b border-gray-100">
        <div class="text-2xl font-bold tracking-tighter serif">STUDIO GALLERY</div>
        <div class="hidden md:flex space-x-8 text-xs font-medium uppercase tracking-widest text-gray-500">
            <a href="#" class="text-black border-b border-black">Inventario</a>
            <a href="#" class="hover:text-black transition">Exhibiciones</a>
            <a href="#" class="hover:text-black transition">Clientes VIP</a>
        </div>
        <div class="w-10 h-10 bg-black rounded-full"></div>
    </nav>

    <main class="max-w-[1400px] mx-auto mt-12 px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <div class="flex-1">
                <div class="flex justify-between items-end mb-10">
                    <h1 class="text-5xl serif">Catálogo de Productos</h1>
                    <button onclick="openModal('agregar')" class="bg-black text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition shadow-lg">
                        + Agregar Producto
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                    @foreach($productos as $producto)
                    <div class="bg-white p-4 border border-gray-100 rounded-sm shadow-sm hover:shadow-md transition">
                        <div class="aspect-square bg-[#E5E5E5] mb-4 overflow-hidden">
                            @if($producto->foto)
                                <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover opacity-90" alt="No tiene">
                            @endif
                        </div>
                        
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Ref: {{ $producto->id }}</p>
                        <h3 class="serif text-xl mb-1">{{ $producto->nombre }}</h3>
                        <p class="text-xs text-gray-400 mb-4 line-clamp-1 border-t border-dashed pt-2 italic">
                            {{ $producto->descripcion}}
                        </p>
                        
                        <div class="text-xl font-medium text-[#2D5A27] mb-4">
                            ${{ $producto->precio }}
                        </div>

                        <div class="flex gap-2">
                            <button onclick="openModal('editar', {{ json_encode($producto) }})" class="flex-1 bg-blue-50 text-blue-600 text-[10px] uppercase tracking-wider font-bold py-2 hover:bg-blue-100 rounded">
                                Editar
                            </button>
                            <form action="{{ route('productos.eliminar', $producto->id) }}" method="POST" class="flex-1">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-full bg-red-50 text-red-500 text-[10px] uppercase tracking-wider font-bold py-2 hover:bg-red-100 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>

    <div id="modal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center p-4 z-50">
        <div class="bg-white w-full max-w-lg p-10 rounded-sm shadow-2xl">
            
            <h2 id="modalTitle" class="serif text-3xl mb-6 text-center">Gestionar Obra</h2>
            <form id="formProducto" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-[10px] uppercase font-bold text-gray-400">Nombre de la Obra</label>
                        <input type="text" name="nombre" id="nombre" class="w-full border-b border-gray-200 py-2 outline-none focus:border-black transition" required>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-gray-400">Tipo ID</label>
                       <select name="tipo" class="form-control">
                            @foreach($tipos as $tipo)
                            <option value="{{$tipo -> id}}">{{$tipo -> nombre}}</option>
                            @endforeach
                        </select>
                       
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-gray-400">Precio</label>
                        <input type="number" name="precio" id="precio" class="w-full border-b border-gray-200 py-2 outline-none focus:border-black transition" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] uppercase font-bold text-gray-400">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="w-full border border-gray-100 p-3 mt-2 text-sm outline-none focus:border-black" rows="3"></textarea>
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="button" onclick="closeModal()" class="flex-1 py-3 text-xs uppercase tracking-widest font-bold border border-gray-200 hover:bg-gray-50">Cerrar</button>
                    <button type="submit" class="flex-1 py-3 bg-black text-white text-xs uppercase tracking-widest font-bold hover:bg-gray-800 transition">Guardar Registro</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(mode, data = null) {
            const modal = document.getElementById('modal');
            const form = document.getElementById('formProducto');
            const method = document.getElementById('formMethod');
            const title = document.getElementById('modalTitle');

            modal.classList.remove('hidden');

            if (mode === 'editar') {
                title.innerText = "Editar Obra";
                form.action = `/productos/editar/${data.id}`;
                method.value = "PUT";
                document.getElementById('nombre').value = data.nombre;
                document.getElementById('idtipo').value = data.idtipo;
                document.getElementById('precio').value = data.precio;
                document.getElementById('descripcion').value = data.descripcion;
            } else {
                title.innerText = "Nueva Obra";
                form.action = "{{ route('productos.guardar') }}";
                method.value = "POST";
                form.reset();
            }
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</body>
</html>