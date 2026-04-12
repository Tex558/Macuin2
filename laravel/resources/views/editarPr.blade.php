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
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] docked h-screen w-64 left-0 top-0 border-r-0 z-50">
    <div class="px-6 mb-10">
     <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1] uppercase">
      MACUIN ADMIN
     </h1>
    </div>   <nav class="flex-1 space-y-1 overflow-y-auto">
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/dashboard">
     <span class="material-symbols-outlined text-lg" data-icon="dashboard">
      dashboard
     </span>
     <span>
      General
     </span>
    </a>
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/personal">
     <span class="material-symbols-outlined text-lg" data-icon="badge">
      badge
     </span>
     <span>
      Gestion de personal
     </span>
    </a>
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/registrar-admin">
     <span class="material-symbols-outlined text-lg" data-icon="person_add">
      person_add
     </span>
     <span>
      Registrar administrador
     </span>
    </a>
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/productos">
     <span class="material-symbols-outlined text-lg" data-icon="inventory_2">
      inventory_2
     </span>
     <span>
      Gestion de productos
     </span>
    </a>
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/agregar-producto">
     <span class="material-symbols-outlined text-lg" data-icon="add_box">
      add_box
     </span>
     <span>
      Agregar producto
     </span>
    </a>
    
    <a class="flex items-center gap-3 px-4 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#0d1c32] pl-4" href="/pedidos">
     <span class="material-symbols-outlined text-lg" data-icon="list_alt">
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
   </aside>  <main class="ml-64 min-h-screen flex flex-col">
   <header class="h-32 flex items-end px-12 pb-8 bg-surface">
    <div class="flex flex-col">
     <h2 class="text-4xl font-black tracking-tight uppercase">
      Editar producto
     </h2>
    </div>
   </header>
   <section class="flex-1 px-12 py-8 bg-surface-container-low">
    <div class="grid grid-cols-12 gap-8 max-w-7xl">
     <div class="col-span-12 lg:col-span-8 space-y-8">
      <div class="bg-surface-container-high p-8 shadow-none border-0">
       <h3 class="text-xs font-bold tracking-widest text-[#ffb3b1] uppercase mb-10 flex items-center gap-2">
        <span class="material-symbols-outlined text-sm">precision_manufacturing</span>
        Especificaciones del Producto
       </h3>
       
       <div class="space-y-8">
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-black uppercase tracking-[0.2em] text-[#c2c6d3]">Nombre del Producto</label>
         <input id="edit-nombre" class="bg-transparent border-0 border-b-2 border-[#1c2a41] p-0 pb-2 text-2xl font-bold text-[#d6e3ff] focus:ring-0 focus:border-[#ee3f4b] transition-all uppercase" type="text" value="Cargando..."/>
        </div>

        <div class="grid grid-cols-2 gap-12">
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-black uppercase tracking-[0.2em] text-[#c2c6d3]">Fabricante</label>
          <input id="edit-fabricante" class="bg-transparent border-0 border-b-2 border-[#1c2a41] p-0 pb-2 text-lg font-bold text-[#d6e3ff] focus:ring-0 focus:border-[#ee3f4b] transition-all" type="text" value="Cargando..."/>
         </div>
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-black uppercase tracking-[0.2em] text-[#c2c6d3]">ID del Sistema (SKU)</label>
          <input id="edit-sku" class="bg-transparent border-0 border-b-2 border-[#1c2a41] p-0 pb-2 text-lg font-bold text-[#c2c6d3] opacity-40 focus:ring-0" readonly type="text" value="MAC-000"/>
         </div>
        </div>

        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-black uppercase tracking-[0.2em] text-[#c2c6d3]">Detalles Técnicos</label>
         <textarea id="edit-specs" class="bg-[#041329] border-2 border-[#1c2a41] p-4 text-sm text-[#c2c6d3] focus:ring-0 focus:border-[#ee3f4b] transition-all min-h-[150px] font-mono" placeholder="Ingresar especificaciones..."></textarea>
        </div>
       </div>
      </div>
     </div>
     <div class="col-span-12 lg:col-span-4 space-y-8">
      <div class="bg-surface-container-high p-8 border-l-4 border-on-primary-container">
       <h3 class="text-sm font-bold uppercase tracking-wider text-secondary mb-8">
        Stock y Valoraci&oacute;n
       </h3>
       <div class="space-y-10">
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-black uppercase tracking-[0.2em] text-[#c2c6d3]">Precio Unitario (MXN)</label>
         <input id="edit-precio" class="bg-transparent border-0 border-b-2 border-[#1c2a41] p-4 text-4xl font-black text-[#d6e3ff] focus:ring-0 focus:border-[#ee3f4b] transition-all font-mono" type="number" step="0.01" value="0.00"/>
        </div>
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-black uppercase tracking-[0.2em] text-[#c2c6d3]">Lote en Almacén (Cant.)</label>
         <input id="edit-stock" class="bg-transparent border-0 border-b-2 border-[#1c2a41] p-4 text-4xl font-black text-[#d6e3ff] focus:ring-0 focus:border-[#ee3f4b] transition-all font-mono" type="number" value="0"/>
        </div>
        <div>
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Visibilidad en Catálogo
         </label>
         <div class="flex items-center gap-4 bg-surface-container-lowest p-1 border border-outline-variant/10">
        <button id="btn-save-prod" class="w-full py-6 bg-gradient-to-tr from-on-primary-container to-primary-container text-white font-black uppercase tracking-[0.2em] text-sm flex items-center justify-center gap-3 active:scale-[0.98] transition-all">
         <span class="material-symbols-outlined" data-icon="save" data-weight="fill">
          save
         </span>
         Guardar Cambios
        </button>
        <div class="grid grid-cols-2 gap-4">
         <button class="py-4 bg-surface-container-high border border-outline-variant/20 text-secondary font-bold uppercase tracking-widest text-[0.7rem] hover:bg-surface-bright transition-colors" onclick="alert('Funcionalidad de duplicado en mantenimiento.')">
          Duplicar SKU
         </button>
         <button id="btn-delete-prod" class="py-4 bg-surface-container-high border border-outline-variant/20 text-error font-bold uppercase tracking-widest text-[0.7rem] hover:bg-error-container hover:text-white transition-colors">
          Eliminar Pieza
         </button>
        </div>
      </div>
     </div>
    </div>
   </section>
  </main>
 </body>
</html>
