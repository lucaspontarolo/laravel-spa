<template>
  <div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <router-link :to="{ name: 'home' }">Pulz</router-link>
      </div>

      <div class="sidebar-brand sidebar-brand-sm">
        <router-link :to="{ name: 'home' }">Pulz</router-link>
      </div>

      <ul class="sidebar-menu">
        <li class="menu-header">Cadastros</li>
        <router-link :to="{ name: 'cars' }" custom v-slot="{ href, navigate, isActive }">
          <li :class="{active: isActive}">
            <a :href="href" @click="navigate">
              <i class="fas fa-car-side"></i>
                <span>Carros</span>
            </a>
          </li>
        </router-link>
      </ul>
    </aside>
  </div>
</template>

<script>
export default {
  name: 'sidebar',
};
</script>
