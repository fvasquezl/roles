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
              <select name="category_id" class="select2 form-control" v-bind="post.category_id">
                <option value>Selecciona una categoria</option>
                <option value></option>
              </select>

              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
            <div class="form-group">
              <label>Etiquetas</label>
              <select
                name="tags[]"
                class="select2 form-control"
                multiple="multiple"
                data-placeholder="Selecciona una o mas etiquetas"
                style="width: 100%;"
              >
                <option></option>
              </select>

              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>
            <div class="form-group">
              <label>Extracto de la publicacion</label>
              <textarea
                name="excerpt"
                class="form-control"
                id="editor"
                placeholder="Inresa aqu&iacute; el extracto de la publicaci&oacute;n"
              ></textarea>

              <span class="invalid-feedback" role="alert">
                <strong></strong>
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
                  id="datepicker"
                  value
                />

                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <label>Departamentos</label>
              <select
                name="departments[]"
                class="select2 form-control"
                multiple="multiple"
                data-placeholder="(vacio) todos los departamentos"
                style="width: 100%;"
              >
                <option></option>
              </select>

              <span class="invalid-feedback" role="alert">
                <strong></strong>
              </span>
            </div>

            <div class="form-group">
              <label>Roles</label>
              <select
                name="roles[]"
                class="select2 form-control"
                multiple="multiple"
                data-placeholder="(vacio) todos los roles"
                style="width: 100%;"
              >
                <option></option>
              </select>

              <span class="invalid-feedback" role="alert">
                <strong></strong>
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
        excerpt:"",
        published_at:"",
        category_id:"",
      }
    };
  },
  mounted() {
    this.getPost();
    this.getDepartments();
    this.getRoles
  },
  methods: {
    getPost() {
      const slug = this.$route.params.slug;
      axios.get('/api/posts/'+slug)
      .then(res=>{
           console.log(res)
           this.post = res.data.post;

      })
      .catch(err=>{
          console.log(err.data)
          this.errors = err.data.errors
      })
    },
    getDepartments() {
      axios.get('/api/departments')
      .then(res=>{
           this.departments = res.data.departments;

      })
      .catch(err=>{
          this.errors = err.data.errors
      })
    },
    getRoles() {
      axios.get('/api/roles')
      .then(res=>{
           this.roles = res.data.roles;
      })
      .catch(err=>{
          console.log(err.data)
          this.errors = err.data.errors
      })
    }
  }
};
</script>

<style>
</style>
