<template>
  <form>
    <div class="row">
      <div class="col-md-7">
        <div class="card card-outline card-primary">
          <div class="card-body">
            <div class="form-group">
              <label>Titulo de la publicacion</label>
              <input
                name="title"
                type="text"
                class="form-control"
                :class="{'is-invalid': errors.title }"
                placeholder="Ingresa aqu&iacute; el t&iacute;tulo de la publicaci&oacute;n"
                v-model="post.title"
              />
              <span v-if="errors && errors.title" class="invalid-feedback" role="alert">
                <strong>{{ errors.title[0] }}</strong>
              </span>
            </div>
            <div class="form-group">
              <label>Categorias</label>
              <select
                name="category_id"
                class="select2 form-control"
                :class="{'is-invalid': errors.category_id }"
                v-bind="post.category_id"
              >
                <option value>Selecciona una categoria</option>
                <option value></option>
              </select>

              <span v-if="errors && errors.category_id" class="invalid-feedback" role="alert">
                <strong>{{ errors.category_id[0] }}</strong>
              </span>
            </div>
            <div class="form-group">
              <label>Etiquetas</label>
              <select
                name="tags[]"
                class="select2 form-control"
                :class="{'is-invalid': errors.tags}"
                multiple="multiple"
                data-placeholder="Selecciona una o mas etiquetas"
                style="width: 100%;"
              >
                <option></option>
              </select>

              <span v-if="errors && errors.tags" class="invalid-feedback" role="alert">
                <strong>{{ errors.tags[0] }}</strong>
              </span>
            </div>
            <div class="form-group">
              <label>Extracto de la publicacion</label>
              <textarea
                name="excerpt"
                class="form-control"
                :class="{'is-invalid': errors.excerpt}"
                id="editor"
                placeholder="Inresa aqu&iacute; el extracto de la publicaci&oacute;n"
              ></textarea>

              <span v-if="errors && errors.excerpt" class="invalid-feedback" role="alert">
                <strong>{{ errors.excerpt[0] }}</strong>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card card-outline card-primary">
          <div class="card-body">
            <div class="form-group">
              <label>Fecha de publicacion:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input
                  name="published_at"
                  type="text"
                  class="form-control float-right"
                  :class="{'is-invalid': errors.published_at}"
                  id="datepicker"
                  value
                />

                <span v-if="errors && errors.published_at" class="invalid-feedback" role="alert">
                  <strong>{{ errors.published_at[0] }}</strong>
                </span>
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <label>Departamentos</label>
              <select
                name="departments[]"
                class="select2 form-control"
                :class="{'is-invalid': errors.departments}"
                multiple="multiple"
                data-placeholder="(vacio) todos los departamentos"
                style="width: 100%;"
              >
                <option></option>
              </select>

              <span v-if="errors && errors.departments" class="invalid-feedback" role="alert">
                <strong>{{ errors.departments[0] }}</strong>
              </span>
            </div>

            <div class="form-group">
              <label>Roles</label>
              <select
                name="roles[]"
                class="select2 form-control"
                multiple="multiple"
                :class="{'is-invalid': errors.roles}"
                data-placeholder="(vacio) todos los roles"
                style="width: 100%;"
              >
                <option></option>
              </select>

              <span v-if="errors && errors.roles" class="invalid-feedback" role="alert">
                <strong>{{ errors.roles[0] }}</strong>
              </span>
            </div>

            <div class="form-group">
              <label>Documentos</label>
              <div class="dropzone"></div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      errors: [],
      post: {
        title: "",
        slug: "",
        excerpt: "",
        published_at: "",
        category_id: ""
      },
      departments: {
        id: "",
        name: "",
        display_name: ""
      },
      roles: {
        id: "",
        name: "",
        display_name: ""
      },
      categories: {
        id: "",
        name: "",
        slug: ""
      }
    };
  },
  mounted() {
    this.getPost();
    this.getDepartments();
    this.getRoles();
    this.getCategories();
  },
  methods: {
    getPost() {
      const slug = this.$route.params.slug;
      axios
        .get("/api/posts/" + slug)
        .then(res => {
          this.post = res.data.post;
        })
        .catch(err => {
          console.log(err.data);
          this.errors = err.data.errors;
        });
    },
    getDepartments() {
      axios
        .get("/api/departments")
        .then(res => {
          this.departments = res.data.departments;
        })
        .catch(err => {
          this.errors = err.data.errors;
        });
    },
    getRoles() {
      axios
        .get("/api/roles")
        .then(res => {
          this.roles = res.data.roles;
        })
        .catch(err => {
          console.log(err.data);
          this.errors = err.data.errors;
        });
    },
    getCategories() {
      axios
        .get("/api/categories")
        .then(res => {
          this.categories = res.data.categories;
        })
        .catch(err => {
          console.log(err.data);
          this.errors = err.data.errors;
        });
    }
  }
};
</script>

<style>
</style>
