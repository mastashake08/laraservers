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
                        <strong v-if="password.length < 8">Password must be at least 8 characters</strong>
                        <br>
                        <strong v-if="domain==''">Domain must be entered</strong>
                        <br>
                        <button :disabled="password.length < 8 "class="btn btn-success" v-on:click="searchDomain()">Search Availability</button>
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

                    <div class="card-body" v-if="ready">

                        <table class="table">
                          <thead>
                            <tr>
                              <th>Domains</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="d in domains">
                              <td>{{d.domain}}</td>
                              <td>
                                <div class="row">
                                <div class="form-group">
                                  <div class="col-md-4">
                                  <a href="https://box.jyroneparkeremail.space/mail" class="btn btn-warning">Check Mail</a>
                                </div>
                              </div>
                                <div class="form-group">
                                  <div class="col-md-4">
                                  <button class="btn btn-success" v-on:click="newEmail(d.domain)">Add New Email Address</button>
                                </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-4">
                                  <button class="btn btn-info" v-on:click="newRecord(d.domain)">Manage DNS</button>
                                </div>
                                </div>
                              </div>
                              </td>

                            </tr>

                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </br>

      <!----- Add New Email -->
            <!-- Modal -->
      <div id="emailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New Email Account</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input class="form-control" v-model="email" placeholder="New Email Address"  />
                <b if="email_addr != '@' ">{{email_addr}}</b>
              </div>
              <div class="form-group">
                <input class="form-control" v-model="password" type="password" placeholder="New Email Password" />
              </div>


              <div class="form-group">
                <strong v-if="password.length < 8">Password must be at least 8 characters</strong>
                <br>
                <strong v-if="domain==''">Domain must be entered</strong>
                <br>
                <button :disabled="password.length < 8 "class="btn btn-success" v-on:click="addEmail()">Add Email</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>


      <!--- End Email -->
      <!----- Add New DNS -->
            <!-- Modal -->
      <div id="dnsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New DNS Record</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <select id="customdnsType" class="form-control" v-model="type" style="max-width: 400px" placeholder="Record Type">
                <option selected value="A" data-hint="Enter an IPv4 address (i.e. a dotted quad, such as 123.456.789.012).  The 'local' alias sets the record to this box's public IPv4 address.">A (IPv4 address)</option>
                <option value="AAAA" data-hint="Enter an IPv6 address.  The 'local' alias sets the record to this box's public IPv6 address.">AAAA (IPv6 address)</option>
                <option value="CAA" data-hint="Enter a CA that can issue certificates for this domain in the form of FLAG TAG VALUE. (0 issuewild &quot;letsencrypt.org&quot;)">CAA (Certificate Authority Authorization)</option>
                <option value="CNAME" data-hint="Enter another domain name followed by a period at the end (e.g. mypage.github.io.).">CNAME (DNS forwarding)</option>
                <option value="TXT" data-hint="Enter arbitrary text.">TXT (text record)</option>
                <option value="MX" data-hint="Enter record in the form of PRIORITY DOMAIN., including trailing period (e.g. 20 mx.example.com.).">MX (mail exchanger)</option>
                <option value="SRV" data-hint="Enter record in the form of PRIORITY WEIGHT PORT TARGET., including trailing period (e.g. 10 10 5060 sip.example.com.).">SRV (service record)</option>
                <option value="SSHFP" data-hint="Enter record in the form of ALGORITHM TYPE FINGERPRINT.">SSHFP (SSH fingerprint record)</option>
                <option value="NS" data-hint="Enter a hostname to which this subdomain should be delegated to">NS (DNS subdomain delegation)</option>
              </select>
              </div>
              <div class="form-group">
                <input class="form-control" v-model="value"  placeholder="Value" />
              </div>


              <div class="form-group">

                <button :disabled="value.length == 0 && type.length==0 "class="btn btn-success" v-on:click="addRecord()">Add Record</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>


      <!--- End DNS -->
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
            password:'',
            ready: false,
            value: '',
            type: ''
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
            that.ready = true;
          });
        },
        methods: {
          newEmail: function(domain){
            this.domain = domain;
            $('#emailModal').modal();
          },
          newRecord: function(domain){
            this.domain = domain;
            $('#dnsModal').modal();
          },
          searchDomain: function(){
            axios.post('/api/check-domain',{domain:this.domain}).then(data =>{
              if(data.data.success){
                var ans = confirm('This domain/email combo is available for $15/year. Do you want to charge this to your card on file?');
                if(ans){
                  this.checkOut()
                }
                else{
                  alert('You must checkout to continue!');
                }

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


          },
          addEmail: function(){
            var that = this;
            axios.post('/api/add-email',{email:this.email_addr,password:this.password}).then(data => {
              alert('Email account created!');
              that.domain = '';
              that.email = '';
              that.password = '';
              $('#emailModal').modal("hide");
            });
          },
          addRecord: function(){
            var that = this;
            axios.post('/api/add-record',{domain:this.domain,type:this.type,value: this.value}).then(data => {
              alert('Record created!');
              that.domain = '';
              that.value = '';
              that.type = '';
              $('#dnsModal').modal("hide");
            });
          }

          }

    }
</script>
