<template>
  <div>
    <section-header
      title="Apresentação"
      icon="fas fa-rocket"
    ></section-header>

    <div class="section-body">
      <div class="card profile-widget mt-5">
        <div class="profile-widget-header">
          <img alt="image" src="/assets/img/lucas.jpeg" class="rounded-circle profile-widget-picture" />
          <div class="profile-widget-items">
            <div class="profile-widget-item">
              <div class="profile-widget-item-label">Idade</div>
              <div class="font-weight-600 px-2">27</div>
            </div>
            <div class="profile-widget-item">
              <div class="profile-widget-item-label">Telefone</div>
              <div class="font-weight-600 px-2">(42) 99961-96552</div>
            </div>
            <div class="profile-widget-item">
              <div class="profile-widget-item-label">Email</div>
              <div class="font-weight-600 px-2">lucaspontarolo@gmail.com</div>
            </div>
          </div>
        </div>

        <div class="profile-widget-description pb-0">
          <div class="profile-widget-name">
            Lucas Luan Pontarolo
            <div class="text-muted d-inline font-weight-normal">
              <div class="slash"></div>
              Desenvolvedor Web
            </div>
          </div>

          <p>
            Atuo como desenvolvedor desde 2013.
            Desde sempre atuando como desenvolvedor backend, mas tenho uma grande apreciação pelo frontend e banco de dados.
          </p>

          <p>
            <h6>Conhecimentos</h6>
            <ul>
              <li>PHP 5.3 -> 7.4</li>
              <li>Laravel 5.4 -> 8.*</li>
              <li>CakePHP 1.3 -> 3.8</li>
              <li>VueJS 2</li>
              <li>PostgreSQL</li>
              <li>Mysql</li>
              <li>JasperReports</li>
              <li>Redis</li>
              <li>GIT</li>
              <li>Docker</li>
              <li>Scrum</li>
              <li>Gestão de projetos</li>
              <li>Suporte ao usuário</li>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SectionHeader from '@/components/template/SectionHeader.vue';

export default {
  components: {
    SectionHeader,
  },
};
</script>
