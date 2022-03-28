<template>
  <div class="container">
    <div class="row">
      <div class="col-2">
        <button
          class="btn btn-success"
          href="#"
          v-show="!statusModal"
          @click="showModalCreate"
        >
          Tambah Kategori
        </button>
        <button
          class="btn btn-success"
          href="#"
          @click="showModalCreate"
          v-show="statusModal"
        >
          Ubah Kategori
        </button>
      </div>
    </div>
    <div class="card">
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
              v-for="(item, index) in Categorys"
              :key="item.id"
              class="text-center align-middle"
            >
              <td>{{ ++index }}</td>
              <td>{{ item.name }}</td>
              <td><a href="#" @click="showModalEdit(item)">Edit</a> | Hapus</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Create -->
    <div
      class="modal fade"
      id="modalCreate"
      tabindex="-1"
      aria-labelledby="modalCreate1"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form @submit.prevent="statusModal ? ubahData() : simpanData()">
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Nama Kategori :</strong>
                    <input
                      class="form-control"
                      placeholder="Nama Kategori"
                      v-model="form.name"
                      :class="{ 'is-invalid': form.errors.has('name') }"
                    />
                    <has-error :form="form" field="name"></has-error>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
                :disabled="disabled"
              >
                Close
              </button>
              <button
                type="submit"
                class="btn btn-success"
                v-show="!statusModal"
              >
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>Simpan
              </button>
              <button
                type="submit"
                class="btn btn-success"
                v-show="statusModal"
              >
                <i v-show="loading" class="fa fa-spinner fa-spin"></i>Ubah
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      disabled: false,
      Categorys: {},
      statusModal: false,
      form: new Form({
        id: "",
        name: "",
      }),
    };
  },
  methods: {
    showModalCreate() {
      this.statusModal = false;
      this.form.reset();
      $("#modalCreate").modal("show");
    },
    showModalEdit(item) {
      this.statusModal = true;
      this.form.reset();
      $("#modalCreate").modal("show");
      this.form.fill(item);
    },
    loadData() {
      this.$Progress.start();
      axios
        .get("api/admin/kategori")
        .then(({ data }) => (this.Categorys = data));
      this.$Progress.finish();
    },
    simpanData() {
      this.$Progress.start();
      this.loading = true;
      this.disabled = true;
      this.form
        .post("api/admin/kategori")
        .then(() => {
          Fire.$emit("refreshData");
          $("#modalCreate").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Data Berhasil Disimpan",
          });
          this.$Progress.finish();
          this.loading = false;
          this.disabled = false;
        })
        .catch(() => {
          this.$Progress.fail();
          this.loading = false;
          this.disabled = false;
        });
    },
    ubahData() {
      this.$Progress.start();
      this.loading = true;
      this.disabled = true;
      this.form
        .put("api/admin/kategori/" + this.form.id)
        .then(() => {
          Fire.$emit("refreshData");
          $("#modalCreate").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Data Berhasil Diubah",
          });
          this.$Progress.finish();
          this.loading = false;
          this.disabled = false;
        })
        .catch(() => {
          this.$Progress.fail();
          this.loading = false;
          this.disabled = false;
        });
    },
  },

  created() {
    this.loadData();
    Fire.$on("refreshData", () => {
      this.loadData();
    });
  },
};
</script>