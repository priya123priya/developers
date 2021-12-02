<style scoped lang="scss" src="./login.scss"></style>
<template src="./login.html"></template>

<script lang="ts">

import axios from 'axios';
export default {
  name: "Login",
  components: {

  },
  data() {
   return {
     email : null,
     password : null
   }
  },
  methods: {
     login(){
       let data = {
         "email": this.email,
         "password": this.password
       }
      axios.post('/api/login', data, {
            headers: {
              'Content-Type': "application/json"
            }
          }
        ).then(response => {
         if(response.data == true){
          this.$router.push('/developerList')
         }
         else{
           alert("invalid username password");
         }
        }).catch(err => {
          
           alert(err)
        });  
     },
     redirectLogin(){
       this.$router.push('/forgotPassword')
     }
  }
};
</script>