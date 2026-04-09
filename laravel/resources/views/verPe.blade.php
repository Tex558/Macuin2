<!DOCTYPE html>
<html class="dark" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <script src="/js/tailwind-config.js">
  </script>
  <link href="/css/app.css" rel="stylesheet"/>
  <script src="/js/api.js">
  </script>
 </head>
 <body class="text-on-surface selection:bg-on-primary-container selection:text-white overflow-hidden">
  <!-- SideNavBar Shell -->
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] w-64 border-r-0 z-50">
   <div class="px-6 mb-10">
    <div class="flex items-center gap-3">
     <div class="w-10 h-10 bg-on-primary-container flex items-center justify-center">
      <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">
       precision_manufacturing
      </span>
     </div>
     <div>
      <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1]">
       MACUIN ADMIN
      </h1>
      <p class="text-[0.65rem] uppercase tracking-[0.2em] text-secondary">
       Precision Control
      </p>
     </div>
    </div>
   </div>
   <nav class="flex-1 space-y-1">
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="#">
     <span class="material-symbols-outlined" data-icon="dashboard">
      dashboard
     </span>
     <span>
      General
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="#">
     <span class="material-symbols-outlined" data-icon="badge">
      badge
     </span>
     <span>
      Gestion de personal
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="#">
     <span class="material-symbols-outlined" data-icon="person_add">
      person_add
     </span>
     <span>
      Registrar administrador
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="#">
     <span class="material-symbols-outlined" data-icon="inventory_2">
      inventory_2
     </span>
     <span>
      Gestion de productos
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="#">
     <span class="material-symbols-outlined" data-icon="add_box">
      add_box
     </span>
     <span>
      Agregar producto
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="#">
     <span class="material-symbols-outlined" data-icon="edit_note">
      edit_note
     </span>
     <span>
      Editar producto
     </span>
    </a>
    <!-- Active State: Ver pedidos -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3 transition-colors duration-150" href="#">
     <span class="material-symbols-outlined" data-icon="list_alt">
      list_alt
     </span>
     <span>
      Ver pedidos
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="#">
     <span class="material-symbols-outlined" data-icon="edit_calendar">
      edit_calendar
     </span>
     <span>
      Editar pedido
     </span>
    </a>
   </nav>
  </aside>
  <!-- Main Content Shell -->
  <main class="ml-64 min-h-screen bg-surface flex flex-col">
   <!-- Header Section -->
   <header class="h-24 px-10 flex items-center justify-between bg-surface-container-low">
    <div class="flex flex-col">
     <h2 class="text-3xl font-black tracking-tight text-on-surface uppercase">
      Ver pedidos
     </h2>
    </div>
    <div class="flex items-center gap-6">
     <button class="bg-surface-container-highest px-6 h-10 text-[0.75rem] uppercase font-bold tracking-widest text-on-surface hover:bg-surface-bright transition-colors">
      Export CSV
     </button>
    </div>
   </header>
   <!-- Stats Plate (Industrial Grid) -->
   <section class="grid grid-cols-4 gap-0 border-b border-outline-variant/10">
    <div class="p-8 border-r border-outline-variant/10 bg-surface">
     <p class="text-4xl font-black tracking-tighter text-on-surface">
      1,482
     </p>
    </div>
    <div class="p-8 border-r border-outline-variant/10 bg-surface">
     <p class="text-4xl font-black tracking-tighter text-on-primary-container">
      24
     </p>
    </div>
    <div class="p-8 border-r border-outline-variant/10 bg-surface">
     <p class="text-4xl font-black tracking-tighter text-on-surface">
      156
     </p>
    </div>
    <div class="p-8 bg-surface">
     <p class="text-4xl font-black tracking-tighter text-primary">
      98.4%
     </p>
    </div>
   </section>
   <!-- Industrial Data Table Container -->
   <section class="flex-1 p-10 overflow-auto">
    <div class="bg-surface-container-low">
     <table class="w-full text-left border-collapse">
      <thead>
       <tr class="bg-surface-container-highest">
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         Order ID
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         Client / Entity
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         Priority
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         Status
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary text-center">
         Actions
        </th>
       </tr>
      </thead>
      <tbody class="divide-y divide-outline-variant/5" id="pedidos_admin_grid">
      </tbody>
     </table>
    </div>
    <!-- Pagination Utility -->
    <div class="mt-6 flex items-center bg-surface-container-low p-4 justify-center">
     <div class="flex gap-1">
      <button class="w-10 h-10 bg-surface-container-highest flex items-center justify-center text-on-surface hover:bg-primary hover:text-on-primary-fixed">
       <span class="material-symbols-outlined">
        chevron_left
       </span>
      </button>
      <button class="w-10 h-10 bg-on-primary-container flex items-center justify-center text-white font-bold text-[0.75rem]">
       1
      </button>
      <button class="w-10 h-10 bg-surface-container-highest flex items-center justify-center text-on-surface hover:bg-surface-bright font-bold text-[0.75rem]">
       2
      </button>
      <button class="w-10 h-10 bg-surface-container-highest flex items-center justify-center text-on-surface hover:bg-surface-bright font-bold text-[0.75rem]">
       3
      </button>
      <button class="w-10 h-10 bg-surface-container-highest flex items-center justify-center text-on-surface hover:bg-primary hover:text-on-primary-fixed">
       <span class="material-symbols-outlined">
        chevron_right
       </span>
      </button>
     </div>
    </div>
   </section>
  </main>
  <!-- Contextual Details Panel (Side Preview) -->
  <script>
   document.addEventListener("DOMContentLoaded", async () => {
        const container = document.getElementById("pedidos_admin_grid");
        try {
            const res = await window.Api.getPedidos();
            const pedidos = res.data || [];
            container.innerHTML = pedidos.map(p => `
            <tr class="hover:bg-surface-bright transition-colors group">
             <td class="px-6 py-5 font-mono text-[0.875rem] text-on-surface">#ORD-${p.id}</td>
             <td class="px-6 py-5"><div class="flex flex-col"><span class="text-[0.875rem] font-bold">Usuario ID: ${p.usuario_id}</span></div></td>
             <td class="px-6 py-5"><span class="px-2 py-0.5 text-[0.6rem] font-black bg-secondary-container text-on-secondary-container uppercase tracking-tighter">Normal</span></td>
             <td class="px-6 py-5"><div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full ${p.estado==='Entregado'?'bg-green-500':'bg-secondary'}"></div><span class="text-[0.75rem] font-bold uppercase tracking-tight text-secondary">${p.estado}</span></div></td>
             <td class="px-6 py-5 text-center"><a href="/editar-pedido" class="inline-flex items-center justify-center w-8 h-8 bg-surface-container-highest hover:bg-primary hover:text-on-primary-fixed transition-all"><span class="material-symbols-outlined text-[1.2rem]">edit_note</span></a></td>
            </tr>
            `).join('');
        } catch (e) {
            container.innerHTML = '<tr><td colspan="5" class="p-8 text-error">Error cargando pedidos.</td></tr>';
        }
    });
  </script>
 </body>
</html>
