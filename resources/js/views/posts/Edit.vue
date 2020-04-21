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
                <option v-for="category in categories" v-bind:key="category.id">{{ category.name }}</option>
              </select>

              <span v-if="errors && errors.category_id" class="invalid-feedback" role="alert">
                <strong>{{ errors.category_id[0] }}</strong>
              </span>
            </div>
            <!-- <div class="form-group">
              <label>Etiquetas</label>
              <select
                name="tags[]"
                class="form-control"
                :class="{'is-invalid': errors.tags}"
                data-placeholder="Selecciona una o mas etiquetas"
                style="width: 100%;"
              ></select>

              <option value>Selecciona o crea etiquetas</option>
              <option v-for="tag in tags" v-bind:key="tag.id">{{ tag.display_name }}</option>
            </div>-->
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
             <multiselect
                v-model="post.selectedDepartments"
                tag-placeholder="Seleccionar Departementos"
                placeholder="Buscar o agregar departamentos"
                label="display_name"
                track-by="id"
                :options="departments"
                :multiple="true"
                :taggable="true"
              ></multiselect>

              <span v-if="errors && errors.departments" class="invalid-feedback" role="alert">
                <strong>{{ errors.departments[0] }}</strong>
              </span>
            </div>

            <div class="form-group">
              <label>Roles</label>
            <multiselect
                v-model="post.selectedDepartments"
                tag-placeholder="Seleccionar Roles"
                placeholder="Buscar o agregar Roles"
                label="display_name"
                track-by="id"
                :options="roles"
                :multiple="true"
                :taggable="true"
              ></multiselect>

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
import Multiselect from "vue-multiselect";

export default {
  components: { Multiselect },
  data() {
    return {
      errors: [],
      post: {
        title: "",
        slug: "",
        excerpt: "",
        published_at: "",
        category_id: "",
        selectedCategories:[],
        selectedTags:[],
        selectedDepartments: [],
        selectedRoles:[],
      },
      categories: [],
      tags:[],
      departments: [],
      roles: [],
    };
  },
  mounted() {
    this.getPost();
  },
  methods: {
    getPost() {
      const slug = this.$route.params.slug;
      axios
        .get("/api/posts/" + slug)
        .then(res => {
          this.post = res.data.post;
          this.departments = res.data.departments;
          this.roles = res.data.roles;
          this.categories = res.data.categories;
          this.tags = res.data.tags;
        })
        .catch(err => {
          console.log(err.data);
          this.errors = err.data.errors;
        });
    },
    addDepartment(newDepartment){
       const department = {
        display_name: newDepartment,
        id: newDepartment.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      console.log(this.departments);
      this.departments.push(department)
      this.selectedDepartments.push(department)
    }
  }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css">
