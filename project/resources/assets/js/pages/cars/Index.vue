<template>
  <div>
    <section-header
      title="Carros :. Listagem"
      icon="fas fa-car-side"
    ></section-header>

    <loader :show-loader="isLoading"></loader>
    <div class="card">
      <div class="card-header d-flex justify-content-end">
        <router-link :to="{ name: 'cars.create' }" class="btn btn-success">
          <i class="fas fa-plus fa-fw"></i> Novo
        </router-link>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-md table-vcenter">
            <thead>
              <tr>
                <th style="width: 20%">Modelo</th>
                <th style="width: 20%">Marca</th>
                <th style="width: 15%">Ano</th>
                <th style="width: 15%" class="text-nowrap">Criado em</th>
                <th style="width: 15%" class="text-nowrap">Atualizado em</th>
                <th style="width: 20%" class="text-center">Ações</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="car in cars.data" :key="car.id">
                <td>{{ car.model }}</td>
                <td>{{ car.brand.name }}</td>
                <td>{{ car.year }}</td>
                <td>{{ car.created_at }}</td>
                <td>{{ car.updated_at }}</td>
                <td class="text-center">
                  <router-link
                    :to="{ name: 'cars.edit', params: { id: car.id } }"
                    class="btn btn-sm btn-warning"
                    title="Editar"
                    data-toggle="tooltip"
                    data-placement="top"
                  >
                    <i class="fas fa-pencil-alt"></i>
                  </router-link>

                  <button
                    @click.prevent="confirmDelete(car.id)"
                    class="btn btn-sm btn-danger"
                    type="button"
                    title="Remover"
                    data-toggle="tooltip"
                    data-placement="top"
                  >
                    <i class="fas fa-trash-alt text-white"></i>
                  </button>
                </td>
              </tr>
              <tr v-if="!cars.data || !cars.data.length">
                <td class='text-center text-muted' colspan="12">
                  * Nenhum registro encontrado *
                </td>
              </tr>
            </tbody>
          </table>

          <pagination
            class="pagination justify-content-center"
            :data="cars"
            @pagination-change-page="fetchResults"
          ></pagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cars: {},
      isLoading: false,
    };
  },

  created() {
    this.fetchResults();
  },

  methods: {
    confirmDelete(id) {
      this.$swal({
        title: 'Confirmar exclusão',
        html: '<p>Deseja realmente remover este registro?<p>',
        icon: 'question',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonColor: '#47c363',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Remover',
        showLoaderOnConfirm: true,
        allowOutsideClick: () => !this.$swal.isLoading(),
        preConfirm: () => this.handleDelete(id),
      });
    },

    handleDelete(id) {
      return this.axios.delete(`/api/cars/${id}`)
        .then((response) => {
          const carIndexOnList = this.cars.data.findIndex((car) => car.id == id);
          this.cars.data.splice(carIndexOnList, 1);
          this.$swal.fire('Removido!', response.data.message, 'success')
        })
        .catch((err) => {
          if (err.response && err.response.status === 422) {
            this.$toast({ icon: 'error', title: err.response.data.message});
            return;
          }

          throw err;
        });
    },

    fetchResults(page = 1) {
      this.isLoading = true;

      this.axios.get(`/api/cars?page=${page}`).then((response) => {
        this.cars = response.data;
      }).catch((err) => {
        this.$toast({icon: 'error', title: 'Ocorreu um erro ao carregar a lista de carros.'});
      }).finally(() => (this.isLoading = false));
    }
  },
};
</script>
