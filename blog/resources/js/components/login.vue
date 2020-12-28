<template>
  <mdb-container>
    <mdb-btn color="default" @click.native="login=true">Войти <mdb-icon icon="eye" class="ml-1"/></mdb-btn>
    <mdb-modal :show="login" @close="login = false" class="centerwindow">
      <mdb-modal-header class="text-center">
        <mdb-modal-title tag="h4" bold class="w-100">Войти</mdb-modal-title>
      </mdb-modal-header>
      <mdb-modal-body class="mx-3 grey-text">
        <mdb-input label="Введите Email" icon="envelope" type="email" class="mb-5"/>
        <mdb-input label="Введите пароль" icon="lock" type="password"/>
      </mdb-modal-body>
      <mdb-modal-footer center>
        <mdb-btn @click.native="login = false">Войти</mdb-btn>
      </mdb-modal-footer>
    </mdb-modal>
  </mdb-container>
</template>

<script>
  import { mdbContainer, mdbBtn, mdbIcon, mdbModal, mdbModalHeader, mdbModalBody, mdbModalFooter, mdbInput, mdbModalTitle } from 'mdbvue';
  export default {
    name: 'ModalExamplesPage',
    components: {
      mdbContainer,
      mdbBtn,
      mdbModal,
      mdbModalHeader,
      mdbModalBody,
      mdbModalFooter,
      mdbInput,
      mdbModalTitle,
      mdbIcon
    },
    data() {
      return {
        login: false
      }
    }
  }
</script>

<style>
.centerwindow{
    opacity: 1;
    top: 25%;
    background-color: rgba(255, 0, 0, 0)!important;
}
</style>