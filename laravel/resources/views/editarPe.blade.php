<!DOCTYPE html>
<html class="dark" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
  </script>
  <script src="/js/tailwind-config.js">
  </script>
  <link href="/css/app.css" rel="stylesheet"/>
  <script src="/js/api.js">
  </script>
 </head>
 <body class="bg-background text-on-surface flex overflow-hidden">
  <!-- SideNavBar (Predicted Component) -->
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] w-64 border-r-0 z-50">
   <div class="px-6 mb-10">
    <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1]">
     MACUIN ADMIN
    </h1>
   </div>
   <nav class="flex-1 space-y-1">
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="/dashboard">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="dashboard">
      dashboard
     </span>
     General
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="/personal">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="badge">
      badge
     </span>
     Gestion de personal
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="/registrar-admin">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="person_add">
      person_add
     </span>
     Registrar administrador
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="/productos">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="inventory_2">
      inventory_2
     </span>
     Gestion de productos
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="/agregar-producto">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="add_box">
      add_box
     </span>
     Agregar producto
    </a>
    
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="/pedidos">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="list_alt">
      list_alt
     </span>
     Ver pedidos
    </a>
    
   </nav>
   <div class="mt-auto px-6 border-t border-outline-variant pt-6 opacity-40">
    <div class="flex items-center gap-3">
     <div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center">
      <span class="material-symbols-outlined text-sm">
       person
      </span>
     </div>
     <div>
      <p class="text-[10px] font-bold">
       ADMIN_ROOT
      </p>
      <p class="text-[9px] text-secondary">
       ID: 00-482-X
      </p>
     </div>
    </div>
   
    <button class="w-full mt-4 bg-[#1c2a41] text-[#c2c6d3] text-[0.7rem] font-bold uppercase hover:bg-surface-bright transition-all py-2" onclick="window.Api.logout()">Cerrar sesión</button>
   </div>
  </aside>
  <!-- Main Content Area -->
  <main class="flex-1 ml-64 min-h-screen bg-surface flex flex-col">
   <!-- Header -->
   <header class="h-16 flex items-center justify-between px-10 bg-surface-container-low">
    <div class="flex items-center gap-4">
     <h2 id="e-title" class="text-on-surface font-headline font-bold text-sm tracking-tight uppercase">Editar pedido</h2>
    </div>
    <div class="flex gap-4">
     <button class="bg-surface-container-highest px-4 py-2 text-[10px] font-black uppercase tracking-widest text-secondary hover:text-on-surface transition-colors border border-outline/10">
      Sincronizar DB
     </button>
    </div>
   </header>
   <!-- Content Canvas -->
   <div class="p-10 flex-1 flex flex-col gap-10 overflow-y-auto">
    <!-- Hero Stats Row (Bento Style) -->
    <div class="grid grid-cols-12 gap-6">
     <!-- Status Card -->
     <div class="col-span-12 md:col-span-4 bg-surface-container-low p-8 flex flex-col justify-between">
      <span class="text-[10px] font-bold text-secondary uppercase tracking-[0.2em] mb-4">
       Estado Actual
      </span>
      <div class="flex items-end gap-3">
       <span id="e-status-big" class="text-5xl font-black tracking-tighter text-on-surface leading-none uppercase">Cargando...</span>
       <div class="w-3 h-3 bg-tertiary mb-1">
       </div>
      </div>
      <p class="mt-4 text-[11px] text-secondary-fixed-dim leading-relaxed">
       &Uacute;ltima actualizaci&oacute;n: 14:22 GMT-6
       <br/>
       Operador: LOG_UNIT_A12
      </p>
     </div>
     <!-- Quick Action/ID Card -->
     <div class="col-span-12 md:col-span-3 bg-surface-container-low border border-primary/20 p-8 flex flex-col">
      <span class="text-[10px] font-bold text-primary uppercase tracking-[0.2em] mb-auto">
       Control Cr&iacute;tico
      </span>
      <button class="w-full bg-[#ee3f4b] hover:bg-[#ffb3b1] text-on-primary font-black text-xs py-4 transition-all duration-150 uppercase tracking-widest flex items-center justify-center gap-2" onclick="return confirm('&iquest;Est&aacute;s seguro de que deseas cancelar este pedido?') &amp;&amp; confirm('&iquest;Totalmente seguro? Esta acci&oacute;n es irreversible.');">
       <span class="material-symbols-outlined text-sm" data-icon="cancel">
        cancel
       </span>
       Cancel Order
      </button>
     </div>
    </div>
    <!-- Configuration Form -->
    <div class="grid grid-cols-12 gap-10">
     <!-- Main Form Section -->
     <div class="col-span-12 space-y-10">
      <section>
       <div class="flex items-center gap-4 mb-6">
        <span class="text-xs font-black text-on-surface uppercase tracking-widest">
         Informaci&oacute;n de Destino
        </span>
        <div class="flex-1 h-px bg-outline-variant opacity-20">
        </div>
       </div>
       <div class="grid grid-cols-2 gap-6">
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
          Cliente / Corporaci&oacute;n
         </label>
         <input class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface" type="text" id="e-cliente" readonly/>
        </div>
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
          Punto de Entrega
         </label>
         <input class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface" type="text" id="e-dir" readonly/>
        </div>
        <div class="col-span-2 flex flex-col gap-2">
         <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
          Instrucciones de Despacho
         </label>
         <textarea class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface resize-none" rows="3">Requiere montacargas de 5 toneladas. Verificar sellos de seguridad t&eacute;rmicos a la llegada.</textarea>
        </div>
       </div>
      </section>
      <section>
       <div class="flex items-center gap-4 mb-6">
        <span class="text-xs font-black text-on-surface uppercase tracking-widest">
         Gesti&oacute;n de Log&iacute;stica
        </span>
        <div class="flex-1 h-px bg-outline-variant opacity-20">
        </div>
       </div>
       <div class="grid grid-cols-4 gap-6">
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
           Modificar Estado
          </label>
          <select id="e-select" class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface appearance-none">
           <option value="Pendiente">Pendiente</option>
           <option value="Procesando">Procesando</option>
           <option value="En Ruta">En Ruta</option>
           <option value="Entregado">Entregado</option>
           <option value="Cancelado">Cancelado</option>
          </select>
         </div>
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
           Prioridad
          </label>
          <select id="e-prioridad" class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface appearance-none">
           <option value="Normal">Normal</option>
           <option value="Alta">Alta</option>
           <option value="Urgente">Urgente</option>
          </select>
         </div>
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
           Transportista
          </label>
          <input class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface" type="text" value="MACUIN_FLEET_04"/>
         </div>
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
           Fecha Est. Entrega
          </label>
          <input class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface" type="date" value="2023-11-24"/>
         </div>
        </div>
      </section>
      <div class="col-span-12 flex justify-end mt-4">
       <button id="btn-save" class="bg-[#ffb3b1] hover:bg-[#ee3f4b] text-[#3c0006] font-black text-xs px-8 py-4 transition-all duration-150 uppercase tracking-widest">Guardar Cambios</button>
      </div>
     </div>
     </div>
    <!-- Footer Action Bar -->
   </div>
  </main>
  <!-- Contextual Decorative UI (Industrial Aesthetic) -->
 
