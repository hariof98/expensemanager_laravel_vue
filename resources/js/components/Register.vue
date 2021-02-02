<template>  
<form @submit.prevent="handlesubmit">  <!-- @submit.prevent is used to prevent default behaviour -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="">Expense Manager App</a>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="navbar-brand"><router-link to='/'>Home</router-link></a>
        </li>
      </ul>

      <div class="topnav-right">
          <a class="navbar-brand"><router-link to='/login'>Login</router-link></a>
      </div>
    </div>
  </nav>
  
  <div class="container">
  <center><h1>Registeration Form</h1>

    <label for="name"><b>Name</b></label><br>
    <span class="" v-if="errors.name">{{errors.name[0]}}</span><br>
    <input type="text" placeholder="Enter Your Name" name="name" v-model="form.name" id="name" required ><br>

    <label for="email"><b>Email </b></label><br>
    <span class="" v-if="errors.email">{{errors.email[0]}}</span><br>
    <input type="text" placeholder="Enter Your Email" name="email" v-model="form.email" id="email" required ><br>

    <label for="psw"><b>Password </b></label><br>
    <span class="" v-if="errors.password">{{errors.password[0]}}</span><br>
    <input type="password" placeholder="Enter Your Password" name="password" v-model="form.password" id="password" required><br>

    <label for="psw-repeat"><b>Repeat Password </b></label><br>
    <span class="" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</span><br>
    <input type="password" placeholder="Repeat Your Password" name="password_confirmation" v-model="form.password_confirmation" id="password_confirmation" required>

    <button @click.prevent="saveForm" type="submit" class="registerbtn">Register</button></center>
  </div>

</form>
</template>

<script>
export default {
    data(){
        return{
            form:{
              name: '',
              email: '',
              password: '',
              password_confirmation:''

            },
            errors: []
        }
    },
    methods:{
          saveForm(){
            axios.post('/api/register', this.form).then(() => {
                 this.$router.push({ name: "Login" })
                 console.log('Saved');
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


.registerbtn {
  background-color: rgb(93, 93, 214);
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}


a {
  color: black;
}




</style>

