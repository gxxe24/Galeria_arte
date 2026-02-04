<div id="producto" class="p-5 bg-gray-50">
    <div class="mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Nueva Adquisición</h1>
        <div class="flex gap-4 border-b border-gray-100">
            <button class="border-b-2 border-black py-4 text-xs uppercase tracking-widest font-semibold">Pintura</button>
            <button class="py-4 text-xs uppercase tracking-widest text-gray-400 hover:text-black transition-colors">Escultura</button>
            <button class="py-4 text-xs uppercase tracking-widest text-gray-400 hover:text-black transition-colors">Fotografía</button>
        </div>
    </div>

    <div class="flex flex-wrap gap-8 justify-start">
        <div v-for="producto in productos" :key="producto.id" 
             class="flex flex-col w-[280px] border border-gray-200 bg-white p-3 rounded-sm shadow-sm hover:shadow-md transition-shadow">
            
            <img src="https://i.pinimg.com/1200x/19/7c/ad/197cad6c6b82951365de9538b2051361.jpg" 
                 alt="Imagen del producto"
                 class="w-full h-[200px] object-cover rounded-sm">

            <div class="flex flex-col gap-2 mt-4">
                <h3 class="font-bold text-lg text-gray-800 truncate">@{{ producto.nombre }}</h3>
                <p class="text-gray-600 font-medium text-sm">Precio: $@{{ producto.precio }}</p>
                
                <div class="flex flex-col gap-2 mt-2">
                    <button @click="agregar_orden(producto)" 
                            class="flex w-full cursor-pointer items-center justify-center rounded-lg h-9 px-4 bg-black text-white text-sm font-medium hover:bg-gray-800 transition-colors">
                        <span class="truncate">Add to Order</span>
                    </button>
                    
                    <button class="flex w-full cursor-pointer items-center justify-center rounded-lg h-9 px-4 bg-gray-100 text-gray-800 text-sm font-medium hover:bg-gray-200 transition-colors">
                        <span class="truncate">Preview</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('galeria_arte/vue.js') }}"></script>
<script src="{{ asset('galeria_arte/instance.js') }}">

<script src="{{ asset('galeria_arte/producto_component/productos.js') }}"></script>
<script src="{{ asset('galeria_arte/finalizar_compra.js') }}"></script>