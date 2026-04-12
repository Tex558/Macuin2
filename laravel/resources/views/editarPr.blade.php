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
  <script>
    document.addEventListener("DOMContentLoaded", async () => {
        const params = new URLSearchParams(window.location.search);
        const prodId = params.get('id');
        if(!prodId) return;

        try {
            const res = await window.Api.getProductos();
            const p = (res.data || []).find(x => x.id == prodId);
            if(p) {
                document.getElementById('edit-nombre').value = p.nombre;
                document.getElementById('edit-fabricante').value = p.fabricante;
                document.getElementById('edit-sku').value = `MAC-${p.id}`;
                document.getElementById('edit-specs').value = p.especificaciones || '';
                document.getElementById('edit-precio').value = p.precio;
                document.getElementById('edit-stock').value = p.stock;
            } else {
                alert('Producto no encontrado.');
                window.location.href = '/productos';
            }
        } catch(e) { console.error(e); }

        document.getElementById('btn-save-prod').addEventListener('click', async () => {
            if(!confirm('¿Confirmar cambios técnicos en el catálogo industrial?')) return;
            const data = {
                nombre: document.getElementById('edit-nombre').value,
                fabricante: document.getElementById('edit-fabricante').value,
                especificaciones: document.getElementById('edit-specs').value,
                precio: parseFloat(document.getElementById('edit-precio').value),
                stock: parseInt(document.getElementById('edit-stock').value)
            };
            try {
                await window.Api.actualizarProducto(prodId, data);
                alert('Producto actualizado con éxito.');
                window.location.href = '/productos';
            } catch(e) { alert('Error actualizando producto.'); }
        });

        document.getElementById('btn-delete-prod').addEventListener('click', async () => {
             if(!confirm('¿ELIMINAR PRODUCTO PERMANENTEMENTE?')) return;
             try {
                await window.Api.eliminarProducto(prodId);
                alert('Producto eliminado correctamente.');
                window.location.href = '/productos';
             } catch(e) { alert('Error al eliminar.'); }
        });
    });
  </script>
 </head>
 <body class="bg-background text-on-surface font-body selection:bg-on-primary-container selection:text-white overflow-y-auto min-h-screen">
  <!-- Sidebar Shell -->
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] docked h-screen w-64 left-0 top-0 border-r-0 z-50">
   <div class="px-6 mb-10">
    <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1]">
     MACUIN ADMIN
    </h1>
   </div>
   <nav class="flex-1 space-y-1 overflow-y-auto">
    <!-- General -->
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/dashboard">
     <span class="material-symbols-outlined text-lg" data-icon="dashboard">
      dashboard
     </span>
     <span>
      General
     </span>
    </a>
    <!-- Gestion de personal -->
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/personal">
     <span class="material-symbols-outlined text-lg" data-icon="badge">
      badge
     </span>
     <span>
      Gestion de personal
     </span>
    </a>
    <!-- Registrar administrador -->
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/registrar-admin">
     <span class="material-symbols-outlined text-lg" data-icon="person_add">
      person_add
     </span>
     <span>
      Registrar administrador
     </span>
    </a>
    <!-- Gestion de productos -->
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/productos">
     <span class="material-symbols-outlined text-lg" data-icon="inventory_2">
      inventory_2
     </span>
     <span>
      Gestion de productos
     </span>
    </a>
    <!-- Agregar producto -->
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/agregar-producto">
     <span class="material-symbols-outlined text-lg" data-icon="add_box">
      add_box
     </span>
     <span>
      Agregar producto
     </span>
    </a>
    <!-- Editar producto (ACTIVE) -->
    
    <!-- Ver pedidos -->
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/pedidos">
     <span class="material-symbols-outlined text-lg" data-icon="list_alt">
      list_alt
     </span>
     <span>
      Ver pedidos
     </span>
    </a>
    <!-- Editar pedido -->
    
   </nav>
   <div class="px-6 pt-6 border-t border-white/5">
    <div class="flex items-center gap-3">
     <div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center">
      <span class="material-symbols-outlined text-primary text-sm" data-icon="shield_person">
       shield_person
      </span>
     </div>
     <div>
      <p class="text-[0.75rem] font-bold text-on-surface">
       ADMIN_0824
      </p>
     </div>
    </div>
   
    <button class="w-full mt-4 bg-[#1c2a41] text-[#c2c6d3] text-[0.7rem] font-bold uppercase hover:bg-surface-bright transition-all py-2" onclick="window.Api.logout()">Cerrar sesión</button>
   </div>
  </aside>
  <!-- Main Content Canvas -->
  <main class="ml-64 min-h-screen flex flex-col">
   <!-- Header Section -->
   <header class="h-32 flex items-end px-12 pb-8 bg-surface">
    <div class="flex flex-col">
     <h2 class="text-4xl font-black tracking-tight uppercase">
      Editar producto
     </h2>
    </div>
   </header>
   <!-- Product Interface Grid -->
   <section class="flex-1 px-12 py-8 bg-surface-container-low">
    <div class="grid grid-cols-12 gap-8 max-w-7xl">
     <!-- Left Column: Primary Details -->
     <div class="col-span-12 lg:col-span-8 space-y-8">
      <!-- Core Form Plate -->
      <div class="bg-surface-container-high p-8 shadow-none border-0">
       <div class="mb-8 border-b border-outline-variant/20 pb-4">
        <h3 class="text-sm font-bold uppercase tracking-wider text-secondary">
         Product Specifications
        </h3>
       </div>
       <div class="grid grid-cols-2 gap-x-8 gap-y-10">
        <!-- Product Name -->
          <input id="edit-nombre" class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-3 px-4 text-on-surface font-medium focus:border-on-primary-container transition-all duration-150" type="text" value="Cargando..."/>
        </div>
        <!-- Manufacturer -->
        <div class="col-span-1">
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Manufacturer
         </label>
         <input id="edit-fabricante" class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-3 px-4 text-on-surface font-medium focus:border-on-primary-container transition-all duration-150" type="text" value="Cargando..."/>
        </div>
        <!-- SKU / ID -->
        <div class="col-span-1">
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Internal SKU ID
         </label>
         <input id="edit-sku" class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant py-3 px-4 text-secondary font-mono text-sm cursor-not-allowed" readonly="" type="text" value="PENDIENTE"/>
        </div>
        <!-- Specs Textarea -->
        <div class="col-span-2">
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Technical Specifications
         </label>
         <textarea id="edit-specs" class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-3 px-4 text-on-surface font-body text-sm focus:border-on-primary-container transition-all duration-150 resize-none" rows="6">Cargando...</textarea>
        </div>
       </div>
      </div>
      <!-- Log & History (Asymmetric layout) -->
     </div>
     <!-- Right Column: Critical Metrics & Controls -->
     <div class="col-span-12 lg:col-span-4 space-y-8">
      <!-- Metrics Block -->
      <div class="bg-surface-container-high p-8 border-l-4 border-on-primary-container">
       <h3 class="text-sm font-bold uppercase tracking-wider text-secondary mb-8">
        Stock &amp; Valuation
       </h3>
       <div class="space-y-10">
        <!-- Pricing -->
        <div>
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Unit Price (USD)
         </label>
          <input id="edit-precio" class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-4 pl-10 pr-4 text-3xl font-black tabular-nums tracking-tighter focus:border-on-primary-container transition-all duration-150" type="text" value="0.00"/>
         </div>
        </div>
        <!-- Inventory Count -->
        <div>
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Current Stock Level
         </label>
         <div class="flex items-center gap-4">
          <input id="edit-stock" class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-4 px-4 text-3xl font-black tabular-nums tracking-tighter focus:border-on-primary-container transition-all duration-150" type="number" value="0"/>
          <div class="flex flex-col gap-1">
           <button class="bg-surface-container-highest p-2 hover:bg-surface-bright">
            <span class="material-symbols-outlined text-sm" data-icon="add">
             add
            </span>
           </button>
           <button class="bg-surface-container-highest p-2 hover:bg-surface-bright">
            <span class="material-symbols-outlined text-sm" data-icon="remove">
             remove
            </span>
           </button>
          </div>
         </div>
        </div>
        <!-- Status Toggle -->
        <div>
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Catalog Visibility
         </label>
         <div class="flex items-center gap-4 bg-surface-container-lowest p-1 border border-outline-variant/10">
          <button class="flex-1 py-2 text-[0.7rem] font-black uppercase bg-on-primary-container text-white">
           Active
          </button>
          <button class="flex-1 py-2 text-[0.7rem] font-black uppercase text-secondary hover:text-on-surface">
           Discontinued
          </button>
         </div>
        </div>
       </div>
      </div>
      <!-- Action Panel -->
      <div class="space-y-4">
        <button id="btn-save-prod" class="w-full py-6 bg-gradient-to-tr from-on-primary-container to-primary-container text-white font-black uppercase tracking-[0.2em] text-sm flex items-center justify-center gap-3 active:scale-[0.98] transition-all">
         <span class="material-symbols-outlined" data-icon="save" data-weight="fill">
          save
         </span>
         Save Changes
        </button>
        <div class="grid grid-cols-2 gap-4">
         <button class="py-4 bg-surface-container-high border border-outline-variant/20 text-secondary font-bold uppercase tracking-widest text-[0.7rem] hover:bg-surface-bright transition-colors" onclick="alert('Funcionalidad de duplicado en mantenimiento.')">
          Duplicate SKU
         </button>
         <button id="btn-delete-prod" class="py-4 bg-surface-container-high border border-outline-variant/20 text-error font-bold uppercase tracking-widest text-[0.7rem] hover:bg-error-container hover:text-white transition-colors">
          Delete Part
         </button>
        </div>
      </div>
      <!-- Utility Info -->
     </div>
    </div>
   </section>
   <!-- Footer System Status -->
  </main>
 </body>
</html>
