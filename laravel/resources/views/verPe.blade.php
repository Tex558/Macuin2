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
  <script src="/js/reportes.js">
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
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/dashboard">
     <span class="material-symbols-outlined" data-icon="dashboard">
      dashboard
     </span>
     <span>
      General
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/personal">
     <span class="material-symbols-outlined" data-icon="badge">
      badge
     </span>
     <span>
      Gestion de personal
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/registrar-admin">
     <span class="material-symbols-outlined" data-icon="person_add">
      person_add
     </span>
     <span>
      Registrar administrador
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/productos">
     <span class="material-symbols-outlined" data-icon="inventory_2">
      inventory_2
     </span>
     <span>
      Gestion de productos
     </span>
    </a>
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/agregar-producto">
     <span class="material-symbols-outlined" data-icon="add_box">
      add_box
     </span>
     <span>
      Agregar producto
     </span>
    </a>
    
    <!-- Active State: Ver pedidos -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3 transition-colors duration-150" href="/pedidos">
     <span class="material-symbols-outlined" data-icon="list_alt">
      list_alt
     </span>
     <span>
      Ver pedidos
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
    <div class="flex items-center gap-4">
     <div class="bg-surface-container-highest px-4 py-2 flex items-center gap-3">
      <span class="material-symbols-outlined text-sm text-primary" data-icon="search">
       search
      </span>
      <input id="search-pedidos" class="bg-transparent border-none focus:ring-0 text-[0.75rem] font-bold tracking-widest placeholder:text-secondary/30 uppercase w-48" placeholder="BUSCAR PEDIDO..." type="text" oninput="renderPedidos(this.value)"/>
     </div>
     <div class="flex items-center gap-2">
      <button class="bg-surface-container-highest px-3 h-10 text-[0.65rem] uppercase font-bold tracking-widest text-[#ee3f4b] hover:bg-surface-bright transition-colors flex items-center gap-2 border border-[#ee3f4b]/20" onclick="exportPedidos('pdf')">
       <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
       PDF
      </button>
      <button class="bg-surface-container-highest px-3 h-10 text-[0.65rem] uppercase font-bold tracking-widest text-[#22c55e] hover:bg-surface-bright transition-colors flex items-center gap-2 border border-[#22c55e]/20" onclick="exportPedidos('xlsx')">
       <span class="material-symbols-outlined text-sm">table_chart</span>
       EXCEL
      </button>
      <button class="bg-surface-container-highest px-3 h-10 text-[0.65rem] uppercase font-bold tracking-widest text-[#3b82f6] hover:bg-surface-bright transition-colors flex items-center gap-2 border border-[#3b82f6]/20" onclick="exportPedidos('docx')">
       <span class="material-symbols-outlined text-sm">description</span>
       WORD
      </button>
     </div>
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
    window.all_pedidos = [];
    window.all_ped_usuarios = [];

    window.renderPedidos = (q) => {
        const container = document.getElementById("pedidos_admin_grid");
        const pedidos = window.all_pedidos.filter(p => {
            const u = window.all_ped_usuarios.find(x => x.id == p.usuario_id);
            const nombre = u ? u.nombre : '';
            return `${p.id} ${nombre} ${p.estatus} ${p.prioridad || ''}`.toLowerCase().includes(q.toLowerCase());
        });
        container.innerHTML = pedidos.map(p => {
            const u = window.all_ped_usuarios.find(x => x.id == p.usuario_id);
            const nombre = u ? u.nombre : 'Usuario Reservado';
            const pri = p.prioridad || 'Normal';
            const priColor = pri === 'Urgente' ? 'bg-[#ee3f4b] text-white' : pri === 'Alta' ? 'bg-amber-600 text-white' : 'bg-secondary-container text-on-secondary-container';
            const statusDot = p.estatus==='Entregado' ? 'bg-green-500' : p.estatus==='Cancelado' ? 'bg-red-500' : 'bg-secondary';
            return `
            <tr class="hover:bg-surface-bright transition-colors group">
             <td class="px-6 py-5 font-mono text-[0.875rem] text-on-surface">#ORD-${p.id}</td>
             <td class="px-6 py-5"><div class="flex flex-col"><span class="text-[0.875rem] font-bold uppercase">${nombre}</span><span class="text-[0.65rem] text-secondary">ID: ${p.usuario_id}</span></div></td>
             <td class="px-6 py-5"><span class="px-2 py-0.5 text-[0.6rem] font-black ${priColor} uppercase tracking-tighter">${pri}</span></td>
             <td class="px-6 py-5"><div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full ${statusDot}"></div><span class="text-[0.75rem] font-bold uppercase tracking-tight text-secondary">${p.estatus || p.estado || 'Activo'}</span></div></td>
             <td class="px-6 py-5 text-center"><a href="/editar-pedido?id=${p.id}" class="inline-flex items-center justify-center w-8 h-8 bg-surface-container-highest hover:bg-primary hover:text-on-primary-fixed transition-all"><span class="material-symbols-outlined text-[1.2rem]">edit_note</span></a></td>
            </tr>
            `;
        }).join('');
    };

    document.addEventListener("DOMContentLoaded", async () => {
        try {
            const [resP, resU] = await Promise.all([window.Api.getPedidos(), window.Api.getUsuarios()]);
            window.all_ped_usuarios = resU.data || [];
            window.all_pedidos = resP.data || [];
            renderPedidos('');
        } catch (e) {
            document.getElementById('pedidos_admin_grid').innerHTML = '<tr><td colspan="5" class="p-8 text-error">Error cargando matriz de pedidos.</td></tr>';
        }
    });

    window.exportPedidos = async (format) => {
        const q = (document.getElementById('search-pedidos')?.value || '').toLowerCase();
        const filtered = window.all_pedidos.filter(p => {
            const u = window.all_ped_usuarios.find(x => x.id == p.usuario_id);
            const nombre = u ? u.nombre : '';
            return `${p.id} ${nombre} ${p.estatus} ${p.prioridad || ''}`.toLowerCase().includes(q);
        });
        const headers = ['Order ID', 'Cliente', 'Prioridad', 'Estatus', 'Direcci\u00f3n', 'Tel\u00e9fono', 'Fecha'];
        const rows = filtered.map(p => {
            const u = window.all_ped_usuarios.find(x => x.id == p.usuario_id);
            return [`#ORD-${p.id}`, u ? u.nombre : 'Desconocido', p.prioridad || 'Normal', p.estatus || 'Activo', p.direccion || 'N/A', p.telefono || 'N/A', new Date(p.creado_en).toLocaleDateString('es-MX')];
        });
        const title = q ? `Reporte de Pedidos (filtro: "${q}")` : 'Reporte de Pedidos';
        
        if (format === 'pdf') await Reportes.generatePDF(title, headers, rows, 'pedidos_macuin');
        else if (format === 'xlsx') await Reportes.generateXLSX(title, headers, rows, 'pedidos_macuin');
        else if (format === 'docx') await Reportes.generateDOCX(title, headers, rows, 'pedidos_macuin');
    };
</script>

 </body>
</html>
