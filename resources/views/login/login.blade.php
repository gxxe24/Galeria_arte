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

    <div class="min-h-screen flex">
        
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
            
            <div class="w-full max-w-md">
                <div class="mb-12 text-center lg:text-left">
                    <span class="block text-xs font-bold tracking-widest uppercase text-gray-400 mb-2">Studio Gallery</span>
                    <h1 class="serif text-4xl lg:text-5xl font-bold mb-4">Bienvenido</h1>
                    <p class="text-gray-500 font-light">Ingrese sus credenciales para acceder al panel de control.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-[10px] uppercase font-bold text-gray-500 mb-2 tracking-wider">Correo Electrónico</label>
                        <input type="email" name="email" id="email" required autofocus
                            class="w-full border-b border-gray-300 py-3 text-lg outline-none focus:border-black transition placeholder-gray-300"
                            placeholder="nombre@ejemplo.com">
                        @error('email')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-[10px] uppercase font-bold text-gray-500 tracking-wider">Contraseña</label>
                            <a href="#" class="text-[10px] text-gray-400 hover:text-black transition underline">¿Olvidaste tu contraseña?</a>
                        </div>
                        <input type="password" name="password" id="password" required
                            class="w-full border-b border-gray-300 py-3 text-lg outline-none focus:border-black transition placeholder-gray-300"
                            placeholder="••••••••">
                        @error('password')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-black border-gray-300 rounded focus:ring-black">
                        <label for="remember" class="ml-2 block text-sm text-gray-500">
                            Mantener sesión iniciada
                        </label>
                    </div>

                    <button type="submit" 
                        class="w-full bg-black text-white py-4 mt-8 uppercase text-xs tracking-[0.2em] font-bold hover:bg-gray-800 transition transform active:scale-[0.99]">
                        Ingresar al Sistema
                    </button>
                </form>

                <div class="mt-12 text-center text-xs text-gray-400">
                    <button @click="!registro">
                        <p>¿No eres socio? <a href="#" class="text-black font-bold underline" >Solicitar Membresía</a></p>
                    </button>
                </div>
            </div>

        </div>
    </div>

</body>

  <script src="{{asset('galeria_arte\vue.js')}}"></script>
<script>
    var app= new Vue({
    el:'#app',
    data:function{
        return{
            registrado:false;
        }
    }
    ,methods:{
        registro(){
            registrado=true;
        }
    }


})

    </script>

</html>