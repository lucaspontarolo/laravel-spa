<template>
  <div>
    <section-header
      title="Carro :. Adição"
      icon="fas fa-car-side"
    ></section-header>

    <loader :show-loader="isLoading"></loader>
    <div class="card card-secondary">
      <div class="card-body pb-0">
        <div class="form-group" :class="hasErrors('brand_id')">
          <label :for="`brand-${_uid}`">
            Marca <span class="text-danger ml-1">*</span>
          </label>

          <select
            v-model="car.brand_id"
            :id="`brand-${_uid}`"
            class="form-control"
            :class="hasErrors('brand_id')"
          >
            <option :value="null">
              -- Selecione a marca --
            </option>
            <option v-for="brand in brands" :value="brand.value" :key="brand.value">
              {{ brand.text }}
            </option>
          </select>
          <error-block :errors="errors" field="brand_id"></error-block>
        </div>

        <div class="form-row">
          <div class="form-group col-md-8">
            <label :for="`model-${_uid}`">
              Modelo <span class="text-danger ml-1">*</span>
            </label>
            <input type="text" v-model="car.model"
              class="form-control"
              :class="hasErrors('model')"
              :id="`model-${_uid}`"
              placeholder="Informe o modelo do carro"
              max="120"
            />
            <error-block :errors="errors" field="model"></error-block>
          </div>

          <div class="form-group col-md-4">
            <label :for="`year-${_uid}`">
              Ano <span class="text-danger ml-1">*</span>
            </label>
            <input type="number" v-model="car.year"
              class="form-control"
              :class="hasErrors('year')"
              :id="`year-${_uid}`"
              placeholder="Informe o ano do carro"
              min="0"
            />
            <error-block :errors="errors" field="year"></error-block>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <div class="text-center">
          <router-link :to="{ name: 'cars' }" class="btn btn-light shadow-sm">
            <i class="fas fa-undo fa-sm text-gray-600"></i> Voltar
          </router-link>
          <button
            @click.prevent="handeSave"
            class="btn btn-success shadow-sm ml-1"
            type="button"
          >
            <i class="fas fa-save fa-sm text-white-50"></i>
            Salvar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      brands: [],
      car: {
        model: null,
        year: new Date().getFullYear(),
        brand_id: null,
      },

      errors: {},
      isLoading: false,
    };
  },

  created() {
    this.fetchBrands();
  },

  methods: {
    handeSave() {
      this.isLoading = true;

      this.axios
        .post('/api/cars', this.car)
        .then((response) => {
          this.$toast({ icon: 'success', title: response.data.message });
          this.$router.push({ name: 'cars.edit', params: { id: response.data.car.id }})
        })
        .catch((err) => {
          if (err.response && err.response.status === 422) {
            this.errors = err.response.data.errors;
            this.$toast({ icon: 'warning', title: 'Existem erros de validação no seu formulário' });
            return;
          }

          throw err;
        })
        .finally(() => (this.isLoading = false));
    },

    fetchBrands() {
      this.axios
      .get('/api/brands/toSelect')
      .then((response) => {
        this.brands = response.data;
      })
      .catch((err) => {
        this.$toast({ icon: 'error', title: 'Ocorreu um erro ao carregar a listagem de marcas.'});
      });
    },

    hasErrors(error) {
      return this.errors[error] !== undefined ? 'is-invalid' : '';
    },
  },
};
</script>
