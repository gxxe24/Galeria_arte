 <aside class="w-[400px] border-l border-gray-100 bg-white p-8 flex flex-col shadow-2xl" id="finalizar_compra">
          <h2 class="text-2xl font-bold mb-8">Resumen de Venta</h2>
          
          <div class="flex-1 overflow-y-auto">
            <div class="flex gap-4 mb-8">
              <div class="h-24 w-16 bg-gray-100 shrink-0">
                <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&w=150&q=80" class="h-full w-full object-cover">
              </div>
              <div class="flex-1 flex flex-col justify-center">
                <div class="flex justify-between items-start">
                  <h4 class="text-sm font-bold uppercase" v-for>Resonancia Etérea</h4 >
                  <button class="text-gray-300 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
                  </button>
                </div>
                <p class="text-xs text-gray-500 mt-1 italic">Incluye Certificado de Autenticidad</p>
                <div class="mt-3 flex items-center justify-between">
                    <span class="text-xs font-semibold tracking-tighter">PRECIO FINAL</span>
                    <span class="text-sm font-light">$4,250.00</span>
                </div>
              </div>
            </div>
          </div>
          <div v-for="producto in productos" :key="producto.id" class="card">
                  <h3>@{{ orden.nombre }}</h3>
                  <p>Precio: $@{{ producto.precio }}</p>
                  <button v-if="producto.archivo_ar" @click="proyectar(producto.archivo_ar)"  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 flex-row-reverse bg-[#f4f3f0] text-[#181511] text-sm font-medium leading-normal w-fit">
                      VER EN MI SALA
                  </button>
            </div>
          <div class="border-t border-gray-100 pt-8 space-y-4">
            <div class="bg-gray-50 p-4 rounded-sm mb-4">
                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">Cliente Coleccionista</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium">Joel (Socio Premium)</span>
                    <button class="text-[10px] text-blue-600 font-bold uppercase underline">Cambiar</button>
                </div>
            </div>

            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Subtotal</span>
              <span>$4,250.00</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Impuestos Artísticos (16%)</span>
              <span>$680.00</span>
            </div>
            <div class="flex justify-between text-xl font-bold pt-4 border-t border-black">
              <span>Total</span>
              <span>$@{{total}}</span>
            </div>

            <button @click="finalizar_pago()" class="w-full bg-black text-white py-5 text-[10px] font-bold uppercase tracking-[0.3em] hover:bg-gray-800 transition-all mt-6">
              Finalizar Transacción
            </button>
          </div>  
        </aside>
        <!-- Nunca usar public, laravel usa public como la raiz del servidor, nunca empieza a buscar el archivo alli -->
        <!-- <script src="{{asset('public\galeria_arte\finalizar_compra.js ')}}"></script> -->
          <script src="{{ asset('galeria_arte/vue.js') }}"></script>
          
<script src="{{ asset('galeria_arte/instance.js') }}"></script>

<script src="{{ asset('galeria_arte/producto_component/productos.js') }}"></script>
         <script src="{{ asset('galeria_arte/finalizar_compra.js') }}"></script>