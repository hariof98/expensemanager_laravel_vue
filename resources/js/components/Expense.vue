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
<h4>Add your Expenses</h4>
 <div class="container">
     
      <div>
        <label for="maincategory"><b>Main Category</b></label><br>
        <select v-model="form.main_category" class="select"  name="main_category" id="main_category">
      
          <option>Food</option>
          <option>Entertainment</option>
          <option>Education</option>
          <option>Medicine</option>
          <option>Travel</option>
          <option>Sports/Games</option>
          <option>Bills</option>
          <option>Loans</option>
          <option>Tax</option>
          <option>Other Expenses</option>
        </select>
      
      </div>
      <br>
      <div>
      <label for="subcategory"><b>Sub Category</b></label><br>
        <input type="text" v-model="form.sub_category" name="sub_category" id="sub_category" required> 
      </div>
<br>

      <div>
        <label for="expenseamount"><b>Expense Amount</b></label><br>
        <input type="number" v-model="form.expense_amount" name="expense_amount" id="expense_amount" required> 
      </div>
<br>
  <div>
       <label for="description"><b>Description</b></label><br>
        <input type="text" v-model="form.description" name="description" id="description"  required> 
      </div>
      <br>
      <div>
      <label for="modeofpayment"><b>Mode of Payment</b></label><br>
          <select v-model="form.mode_of_payment" class="select" name="mode_of_payment" id="mode_of_payment">
          <option disabled value="">Please select one</option>
          <option>Cash</option>
          <option>Card (Visa)</option>
          <option>Card (Master card)</option>
          <option>Card (RuPay)</option>
          <option>Card (others)</option>
          <option>UPI</option>
        </select>
      </div>
     <br>
       <div>
     <b>Payment Status</b><br>
     <select v-model="form.status" class="select" name="status" id="status">
           <option style="color:green">Completed</option>
          <option style="color:red">Pending</option>
        </select>

      </div>
<br>

     <div>
      <label for="date"><b>Date</b></label><br>
    <datetime format="MM/DD/YYYY" width="300px"  v-model="form.date" name="date" id="date"></datetime>
     </div>
<br>
      <div>
       <label for="time"><b>Time</b></label><br>
       <input type="time"  v-model="form.time" name="time" id="time" class="clock"
       min="09:00" max="18:00" required>
     </div>
<br>
      <div>
  <button @click.prevent="submitExpense" type="submit" class="submit-btn">Save Expense</button>
      </div>
    </div>
 </center></form>

</template>

<script>
import datetime from 'vuejs-datetimepicker';

export default {
 components: { datetime },
  data(){
    return{
       form:{
         //user_id:'{{ user.id }}',
         main_category: '',
         sub_category: '',
         expense_amount: '',
         description: '',
         mode_of_payment: '',
         status: '',
         date: '',
         time:''
       },
       errors:[]
    }
  },

    methods:{

      submitExpense(){
        axios.post('/api/expense', this.form).then(() => {
          this.$router.push({ name:"Dashboard" });
          console.log('expense added');
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
  margin-left: 4px;
}




</style>