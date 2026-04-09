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
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="dashboard">
      dashboard
     </span>
     General
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="badge">
      badge
     </span>
     Gestion de personal
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="person_add">
      person_add
     </span>
     Registrar administrador
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="inventory_2">
      inventory_2
     </span>
     Gestion de productos
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="add_box">
      add_box
     </span>
     Agregar producto
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="edit_note">
      edit_note
     </span>
     Editar producto
    </a>
    <a class="flex items-center px-6 py-3 transition-colors duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="list_alt">
      list_alt
     </span>
     Ver pedidos
    </a>
    <a class="flex items-center px-6 py-3 transition-all duration-150 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-[20px]" href="#">
     <span class="material-symbols-outlined mr-3 text-lg" data-icon="edit_calendar">
      edit_calendar
     </span>
     Editar pedido
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
   </div>
  </aside>
  <!-- Main Content Area -->
  <main class="flex-1 ml-64 min-h-screen bg-surface flex flex-col">
   <!-- Header -->
   <header class="h-16 flex items-center justify-between px-10 bg-surface-container-low">
    <div class="flex items-center gap-4">
     <h2 class="text-on-surface font-headline font-bold text-sm tracking-tight uppercase">
      Editar pedido / ID: #MAC-88421
     </h2>
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
       <span class="text-5xl font-black tracking-tighter text-on-surface leading-none uppercase">
        En Ruta
       </span>
       <div class="w-3 h-3 bg-tertiary mb-1">
       </div>
      </div>
      <p class="mt-4 text-[11px] text-secondary-fixed-dim leading-relaxed">
       &Uacute;ltima actualizaci&oacute;n: 14:22 GMT-6
       <br/>
       Operador: LOG_UNIT_A12
      </p>
     </div>
     <!-- Metrics Card -->
     <div class="col-span-12 md:col-span-5 bg-surface-container-high p-8 flex flex-col justify-between">
      <div class="flex justify-between items-start">
       <span class="text-[10px] font-bold text-secondary uppercase tracking-[0.2em]">
        Valor de Carga
       </span>
       <span class="text-[10px] font-mono text-primary bg-primary-container px-2 py-0.5">
        PRIORIDAD ALTA
       </span>
      </div>
      <div class="text-5xl font-black tracking-tighter text-on-surface leading-none tabular-nums">
       $14,290.00
      </div>
      <div class="mt-4 flex gap-4">
       <div>
        <p class="text-[9px] text-secondary uppercase font-bold">
         Art&iacute;culos
        </p>
        <p class="text-lg font-bold">
         128 unidades
        </p>
       </div>
       <div class="w-px bg-outline-variant">
       </div>
       <div>
        <p class="text-[9px] text-secondary uppercase font-bold">
         Peso Total
        </p>
        <p class="text-lg font-bold">
         450 kg
        </p>
       </div>
      </div>
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
     <div class="col-span-12 lg:col-span-8 space-y-10">
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
         <input class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface" type="text" value="Industrial Solutions Ltd."/>
        </div>
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
          Punto de Entrega
         </label>
         <input class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface" type="text" value="Planta Norte - Dock 04"/>
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
       <div class="grid grid-cols-3 gap-6">
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-bold text-secondary uppercase tracking-wider">
          Modificar Estado
         </label>
         <select class="bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim focus:ring-0 focus:border-on-primary-container text-sm py-3 px-4 text-on-surface appearance-none">
          <option>
           En Almac&eacute;n
          </option>
          <option>
           Procesando
          </option>
          <option selected="">
           En Ruta
          </option>
          <option>
           Entregado
          </option>
          <option>
           Retenido en Aduana
          </option>
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
       <button class="bg-[#ffb3b1] hover:bg-[#ee3f4b] text-on-primary font-black text-xs px-8 py-4 transition-all duration-150 uppercase tracking-widest" onclick="return confirm('&iquest;Seguro que deseas guardar los cambios en este pedido?') &amp;&amp; confirm('Revisa bien la nueva informaci&oacute;n. &iquest;Confirmar edici&oacute;n?');">
        Guardar Cambios
       </button>
      </div>
     </div>
     <!-- Sidebar Details/History -->
     <div class="col-span-12 lg:col-span-4 flex flex-col gap-6">
      <div class="bg-surface-container-low p-6 border-l-4 border-tertiary">
       <h3 class="text-[11px] font-black text-on-surface uppercase tracking-[0.2em] mb-4">
        Registro de Auditor&iacute;a
       </h3>
       <div class="space-y-4">
        <div class="flex gap-4">
         <span class="text-[10px] font-mono text-secondary-fixed-dim">
          14:22
         </span>
         <p class="text-[11px] text-on-surface-variant">
          <span class="font-bold text-on-surface">
           ESTADO_MODIFICADO:
          </span>
          "En Almac&eacute;n" &rarr; "En Ruta" por ADMIN_02
         </p>
        </div>
        <div class="flex gap-4">
         <span class="text-[10px] font-mono text-secondary-fixed-dim">
          10:05
         </span>
         <p class="text-[11px] text-on-surface-variant">
          <span class="font-bold text-on-surface">
           CARGA_VERIFICADA:
          </span>
          Unidad de sellado validada por SCAN_UNIT_9
         </p>
        </div>
        <div class="flex gap-4">
         <span class="text-[10px] font-mono text-secondary-fixed-dim">
          08:12
         </span>
         <p class="text-[11px] text-on-surface-variant">
          <span class="font-bold text-on-surface">
           ORDEN_CREADA:
          </span>
          Ticket #MAC-88421 generado en sistema.
         </p>
        </div>
       </div>
      </div>
      <div class="bg-surface-container-high p-6">
       <h3 class="text-[11px] font-black text-on-surface uppercase tracking-[0.2em] mb-4">
        Firmas Digitales
       </h3>
       <div class="space-y-3">
        <div class="flex items-center justify-between p-3 bg-surface-container-highest">
         <span class="text-[10px] font-bold text-secondary">
          Autorizaci&oacute;n Admin
         </span>
         <span class="material-symbols-outlined text-primary text-sm" data-weight="fill" style="font-variation-settings: 'FILL' 1;">
          check_circle
         </span>
        </div>
        <div class="flex items-center justify-between p-3 bg-surface-container-highest">
         <span class="text-[10px] font-bold text-secondary">
          Validaci&oacute;n Financiera
         </span>
         <span class="material-symbols-outlined text-primary text-sm" data-weight="fill" style="font-variation-settings: 'FILL' 1;">
          check_circle
         </span>
        </div>
        <div class="flex items-center justify-between p-3 bg-surface-container-highest opacity-50">
         <span class="text-[10px] font-bold text-secondary">
          Confirmaci&oacute;n Cliente
         </span>
         <span class="material-symbols-outlined text-secondary text-sm">
          radio_button_unchecked
         </span>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- Footer Action Bar -->
   </div>
  </main>
  <!-- Contextual Decorative UI (Industrial Aesthetic) -->
 </body>
</html>
