<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Billing Information</div>

                    <div class="card-body">
                        <div class="form-group">
                          <input class="form-control" v-model="card.number" placeholder="Cardnumber">
                        </div>
                        <div class="row">
                        <div class="form-group">
                          <div class="col-md-6">
                          <input class="form-control" v-model="card.cvv" placeholder="CVV">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <input class="form-control" v-model="card.month" placeholder="MM">

                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <input class="form-control" v-model="card.year" placeholder="YYYY">

                        </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                            <button class="btn btn-success" v-on:click="updateInfo()">Update Payment Info</button>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return {
            card: {}
          }
        },
        methods:{
          updateInfo: function(){
            axios.post('/api/update-billing',{card:this.card}).then(data =>{
              alert('Updated Info Successfully!');
            })
          }
        }
    }
</script>
