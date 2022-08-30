<template>



  <div>
    <NavbarComponent></NavbarComponent>
    <div class="container">
      <h2>Lista Post</h2>
      <PostList></PostList>
    </div>
    
  </div>


</template>

<script>
import NavbarComponent from './components/navbar.component.vue';
import PostList from './components/PostList.vue';
export default {
  components: { NavbarComponent, PostList },
  data() {
    return {

      message: "ciao",

    };
  }
}
</script>