<template>
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

            <button v-if="$Gate.allow('View post', post)" class="btn btn-sm btn-default" v-on:click="showPost(post.slug)">
             <i class="fas fa-eye"></i>
          </button>
          <button class="btn btn-sm btn-info">
            <i class="fas fa-pencil-alt"></i>
          </button>
          <button class="btn btn-sm btn-danger" v-on:click="deletePost(index)">
            <i class="fas fa-trash-alt"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import datatables from "datatables.net-bs4";
import config from "../config";

export default {
  data() {
    return {
      posts: [],
    };
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

      var urlpost = `${config.apiUrl}api/posts`;
      axios.get(urlpost).then(response => {
        this.posts = response.data.data;
      });
    },
    showPost(slug){
      window.location.href = `${config.apiUrl}posts/${slug}`;
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


// <a href="{{ route('posts.show',$post) }}" class="btn btn-sm btn-default"
//                                         target="_blank">
//                                         <i class="fas fa-eye"></i>
//                                     </a>
//                                     @can('update', $post)
//                                     <a href="{{ route('admin.posts.edit',$post) }}" class="btn btn-sm btn-info">
//                                         <i class="fas fa-edit"></i>
//                                     </a>
//                                     @endcan

//                                     @can('delete',$post)
//                                     <form  method="POST" action="{{ route('admin.posts.destroy', $post) }}"
//                                         style="display:inline">
//                                         @csrf @method('DELETE')
//                                         <button class="btn btn-sm btn-danger"
//                                         onclick="return confirm('¿Estas seguro de eliminar esta publicacion?')">
//                                         <i class="fas fa-trash-alt"></i></button>
//                                     </form>
