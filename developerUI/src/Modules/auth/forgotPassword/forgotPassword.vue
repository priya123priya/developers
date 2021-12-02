<style scoped lang="scss" src="./forgotPassword.scss"></style>
<template src="./forgotPassword.html"></template>

<script lang="ts">

import axios from 'axios';
export default {
  name: "ForgotPassword",
  components: {

  },
  data() {
   return {
     email : null
     
   }
  },
  methods: {
     forgetPassword(){
       let data = {
         "email": this.email
         
       }
      axios.post('/api/forget-password', data, {
            headers: {
              'Content-Type': "application/json"
            }
          }
        ).then(response => {
         alert(response.data)
         
        }).catch(err => {
          
           alert(err)
        });  
     }
   
  }
};
</script>