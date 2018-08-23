<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">SSH Keys</div>

                    <div class="card-body">
                      <div class="form-group">
                        <input class="form-control" v-model="key.name" placeholder="Name Of Key">
                      </div>


                        <div class="form-group">
                          <textarea v-model="key.key" class="form-control" placeholder="Key Contents">{{key.key}}</textarea>
                        </div>


                        <div class="form-group">
                          <button class="btn btn-success" v-on:click="addKey()">Add Key</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Your Keys</div>

                        <div class="card-body" v-if="ready">

                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Key</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="k in keys">
                                  <td>{{k.name}}</td>
                                  <td>{{k.key}}</td>
                                  <td>
                                    <div class="row">
                                    <div class="form-group">
                                      <div class="col-md-4">
                                      <button class="btn btn-danger" v-on:click="deleteKey(k.id)">Delete Key</button>
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
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return {
            keys: [],
            key: {},
            ready: false
          }
        },
        created(){
          var that = this;
          axios.get('/api/key').then(data =>{
            that.keys = data.data;
            that.ready = true;
          });
        },
        methods: {
          deleteKey: function(id){
            axios.delete('/api/key/'+id).then(data => {
              console.log(data.data);
            });
          },
          addKey: function(){
            var that = this;
            axios.post('/api/key',{name:this.key.name,key:this.key.key}).then(data => {
              that.keys.push(data.data);
            });
          }
        }
    }
</script>
