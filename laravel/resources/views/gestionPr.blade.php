<!DOCTYPE html>
<html class="dark" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   MACUIN ADMIN - Gesti&oacute;n de Productos
  </title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <script src="/js/tailwind-config.js">
  </script>
  <link href="/css/app.css" rel="stylesheet"/>
  <script src="/js/api.js">
  </script>
 </head>
 <body class="antialiased overflow-hidden">
  <!-- Sidebar Navigation Shell -->
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] w-64 border-r-0 z-40">
   <div class="px-6 mb-10">
    <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1]">
     MACUIN ADMIN
    </h1>
   </div>
   <nav class="flex-1 space-y-1">
    <a class="flex items-center px-6 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150 group" href="/dashboard">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="dashboard">
      dashboard
     </span>
     General
    </a>
    <a class="flex items-center px-6 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150 group" href="/personal">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="badge">
      badge
     </span>
     Gestion de personal
    </a>
    <a class="flex items-center px-6 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150 group" href="/registrar-admin">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="person_add">
      person_add
     </span>
     Registrar administrador
    </a>
    <!-- Active Tab: Gestion de productos -->
    <a class="flex items-center px-6 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3 transition-colors duration-150" href="/productos">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="inventory_2">
      inventory_2
     </span>
     Gestion de productos
    </a>
    <a class="flex items-center px-6 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150 group" href="/agregar-producto">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="add_box">
      add_box
     </span>
     Agregar producto
    </a>
    
    <a class="flex items-center px-6 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4 transition-colors duration-150 group" href="/pedidos">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="list_alt">
      list_alt
     </span>
     Ver pedidos
    </a>
    
   </nav>
  </aside>
  <!-- Main Content Canvas -->
  <main class="ml-64 min-h-screen bg-surface flex flex-col">
   <!-- Header Section -->
   <header class="h-16 flex items-center justify-between px-8 bg-surface-container-low border-b-0">
    <div class="flex items-center gap-4">
     <h2 class="text-headline-sm font-black tracking-tight text-on-surface uppercase">
      Gestion de productos
     </h2>
    </div>
    <div class="flex items-center gap-4">
     <div class="relative">
      <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-secondary text-sm" data-icon="search">
       search
      </span>
      <input class="bg-surface-container-highest border-none text-[0.75rem] pl-10 pr-4 py-2 w-64 focus:ring-1 focus:ring-on-primary-container placeholder:text-secondary/50" placeholder="BUSCAR SKU O NOMBRE..." type="text" oninput="renderPr(this.value)"/>
     </div>
     
    </div>
   </header>
   <!-- Product Dashboard Grid -->
   <div class="p-8 flex-1">
    <!-- Summary Stats (Asymmetric layout) -->
    <div class="grid grid-cols-12 gap-6 mb-8">
     <div class="col-span-8 bg-surface-container-low p-6 flex flex-col justify-between">
      <div>
       <p class="text-[0.65rem] font-bold text-secondary uppercase tracking-[0.2em] mb-2">
        Inventario Total Bruto
       </p>
       <h3 class="text-[3.5rem] font-black leading-none tracking-tighter text-on-surface">
        14,282
        <span class="text-on-primary-container">
         .
        </span>
       </h3>
      </div>
      <div class="flex gap-12 mt-4">
       <div>
        <p class="text-[0.65rem] font-bold text-secondary uppercase tracking-widest">
         En Existencia
        </p>
        <p class="text-xl font-bold">
         12,400
        </p>
       </div>
       <div>
        <p class="text-[0.65rem] font-bold text-secondary uppercase tracking-widest">
         Bajo Stock
        </p>
        <p class="text-xl font-bold text-on-primary-container">
         182
        </p>
       </div>
       <div>
        <p class="text-[0.65rem] font-bold text-secondary uppercase tracking-widest">
         Descontinuados
        </p>
        <p class="text-xl font-bold">
         1,700
        </p>
       </div>
      </div>
     </div>
     <div class="col-span-4 bg-on-primary-container p-6 flex flex-col justify-between">
      <div>
       <h4 class="text-xl font-black text-white leading-tight mb-4">
        42 PRODUCTOS SIN ASIGNACI&Oacute;N DE PROVEEDOR
       </h4>
       <button class="w-full bg-surface py-3 text-[0.75rem] font-black tracking-widest text-on-primary-container uppercase hover:bg-surface-bright transition-colors">
        REVISAR AHORA
       </button>
      </div>
     </div>
    </div>
    <!-- Industrial Data Grid -->
    <div class="bg-surface-container-low">
     <!-- Grid Header -->
     <div class="grid grid-cols-12 gap-4 px-6 py-4 bg-surface-container-highest border-b border-surface/20">
      <div class="col-span-1 text-[0.65rem] font-black text-secondary uppercase tracking-widest">
       SKU_ID
      </div>
      <div class="col-span-4 text-[0.65rem] font-black text-secondary uppercase tracking-widest">
       NOMBRE DEL PRODUCTO
      </div>
      <div class="col-span-2 text-[0.65rem] font-black text-secondary uppercase tracking-widest">
       CATEGOR&Iacute;A
      </div>
      <div class="col-span-1 text-[0.65rem] font-black text-secondary uppercase tracking-widest text-right">
       PRECIO
      </div>
      <div class="col-span-1 text-[0.65rem] font-black text-secondary uppercase tracking-widest text-right">
       STOCK
      </div>
      <div class="col-span-1 text-[0.65rem] font-black text-secondary uppercase tracking-widest text-center">
       ESTADO
      </div>
      <div class="col-span-2 text-[0.65rem] font-black text-secondary uppercase tracking-widest text-right">
       ACCIONES
      </div>
     </div>
     <!-- Grid Rows -->
     <div class="divide-y divide-surface/10" id="productos_grid">
     </div>
     <!-- Grid Footer / Pagination -->
     <div class="px-6 py-4 flex items-center justify-between bg-surface-container-lowest text-[0.7rem] font-bold tracking-widest text-secondary uppercase">
      <div class="flex items-center gap-2">
       <button class="p-2 hover:bg-surface-container-high text-on-surface disabled:opacity-20" disabled="">
        <span class="material-symbols-outlined" data-icon="chevron_left">
         chevron_left
        </span>
       </button>
       <span class="px-4 py-2 bg-on-primary-container text-white">
        1
       </span>
       <button class="px-4 py-2 hover:bg-surface-container-high transition-colors">
        2
       </button>
       <button class="px-4 py-2 hover:bg-surface-container-high transition-colors">
        3
       </button>
       <span class="px-2">
        ...
       </span>
       <button class="px-4 py-2 hover:bg-surface-container-high transition-colors">
        2857
       </button>
       <button class="p-2 hover:bg-surface-container-high text-on-surface">
        <span class="material-symbols-outlined" data-icon="chevron_right">
         chevron_right
        </span>
       </button>
      </div>
     </div>
    </div>
   </div>
   <!-- System Status Bar -->
  </main>
  <!-- Contextual Floating Action Button -->
  <script>
   
   window.all_pr = [];
   window.renderPr = (q) => {
       const container = document.getElementById("productos_grid");
       const filtered = window.all_pr.filter(p => `${p.id} ${p.nombre} ${p.fabricante}`.toLowerCase().includes(q.toLowerCase()));
       container.innerHTML = filtered.map(p => `
            <div class="grid grid-cols-12 gap-4 px-6 py-5 hover:bg-surface-bright transition-colors items-center group">
             <div class="col-span-1 font-mono text-[0.75rem] text-secondary">MAC-${p.id}</div>
             <div class="col-span-4"><p class="text-[0.875rem] font-bold text-on-surface uppercase">${p.nombre}</p></div>
             <div class="col-span-2"><span class="text-[0.75rem] text-secondary px-2 py-1 bg-surface-container-high border border-outline-variant/20 uppercase">${p.fabricante}</span></div>
             <div class="col-span-1 text-right font-mono text-[0.875rem]">$${p.precio}</div>
             <div class="col-span-1 text-right font-mono text-[0.875rem]">${p.stock}</div>
             <div class="col-span-1 flex justify-center"><div class="w-2 h-2 ${p.stock > 10 ? 'bg-green-500' : 'bg-on-primary-container animate-pulse'} rounded-full"></div></div>
             <div class="col-span-2 flex justify-end gap-2 opacity-40 group-hover:opacity-100 transition-opacity">
              <a href="/editar-producto?id=${p.id}" class="p-2 hover:bg-primary-container text-secondary hover:text-on-primary-container transition-colors">
               <span class="material-symbols-outlined text-lg">edit_note</span>
              </a>
              <button class="p-2 hover:bg-primary-container text-secondary hover:text-on-primary-container transition-colors" onclick="if(confirm('¿Eliminar?')) window.Api.eliminarProducto(${p.id}).then(()=>location.reload())">
               <span class="material-symbols-outlined text-lg">delete</span>
              </button>
             </div>
            </div>
       `).join('');
   };
   document.addEventListener("DOMContentLoaded", async () => {
        try {
            const res = await window.Api.getProductos();
            window.all_pr = res.data || [];
            renderPr("");

        } catch (e) {
            container.innerHTML = '<p class="p-8 text-error">Error cargando productos.</p>';
        }
    });
  </script>
 </body>
</html>
