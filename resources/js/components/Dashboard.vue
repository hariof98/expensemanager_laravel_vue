<template>
  <div>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="">Expense Manager App</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="navbar-brand"><router-link to='/'>Home</router-link></a>
        </li>
      </ul>
      <div class="topnav-right">
          <h3><b>Welcome {{user.name}}.</b></h3>
          
   
      </div>
    </div>
  </nav><br>
<!-- SIDEBAR -->
      <center><b-button v-b-toggle.sidebar-variant>Click Here</b-button></center><br>
   
    <!--<center><h2><router-link to='/profile' style="color:black"><b>Check Your Profile</b></router-link></h2></center>-->

<center>
     <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom" style="margin-left:370px">
    
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
       
        <div class="w3-clear"></div>
             <h4><td>Your Budget Allocation</td>
             <br>
             <td v-if="addincome - addexpense>=0">Rs. {{addincome}}</td>
             <td v-else>Rs. {{addincome + sumsavings}}</td>
             </h4>
 
      </div>
    </div>
 <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
    
        <div class="w3-clear"></div>
        
             <h4><td>Your Expenses</td>
             <br> 
             <td>Rs. {{addexpense}} </td></h4>
      
       
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">

        <div class="w3-clear"></div>
       <h4><td>Your Balance</td>
       <br>
       <td v-if="addincome - addexpense>=0">Rs. {{addincome - addexpense}}</td>
       <td v-else>Rs. {{addincome - addexpense +sumsavings}}<br><br>
         Hello {{user.name}} your Expense is greater than your allocated Budget,
         So the amount from your savings is added to your Budget.
         </td></h4>
      </div>
    </div>
  </div>
 
 
</center>

    <b-sidebar id="sidebar-variant" bg-variant="info"  text-variant="light" shadow>
                  <h2> Welcome {{user.name}} ,</h2>
    <div class="px-3 py-2">
        <p>
        
        </p>
        <nav class="mb-3">
            <b-nav vertical> <br><br>
             <h5><router-link  to='/profile' style="color:white"><b>My Account</b></router-link></h5><hr>
             <h5><router-link  to='/income' style="color:white"><b>+ Add Your Income</b></router-link></h5><hr>
             <h5><router-link  to='/expense' style="color:white"><b>+ Add Your Expense</b></router-link></h5><hr>
             <h5><router-link  to='/daybook' style="color:white"><b>View Your Daybook</b></router-link></h5><hr>
             <!-- <button @click="$router.push('income')" class="btn btn-success"><b>+ Add Your Income</b></button><br><br>
             <button @click="$router.push('expense')" class="btn btn-danger"><b>+ Add Your Expense</b></button><br>
             <td> <h1><router-link to='/daybook'><b>Day Book</b></router-link></h1></td>-->
            </b-nav>
        </nav>
        
    </div>
    </b-sidebar>
  </div>
  
</template>

<script>
export default {
    data(){
        return{
            user: {},
            expenses:{},
            incomes:{},
            addexpense:null,
            addincome:null,
            sumsavings:null,
           
        }
    },
    methods:{
   
   loadUsers(){
     axios.get("api/expense").then(({ data }) => (this.expenses = data));
   },
  loadIncome()
        {
          axios.get("api/income").then(({  data }) => (this.incomes = data));
        },
       
     userProfile(){
            axios.post('/api/profile').then(() => {
                this.$router.push({ name: "Profile" })
            })
        },

        expense(){
            axios.post('/api/expense').then(() => {
                this.$router.push({ name: "Expense" })
            })
        },

         income(){
          axios.post('/api/income').then(() => {
            this.router.push({ name: "Incomerecord" })
          })
        },

     
        
        
    },

 created()
   {
     this.loadUsers();
      this.loadIncome();
   },

    mounted(){
        axios.get('/api/user').then((response) => {
            this.user = response.data;
        }),
         axios.get('/api/addexpense').then((response) => {
           this.addexpense = response.data;
         }),
         axios.get('/api/addincome').then((response) => {
           this.addincome = response.data;
         }),
          axios.get('/api/sumsavings').then((response) => {
           this.sumsavings = response.data;
         })
    }
}
</script>

<style scoped>


</style>