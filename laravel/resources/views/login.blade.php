<!DOCTYPE html>
<html class="dark" lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   MACUIN ADMIN - Login
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
 <body class="font-body selection:bg-on-primary-container selection:text-white">
  <!-- LOGIN SHELL: NAVIGATION SUPPRESSED PER CONTEXTUAL STATE LOCK -->
  <main class="min-h-screen flex items-center justify-center p-6 bg-surface overflow-hidden relative">
   <!-- SUBTLE INDUSTRIAL BACKGROUND ELEMENT -->
   <div class="absolute inset-0 z-0 opacity-10 pointer-events-none">
    <div class="grid grid-cols-12 h-full w-full">
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1 border-r border-outline-variant">
     </div>
     <div class="col-span-1">
     </div>
    </div>
   </div>
   <!-- LOGIN CONTAINER -->
   <div class="relative z-10 w-full max-w-md">
    <!-- BRAND IDENTITY ANCHOR -->
    <div class="mb-12 text-center md:text-left">
     <h1 class="font-headline text-2xl font-black tracking-tighter text-primary uppercase">
      MACUIN ADMIN
     </h1>
     <div class="mt-1 h-1 w-12 bg-on-primary-container">
     </div>
    </div>
    <!-- LOGIN PLATE (SURFACE STACKING) -->
    <div class="bg-surface-container-low p-8 md:p-12 shadow-2xl">
     <form class="space-y-8" onsubmit="event.preventDefault(); window.Api.login(this.email.value, this.password.value);">
      <!-- USERNAME INPUT -->
      <div class="space-y-2">
       <label class="block font-label text-[0.75rem] font-bold uppercase tracking-widest text-secondary" for="username">
        System Identifier
       </label>
       <div class="relative">
        <input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim text-on-surface px-4 py-3 placeholder:text-secondary-container focus:ring-0 focus:border-on-primary-container transition-colors duration-200 font-label tracking-tight" id="username" name="username" placeholder="USERNAME" type="text"/>
       </div>
      </div>
      <!-- PASSWORD INPUT -->
      <div class="space-y-2">
       <label class="block font-label text-[0.75rem] font-bold uppercase tracking-widest text-secondary" for="password">
        Access Key
       </label>
       <div class="relative">
        <input class="w-full bg-surface-container-highest border-0 border-b-2 border-secondary-fixed-dim text-on-surface px-4 py-3 placeholder:text-secondary-container focus:ring-0 focus:border-on-primary-container transition-colors duration-200 font-label tracking-tight" id="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" type="password"/>
       </div>
      </div>
      <!-- PRIMARY ACTION: THE INDUSTRIAL SWITCH -->
      <div class="pt-4">
       <button class="group relative w-full bg-on-primary-container hover:bg-on-primary-fixed-variant text-on-primary font-black uppercase py-4 tracking-widest transition-all duration-150 active:scale-[0.98] flex items-center justify-center overflow-hidden" style="background: linear-gradient(45deg, #ee3f4b, #92001c);" type="submit">
        <span class="relative z-10">
         Initialize Access
        </span>
        <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity">
        </div>
       </button>
      </div>
     </form>
    </div>
    <!-- FOOTER UTILITY (MINIMALIST) -->
   </div>
   <!-- DECORATIVE CORNER ACCENTS (INDUSTRIAL AESTHETIC) -->
  </main>
 </body>
</html>
