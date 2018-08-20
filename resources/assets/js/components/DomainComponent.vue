<template>
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card card-default">
                  <div class="card-header">Buy A New Domain</div>

                  <div class="card-body">
                      <div class="form-group">
                        <input class="form-control" v-model="domain" placeholder="Domain Name" />
                      </div>
                      <div class="form-group">
                        <input class="form-control" v-model="email" placeholder="New Email Address"  />
                        <b if="email_addr != '@' ">{{email_addr}}</b>
                      </div>
                      <div class="form-group">
                        <input class="form-control" v-model="password" type="password" placeholder="New Email Password" />
                      </div>


                      <div class="form-group">
                        <button class="btn btn-success" v-on:click="searchDomain()">Search Availability</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Your Domains</div>

                    <div class="card-body">
                        <ul v-for="d in domains">
                          <li>{{d}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </br>
      <!-- Modal -->
      <div id="purchaseModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Purchase {{domain}}</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>Your package is available for purchase for $24.99/year it includes the following:
                <ul>

                </ul>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            domains:{},
            domain: "",
            email: '',
            password:''
          }
        },
        computed: {
          email_addr : function(){
            if(this.domain != '')
              return  this.email + '@' + this.domain;
            else
              return '';

          }
        },
        created(){
          var that = this;
          axios.get('/api/domain').then(function(data){
            that.domains = data.data;
          });
        },
        methods: {
          searchDomain: function(){
            axios.post('/api/check-domain',{domain:this.domain}).then(data =>{
              if(data.data.success){
                this.checkOut()
              }
              else{
                alert('Domain Unavailable');
              }
            })
          },
          checkOut: function(){

              axios.post('/api/buy/',{domain:this.domain,email:this.email_addr,password:this.password})
                .then(response => {
                
              }).catch(() => {

              });


          }

          }

    }
</script>
