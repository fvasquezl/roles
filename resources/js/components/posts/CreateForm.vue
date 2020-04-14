<template>
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
                v-model="post.title"
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
</template>

<script>
export default {

}
</script>

<style>

</style>
