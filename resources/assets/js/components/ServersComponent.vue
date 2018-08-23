<template>
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card card-default">
                  <div class="card-header">Buy A New Server</div>

                  <div class="card-body">
                    <div class="form-group">
                      <input class="form-control" v-model="server.name" placeholder="Name Of Server i.e. fluffy-kitten">
                    </div>
                      <div class="form-group">
                        <select id="region" class="form-control" v-model="server.region"  placeholder="Server Region">
                            <option v-for="r in serverSpecs.regions" :value="r.code">{{r.name}}</option>
                        </select>
                      <div class="form-group">
                        <select id="memory" class="form-control" v-model="server.memory"  placeholder="Memory Size">
                            <option v-for="m in serverSpecs.memory" :value="m">{{m.size}} - {{m.price}}</option>
                        </select>
                        Total Price: {{server.memory.price}}/mo
                      </div>


                      <div class="form-group">
                        <button class="btn btn-success" v-on:click="addServer()">Buy Server</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
      <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Your Servers</div>

                    <div class="card-body" v-if="ready">

                        <table class="table">
                          <thead>
                            <tr>
                              <th>Server</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="s in servers">
                              <td>{{s.name}}</td>
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
                                  <button class="btn btn-danger" v-on:click="deleteServer(s.id)">Delete Server</button>
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

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return {
            ready: false,
            servers: [],
            server:{
              region:'',
              memory:{
                price: ''
              }
            },
            serverSpecs:{

                memory: [
                  {
                    size: '1GB',
                    price: '$7.50'
                  },
                  {
                    size: '2GB',
                    price: '$15.00'
                  },
                  {
                    size: '3GB',
                    price: '$22.50'
                  }
                ],
                regions: [
                  {
                    code:'ams2',
                    name:'Amsterdam 2',
                  },
                  {
                    code:'ams3',
                    name:'Amsterdam 3'
                  },
                  {
                    code:'blr1',
                    name:'Bangalore'
                  },
                  {
                    code: 'lon1',
                    name: 'London'
                  },
                  {
                    code: 'fra1',
                    name: 'Frankfurt'
                  },
                  {
                    code: 'nyc1',
                    name: '	New York 1'
                  },
                  {
                    code: 'nyc2',
                    name: '	New York 2'
                  },
                  {
                    code: 'nyc3',
                    name: '	New York 3'
                  },
                  {
                    code: 'sfo1',
                    name: 'San Francisco 1'
                  },
                  {
                    code: 'sfo2',
                    name: 'San Francisco 2'
                  },
                  {
                    code: 'sgp1',
                    name: 'Singapore'
                  },
                  {
                    code: 'tor1',
                    name: 'Toronto'
                  }

                ]
              }
            }
          }
        ,
        computed: {

        },
        created(){
          var that = this;
          axios.get('/api/server').then(function(data){
            that.servers = data.data;
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
          addServer: function(){
            var that = this;
            axios.post('/api/server',{server:this.server}).then(data => {
              alert('Server created! It should be available in 5-10 minutes');
              that.servers.push(data.data);
            });
          },
          deleteServer: function(id){
            var that = this;
            axios.delete('/api/server/'+id).then(data => {
              console.log(data.data);
            });
          }

          }

    }
</script>
