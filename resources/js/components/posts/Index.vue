<template>
  <div class="col-lg-12">
    <div class="card mb-1 shadow-sm card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title mt-1">Listado de publicaciones</h3>
        <div class="card-tools">
          <!-- @can('create',$posts->first()) -->
          <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
            Crear Publicacion
          </button>
          <!-- @endcan -->
        </div>
      </div>

      <div class="card-body">
        <table class="table table-striped table-hover table-bordered" id="postsTable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Titulo</th>
              <th>Extracto</th>
              <th>Asignado_a</th>
              <th>F_Publicacion</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(post, index) in posts">
              <td>{{post.id}}</td>
              <td>{{post.title}}</td>
              <td>{{post.excerpt}}</td>
              <td>{{post.asigned_as}}</td>
              <td>{{post.created_at}}</td>
              <td>
                <button class="btn btn-sm btn-default" v-on:click="showPost(post.slug)">
                  <i class="fas fa-eye"></i>
                </button>
                <button
                  v-if="$Gate.allow('Update posts')"
                  class="btn btn-sm btn-info"
                  v-on:click="updatePost(post.slug)"
                >
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button
                  v-if="$Gate.allow('Delete posts')"
                  class="btn btn-sm btn-danger"
                  v-on:click="deletePost(index)"
                >
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <CreatePost></CreatePost>
  </div>
</template>

<script>
import datatables from "datatables.net-bs4";
//import config from "../config";
import CreatePost from "./Create";

export default {
  data() {
    return {
      posts: []
    };
  },
  components:{
    CreatePost
  },
  created() {
    this.getPosts();
  },
  watch: {
    posts() {
      $(document).ready(function() {
        $("#postsTable").DataTable();
      });
    }
  },
  methods: {
    getPosts() {
      var urlpost = `/api/home`;
      axios.get(urlpost).then(response => {
        this.posts = response.data.data;
      });
    },
    showPost(slug) {
      // window.location.href = `${config.apiUrl}posts/${slug}`;
    },
    updatePost(slug) {
      // window.location.href = `${config.apiUrl}/admin/posts/${slug}`;
    },
    deletePost(index) {
      Swal.fire({
        title: "Estas Seguro?",
        text: "No podras revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminalo!"
      }).then(result => {
        if (result.value) {
          this.$delete(this.posts, index);

          //   axios.delete("posts/" + slug).then(response => {
          //     Swal.fire("Borrado!", response.data.msg, "success");
          //   });
        }
      });
    }
  }
};
</script>
