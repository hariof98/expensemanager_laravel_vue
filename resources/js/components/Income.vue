 <template>

 <form @submit.prevent="handlesubmit">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Expense Manager App</a>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="navbar-brand"><router-link to='/'>Home</router-link></a>
        </li>
      </ul>

      <div class="topnav-right">
            <router-link to='/dashboard' tag="button" class="btn btn-info"><b>Go Back</b></router-link>
      </div>
    </div>
  </nav>
 <center>

 <div class="container">
     <div>
       <label for="income"><b>Monthly Income</b></label><br>
        <input type="number" v-model="form.income" name="income" id="income"  required> 
      </div>
      <br>
      <div>
      <label for="sourceofincome"><b>Source of Income</b></label><br>
        <input type="text" v-model="form.source_of_income" name="source_of_income" id="source_of_income" required> 
      </div>
      <br>
      <div>
        <label for="nameofthebank"><b>Name of the Bank</b></label><br>
        <select v-model="form.name_of_the_bank" class="select"  name="name_of_the_bank" id="name_of_the_bank">
       
        
          <option>Axis Bank</option>
          <option>Indian Overseas Bank</option>
          <option>Indian Bank</option>
          <option>State Bank of India</option>
          <option>Punjab National Bank</option>
          <option>Bank of Baroda</option>
          <option>Karur Vysya Bank</option>
          <option>HDFC Bank</option>
          <option>Yes Bank</option>
       
        </select>
      
      </div>
      <br>

      <div>
        <label for="monrhlybudgetallocation"><b>Monthly Budget Allocation</b></label><br>
        <input type="number" v-model="form.monthly_budget_allocation" name="monthly_budget_allocation" id="monthly_budget_allocation" required> 
      </div>
<br>
 <div>
        <label for="savingsamount"><b>Savings Amount</b></label><br>
        <input type="number" v-model="form.savings_amount" name="savings_amount" id="savings_amount" required><br> 
      <b  style="color:red"> This amount will be deducted if your expense exceeds your budget</b>
      </div>
      <br>

      <div>
  <button @click.prevent="submitIncome" type="submit" class="submit-btn">Save Income</button>
      </div>
    </div>
 </center></form>

</template>

<script>
export default {
  data(){
    return{
       form:{
         //user_id:'{{ user.id }}',
         income: '',
         source_of_income: '',
         name_of_the_bank: '',
         monthly_budget_allocation: '',
         savings_amount: '',
       },
       errors:[]
    }
  },

    methods:{

      submitIncome(){
        axios.post('/api/income', this.form).then(() => {
          this.$router.push({ name:"Dashboard" });
          console.log('income added');
        }).catch((error) => {
          this.error = error.response.data.errors;
        })

      },
       /* logout(){
            axios.post('/api/logout').then(() =>{
                this.$router.push({ name: "Home" })
            })
        }*/
    },
      mounted(){
        axios.get('/api/user').then((response) => {
            this.user = response.data
        })
    }
}
</script>

<style scoped>
body{
font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}


.container {
  padding: 168px;
  padding-top: 10px;
  padding-bottom: 1px;
  background-color: white;
}


input[type=text], input[type=password], input[type=number] {
  width: 50%;
  padding: 6px;
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

.select{
  width: 50%;
  padding: 8px;
  display: inline-block;
  border: none;
  background: #f1f1f1;

}

.submit-btn{
  background-color: rgb(25, 207, 56);
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.9;
}

.clock{
  margin-left: -81px;
}




</style>