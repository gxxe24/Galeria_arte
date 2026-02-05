<html>
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Art Gallery POS</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style>
      body { font-family: 'Inter', sans-serif; }
      h1, h2, h3, .serif { font-family: 'Playfair Display', serif; }
    </style>
  </head>
  <body class="bg-[#FBFBFB]"  >
    <div id="app">
      <div class="relative flex h-screen w-full flex-col overflow-hidden">
        
        <header class="flex items-center justify-between border-b border-gray-100 bg-white px-10 py-4">
          <div class="flex items-center gap-8">
            <h2 class="text-2xl font-bold tracking-tighter uppercase">Studio Gallery</h2>
            <nav class="flex gap-6 text-xs uppercase tracking-widest text-gray-500">
              <a class="hover:text-black transition-colors" href="#">Inventario</a>
              <a class="hover:text-black transition-colors" href="#">Exhibiciones</a>
              <a class="hover:text-black transition-colors" href="#">Clientes VIP</a>
            </nav>
          </div>
          <div class="flex items-center gap-4">
              <button @click="catalogo" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out">
                Admin
              </button>

              <div class="h-8 w-8 rounded-full bg-black"></div>
          </div>
        </header>

        <div class="flex flex-1 overflow-hidden">
          <main class="flex-1 overflow-y-auto p-10">
            <div class="mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Nueva Adquisición</h1>
                  <div class="flex gap-4 border-b border-gray-100">
                      <div v-for="tipo in tipos" >
                          <button @click="categoria_seleccionada=tipo.id" :class="{'border-b-2 border-black py-4 text-xs uppercase tracking-widest font-semibold':tipo.id==categoria_seleccionada,'py-4 text-xs uppercase tracking-widest text-gray-400 hover:text-black':tipo.id!=categoria_seleccionada }">@{{tipo.nombre}}</button>
                      </div>
                  </div>
                <h2 >@{{productos_categoria}}</h2>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12" id="producto">
             <!-- PRODUCTOS DE LA BD -->
              <div class="group cursor-pointer"  v-for="producto in filtro_categoria" :key="producto.id">
                  
                <div class="aspect-[3/4] overflow-hidden bg-gray-100 mb-4 relative shadow-sm transition-shadow hover:shadow-xl">
                    <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&w=600&q=80" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <button @click="agregar_orden(producto)" class="bg-white px-6 py-3 text-[10px] uppercase tracking-[0.2em] font-bold shadow-2xl">Preview</button>
                    </div>
                </div>
                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-1">Óleo sobre lienzo, 2024</p>
                <h3 class="text-xl font-bold">@{{producto.nombre}}</h3>
                <p class="text-sm italic text-gray-600 mb-2">@{{producto.descripcion}}</p>
                <p class="text-lg font-light">@{{producto.precio}}</p>
              </div>
            </div>
          </main>
          <!-- DETALLE COMPRA -->
          <aside class="w-[400px] border-l border-gray-100 bg-white p-8 flex flex-col shadow-2xl">
            <h2 class="text-2xl font-bold mb-8">Resumen de Venta</h2>
            
            <div class="flex-1 overflow-y-auto">
              <div class="flex gap-4 mb-8" v-for="producto in orden" :key="producto.id">
                
                <div class="h-24 w-16 bg-gray-100 shrink-0">
                  <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&w=150&q=80" class="h-full w-full object-cover">
                </div>
                <div class="flex-1 flex flex-col justify-center">
                  <div class="flex justify-between items-start">
                    <h4 class="text-sm font-bold uppercase">@{{producto.nombre}}</h4>
                    <!-- Boton Delete -->
                    <button @click="eliminar(producto)" class="text-red-300 hover:text-red-500">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
                    </button>
                  </div>
                  <p class="text-xs text-gray-500 mt-1 italic">Incluye Certificado de Autenticidad</p>
                    <!-- <div v-for="opcion in opciones_adicionales">
                        <option value="opcion.id">@{{opcion.nombre}}</option>
                    </div> -->
                  <div class="mt-3 flex items-center justify-between">
                      <span class="text-xs font-semibold tracking-tighter">PRECIO FINAL</span>
                      <span class="text-sm font-light">$@{{producto.precio}}</span>
                  </div>
                </div>
                
              </div>
            </div>
                    <div v-if="orden.length>0">
                      <button @click="vaciar_carrito" class="text-red-300 hover:text-red-500">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"  viewBox="0 0 640 640"><path d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg>                    
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
                <span>$@{{orden_summary.subtotal}}</span>
              </div>
              <div class="flex justify-between text-sm">
                <span class="text-gray-500">Impuestos Artísticos (16%)</span>
                <span>$@{{orden_summary.impuesto}}</span>
              </div>
              <div class="flex justify-between text-xl font-bold pt-4 border-t border-black">
                <span>Total</span>
                <span>$@{{orden_summary.total}}</span>
              </div>

              <button class="w-full bg-black text-white py-5 text-[10px] font-bold uppercase tracking-[0.3em] hover:bg-gray-800 transition-all mt-6">
                Finalizar Transacción
              </button>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </body>
  <script src="{{asset('galeria_arte\vue.js')}}"></script>
  <script>
    var app= new Vue({
    el:'#app',
    data:function(){
        return{
            productos:[],//Hay veo como paso los datos al formato correspondiente
            orden:[],
            tipos: @JSON($tipos),
            categoria_seleccionada:1,
            impuesto:0.16,
            usuario:{
              nombre:'',
              id:0,
              email:'',
              telefono:'',
              foto:'',
            },
            
        }},

    computed:{
      //Devuelve un arreglo de productos, pero solo devuelve los productos de la categoria seleccionada
      filtro_categoria(){
          return this.productos.filter(prod=>prod.idtipo==this.categoria_seleccionada)
      },
      
      //Devuelve un objeto nombre_categoria
      productos_categoria(){
        //La funcion compara si la categoria seleccionada en el momento coincide con algun id de tipo. 
        //Con nombre se puede acceder a cualquier propiedad de tipos.
        let n=this.tipos.findIndex(tipo=>tipo.id==this.categoria_seleccionada)
        let nombre_categoria= (this.n<-1) ? '':this.tipos[n].nombre;
        return nombre_categoria;
      }
      ,orden_summary(){
        let datos={
          subtotal:0,
          impuesto:0,
          total:0,
        }
        datos.subtotal=this.orden.reduce((acc,prod)=> acc+=parseFloat(prod.precio),0);
        datos.impuesto= datos.subtotal*this.impuesto;
        datos.total=datos.subtotal+datos.impuesto;
        return datos;
      }
        
    }
    ,methods:{
      agregar_orden(producto){
        return this.orden.push(producto);
      },
      eliminar(producto){
        this.orden.splice(producto,1);
      },
      catalogo(){
        window.location.href= '/catalogo_productos';
      }     
      ,vaciar_carrito(){
        this.orden=[];
      }
      ,

      //Funcion que envia el producto hacia 
        
    }
    ,created(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','/productos',true);
    //funcion flecha para que el this apunte directamente a vue
    xhr.onreadystatechange= ()=>{
      if(xhr.readyState==4){
        if(xhr.status==200){
          this.productos=JSON.parse(xhr.responseText);              
        }
        else{
        alert("Falla");
        }
      }
    };
    xhr.send();

  }
    

})
  </script>

</html>
