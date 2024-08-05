<x-navbar>
   <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
     <span class="sr-only">Open sidebar</span>
     <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
     </svg>
  </button>
 </x-navbar>
 <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
          <x-side-nav-link href="/admin/dashboard" :active="request()->is('admin/dashboard')">Dashboard</x-side-nav-link>
          <x-side-nav-link href="/admin/pickup" :active="request()->is('admin/pickup')">Pick Up Management</x-side-nav-link>
          <x-side-nav-link href="/admin/saldo" :active="request()->is('admin/saldo')">Saldo Management</x-side-nav-link>
          <x-side-nav-link href="/admin/nasabah" :active="request()->is('admin/nasabah')">Nasabah</x-side-nav-link>
          <x-side-nav-link href="/admin/pricing" :active="request()->is('admin/pricing')">Waste Pricing</x-side-nav-link>
          <x-side-nav-link href="/admin/deposit-log" :active="request()->is('admin/deposit-log')">Deposit Log</x-side-nav-link>
          <x-side-nav-link href="/admin/financial-report" :active="request()->is('admin/financial-report')">Financial Report</x-side-nav-link>
          <x-side-nav-link href="/admin/waste-report" :active="request()->is('admin/waste-report')">Waste Report</x-side-nav-link>
       </ul>
    </div>
 </aside>
 
 <div class="pt-8 sm:ml-64">
    {{$slot}}
 </div>