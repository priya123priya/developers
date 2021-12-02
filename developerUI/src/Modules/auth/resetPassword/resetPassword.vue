<style scoped lang="scss" src="./resetPassword.scss"></style>
<template src="./resetPassword.html"></template>

<script lang="ts">

import axios from 'axios';
export default {
  name: "ResetPassword",
  components: {

  },
  data() {
   return {
     confirmPassword : null,
     password : null,
     email : null,
     token : null
   }
  },

  created(){
      this.token = this.$route.query.token;
  },
    methods: {
     resetPassword(){
      if (this.password == this.confirmPassword){

        
       let data = {
         "email" : this.email,
         "password": this.password,
         "token": this.token,
         "password_confirmation": this.confirmPassword
       }
      axios.post('/api/reset-password', data, {
            headers: {
              'Content-Type': "application/json"
            }
          }
        ).then(response => {
         alert(response.data)
          this.$router.push('/')
         
        }).catch(err => {
          
           alert(err)
        }); 
      }
      else{
          alert("Confirmation Password Mismatched");
      } 
     }
    //  createAccount(){
    //    this.$router.push('/register')
    //  }
  }
};
</script>