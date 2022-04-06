<template>
  <div class="container">
    <div class="row">
      <div class="col-3">
        <button class="btn btn-success" href="#" @click="showModalCreate">
          Tambah Gambar
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
                Title
              </th>
              <th
                class="
                  text-uppercase text-secondary text-xxs
                  font-weight-bolder
                  opacity-7
                  ps-2
                "
              >
                Image
              </th>
              <th
                class="
                  text-uppercase text-secondary text-xxs
                  font-weight-bolder
                  opacity-7
                  ps-2
                "
              >
                Nama Kategori
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
              class="text-center align-middle"
              v-for="(item, index) in Images"
              :key="item.id"
            >
              <td>{{ ++index }}</td>
              <td>{{ item.title }}</td>
              <td>
                <img
                  :src="'storage/' + item.image"
                  class="rounded"
                  style="width: 100px"
                />
              </td>
              <td>{{ item.id_category }}</td>
              <td>
                <a href="#" @click="showModalEdit(item)"
                  ><i class="fas fa-edit"></i
                ></a>
                |
                <a href="#" @click="deleteData(item.id)"
                  ><i class="fas fa-trash-alt"></i
                ></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal -->
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
            <h5
              class="modal-title"
              id="exampleModalLabel"
              v-show="!statusModal"
            >
              Tambah Gambar
            </h5>
            <h5 class="modal-title" id="exampleModalLabel" v-show="statusModal">
              Ubah Gambar
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form
            @submit.prevent="statusModal ? ubahData() : simpanData()"
            enctype="multipart/form-data"
          >
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Title :</strong>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Title"
                      v-model="form.title"
                      :class="{ 'is-invalid': form.errors.has('title') }"
                    />
                    <has-error :form="form" field="title"></has-error>
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                      <strong>Image :</strong>
                      <p>
                        <img
                          :src="previewImage"
                          v-if="previewImage"
                          width="150"
                        />
                      </p>
                      <input
                        type="file"
                        class="form-control"
                        v-on:change="FileSelected"
                        :class="{ 'is-invalid': form.errors.has('image') }"
                      />
                      <has-error :form="form" field="image"></has-error>
                    </div>
                  </div>
                  <div class="form-group">
                    <strong>Category:</strong>
                    <select
                      class="form-control"
                      v-model="form.id_category"
                      :class="{ 'is-invalid': form.errors.has('id_category') }"
                    >
                      <option value>-- Pilih Kategori --</option>
                      <option
                        v-for="item in Categorys"
                        :key="item.id"
                        :value="item.id"
                      >
                        {{ item.name }}
                      </option>
                    </select>
                    <has-error :form="form" field="id_category"></has-error>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button
                type="submit"
                class="btn btn-success"
                :disabled="disabled"
                v-show="!statusModal"
              >
                <i class="fa fa-spinner fa-spin" v-show="loading"></i> Simpan
              </button>
              <button
                type="submit"
                class="btn btn-success"
                :disabled="disabled"
                v-show="statusModal"
              >
                <i class="fa fa-spinner fa-spin" v-show="loading"></i> Ubah
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
      statusModal: false,
      Categorys: {},
      Images: {},
      previewImage: "",
      form: new Form({
        id: "",
        title: "",
        image: "",
        id_category: "",
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
      axios.get("api/admin/image").then(({ data }) => (this.Images = data));
      axios
        .get("api/admin/kategori")
        .then(({ data }) => (this.Categorys = data));
    },
    FileSelected: function (event) {
      const namaGambar = event.target.files[0];
      this.form.image = namaGambar;
      this.previewImage = URL.createObjectURL(event.target.files[0]);
    },
    simpanData() {
      this.$Progress.start();
      this.loading = true;
      this.disabled = true;
      this.form
        .post("api/admin/image")
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
        .put("api/admin/image/" + this.form.id)
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
    deleteData(id) {
      Swal.fire({
        title: "Anda Yakin Ingin Menghapus Data ini ?",
        icon: "warning",
        showCancelButton: "true",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        ConfirmButtonText: "Hapus",
      }).then((result) => {
        if (result.value) {
          this.form
            .delete("api/admin/image/" + id)
            .then(() => {
              Swal.fire("Terhapus", "Data Anda Sudah Terhapus", "success");
              Fire.$emit("refreshData");
            })
            .catch(() => {
              Swal.fire("Gagal", "Data Gagal Terhapus", "warning");
            });
        }
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