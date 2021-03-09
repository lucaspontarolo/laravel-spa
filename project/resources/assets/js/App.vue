<template>
  <div class="main-wrapper main-wrapper-1">
    <!-- Navbar -->
    <navbar></navbar>

    <!-- Sidebar -->
    <sidebar></sidebar>

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <router-view></router-view>
      </section>
    </div>
  </div>
</template>

<script>
import Navbar from '@/components/template/Navbar.vue';
import Sidebar from '@/components/template/Sidebar.vue';

export default {
  components: {
    Navbar,
    Sidebar,
  },
};
</script>
