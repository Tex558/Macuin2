<!DOCTYPE html>
<html class="dark" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   MACUIN ADMIN - Dashboard General
  </title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <link href="/css/app.css" rel="stylesheet"/>
  <script src="/js/tailwind-config.js">
  </script>
  <script src="/js/api.js">
  </script>
 </head>
 <body class="text-on-surface select-none">
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] w-64 border-r-0 z-40">
   <div class="px-6 mb-10">
    <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1] uppercase">
     MACUIN ADMIN
    </h1>
   </div>
   <nav class="flex-1 space-y-1">
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3" href="/dashboard">
     <span class="material-symbols-outlined mr-3" data-icon="dashboard">
      dashboard
     </span>
     General
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/personal">
     <span class="material-symbols-outlined mr-3" data-icon="badge">
      badge
     </span>
     Gestión de personal
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/registrar-admin">
     <span class="material-symbols-outlined mr-3" data-icon="person_add">
      person_add
     </span>
     Registrar administrador
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/productos">
     <span class="material-symbols-outlined mr-3" data-icon="inventory_2">
      inventory_2
     </span>
     Gestión de productos
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/agregar-producto">
     <span class="material-symbols-outlined mr-3" data-icon="add_box">
      add_box
     </span>
     Agregar producto
    </a>
    
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/pedidos">
     <span class="material-symbols-outlined mr-3" data-icon="list_alt">
      list_alt
     </span>
     Ver pedidos
    </a>
    
   </nav>
   <div class="mt-auto px-6 border-t border-outline-variant/10 pt-6">
    <button class="w-full bg-[#1c2a41] text-[#c2c6d3] text-[0.7rem] font-bold uppercase hover:bg-surface-bright transition-all py-3" onclick="window.Api.logout()">
     Cerrar sesión
    </button>
   </div>
  </aside>
  <main class="ml-64 min-h-screen bg-surface flex flex-col">
   <header class="h-20 flex items-center justify-between px-10 bg-surface-container-low">
    <div class="flex items-baseline gap-4">
     <h2 class="text-2xl font-black tracking-tight uppercase text-on-surface">
      Dashboard General
     </h2>
    </div>
   </header>

   <section class="grid grid-cols-3 gap-0 border-b border-surface-container-high bg-surface flex-1 content-start">
    <div class="p-12 border-r border-b border-surface-container-high bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
     <p class="text-[0.75rem] font-black text-secondary uppercase tracking-[0.2em] mb-2">Total Personal Registrado</p>
     <p class="text-6xl font-black tracking-tighter text-on-surface" id="dash-users">. . .</p>
    </div>
    <div class="p-12 border-r border-b border-surface-container-high bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
     <p class="text-[0.75rem] font-black text-secondary uppercase tracking-[0.2em] mb-2">Productos en Inventario</p>
     <p class="text-6xl font-black tracking-tighter text-on-surface text-primary" id="dash-prods">. . .</p>
    </div>
    <div class="p-12 border-b border-surface-container-high bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
     <p class="text-[0.75rem] font-black text-secondary uppercase tracking-[0.2em] mb-2">Total Pedidos Emitidos</p>
     <p class="text-6xl font-black tracking-tighter text-secondary opacity-80" id="dash-peds">. . .</p>
    </div>
   </section>
  </main>
  <script>
   document.addEventListener("DOMContentLoaded", async () => {
        try {
            const [r_users, r_prods, r_peds] = await Promise.all([
                window.Api.getUsuarios().catch(()=>({data:[]})),
                window.Api.getProductos().catch(()=>({data:[]})),
                window.Api.getPedidos().catch(()=>({data:[]}))
            ]);
            document.getElementById('dash-users').innerText = r_users.data ? r_users.data.length : 0;
            document.getElementById('dash-prods').innerText = r_prods.data ? r_prods.data.length : 0;
            document.getElementById('dash-peds').innerText = r_peds.data ? r_peds.data.length : 0;
        } catch (e) { console.error("Error al cargar el dashboard", e); }
    });
  </script>
 </body>
</html>