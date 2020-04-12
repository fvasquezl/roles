<template>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresa el titulo de la publicacion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form @submit.prevent="createPostTitle">
          <!-- <form method="POST" action="{{ route('admin.posts.store','#create') }}"> -->
          <div class="modal-body">
            <div class="form-group">
              <input
                id="title"
                name="title"
                type="text"
                class="form-control"
                :class="{'is-invalid': errors.title }"
                placeholder="Inresa aqu&iacute; el t&iacute;tulo de la publicaci&oacute;n"
                autofocus
                required
                v-model="form.title"
              />
              <span v-if="errors.title" class="invalid-feedback" role="alert">
                <strong>{{ errors.title[0] }}</strong>
              </span>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary">Crear publicacion</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: [],
      form: {
        title: ""
      },
    };
  },
  methods: {
    createPostTitle() {
      axios
        .post("api/post", this.form)
        .then(res=> {this.responseAfterCreate(res)})
        .catch(error => (this.errors = error.response.data.errors));
    },
    responseAfterCreate(res){
        const slug = res.data.post.slug;
        const title = res.data.post.title;
        const status = res.data.status
        if (status == '201') {
            this.$router.push({ name: 'post.edit', params:{ slug:slug,title:title } })
        }
    }
  }
};
</script>

<style>
</style>
