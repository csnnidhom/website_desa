<template>
  <b-container>
    <b-row>
      <b-col md="2">
        <router-link to="/" class="btn bg-gradient-success btn-block mb-3">
          + Tambah Berita
        </router-link>
      </b-col>
    </b-row>
    <b-card>
      <div class="table table-responsive">
        <table class="table table-hover">
          <thead class="text-center">
            <tr>
              <th
                class="
                  text-uppercase text-secondary text-xxs
                  font-weight-bolder
                  opacity-7
                  ps-2
                "
              >
                No
              </th>
              <th
                class="
                  text-uppercase text-secondary text-xxs
                  font-weight-bolder
                  opacity-7
                  ps-2
                "
              >
                Name
              </th>
              <th
                class="
                  text-uppercase text-secondary text-xxs
                  font-weight-bolder
                  opacity-7
                  ps-2
                "
              >
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="item in Categorys"
              :key="item.message"
              class="text-center align-middle"
            >
              <td>no</td>
              <td>{{ item.name }}</td>
              <td>Edit | Hapus</td>
            </tr>
          </tbody>
        </table>
      </div>
    </b-card>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      Categorys: {},
    };
  },
  methods: {
    loadData() {
      axios
        .get("api/admin/kategori")
        .then(({ data }) => (this.Categorys = data));
    },
  },
  created() {
    this.loadData();
  },
};
</script>