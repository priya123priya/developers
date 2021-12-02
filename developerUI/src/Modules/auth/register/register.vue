<style scoped lang="scss" src="./register.scss"></style>
<template src="./register.html"></template>


<script lang="ts">

import axios from 'axios';
export default {
  name: "Register",
  components: {
   
  },
  data() {
    return {
      firstName:null,
      lastName:null,
      phone:null,
      address:null,
      avatar:null,
      avatarName:null,
      email:null,
      password:null
    }

    
    
  },
  methods:{
    register(){
      let formData = new FormData()
      formData.append("first_name",this.firstName);
      formData.append("last_name",this.lastName);
      formData.append("phone",this.phone);
      formData.append("address",this.address);
      formData.append("email",this.email);
      formData.append("password",this.password);
       formData.append("avatar",this.avatar);
      axios.post('/api/register', formData, {
            headers: {
              'Content-Type': "multipart/form-data"
            }
          }
        ).then(response => {
         alert(response.data)
         this.$router.push('/')
        }).catch(err => {
          
           alert(err)
        });
    },
    handleFileObject() {
        this.avatar = this.$refs.file.files[0]
        this.avatarName = this.avatar.name
      }
  }
};
</script>
