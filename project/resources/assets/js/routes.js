import Home from "@/pages/Home.vue";

/** Cars */
import CarsIndex from "@/pages/cars/Index.vue";
import CarsCreate from "@/pages/cars/Create.vue";
import CarsEdit from "@/pages/cars/Edit.vue";

export const routes = [
  {
    name: "home",
    path: "/",
    component: Home,
    meta: { title: "Apresentação" }
  },

  /** Cars */
  {
    name: "cars",
    path: "/carros",
    component: CarsIndex,
    meta: { title: "Carros" }
  },
  {
    name: "cars.create",
    path: "/carros/novo",
    component: CarsCreate,
    meta: { title: "Carro :. Novo" }
  },
  {
    name: "cars.edit",
    path: "/carros/editar/:id",
    component: CarsEdit,
    meta: { title: "Carro :. Edição" }
  },

  /* Redirect to home when invalid route */
  {
    path: '*',
    redirect: '/',
  },
];
