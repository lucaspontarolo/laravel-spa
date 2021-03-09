<template>
  <div>
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
      <ul class="navbar-nav">
        <li>
          <router-link to="/" data-toggle="sidebar" class="nav-link nav-link-lg">
            <i class="fas fa-bars"></i>
          </router-link>
        </li>

      </ul>
      <div class="navbar-brand mr-auto">
        <span class="d-none d-sm-inline-block">Projeto avaliativo</span>
        <span class="d-sm-none">Avaliação</span>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'navbar',
};
</script>
