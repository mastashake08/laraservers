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
                        <input class="form-control" v-model="email" placeholder="New Email Address" />
                      </div>
                      <div class="form-group">
                        <input class="form-control" v-model="password" placeholder="New Email Password" />
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
            if (window.PaymentRequest) {
              // Yep, we can go ahead! Our code goes here.
              // Supported payment methods
              var supportedInstruments = [{
                  supportedMethods: ['basic-card'],
                  data: {
                    supportedNetworks: [
                      'visa', 'mastercard', 'amex', 'discover',
                      'diners', 'jcb', 'unionpay'
                    ]
                  }
              }];

              // Checkout details
              var details = {
                displayItems: [{
                  label: 'Web Domain Registration',
                  amount: { currency: 'USD', value: '15.00' }
                }, {
                  label: 'Yearly Email Subscription ',
                  amount: { currency: 'USD', value: '9.99' }
                }],
                total: {
                  label: 'Total due',
                  amount: { currency: 'USD', value : '24.00' }
                }
              };

              // 1. Create a `PaymentRequest` instance
              var request = new PaymentRequest(supportedInstruments, details);
              var that = this;
              // 2. Show the native UI with `.show()`
              request.show()
              // 3. Process the payment
              .then(result => {
                // POST the payment information to the server
                return axios.post('/api/buy/',{domain:that.domain,card:result})
                  .then(response => {
                  // 4. Display payment results
                  if (response.status === 200) {
                    // Payment successful
                    return result.complete('success');
                  } else {
                    // Payment failure
                    return result.complete('fail');
                  }
                }).catch(() => {
                  return result.complete('fail');
                });
              });
            } else {
              // No support. Proceed the old school way
              console.log('not supported')
              axios.post('/api/buy/',{domain:this.domain,email:this.email,password:this.password})
                .then(response => {
                // 4. Display payment results

              }).catch(() => {

              });
            }

          }

          }

    }
</script>
