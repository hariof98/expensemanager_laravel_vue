<template>

  <div class="container">
    <center><h1>Reset Password</h1>
    <br><br>
    <label for="email"><b>Email</b></label><br>
       <span class="" v-if="errors.email">{{errors.email[0]}}</span><br>
      <input type="text" placeholder="Enter Your Registered Email" name="email" v-model="form.email" required><br>
    <hr>
      <button @click.prevent="resetUser" type="submit" class="reset-btn">Send Mail</button></center>
      <center>or  <br>
    <a class="navbar-brand"><router-link to='/'> Return Home</router-link></a></center>
    </div>

</template>

<script>
export default {
    data(){
        return{
            form:{
             
            },
            errors: []
        }
    },
    methods:{

           mounted(){
        axios.get('/api/user').then((response) => {
            this.user = response.data
        })
           }
    }
}
</script>

<style scoped>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}


.container {
  padding: 168px;
  padding-top: 15px;
  padding-bottom: 1px;
  background-color: white;
}


input[type=text], input[type=password], input[type=number] {
  width: 50%;
  padding: 12px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


a {
  color: black;
}

.reset-btn{
  background-color: rgb(207, 25, 25);
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

</style>