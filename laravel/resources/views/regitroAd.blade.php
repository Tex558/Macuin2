<!DOCTYPE html>
<html class="dark" lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   MACUIN ADMIN - Registrar administrador
  </title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  <script src="/js/tailwind-config.js">
  </script>
  <link href="/css/app.css" rel="stylesheet"/>
  <script src="/js/api.js">
  </script>
 </head>
 <body class="bg-background text-on-surface selection:bg-on-primary-container selection:text-white overflow-y-auto min-h-screen">
  <!-- Side Navigation Shell -->
  <aside class="fixed left-0 top-0 h-full flex flex-col py-6 bg-[#041329] dark:bg-[#041329] docked h-screen w-64 border-r-0 z-50">
   <div class="px-6 mb-10">
    <h1 class="text-xl font-black tracking-tighter text-[#ffb3b1] uppercase">
     MACUIN ADMIN
    </h1>
   </div>
   <nav class="flex-1 space-y-1">
    <!-- Nav Item: General -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/dashboard">
     <span class="material-symbols-outlined text-lg" data-icon="dashboard">
      dashboard
     </span>
     <span>
      General
     </span>
    </a>
    <!-- Nav Item: Gestion de personal -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/personal">
     <span class="material-symbols-outlined text-lg" data-icon="badge">
      badge
     </span>
     <span>
      Gestion de personal
     </span>
    </a>
    <!-- Nav Item: Registrar administrador (ACTIVE) -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#ffb3b1] bg-[#1c2a41] border-l-4 border-[#ee3f4b] pl-3" href="/registrar-admin">
     <span class="material-symbols-outlined text-lg" data-icon="person_add">
      person_add
     </span>
     <span>
      Registrar administrador
     </span>
    </a>
    <!-- Nav Item: Gestion de productos -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/productos">
     <span class="material-symbols-outlined text-lg" data-icon="inventory_2">
      inventory_2
     </span>
     <span>
      Gestion de productos
     </span>
    </a>
    <!-- Nav Item: Agregar producto -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/agregar-producto">
     <span class="material-symbols-outlined text-lg" data-icon="add_box">
      add_box
     </span>
     <span>
      Agregar producto
     </span>
    </a>
    <!-- Nav Item: Editar producto -->
    
    <!-- Nav Item: Ver pedidos -->
    <a class="flex items-center gap-3 py-3 font-['Inter'] antialiased tracking-tight text-[0.875rem] uppercase font-bold text-[#c2c6d3] hover:bg-[#1c2a41] hover:text-[#ffb3b1] transition-colors duration-150 pl-4" href="/pedidos">
     <span class="material-symbols-outlined text-lg" data-icon="list_alt">
      list_alt
     </span>
     <span>
      Ver pedidos
     </span>
    </a>
    <!-- Nav Item: Editar pedido -->
    
   </nav>
   <div class="mt-auto px-6 border-t border-outline-variant/10 pt-6">
    <button class="w-full bg-[#1c2a41] text-[#c2c6d3] text-[0.7rem] font-bold uppercase hover:bg-surface-bright transition-all py-3" onclick="window.Api.logout()">
     Cerrar sesión
    </button>
   </div>
  </aside>
  <!-- Main Content Canvas -->
  <main class="ml-64 min-h-screen flex flex-col">

   <!-- Content Area: Registration Form -->
   <div class="flex-1 flex items-center justify-center p-12 bg-surface">
    <div class="w-full max-w-2xl bg-surface-container-low p-1 border-none relative overflow-hidden">
     <!-- Structural accent -->
     <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 -mr-12 -mt-12 rotate-45">
     </div>
     <div class="bg-surface-container-high p-12">
      <header class="mb-12">
        <div class="flex items-center gap-2 mb-2">
         <div class="w-6 h-[2px] bg-on-primary-container">
         </div>
        </div>
       <h2 class="text-4xl font-extrabold tracking-tighter text-on-surface uppercase mb-2">
        Registrar administrador
       </h2>
      </header>
      <form class="space-y-8" onsubmit="event.preventDefault(); if(confirm('&iquest;Est&aacute;s seguro de registrar a este administrador?') && confirm('Verifica que los datos sean correctos. &iquest;Continuar?')) { window.Api.crearUsuario({nombre: this.nombre.value, email: this.email.value, password: this.password.value, telefono: this.telefono.value, rol: 'admin'}).then(() => { alert('Administrador registrado con éxito'); window.location.href='/personal'; }).catch(e => alert(e.message || 'Error al registrar administrador')); }">
       <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Field: Name -->
        <div class="flex flex-col gap-2">
         <label class="text-[10px] font-bold uppercase tracking-widest text-secondary-fixed-dim">
           Nombre Completo
          </label>
          <input class="bg-surface-container-highest border-b-2 border-secondary-fixed-dim p-4 text-on-surface placeholder:text-outline/30 focus:border-on-primary-container transition-colors font-mono text-sm" name="nombre" name="nombre" required placeholder="NOMBRE_OPERADOR" type="text" required/>
         </div>
         <!-- Field: Company Email -->
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-bold uppercase tracking-widest text-secondary-fixed-dim">
           Correo Electrónico Institucional
          </label>
          <input class="bg-surface-container-highest border-b-2 border-secondary-fixed-dim p-4 text-on-surface placeholder:text-outline/30 focus:border-on-primary-container transition-colors font-mono text-sm" name="email" name="email" required placeholder="ADMIN@MACUIN.INT" type="email" required/>
         </div>
         <!-- Field: Password -->
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-bold uppercase tracking-widest text-secondary-fixed-dim">
           Clave de Acceso al Sistema
          </label>
          <input class="bg-surface-container-highest border-b-2 border-secondary-fixed-dim p-4 text-on-surface placeholder:text-outline/30 focus:border-on-primary-container transition-colors font-mono text-sm" name="password" name="password" required placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" type="password" required/>
         </div>
         <!-- Field: Phone Number -->
         <div class="flex flex-col gap-2">
          <label class="text-[10px] font-bold uppercase tracking-widest text-secondary-fixed-dim">
           Línea Directa (Teléfono)
          </label>
          <input class="bg-surface-container-highest border-b-2 border-secondary-fixed-dim p-4 text-on-surface placeholder:text-outline/30 focus:border-on-primary-container transition-colors font-mono text-sm" name="telefono" name="telefono" placeholder="+52 123 456 7890" type="tel"/>
        </div>
       </div>
       <div class="pt-8 border-t border-outline-variant/10">
        <button class="w-full bg-on-primary-container text-white py-5 px-8 flex items-center justify-between group transition-all duration-150 active:scale-[0.98]" type="submit">
         <span class="text-sm font-black uppercase tracking-[0.2em]">
           Autorizar Registro Industrial
          </span>
         <span class="material-symbols-outlined transition-transform group-hover:translate-x-1" data-icon="chevron_right">
          chevron_right
         </span>
        </button>
       </div>
      </form>
     </div>
    </div>
   </div>
   <!-- Background Decoration (Asymmetric Data) -->
  </main>
 </body>
</html>
