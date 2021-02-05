<template>
<form @submit.prevent="handlesubmit">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="">Expense Manager App</a>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="navbar-brand"><router-link to='/'>Home</router-link></a>
        </li>
      </ul>

      <div class="topnav-right">
           <a class="navbar-brand"><router-link to='/register'>Register</router-link></a>
      </div>
    </div>
  </nav>

  <div class="container">
    <center><h1>Login Form</h1>
    <br><br>
      <label for="email"><b>Email</b></label><br>
       <span class="" v-if="errors.email">{{errors.email[0]}}</span><br>
      <input type="text" placeholder="Enter Your Email" name="email" v-model="form.email" required><br>

      <label for="psw"><b>Password</b></label><br>
      <span class="" v-if="errors.password">{{errors.password[0]}}</span><br>
      <input type="password" placeholder="Enter Password" name="password" v-model="form.password" required>
      
        <hr>
      <button @click.prevent="loginUser" type="submit" class="login-btn">Login</button></center>
     <center>Forgot Password?
        <br>
        <router-link to="/reset">Reset</router-link>
      </center>
      
    </div>
</form>
</template>

<script>
export default {
    data(){
        return{
            form:{
              email:'',
              password: '',
              device_name:'browser'
            },
            errors: []
        }
    },
    methods:{
      loginUser(){
        axios.post('/api/login', this.form).then(() => {
          this.$router.push({name: "Dashboard" });
        }).catch((error) => {
          this.errors = error.response.data.errors;
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
  padding-bottom: 100px;
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

.login-btn{
  background-color: rgb(25, 207, 56);
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

</style>