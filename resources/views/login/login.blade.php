<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Studio Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-white text-[#1A1A1A]">

    <div id="app" class="min-h-screen flex">
        
        <div class="hidden lg:block w-1/2 relative bg-gray-900">
            <img src="https://images.unsplash.com/photo-1545989253-02cc26577f88?q=80&w=2000&auto=format&fit=crop" 
                 alt="Gallery Texture" 
                 class="absolute inset-0 w-full h-full object-cover opacity-60">
            <div class="absolute bottom-12 left-12 text-white z-10">
                <p class="uppercase tracking-[0.3em] text-xs mb-2">Exhibición Actual</p>
                <h2 class="serif text-4xl">Sombras del Modernismo</h2>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 lg:p-24">
            
            <div v-if="registrado" class="w-full max-w-md">
                <div class="mb-12 text-center lg:text-left">
                    <span class="block text-xs font-bold tracking-widest uppercase text-gray-400 mb-2">Studio Gallery</span>
                    <h1 class="serif text-4xl lg:text-5xl font-bold mb-4">Iniciar Sesión</h1>
                    <p class="text-gray-500 font-light">Ingrese sus credenciales para acceder.</p>
                </div>



                <form action="{{ route('Login.iniciar_sesion') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-gray-500 mb-2 tracking-wider">Correo Electrónico</label>
                        <input type="email" name="email" class="w-full border-b border-gray-300 py-3 text-lg outline-none focus:border-black transition" placeholder="nombre@ejemplo.com">
                    </div>

                    <div>
                        <label class="block text-[10px] uppercase font-bold text-gray-500 mb-2 tracking-wider">Contraseña</label>
                        <input type="password" name="password" class="w-full border-b border-gray-300 py-3 text-lg outline-none focus:border-black transition" placeholder="••••••••">
                    </div>
                            @if(session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 flex justify-center items-center" role="alert">
                                    <strong class="font-bold mr-1">¡Error!</strong>
                                    <span class="block sm:inline">{{ session('error') }}</span>
                                </div>
                            @endif

                    <button type="submit" class="w-full bg-black text-white py-4 mt-8 uppercase text-xs tracking-[0.2em] font-bold hover:bg-gray-800 transition">
                        Ingresar al Sistema
                    </button>
                </form>




                <div class="mt-12 text-center text-xs text-gray-400">
                    <p>¿No eres socio? 
                        <button @click="registrado = false" class="text-black font-bold underline">Solicitar Membresía</button>
                    </p>
                </div>
            </div>

            <div v-else class="w-full max-w-md">
                <div class="mb-12 text-center lg:text-left">
                    <span class="block text-xs font-bold tracking-widest uppercase text-gray-400 mb-2">Studio Gallery</span>
                    <h1 class="serif text-4xl lg:text-5xl font-bold mb-4">Registrarse</h1>
                    <p class="text-gray-500 font-light">Únete a nuestra comunidad exclusiva.</p>
                </div>




                <form action="{{ route('Login.registro') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-[10px] uppercase font-bold text-gray-500 mb-2 tracking-wider">Correo Electrónico</label>
                        <input type="email" name="email"class="w-full border-b border-gray-300 py-3 text-lg outline-none focus:border-black transition">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-gray-500 mb-2 tracking-wider">Contraseña</label>
                        <input type="password" name="password"class="w-full border-b border-gray-300 py-3 text-lg outline-none focus:border-black transition">
                    </div>
                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 flex justify-center items-center" role="alert">
                                <strong class="font-bold mr-1">¡Error!</strong>
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                    <button type="submit" class="w-full bg-black text-white py-4 mt-8 uppercase text-xs tracking-[0.2em] font-bold hover:bg-gray-800 transition">
                        Registrarse
                    </button>
                    
                </form>





                <div class="mt-12 text-center text-xs text-gray-400">
                    <p>¿Ya tienes cuenta? 
                        <button @click="registrado = true" class="text-black font-bold underline">Iniciar Sesión</button>
                    </p>
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
                    registrado: true // Inicia mostrando el Login
                }
            },
            methods: {
                toggleRegistro: function() {
                    this.registrado = !this.registrado;
                }
            }
        });
    </script>
</body>
</html> 
