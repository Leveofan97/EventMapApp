<template>

<footer class="page-footer font-small blue myclass">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="index.html"> EventMap.com</a>
  </div>
  <!-- Copyright -->

</footer>

</template>

<script>
import { mdbInput, mdbBtn } from 'mdbvue';
export default {
name: 'Basic',
components: {
mdbInput,
mdbBtn
},
}
</script>
<style>
    .myclass{
    z-index: 1000;
    width: 100%;
    position: fixed; /* Фиксированное положение */
    left: 0; bottom: 0; /* Левый нижний угол */
    }
</style>
