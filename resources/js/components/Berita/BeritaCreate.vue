<template>
  <b-form @submit.prevent="simpanData()">
    <b-container class="bv-example-row">
      <b-card>
        <b-row>
          <b-col>
            <b-form-group
              id="example-input-group-1"
              label="Title"
              label-for="title"
            >
              <b-form-input
                id="title"
                name="title"
                v-model="form.title"
                v-validate="{ required: true, min: 5 }"
                :state="validateState('title')"
                aria-describedby="input-1-live-feedback"
                data-vv-as="Title"
              ></b-form-input>

              <b-form-invalid-feedback id="input-1-live-feedback">{{
                veeErrors.first("title")
              }}</b-form-invalid-feedback>
            </b-form-group>

            <b-form-group id="category" label="Category" label-for="category">
              <b-form-select
                id="category"
                name="category"
                v-model="form.id"
                v-validate="{ required: true }"
                :state="validateState('category')"
                aria-describedby="input-2-live-feedback"
                data-vv-as="Category"
              >
                <option value>-- Please select an option --</option>
                <option
                  v-for="item in Categorys"
                  :key="item.id"
                  :value="item.id"
                >
                  {{ item.name }}
                </option>
              </b-form-select>

              <b-form-invalid-feedback id="input-2-live-feedback">{{
                veeErrors.first("category")
              }}</b-form-invalid-feedback>
            </b-form-group>

            <!-- <b-form-group
              id="example-input-group-3"
              label="Image"
              label-for="image"
            >
              <b-form-file
                id="image"
                name="image"
                v-model="form.image"
                v-validate="{ required: true }"
                :state="validateState('image')"
                accept=".jpg, .png, .gif"
                aria-describedby="input-3-live-feedback"
                data-vv-as="Image"
              ></b-form-file>
              <b-form-invalid-feedback id="input-3-live-feedback">{{
                veeErrors.first("image")
              }}</b-form-invalid-feedback>
            </b-form-group> -->
          </b-col>
          <b-col>
            <b-form-group
              id="example-input-group-2"
              label="Content"
              label-for="example-input-2"
            >
              <b-form-textarea
                id="textarea-rows"
                name="content"
                placeholder="Tall textarea"
                rows="8"
                v-model="form.content"
                v-validate="{ required: true }"
                :state="validateState('content')"
                aria-describedby="input-content-live-feedback"
                data-vv-as="Content"
              ></b-form-textarea>
              <b-form-invalid-feedback id="input-3-live-feedback">{{
                veeErrors.first("content")
              }}</b-form-invalid-feedback>
            </b-form-group>
          </b-col>
        </b-row>
        <b-button type="submit" variant="primary">Submit</b-button>
        <b-button class="ml-2" @click="resetForm()">Reset</b-button>
      </b-card>
    </b-container>
  </b-form>
</template>

<script>
export default {
  data() {
    return {
      Categorys: {},
      form: new Form({
        title: "",
        content: "",
        id: "",
      }),
    };
  },
  methods: {
    loadData() {
      axios
        .get("api/admin/kategori")
        .then(({ data }) => (this.Categorys = data));
    },
    simpanData() {
      this.form
        .post("api/admin/berita/")
        .then(() => {})
        .catch();
    },
    validateState(ref) {
      if (
        this.veeFields[ref] &&
        (this.veeFields[ref].dirty || this.veeFields[ref].validated)
      ) {
        return !this.veeErrors.has(ref);
      }
      return null;
    },
    resetForm() {
      this.form = {
        title: null,
        id_category: null,
        image: null,
        content: null,
      };

      this.$nextTick(() => {
        this.$validator.reset();
      });
    },
    onSubmit() {
      this.$validator.validateAll().then((result) => {
        if (!result) {
          return;
        }

        alert("Form submitted!");
      });
    },
  },
  created() {
    this.loadData();
  },
};
</script>