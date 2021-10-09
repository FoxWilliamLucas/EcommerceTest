<template>
  <div>
    <NavBar />
    <router-view></router-view>
    <notifications position="bottom right"/>
  </div>
</template>


<script>
import NavBar from "./components/NavBar";

export default {
  name: "App",
  components: {
    NavBar,
  },
};
</script>
