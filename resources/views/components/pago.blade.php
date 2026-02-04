<html>
<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FBFBFB]">

    <header class="flex items-center justify-between px-10 py-6 bg-white border-b border-gray-100">
        <h2 class="text-xl font-bold tracking-tighter uppercase">Studio Gallery</h2>
        <div class="flex items-center gap-4 text-xs font-semibold tracking-widest text-gray-400">
            <span class="text-black border-b border-black pb-1">01 ENVÍO</span>
            <span>02 PAGO</span>
            <span>03 CONFIRMACIÓN</span>
        </div>
        <a href="#" class="text-xs underline hover:text-gray-600">Volver a la galería</a>
    </header>

    <main class="max-w-6xl mx-auto mt-12 px-6 flex flex-col md:flex-row gap-16">
        
        <div class="flex-1 space-y-12">
            
            <section>
                <h3 class="serif text-2xl mb-6">Dirección de Envío de Obra</h3>
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="Nombre completo" class="col-span-2 border-gray-200 focus:ring-black focus:border-black p-3 text-sm">
                    <input type="text" placeholder="Calle y número" class="col-span-2 border-gray-200 focus:ring-black focus:border-black p-3 text-sm">
                    <input type="text" placeholder="Ciudad" class="border-gray-200 focus:ring-black focus:border-black p-3 text-sm">
                    <input type="text" placeholder="Código Postal" class="border-gray-200 focus:ring-black focus:border-black p-3 text-sm">
                </div>
            </section>

            <section>
                <h3 class="serif text-2xl mb-6">Método de Manejo</h3>
                <div class="space-y-3">
                    <label class="flex items-center justify-between p-4 border border-black bg-white cursor-pointer">
                        <div class="flex items-center gap-3">
                            <input type="radio" name="shipping" checked class="text-black focus:ring-black">
                            <div>
                                <p class="text-sm font-bold">Envío Curado Premium</p>
                                <p class="text-xs text-gray-500">Empaque especializado y seguro de transporte incluido.</p>
                            </div>
                        </div>
                        <span class="text-sm font-semibold">$120.00</span>
                    </label>
                    <label class="flex items-center justify-between p-4 border border-gray-100 bg-white hover:border-gray-300 cursor-pointer transition-colors">
                        <div class="flex items-center gap-3">
                            <input type="radio" name="shipping" class="text-black focus:ring-black">
                            <div>
                                <p class="text-sm font-bold">Recogida en Galería</p>
                                <p class="text-xs text-gray-500">Disponible en Ciudad de México.</p>
                            </div>
                        </div>
                        <span class="text-sm font-semibold">Gratis</span>
                    </label>
                </div>
            </section>
        </div>

        <aside class="w-full md:w-[380px]">
            <div class="bg-white border border-gray-100 p-8 sticky top-8">
                <h3 class="text-sm font-bold uppercase tracking-widest mb-6">Tu Pedido</h3>
                
                <div class="flex gap-4 mb-6 pb-6 border-b border-gray-50">
                    <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&w=100&q=80" class="w-16 h-20 object-cover">
                    <div>
                        <p class="text-sm font-bold">Resonancia Etérea</p>
                        <p class="text-xs italic text-gray-500">Julianne Moore</p>
                        <p class="text-sm mt-2 font-medium">$4,250.00</p>
                    </div>
                </div>

                <div class="space-y-3 text-sm mb-6">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Subtotal</span>
                        <span>$4,250.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Envío</span>
                        <span>$120.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Impuestos</span>
                        <span>$680.00</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg pt-3 border-t border-gray-100">
                        <span>Total</span>
                        <span>$5,050.00</span>
                    </div>
                </div>

                <button class="w-full bg-black text-white py-4 text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-gray-800 transition-all">
                    Continuar al Pago
                </button>
                
                <p class="text-[10px] text-gray-400 text-center mt-4 leading-relaxed">
                    Al continuar, aceptas nuestras Condiciones de Venta de Arte y Política de Privacidad.
                </p>
            </div>
        </aside>
    </main>
</body>
</html>