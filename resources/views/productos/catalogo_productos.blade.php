@extends('App.master_galeria_arte')

   

@section('content')
    <div id="app">
        
        

        <div class="container mx-auto px-4">

            <!-- ============================================ -->
            <!-- TABLA DE PRODUCTOS (v-if="!mostrarFormulario") -->
            <!-- ============================================ -->
            <div v-if="!mostrarFormulario">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Catálogo de Productos</h2>
                    <button 
                        @click="nuevoProducto"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow transition duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Agregar Producto
                    </button>
                </div>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-gray-700 text-white text-left text-xs uppercase font-semibold tracking-wider">
                                <th class="px-5 py-3">ID</th>
                                <th class="px-5 py-3">Nombre</th>
                                <th class="px-5 py-3">Descripcion</th>
                                <th classz="px-5 py-3">Tipo</th>
                                <th class="px-5 py-3 text-center">Imagen</th>
                                <th class="px-5 py-3 text-right">Precio</th>
                                
                                <th class="px-5 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <!-- v-for repite este <tr> por cada producto -->
                            <tr v-for="producto in productos" :key="producto.id" class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-5 py-5 text-sm">@{{ producto.id }}</td>
                                <td class="px-5 py-5 text-sm font-bold">@{{ producto.nombre }}</td>
                                <td class="px-5 py-5 text-sm font-bold">@{{ producto.descripcion}}</td>
                                <td class="px-5 py-5 text-sm">
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 inline-block rounded-full uppercase font-semibold tracking-wide">
                                        @{{ producto.nombre_tipo }}
                                    </span>
                                </td>
                                <td class="px-5 py-5 text-sm text-center">
                                    <div v-if="producto.imagen" class="flex justify-center">
                                        <img :src="'/storage/productos/' + producto.imagen" class="h-10 w-10 rounded-full object-cover border">
                                    </div>
                                    <span v-else class="text-gray-400 text-xs">Sin imagen</span>
                                </td>
                                <td class="px-5 py-5 text-sm text-right font-mono">$@{{ producto.precio }}</td>
                                <!-- <td class="px-5 py-5 text-sm">@{{ producto.disponible ? 'Disponible' : 'No disponible' }}</td> -->
                                <td class="px-5 py-5 text-sm text-center">
                                    <button 
                                        @click="editarProducto(producto)" 
                                        class="text-indigo-600 hover:text-indigo-900 font-medium">
                                        Editar
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="productos.length === 0">
                                <td colspan="7" class="px-5 py-5 text-center text-gray-500">No hay productos registrados.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- FORMULARIO (v-else) -->
            <!-- ============================================ -->
            <div v-else>
                <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
                    <div class="bg-gray-700 px-6 py-4 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-white">
                            @{{ operacion === 'Agregar' ? 'Nuevo Producto' : 'Editar Producto #' + form.id }}
                        </h3>
                        <button @click="cancelar" class="text-gray-300 hover:text-white text-2xl">&times;</button>
                    </div>

                    <form action="{{ route('productos.save') }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        
                        <!-- Campo oculto para el ID (solo se envía en edición) -->
                        <input type="hidden" name="id" :value="form.id">

                        <div class="grid grid-cols-1 gap-6">
                            
                            <!-- NOMBRE -->
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                                <input type="text" name="nombre" v-model="form.nombre" required
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Descripcion</label>
                                <input type="text" name="descripcion" v-model="form.descripcion" required
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- TIPO Y PRECIO -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Tipo</label>
                                    <select name="idtipo" v-model="form.idtipo" required
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white">
                                        <option value="" disabled>Seleccione un tipo</option>
                                        <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">
                                            @{{ tipo.nombre }}
                                        </option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                                    <input type="number" step="0.01" name="precio" v-model="form.precio" required
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>

                            <!-- IMAGEN -->
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
                                <input type="file" name="imagen" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p v-if="operacion === 'Editar' && form.imagen_actual" class="mt-1 text-xs text-gray-500">
                                    Imagen actual: @{{ form.imagen_actual }}
                                </p>
                            </div>

                            <!-- DISPONIBLE (Checkbox) -->
                            <div class="flex items-center">
                                <input type="checkbox" name="disponible" v-model="form.disponible" value="1" id="disponible"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500">
                                <label for="disponible" class="ml-2 text-sm font-medium text-gray-700">Producto disponible</label>
                            </div>

                        </div>

                        <!-- BOTONES -->
                        <div class="mt-8 pt-4 border-t border-gray-200 flex justify-between items-center">
                            
                            <!-- Botón Eliminar (solo en edición) -->
                            <div>
                                <button v-if="operacion === 'Editar'"
                                    type="submit" 
                                    name="operacion" 
                                    value="Eliminar"
                                    onclick="return confirm('¿Eliminar este producto permanentemente?')"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                    Eliminar
                                </button>
                            </div>

                            <!-- Botones Cancelar y Guardar -->
                            <div class="flex space-x-3">
                                <button type="button" @click="cancelar" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                    Cancelar
                                </button>
                                <button type="submit" name="operacion" :value="operacion"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded">
                                    @{{ operacion }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

  <script src="{{asset('galeria_arte\dist\vue.js')}}"></script>

    <script>
        new Vue({
            el: '#app',
            data: function() {
                return {
                    // Datos de Laravel → JavaScript
                    productos: @JSON($productos),  // Array de productos
                    tipos: @JSON($tipos),          // Array de tipos para el select
                    
                    // Control de UI
                    mostrarFormulario: false,  // false = muestra tabla, true = muestra formulario
                    operacion: 'Agregar',      // 'Agregar' o 'Editar'
                    
                    // Datos del formulario
                    form: {
                        id: '',
                        idtipo: '',
                        nombre: '',
                        precio: '',
                        descripcion: '',
                        imagen_actual: ''
                    }
                }
            },
            methods: {
                // Se ejecuta al hacer clic en "Agregar Producto"
                nuevoProducto: function() {
                    this.operacion = 'Agregar';
                    this.resetForm();
                    this.mostrarFormulario = true;  // Oculta tabla, muestra formulario
                },
                

                editarProducto: function(producto) {
                    this.operacion = 'Editar';
                    
                    // Agarra los datos que ya estan en ese producto
                    this.form.id = producto.id;
                    this.form.idtipo = producto.idtipo;
                    this.form.nombre = producto.nombre;
                    this.form.precio = producto.precio;
                    this.form.descripcion = producto.descripcion;
                    this.form.imagen_actual = producto.imagen;
                    
                    this.mostrarFormulario = true;  // Muestra el formulario
                },
                
                // Se ejecuta al hacer clic en "Cancelar"
                cancelar: function() {
                    this.mostrarFormulario = false;  // Vuelve a mostrar la tabla
                    this.resetForm();
                },
                
                // Limpia el formulario
                resetForm: function() {
                    this.form = {
                        id: '',
                        idtipo: '',
                        nombre: '',
                        precio: '',
                        descripcion: '',
                        imagen_actual: ''
                    };
                }
            }
        });
    </script>
@endsection