<template>
  <div id="asd">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="#">Список событий</a>
    </header>
    <ul class="nav">
      <li>
        <ithem-list></ithem-list>
      </li>
      <li>
        <ithem-list></ithem-list>
      </li>
      <li>
        <ithem-list></ithem-list>
      </li>
      <li>
        <ithem-list></ithem-list>
      </li>
      <li>
        <ithem-list></ithem-list>
      </li>
      <li>
        <ithem-list></ithem-list>
      </li>
      <li>
        <ithem-list></ithem-list>
      </li>
    </ul>
  </div>
  <!-- Content -->
  <div id="content">
   <map-content></map-content>
  </div>
</div>
</template>

<script>
import mapContent from './map-content.vue';
import ithemList from './ithem-list.vue';
export default {
  components: {
    mapContent,
    ithemList
  }
}
</script>


<style>
/* Toggle Styles */

#asd {
  padding-left: 350px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

/* Sidebar Styles */

#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 350px;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #eaf6fc;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#sidebar header {
  background-color: #263238;
  font-size: 20px;
  line-height: 52px;
  text-align: center;
}

#sidebar header a {
  color: #fff;
  display: block;
  text-decoration: none;
}

#sidebar header a:hover {
  color: #fff;
}


#sidebar .nav a{
  background: none;
  border-bottom: 1px solid #455A64;
  color: #CFD8DC;
  font-size: 14px;
  padding: 16px 24px;
}

#sidebar .nav a:hover{
  background: none;
  color: #ECEFF1;
}

#sidebar .nav a i{
  margin-right: 16px;
}
.nav{
    border-top-width: 13px;
    margin-top: 15px;
    margin-bottom: 0px;
    margin-right: 10px;
    margin-left: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}
</style>
