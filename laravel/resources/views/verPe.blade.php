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
 <body class="antialiased overflow-y-auto min-h-screen">
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] w-64 border-r-0 z-50">
    <div class="px-6 mb-10">
     <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1] uppercase">
      MACUIN ADMIN
     </h1>
    </div>   <nav class="flex-1 space-y-1">
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
    
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3 transition-colors duration-150" href="/pedidos">
     <span class="material-symbols-outlined" data-icon="list_alt">
      list_alt
     </span>
     <span>
      Ver pedidos
     </span>
    </a>
       </nav>
    <div class="mt-auto px-6 border-t border-outline-variant/10 pt-6">
     <button class="w-full bg-[#1c2a41] text-[#c2c6d3] text-[0.7rem] font-bold uppercase hover:bg-surface-bright transition-all py-3" onclick="window.Api.logout()">
      Cerrar sesión
     </button>
    </div>
   </aside>  <main class="ml-64 min-h-screen bg-surface flex flex-col">
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
   <section class="grid grid-cols-4 gap-0 border-b border-outline-variant/10">
    <div class="p-8 border-r border-outline-variant/10 bg-surface">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">Efectividad Operativa</p>
     <p id="stat-efectividad" class="text-4xl font-black tracking-tighter text-primary">0.0%</p>
    </div>
    <div class="p-8 border-r border-outline-variant/10 bg-surface">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">Pedidos Activos</p>
     <p id="stat-activos" class="text-4xl font-black tracking-tighter text-on-surface">0</p>
    </div>
    <div class="p-8 border-r border-outline-variant/10 bg-surface">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">Pendientes de Asignación</p>
     <p id="stat-pendientes" class="text-4xl font-black tracking-tighter text-on-primary-container">0</p>
    </div>
    <div class="p-8 bg-surface">
     <p class="text-[0.65rem] font-black text-secondary uppercase tracking-[0.2em] mb-1">Total Histórico</p>
     <p id="stat-total" class="text-4xl font-black tracking-tighter text-on-surface">0</p>
    </div>
   </section>
   <section class="flex-1 p-10 overflow-auto">
    <div class="bg-surface-container-low">
     <table class="w-full text-left border-collapse">
      <thead>
       <tr class="bg-surface-container-highest">
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         ID del Pedido
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         Cliente / Entidad
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         Prioridad
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary">
         Estado Logístico
        </th>
        <th class="px-6 py-4 text-[0.65rem] uppercase font-black tracking-[0.2em] text-secondary text-right">
         Operaciones
        </th>
       </tr>
      </thead>
      <tbody class="divide-y divide-outline-variant/5" id="pedidos_admin_grid">
      </tbody>
     </table>
    </div>
    </div>
   </section>
  </main>
  
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
             <td class="px-6 py-5 text-right"><a href="/editar-pedido?id=${p.id}" class="inline-flex items-center justify-center w-8 h-8 bg-surface-container-highest hover:bg-primary hover:text-on-primary-fixed transition-all"><span class="material-symbols-outlined text-[1.2rem]">edit_note</span></a></td>
            </tr>
            `;
        }).join('');
    };

    document.addEventListener("DOMContentLoaded", async () => {
        try {
            const res = await window.Api.getPedidos();
            const resU = await window.Api.getUsuarios();
            window.all_pedidos = res.data || [];
            window.all_ped_usuarios = resU.data || [];
            
            const total = window.all_pedidos.length;
            const pendientes = window.all_pedidos.filter(p => !p.estatus || p.estatus === 'Pendiente').length;
            const entregados = window.all_pedidos.filter(p => p.estatus === 'Entregado').length;
            const cancelados = window.all_pedidos.filter(p => p.estatus === 'Cancelado').length;
            const activos = total - entregados - cancelados;
            const efectividad = total > 0 ? ((entregados / total) * 100).toFixed(1) : "0.0";

            document.getElementById('stat-total').innerText = total;
            document.getElementById('stat-pendientes').innerText = pendientes;
            document.getElementById('stat-activos').innerText = activos;
            document.getElementById('stat-efectividad').innerText = `${efectividad}%`;

            renderPedidos("");
        } catch (e) {
            document.getElementById("pedidos_admin_grid").innerHTML = '<tr><td colspan="5" class="p-8 text-error">Error cargando pedidos.</td></tr>';
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
