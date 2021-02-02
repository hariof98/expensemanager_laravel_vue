<template>
    <div>

        <pie-chart :data="chartData">
            
        </pie-chart>
    </div>
</template>


<script>
export default {
    data(){
        return{

                chartData:{
               Income: "addincome",
               Expense: "addexpense",

          } ,

            addexpense:{},
            addincome:{},

           
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
         })
    }
}

</script>