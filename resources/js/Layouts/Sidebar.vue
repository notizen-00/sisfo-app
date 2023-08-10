<script setup>
import { ref, defineProps, computed } from 'vue';
import { useStore } from 'vuex';
import { faBars, faTimes,faSignOut,faDashboard,faInbox,faClipboard,faLayerGroup,faUserGear,faMoneyCheck,faCog } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Head, Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLinkSidebar from '@/Components/NavLinkSidebar.vue';
const props = defineProps({
  isSidebarCollapsed: Boolean
});

const store = useStore();
const isSidebarCollapsed = computed(() => store.state.isSidebarCollapsed);
const toggleSidebar = () => store.commit('toggleSidebar');

const icons = {
  bars: faBars,
  times: faTimes,
  signout: faSignOut,
  dashboard: faDashboard,
  inbox:faInbox,
  clipboard:faClipboard,
  layergroup:faLayerGroup,
  usergear:faUserGear,
  money:faMoneyCheck,
  cog:faCog,
};

  const isDropdownOpen = ref(false);

  const toggleDropdown = (event) => {
    event.preventDefault();
    alert('hi');
    isDropdownOpen.value = !isDropdownOpen.value;
    console.log(isDropdownOpen);
  };


</script>

<template>
  <div class="">
    <!-- Sidebar -->
    <aside
      :class="{'hidden': isSidebarCollapsed, 'h-screen': !isSidebarCollapsed}"
      class="bg-white shadow border right-3 ring-offset-2 border-slate-600"
    >
      <!-- Sidebar Logo -->
      <div class="p-4 bg-gray-100 text-center">
        <img src="/public/" alt="Logo" class="w-16 h-16 mx-auto">
        <h1 class="text-xl font-semibold mt-2">Sistem Informasi</h1>
      </div>

      <!-- Sidebar Items -->
      <ul class="mt-4 space-y-2">
        <li>
           <NavLinkSidebar :href="route('dashboard')" :active="route().current('dashboard')">
            <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.dashboard"/></span>
                Dashboard
           </NavLinkSidebar>
        </li>
        <li>
            <NavLinkSidebar :href="route('pengajuan.index')" :active="route().current('pengajuan.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.inbox"/></span>
                 Data Pengajuan
            </NavLinkSidebar>
         </li>

         <li>
            <NavLinkSidebar :href="route('revisi.index')" :active="route().current('revisi.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.clipboard"/></span>
                 Data Revisi
            </NavLinkSidebar>
         </li>
         <li>
            
          <NavLinkSidebar :href="route('claim.index')" :active="route().current('claim.index')">
           <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.money"/></span>
               Data Claim
          </NavLinkSidebar>
       </li>
         <li>
            
            <NavLinkSidebar :href="route('rekapitulasi.index')" :active="route().current('rekapitulasi.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.layergroup"/></span>
                 Rekapitulasi
            </NavLinkSidebar>
          
         </li>
         <li>
            
            <NavLinkSidebar :href="route('user.index')" :active="route().current('user.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.usergear"/></span>
                 User Management
            </NavLinkSidebar>
         </li>
      
         <li>
            
            <NavLinkSidebar :href="route('pengaturan.index')" :active="route().current('pengaturan.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.cog"/></span>
                 Pengaturan Aplikasi
            </NavLinkSidebar>
         </li>
         <li>
          <Dropdown align="bottom" width="full">
            <template #trigger>
            
              
                <span>Master Data</span>
        
            </template>
      
            <template #content>
              <li class="block px-4 py-2 text-xs text-gray-400">Master Data</li>
      
              <li>
                <DropdownLink :href="route('profile.show')">Data IKU</DropdownLink>
              </li>
      
              <li >
                <DropdownLink :href="route('dashboard')">Data Unit Kerja</DropdownLink>
              </li>
      
              <li class="border-t border-gray-200" />
      
              <li>
                <form @submit.prevent="logout">
                  <DropdownLink as="button">Log Out</DropdownLink>
                </form>
              </li>
            </template>
          </Dropdown>
          </li>
        
       
      </ul>
    </aside>

    <!-- Rest of the page content -->
    <slot></slot>
  </div>
</template>
