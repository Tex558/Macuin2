<!DOCTYPE html>
<html class="dark" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   MACUIN ADMIN - Gestion de personal
  </title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <link href="/css/app.css" rel="stylesheet"/>
  <script src="/js/tailwind-config.js">
  </script>
  <script src="/js/api.js">
  </script>
 </head>
 <body class="text-on-surface select-none">
  <!-- SideNavBar Shell -->
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] w-64 border-r-0 z-40">
   <div class="px-6 mb-10">
    <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1]">
     MACUIN ADMIN
    </h1>
   </div>
   <nav class="flex-1 space-y-1">
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="dashboard">
      dashboard
     </span>
     General
    </a>
    <!-- Active State: Gestion de personal -->
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="badge">
      badge
     </span>
     Gestion de personal
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="person_add">
      person_add
     </span>
     Registrar administrador
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="inventory_2">
      inventory_2
     </span>
     Gestion de productos
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="add_box">
      add_box
     </span>
     Agregar producto
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="edit_note">
      edit_note
     </span>
     Editar producto
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="list_alt">
      list_alt
     </span>
     Ver pedidos
    </a>
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="#">
     <span class="material-symbols-outlined mr-3" data-icon="edit_calendar">
      edit_calendar
     </span>
     Editar pedido
    </a>
   </nav>
   <div class="px-6 mt-auto pt-6 border-t border-surface-container-high">
    <div class="flex items-center gap-3">
     <div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center">
      <span class="material-symbols-outlined text-secondary text-sm">
       admin_panel_settings
      </span>
     </div>
     <div>
      <p class="text-[0.75rem] font-bold text-on-surface uppercase leading-none">
       Root_Admin
      </p>
      <p class="text-[0.65rem] text-secondary">
       Level 0 Access
      </p>
     </div>
    </div>
   </div>
  </aside>
  <!-- Main Content Canvas -->
  <main class="ml-64 min-h-screen bg-surface flex flex-col">
   <!-- Header Section -->
   <header class="h-20 flex items-center justify-between px-10 bg-surface-container-low">
    <div class="flex items-baseline gap-4">
     <h2 class="text-2xl font-black tracking-tight uppercase text-on-surface">
      Gestion de personal
     </h2>
    </div>
    <div class="flex items-center gap-4">
     <div class="bg-surface-container-highest px-4 py-2 flex items-center gap-3">
      <span class="material-symbols-outlined text-sm text-primary" data-icon="search">
       search
      </span>
      <input class="bg-transparent border-none focus:ring-0 text-[0.75rem] font-bold tracking-widest placeholder:text-secondary/30 uppercase w-48" placeholder="BUSCAR PERSONAL..." type="text"/>
     </div>
     <button class="bg-on-primary-container text-white px-6 py-2 text-[0.75rem] font-black uppercase tracking-widest hover:opacity-90 active:scale-95 transition-all">
      Registrar Nuevo
     </button>
    </div>
   </header>
   <!-- KPI Strip / Asymmetric Layout Element -->
   <section class="grid grid-cols-4 gap-0 border-b border-surface-container-high bg-surface">
    <div class="p-8 border-r border-surface-container-high">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">
      Total Personal
     </p>
     <p class="text-4xl font-black tracking-tighter text-on-surface">
      128
     </p>
    </div>
    <div class="p-8 border-r border-surface-container-high">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">
      Activos
     </p>
     <p class="text-4xl font-black tracking-tighter text-on-surface text-primary">
      124
     </p>
    </div>
    <div class="p-8 border-r border-surface-container-high">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">
      Admin Roles
     </p>
     <p class="text-4xl font-black tracking-tighter text-on-surface">
      12
     </p>
    </div>
    <div class="p-8">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">
      Solicitudes
     </p>
     <p class="text-4xl font-black tracking-tighter text-secondary opacity-50">
      0
     </p>
    </div>
   </section>
   <!-- Industrial Data Grid -->
   <section class="flex-1 p-10">
    <div class="w-full">
     <!-- Table Header -->
     <div class="grid grid-cols-12 gap-4 px-6 py-3 bg-surface-container-highest text-[0.65rem] font-black uppercase tracking-widest text-secondary border-b-2 border-primary-container">
      <div class="col-span-1">
       ID
      </div>
      <div class="col-span-3">
       Nombre Completo
      </div>
      <div class="col-span-2">
       Rol Operativo
      </div>
      <div class="col-span-2">
       Departamento
      </div>
      <div class="col-span-2">
       Estado
      </div>
      <div class="col-span-2 text-right">
       Acciones
      </div>
     </div>
     <!-- Table Body -->
     <div class="divide-y divide-surface-container-high border-x border-surface-container-high" id="personal_grid">
     </div>
     <!-- Footer / Pagination -->
     <div class="mt-8 flex items-center bg-surface-container-low p-4">
      <div class="flex gap-1">
       <button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-on-surface hover:bg-primary hover:text-on-primary transition-colors">
        <span class="material-symbols-outlined text-sm">
         chevron_left
        </span>
       </button>
       <button class="w-8 h-8 flex items-center justify-center bg-on-primary-container text-white text-[0.7rem] font-black">
        1
       </button>
       <button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-on-surface text-[0.7rem] font-black hover:bg-surface-bright transition-colors">
        2
       </button>
       <button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-on-surface text-[0.7rem] font-black hover:bg-surface-bright transition-colors">
        3
       </button>
       <button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-on-surface hover:bg-primary hover:text-on-primary transition-colors">
        <span class="material-symbols-outlined text-sm">
         chevron_right
        </span>
       </button>
      </div>
     </div>
    </div>
   </section>
   <!-- Bottom Safety Strip -->
  </main>
  <script>
   document.addEventListener("DOMContentLoaded", async () => {
        const container = document.getElementById("personal_grid");
        try {
            const res = await window.Api.getUsuarios();
            const usuarios = res.data || [];
            container.innerHTML = usuarios.map(u => `
            <div class="grid grid-cols-12 gap-4 px-6 py-5 items-center bg-surface hover:bg-surface-bright transition-colors group cursor-default">
             <div class="col-span-1 font-mono text-xs text-secondary">#00${u.id}</div>
             <div class="col-span-3 font-bold text-[0.875rem] text-on-surface uppercase">${u.nombre}</div>
             <div class="col-span-2 text-xs font-mono text-secondary">${u.rol}</div>
             <div class="col-span-2 text-xs text-secondary uppercase">${u.email}</div>
             <div class="col-span-2">
              <span class="inline-flex items-center px-2 py-0.5 text-[0.6rem] font-black bg-green-500/10 text-green-500 border border-green-500/20">ACTIVO</span>
             </div>
             <div class="col-span-2 text-right space-x-2">
              <button class="text-secondary hover:text-on-primary-container transition-colors" onclick="if(confirm('¿Eliminar?')) window.Api.eliminarUsuario(${u.id}).then(()=>location.reload())">
               <span class="material-symbols-outlined text-lg">delete_forever</span>
              </button>
             </div>
            </div>
            `).join('');
        } catch (e) {
            container.innerHTML = '<p class="text-error p-8">Error cargando usuarios.</p>';
        }
    });
  </script>
 </body>
</html>
