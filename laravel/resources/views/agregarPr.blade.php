<!DOCTYPE html>
<html class="dark" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>MACUIN ADMIN - Agregar producto</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="/js/tailwind-config.js"></script>
<link href="/css/app.css" rel="stylesheet"/>
<script src="/js/api.js"></script>
</head>
<body class="bg-surface text-on-surface antialiased overflow-hidden">
<aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] w-64 border-r-0 z-50">
<div class="px-6 mb-10">
<h1 class="text-xl font-black tracking-tighter text-[#ffb3b1]">MACUIN ADMIN</h1>
<p class="text-[0.65rem] font-['Inter'] antialiased tracking-tight uppercase font-bold text-[#c2c6d3] opacity-60">Control de Precisión</p>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150" href="/dashboard">
<span class="material-symbols-outlined mr-3 text-lg">dashboard</span>General</a>
<a class="flex items-center py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150" href="/personal">
<span class="material-symbols-outlined mr-3 text-lg">badge</span>Gestión de personal</a>
<a class="flex items-center py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150" href="/registrar-admin">
<span class="material-symbols-outlined mr-3 text-lg">person_add</span>Registrar administrador</a>
<a class="flex items-center py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150" href="/productos">
<span class="material-symbols-outlined mr-3 text-lg">inventory_2</span>Gestión de productos</a>
<a class="flex items-center py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3 transition-colors duration-150" href="/agregar-producto">
<span class="material-symbols-outlined mr-3 text-lg">add_box</span>Agregar producto</a>
<a class="flex items-center py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150" href="/pedidos">
<span class="material-symbols-outlined mr-3 text-lg">list_alt</span>Ver pedidos</a>
</nav>
<div class="px-6 mt-auto pt-6 border-t border-outline-variant/10">
<button class="w-full bg-[#1c2a41] text-[#c2c6d3] text-[0.7rem] font-bold uppercase hover:bg-surface-bright transition-all py-3" onclick="window.Api.logout()">Cerrar sesión</button>
</div>
</aside>
<main class="ml-64 min-h-screen flex flex-col">
<header class="h-16 flex items-center justify-between px-8 bg-surface-container-low">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-sm">precision_manufacturing</span>
<span class="text-xs font-bold tracking-widest uppercase text-secondary">Módulo: unidad_adicion_inventario</span>
</div>
</header>
<section class="flex-1 p-12 overflow-y-auto">
<div class="max-w-4xl mx-auto">
<div class="flex items-end justify-between mb-12">
<div>
<h2 class="text-4xl font-black tracking-tighter text-on-surface uppercase mb-2">Agregar producto</h2>
<div class="h-1 w-24 bg-on-primary-container"></div>
</div>
</div>
<form class="grid grid-cols-12 gap-8" onsubmit="event.preventDefault(); const p = {nombre: this.nombre.value, fabricante: this.fabricante.value, precio: parseFloat(this.precio.value), stock: parseInt(this.stock.value), especificaciones: 'Dim: ' + document.getElementById('dim').value + ' | Peso: ' + document.getElementById('weight').value + ' | Desc: ' + document.getElementById('desc').value}; window.Api.crearProducto(p).then(()=>window.location.href='/productos').catch(e=>alert('Error'));">
<div class="col-span-12 bg-surface-container-low p-8 border-l-2 border-primary">
<h3 class="text-xs font-bold tracking-widest text-secondary uppercase mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">fingerprint</span>Identificación Básica</h3>
<div class="grid grid-cols-2 gap-6">
<div class="space-y-1">
<label class="text-[10px] font-bold text-secondary uppercase tracking-wider">Nombre del Producto</label>
<input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:border-on-primary-container focus:ring-0 text-on-surface text-sm placeholder:opacity-30" placeholder="Componente Industrial X-100" type="text" name="nombre" required/>
</div>
<div class="space-y-1">
<label class="text-[10px] font-bold text-secondary uppercase tracking-wider">Fabricante</label>
<input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:border-on-primary-container focus:ring-0 text-on-surface text-sm placeholder:opacity-30" placeholder="Sistemas Globales Corp" type="text" name="fabricante" required/>
</div>
</div>
</div>
<div class="col-span-7 bg-surface-container-high p-8">
<h3 class="text-xs font-bold tracking-widest text-secondary uppercase mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">analytics</span>Inventario y Valoración</h3>
<div class="grid grid-cols-2 gap-6">
<div class="space-y-1">
<label class="text-[10px] font-bold text-secondary uppercase tracking-wider">Precio Unitario</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 text-secondary-fixed-dim font-mono text-sm">$</span>
<input class="w-full pl-8 bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:border-on-primary-container focus:ring-0 text-on-surface font-mono text-lg" placeholder="0.00" step="0.01" type="number" name="precio" required/>
</div>
</div>
<div class="space-y-1">
<label class="text-[10px] font-bold text-secondary uppercase tracking-wider">Cantidad en Stock</label>
<div class="relative">
<span class="absolute right-3 top-1/2 -translate-y-1/2 text-secondary-fixed-dim text-[10px] font-bold uppercase tracking-wider">Unidades</span>
<input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:border-on-primary-container focus:ring-0 text-on-surface font-mono text-lg" placeholder="0" type="number" name="stock" required/>
</div>
</div>
</div>
</div>
<div class="col-span-5 bg-surface-container-low p-8">
<h3 class="text-xs font-bold tracking-widest text-secondary uppercase mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">settings_input_component</span>Especificaciones</h3>
<div class="space-y-4">
<div class="space-y-1">
<label class="text-[10px] font-bold text-secondary uppercase tracking-wider">Dimensiones</label>
<input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:border-on-primary-container focus:ring-0 text-on-surface text-xs" placeholder="100x200x50 mm" type="text" id="dim"/>
</div>
<div class="space-y-1">
<label class="text-[10px] font-bold text-secondary uppercase tracking-wider">Peso Operativo</label>
<input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:border-on-primary-container focus:ring-0 text-on-surface text-xs" placeholder="12.5 kg" type="text" id="weight"/>
</div>
</div>
</div>
<div class="col-span-12 bg-surface-container-high p-8">
<h3 class="text-xs font-bold tracking-widest text-secondary uppercase mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">description</span>Descripción Técnica y Cumplimiento</h3>
<textarea class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:border-on-primary-container focus:ring-0 text-on-surface text-sm p-4 placeholder:opacity-30 resize-none" placeholder="Ingrese especificaciones técnicas detalladas..." rows="4" id="desc"></textarea>
</div>
<div class="col-span-12 flex items-center justify-between pt-8 border-t border-outline-variant/10">
<div class="flex gap-4">
<button class="px-8 py-3 text-[10px] font-bold uppercase tracking-widest text-secondary hover:text-on-surface transition-colors" type="reset">Descartar Cambios</button>
<button class="group relative px-12 py-3 bg-gradient-to-br from-[#ffb3b1] to-[#ee3f4b] hover:from-[#ee3f4b] hover:to-[#ffb3b1] text-on-primary font-black uppercase tracking-[0.2em] transition-all duration-150" type="submit">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>Agregar Producto</div>
</button>
</div>
</div>
</form>
</div>
</section>
</main>
</body>
</html>