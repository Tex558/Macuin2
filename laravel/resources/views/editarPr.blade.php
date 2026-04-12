<!DOCTYPE html>
<html class="dark" lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <script src="/js/tailwind-config.js">
  </script>
  <link href="/css/app.css" rel="stylesheet"/>
  <script src="/js/api.js">
  </script>
 </head>
 <body class="bg-background text-on-surface font-body selection:bg-on-primary-container selection:text-white">
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] docked h-screen w-64 border-r-0 z-50">
   <div class="px-6 mb-10">
    <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1]">
     MACUIN ADMIN
    </h1>
   </div>
   <nav class="flex-1 space-y-1 overflow-y-auto">
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
      Gestión de personal
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
      Gestión de productos
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
  <main class="ml-64 min-h-screen flex flex-col">
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
       <div class="mb-8 border-b border-outline-variant/20 pb-4">
        <h3 class="text-sm font-bold uppercase tracking-wider text-secondary">
         Especificaciones del Producto
        </h3>
       </div>
       <div class="grid grid-cols-2 gap-x-8 gap-y-10">
        <div class="col-span-2">
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Nombre del Producto
         </label>
         <input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-3 px-4 text-on-surface font-medium focus:border-on-primary-container transition-all duration-150" type="text" value="Industrial Pneumatic Actuator - Series X"/>
        </div>
        <div class="col-span-1">
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Fabricante
         </label>
         <input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-3 px-4 text-on-surface font-medium focus:border-on-primary-container transition-all duration-150" type="text" value="MACUIN PRECISION LTD"/>
        </div>
        <div class="col-span-1">
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          SKU Interno
         </label>
         <input class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant py-3 px-4 text-secondary font-mono text-sm cursor-not-allowed" readonly="" type="text" value="MC-99021-AX"/>
        </div>
        <div class="col-span-2">
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Especificaciones Técnicas
         </label>
         <textarea class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-3 px-4 text-on-surface font-body text-sm focus:border-on-primary-container transition-all duration-150 resize-none" rows="6">Presión de operación: 0.5 - 1.0 MPa
Carga Máxima: 4500N
Longitud de carrera: 200mm
Material del cuerpo: Aluminio anodizado duro 6061-T6
Tipo de montaje: ISO 15552</textarea>
        </div>
       </div>
      </div>
     </div>
     <div class="col-span-12 lg:col-span-4 space-y-8">
      <div class="bg-surface-container-high p-8 border-l-4 border-on-primary-container">
       <h3 class="text-sm font-bold uppercase tracking-wider text-secondary mb-8">
        Inventario y Valoración
       </h3>
       <div class="space-y-10">
        <div>
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Precio Unitario (USD)
         </label>
         <div class="relative">
          <span class="absolute left-4 top-1/2 -translate-y-1/2 font-black text-primary">
           $
          </span>
          <input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-4 pl-10 pr-4 text-3xl font-black tabular-nums tracking-tighter focus:border-on-primary-container transition-all duration-150" type="text" value="1,249.00"/>
         </div>
        </div>
        <div>
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Nivel de Stock Actual
         </label>
         <div class="flex items-center gap-4">
          <input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim py-4 px-4 text-3xl font-black tabular-nums tracking-tighter focus:border-on-primary-container transition-all duration-150" type="number" value="142"/>
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
        <div>
         <label class="block text-[0.65rem] font-black uppercase tracking-widest text-secondary mb-2">
          Visibilidad en Catálogo
         </label>
         <div class="flex items-center gap-4 bg-surface-container-lowest p-1 border border-outline-variant/10">
          <button class="flex-1 py-2 text-[0.7rem] font-black uppercase bg-on-primary-container text-white">
           Activo
          </button>
          <button class="flex-1 py-2 text-[0.7rem] font-black uppercase text-secondary hover:text-on-surface">
           Descontinuado
          </button>
         </div>
        </div>
       </div>
      </div>
      <div class="space-y-4">
       <button class="w-full py-6 bg-gradient-to-tr from-on-primary-container to-primary-container text-white font-black uppercase tracking-[0.2em] text-sm flex items-center justify-center gap-3 active:scale-[0.98] transition-all">
        <span class="material-symbols-outlined" data-icon="save" data-weight="fill">
         save
        </span>
        Guardar Cambios
       </button>
       <div class="grid grid-cols-2 gap-4">
        <button class="py-4 bg-surface-container-high border border-outline-variant/20 text-secondary font-bold uppercase tracking-widest text-[0.7rem] hover:bg-surface-bright transition-colors">
         Duplicar SKU
        </button>
        <button class="py-4 bg-surface-container-high border border-outline-variant/20 text-error font-bold uppercase tracking-widest text-[0.7rem] hover:bg-error-container hover:text-white transition-colors">
         Eliminar Producto
        </button>
       </div>
      </div>
     </div>
    </div>
   </section>
  </main>
 </body>
</html>