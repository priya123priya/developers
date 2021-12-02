<style scoped lang="scss" src="./developerList.scss"></style>
<template src="./developerList.html"></template>

<script lang="ts">

import axios from 'axios';
export default {
  name: "DeveloperList",
  components: {

  },
  data() {
     return {
      developersData:null,
      selectedDevelopers:null,
      firstName:null,
      lastName:null,
      phone:null,
      address:null,
      avatar:null,
      avatarName:null,
      email:null,
      password:null,
      selected: [],
      allSelected: false,
      userIds: [],
      developer: null,
      selectedId:null,
      display:false,
      id:null,
      type:''

    }
  },
    created() {
        this.getAllDeveloper();
      
    },
      

   methods:{
    addDeveloper(){

      let formData = new FormData()
      formData.append("first_name",this.firstName);
      formData.append("last_name",this.lastName);
      formData.append("phone",this.phone);
      formData.append("address",this.address);
      formData.append("email",this.email);
      formData.append("password",this.password);
      formData.append("avatar",this.avatar);
      axios.post('/api/addDeveloper', formData, {
            headers: {
              'Content-Type': "multipart/form-data"
            }
          }
        ).then(response => {
         alert(response.data)
         this.getAllDeveloper();
         this.display = false;
        }).catch(err => {
          
           alert(err)
        });
    },
     editDeveloper(){
      let formData = new FormData()
      formData.append("id",this.id);
      formData.append("first_name",this.firstName);
      formData.append("last_name",this.lastName);
      formData.append("phone",this.phone);
      formData.append("address",this.address);
      formData.append("email",this.email);
      formData.append("avatar",this.avatar);
      formData.append("password",this.password);
      axios.post('/api/update/'+this.id, formData, {
            headers: {
              'Content-Type': "multipart/form-data"
            }
          }
        ).then(response => {
         alert(response.data.success)
         this.getAllDeveloper();
         this.display = false;
        }).catch(err => {
          
           alert(err)
        });
    },
    getAllDeveloper(){
         axios.get('/api/listDeveloper', {
            headers: {
              'Content-Type': "application/json"
            }
          }
        ).then(response => {
           this.developersData = response.data;
           console.log(this.developersData)
        }).catch(err => {
          alert(err)
        });
    },
       deleteDeveloper(id){
           let ids ={
               "ids":id   }
         axios.post('/api/delete',ids, {
            headers: {
              'Content-Type': "application/json"
            }
          }
        ).then(response => {
            this.userIds = [];
             alert(response.data.success)
            this.getAllDeveloper();
           console.log(response)
        }).catch(err => {
          
           alert(err)
        });
    },
    addDialog(){
        this.reset();
        this.display = true;
        this.type = "new";

    },
    editDialog(data){
        this.type = "edit";
      this.id = data.id;
      this.firstName = data.first_name;
      this.lastName = data.last_name;
      this.phone = data.phone;
      this.address = data.address;
      this.email = data.email;
      this.display = true;
    },
     reset(){
        
      this.id = null;
      this.firstName = null;
      this.lastName = null;
      this.phone = null;
      this.address = null;
      this.email = null;
    },
     selectAll(event) {
            this.userIds = [];
            this.selectedId= null;
            console.log(event)
            if (this.allSelected) {
                for (this.developer in this.developersData) {
                    this.userIds.push(this.developersData[this.developer].id);
                }
                this.selectedId = this.userIds.join(',');
            }
        },
        select() {
            this.allSelected = false;
            this.selectedId = this.userIds.join(',');
        },
         handleFileObject() {
        this.avatar = this.$refs.file.files[0]
        this.avatarName = this.avatar.name
      }
       
  }

};
</script>
