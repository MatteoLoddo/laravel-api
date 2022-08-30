<template>
  <div>
    <div class="row row-cols-2">
      <div class="col " v-for="post in posts" :key="post.id">
        <div class="card mb-3" style="width: 18rem;">
          <img :src="getImage(post)" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text">{{post.content}}</p>
            <a href="#" class="btn btn-primary">Visualizza</a>
          </div>
        </div>
      </div>
    </div>
    
<Pagination :current-page="paginationData.current_page" 
:next-page="paginationData.current_page + 1 " 
:total-pages="paginationData.last_page" @changePage="onChangePage">

</Pagination>
  </div>
</template>


<script>
  import axios from 'axios';
import Pagination from './Pagination.vue';
export default {
    data() {
        return {
            posts: [],
            paginationData : {}
        };
    },
    methods: {
        // chiamata axios
        fetchPosts(newPage) {
            axios.get("/api/posts?page=" + newPage)
                .then((resp) => {
                this.posts = resp.data.data;
                this.paginationData = resp.data;
            });
        },
        getImage(post) {
            if (!post.cover_img) {
                return "/images/place-holder.webp";
            }
            return post.cover_img;
        },

        onChangePage(newPage){
          this.fetchPosts(newPage);

        }
    },
    mounted() {
        this.fetchPosts(),
            this.getImage();
    },
    components: { Pagination }
}
</script>