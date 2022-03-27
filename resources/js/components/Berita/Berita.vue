<template>
  <div class="container">
    <div class="row">
      <div class="col-2">
        <button class="btn btn-primary" href="#" @click="showModal">
          Tambah Berita
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
                Content
              </th>
              <th
                class="
                  text-uppercase text-secondary text-xxs
                  font-weight-bolder
                  opacity-7
                  ps-2
                "
              >
                Category
              </th>
              <th
                class="
                  text-uppercase text-secondary text-xxs
                  font-weight-bolder
                  opacity-7
                  ps-2
                "
              >
                Status
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
              v-for="(item, index) in Beritas"
              :key="item.id"
            >
              <td>{{ ++index }}</td>
              <td>{{ item.image }}</td>
              <td>{{ item.title }}</td>
              <td>{{ item.content }}</td>
              <td>{{ item.id_category }}</td>
              <td>{{ item.status }}</td>
              <td>Edit | Hapus</td>
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
          <form @submit.prevent="simpanData()" enctype="multipart/form-data">
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
                    <strong>Content :</strong>
                    <textarea
                      class="form-control"
                      style="height: 150px"
                      placeholder="Content"
                      v-model="form.content"
                      :class="{ 'is-invalid': form.errors.has('content') }"
                    ></textarea>
                    <has-error :form="form" field="content"></has-error>
                  </div>
                  <!-- <div class="form-group">
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
                    />
                  </div> -->

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
                class="btn btn-primary"
                :disabled="disabled"
              >
                <i v-show="loading" class="fa fa-spinner fa-spin"></i> Simpan
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
      Beritas: {},
      Categorys: {},
      form: new Form({
        image: "",
        id: "",
        title: "",
        content: "",
        id_category: "",
      }),
      previewImage: "",
    };
  },
  methods: {
    showModal() {
      this.form.reset();
      $("#modalCreate").modal("show");
    },
    loadData() {
      this.$Progress.start();
      axios.get("api/admin/berita").then(({ data }) => (this.Beritas = data));
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
        .post("api/admin/berita")
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
    FileSelected: function (event) {
      const namaGambar = event.target.files[0].name;
      this.form.image = namaGambar;
      this.previewImage = URL.createObjectURL(event.target.files[0]);
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
