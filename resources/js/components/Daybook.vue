<template>
  <div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <div class="container" style="height: 650px;text-align: center;">
 <br>
          <h4>These are your Spendings {{user.name}}</h4>
          <br>
      <center> 
        <h2><router-link to='/expense' tag="button" class="btn btn-primary"><b>+ ADD</b></router-link></h2>
      <table border="1" class="pure-table pure-table-bordered">
      
        <tr>
              <th>Your id </th>
              <th>Main Category</th>
              <th>Sub Category</th>
              <th>Expense Amount</th>
              <th>Description</th>
              <th>Mode of Payment</th>
              <th>Payment Status</th>
              <th>Date and Time</th>
              <th>Action</th>
              <th>Operation</th>
            </tr>
    
         <tr v-for="expense in expenses" :key="expense.id">
          <td>{{expense.id}}</td>
          <td>{{expense.main_category}}</td>
          <td>{{expense.sub_category}}</td>
          <td>{{expense.expense_amount}}</td>
          <td>{{expense.description}}</td>
          <td>{{expense.mode_of_payment}}</td>
          <td>{{expense.status}}</td>
          <td>{{expense.date}} <br>{{expense.time}}  </td>
          <td><b-button variant="danger" @click="deleteExpense">Delete</b-button></td>
          <td><b-button variant="primary">Edit</b-button></td>
         
           </tr>
       
         
          </table><br>
           
                 <h3><p>Total Expense: {{addexpense}} ₹</p></h3>

              <h2><router-link to='/dashboard' tag="button" class="btn btn-info"><b>Go Back to Dashboard</b></router-link></h2>
              <center><b>or</b></center>
              <router-link to="/incomerecord">Take a look at your Income Records</router-link><br><br>
              <b-button variant="danger" @click="deleteExpense">Delete All</b-button>
      </center><br><br>
     
<br><br>
    
   </div>
    </div>
</template>

<script>
export default {
  data(){
    return{
           expenses: {},
           user: {},
           addexpense:null,
         
    }
  },
    methods:{
 
      deleteExpense: function(expense) {
      axios.get('api/delete/{id}' + expense.id)
      .then(() => {
       
        console.log("deleted");
      });
    },

      loadUsers(){
          axios.get("api/expense").then(({ data }) => (this.expenses = data));
      },

//for adding expense from daybook

        expense(){
            axios.post('/api/expense').then(() => {
                this.$router.push({ name: "daybook" })
            })
        }

    },

    created(){
         this.loadUsers();
    },

  mounted(){
        axios.get('/api/user').then((response) => {
            this.user = response.data
        }),
         axios.get('/api/addexpense').then((response) => {
           this.addexpense = response.data;
         })
    }
    
}
</script>

<style scoped>

</style>