<script>
    document.addEventListener("DOMContentLoaded", async () => {
        const params = new URLSearchParams(window.location.search);
        const pid = params.get('id');
        if(!pid) return;
        
        try {
            const [resP, resU] = await Promise.all([window.Api.getPedidos(), window.Api.getUsuarios()]);
            const p = resP.data.find(x => x.id == pid);
            if(p) {
                const u = resU.data.find(x => x.id == p.usuario_id);
                document.getElementById('e-title').innerText = `Editar pedido / ID: #MAC-${p.id}`;
                document.getElementById('e-status-big').innerText = p.estatus || p.estado || 'SIN ESTADO';
                const iCli = document.getElementById('e-cliente');
                if(iCli) iCli.value = u ? u.nombre : 'Desconocido';
                const iDir = document.getElementById('e-dir');
                if(iDir) iDir.value = p.direccion || 'Sin direccion';
                
                const sel = document.getElementById('e-select');
                if(sel) {
                    for(let opt of sel.options) {
                        if(opt.value === p.estatus || opt.value === p.estado) {
                            opt.selected = true;
                        }
                    }
                }

                const selPri = document.getElementById('e-prioridad');
                if(selPri && p.prioridad) {
                    for(let opt of selPri.options) {
                        if(opt.value === p.prioridad) {
                            opt.selected = true;
                        }
                    }
                }
            }
        } catch(e) { console.error('E:', e); }
        
        let savebtn = document.getElementById('btn-save');
        if (savebtn) {
            savebtn.addEventListener('click', async () => {
                if(!confirm('¿Guardar cambios logísticos oficiales en servidor?')) return;
                const nuevoEstado = document.getElementById('e-select').value;
                const nuevaPrioridad = document.getElementById('e-prioridad').value;
                try {
                    await window.Api.actualizarPedido(pid, {estatus: nuevoEstado, prioridad: nuevaPrioridad});
                    alert('Pedido actualizado con éxito.');
                    window.location.href = '/pedidos';
                } catch(e) { alert('Error modificando pedido...'); }
            });
        }
    });
</script>

</body>
</html>
