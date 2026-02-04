
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
  <body class="bg-[#FBFBFB]">
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
            <button class="p-2 hover:bg-gray-50 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <div class="h-8 w-8 rounded-full bg-black"></div>
        </div>
      </header>
<!-- NAVBAR (Sera un componente tambien) -->
      <div class="flex flex-1 overflow-hidden">
        <main class="flex-1 overflow-y-auto p-10">
          

            < x-productos_component/>

           
        </main>
          < x-carrito_component/>

      </div>
    </div>
  </body>

  <!-- IMPORTANTE TENER EN EL MASTER TODOS LOS SCRIPTS
      PERDI HORAS VIENDO QUE ERA Y ERA POR ESTO  
  -->
  <script src="{{ asset('galeria_arte/vue.js') }}"></script>

    <script src="{{ asset('galeria_arte/instance.js') }}"></script>

    <script src="{{ asset('galeria_arte/producto_component/productos.js') }}"></script>
    <script src="{{ asset('galeria_arte/finalizar_compra.js') }}"></script>
</html>


