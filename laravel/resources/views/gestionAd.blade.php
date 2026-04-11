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
  <script src="/js/reportes.js">
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
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/dashboard">
     <span class="material-symbols-outlined mr-3" data-icon="dashboard">
      dashboard
     </span>
     General
    </a>
    <!-- Active State: Gestion de personal -->
    <a class="flex items-center py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3" href="/personal">
     <span class="material-symbols-outlined mr-3" data-icon="badge">
      badge
     </span>
     Gestion de personal
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
     Gestion de productos
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
   <div class="px-6 mt-auto pt-6 border-t border-surface-container-high">
    <div class="flex items-center gap-3">
     <div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center">
      <span class="material-symbols-outlined text-secondary text-sm">
       admin_panel_settings
      </span>
     </div>
     <div>
      <p class="text-[0.75rem] font-bold text-on-surface uppercase leading-none" id="sidebar-name">Root_Admin</p>
      <p class="text-[0.65rem] text-secondary" id="sidebar-email">Level 0 Access</p>
     </div>
    </div>
   
    <button class="w-full mt-4 bg-[#1c2a41] text-[#c2c6d3] text-[0.7rem] font-bold uppercase hover:bg-surface-bright transition-all py-2" onclick="window.Api.logout()">Cerrar sesión</button>
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
      <input id="search-personal" class="bg-transparent border-none focus:ring-0 text-[0.75rem] font-bold tracking-widest placeholder:text-secondary/30 uppercase w-48" placeholder="BUSCAR PERSONAL..." type="text" oninput="renderUs(this.value)"/>
     </div>
     <div class="flex items-center gap-2">
      <button class="bg-surface-container-highest px-3 h-10 text-[0.65rem] uppercase font-bold tracking-widest text-[#ee3f4b] hover:bg-surface-bright transition-colors flex items-center gap-2 border border-[#ee3f4b]/20" onclick="exportPersonal('pdf')">
       <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
       PDF
      </button>
      <button class="bg-surface-container-highest px-3 h-10 text-[0.65rem] uppercase font-bold tracking-widest text-[#22c55e] hover:bg-surface-bright transition-colors flex items-center gap-2 border border-[#22c55e]/20" onclick="exportPersonal('xlsx')">
       <span class="material-symbols-outlined text-sm">table_chart</span>
       EXCEL
      </button>
      <button class="bg-surface-container-highest px-3 h-10 text-[0.65rem] uppercase font-bold tracking-widest text-[#3b82f6] hover:bg-surface-bright transition-colors flex items-center gap-2 border border-[#3b82f6]/20" onclick="exportPersonal('docx')">
       <span class="material-symbols-outlined text-sm">description</span>
       WORD
      </button>
     </div>
    </div>
   </header>
   <!-- KPI Strip / Asymmetric Layout Element -->
   <section class="grid grid-cols-4 gap-0 border-b border-surface-container-high bg-surface">
    <div class="p-8 border-r border-surface-container-high">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">
      Total Personal
     </p>
     <p class="text-4xl font-black tracking-tighter text-on-surface" id="kpi-total">0</p>
    </div>
    <div class="p-8 border-r border-surface-container-high">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">
      Activos
     </p>
     <p class="text-4xl font-black tracking-tighter text-on-surface text-primary" id="kpi-activos">0</p>
    </div>
    <div class="p-8 border-r border-surface-container-high">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">
      Admin Roles
     </p>
     <p class="text-4xl font-black tracking-tighter text-on-surface" id="kpi-admins">0</p>
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

            document.getElementById('kpi-total').innerText = usuarios.length;
            document.getElementById('kpi-activos').innerText = usuarios.length;
            document.getElementById('kpi-admins').innerText = usuarios.filter(u => u.rol === 'admin').length;
            document.getElementById('sidebar-name').innerText = localStorage.getItem('user_nombre') || 'Root_Admin';
            document.getElementById('sidebar-email').innerText = localStorage.getItem('user_email') || 'N/A';

                        window.all_us = usuarios;
            renderUs("");
        } catch (e) {
            document.getElementById("personal_grid").innerHTML = '<p class="text-error p-8">Error cargando usuarios.</p>';
        }
    });

    window.renderUs = (q) => {
        const c = document.getElementById("personal_grid");
        const list = window.all_us.filter(u => `${u.id} ${u.nombre} ${u.email} ${u.rol}`.toLowerCase().includes(q.toLowerCase()));
        c.innerHTML = list.map(u => `
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
    };

    window.exportPersonal = async (format) => {
        const q = (document.getElementById('search-personal')?.value || '').toLowerCase();
        const filtered = window.all_us.filter(u => `${u.id} ${u.nombre} ${u.email} ${u.rol}`.toLowerCase().includes(q));
        const headers = ['ID', 'Nombre', 'Email', 'Teléfono', 'Rol', 'Estado'];
        const rows = filtered.map(u => [`#00${u.id}`, u.nombre, u.email, u.telefono || 'N/A', u.rol, 'Activo']);
        const title = q ? `Reporte de Personal (filtro: "${q}")` : 'Reporte de Personal';
        
        if (format === 'pdf') await Reportes.generatePDF(title, headers, rows, 'personal_macuin');
        else if (format === 'xlsx') await Reportes.generateXLSX(title, headers, rows, 'personal_macuin');
        else if (format === 'docx') await Reportes.generateDOCX(title, headers, rows, 'personal_macuin');
    };

  </script>
 </body>
</html>
