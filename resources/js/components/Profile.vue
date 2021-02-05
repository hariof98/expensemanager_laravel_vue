<template>
<div>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Expense Manager App</a>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="navbar-brand"><router-link to='/dashboard'>Dashboard</router-link></a>
        </li>
      </ul>

      <div class="topnav-right">
           <button class="btn btn-danger" @click.prevent="logout">Logout</button>
      </div>
    </div>
  </nav>

    <br>
    <center><h1>
     Name: {{user.name}}<br>
     Email: {{user.email}}<br>
     id: {{user.id}}<br>
     </h1><br>
     <button @click="$router.push('update')" class="btn btn-primary"><b>Update Password</b></button><br><br>
    <!-- <button @click="$router.push('reset')" class="btn btn-danger"><b>Reset Password</b></button>-->
         
</center>
</div>
</template>

<script>
export default {
    data(){
        return{
            user: null,
        }
    },

    methods:{
        logout(){
            axios.post('/api/logout').then(() =>{
                this.$router.push({ name: "Home" })
            })
        }
    },
     mounted(){
        axios.get('/api/user').then((response) => {
            this.user = response.data
        })
    }
}

</script>