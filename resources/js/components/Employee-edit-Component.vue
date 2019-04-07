<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Employee Information </div>

                    <div class="card-body">

                        <form >
          
        <div class="form-group">


          <label> Name</label>
          <input type="text" class="form-control" v-model="customer.name" placeholder="Enter your name" required>
         
        </div><div class="form-group">


          <label> Email-Address</label>
          <input type="email" class="form-control" v-model="customer.email" placeholder="Enter your email" required>
         
        </div><div class="form-group">


          <label>Cell no</label>
          <input type="phone-no" class="form-control" v-model="customer.phone" placeholder="Enter your Phone no " required>
         
        </div>

        
        
          <button type="submit" class="btn btn-info btn-block" @click.prevent="employeeDataupdate()">Update</button>
          
        
        
        
      </form>
                     
                    </div>
                </div>


<br>
     




















            </div>
        </div>
    </div>
</template>

<script>
    export default {
      props:['customer'],

      data(){
        return{
          posts:{},
          name:'',
          phone:'',
          email:'',


        }


      },
        mounted() {
            console.log(this.customer,'Component mounted.');
            this.getData();
          
           
        },

        methods: {



  employeeDataupdate(){
            
            axios.post('/employee_update/'+this.customer.id, {
                    name: this.customer.name,
                    phone: this.customer.phone,
                    email: this.customer.email,
  })
  .then(function (response) {
    console.log(response,'then');
    //location.reload();
    
  })
  .catch(function (error) {
    console.log(error,'error');
  });


          },
        }


}
</script>


