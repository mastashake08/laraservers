<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Create New Server</div>

                    <div class="card-body">
                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name"  required autofocus>

                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="database" class="col-md-4 col-form-label text-md-right">Database Name</label>

                          <div class="col-md-6">
                              <input id="database" type="text" class="form-control" name="database"  required autofocus>

                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="size" class="col-md-4 col-form-label text-md-right">Server Size</label>

                          <div class="col-md-6">
                              <select id="size" type="text" class="form-control" name="name"  required autofocus>
                                <option value="512MB">512MB RAM - 1 CPU Core - 20GB SSD</option>
                                <option value="1GB">1GB RAM - 1 CPU Core - 30GB SSD</option>
                                <option value="2GB">2GB RAM - 2 CPU Cores - 40GB SSD</option>
                                <option value="4GB">4GB RAM - 2 CPU Cores - 60GB SSD</option>
                                <option value="8GB">8GB RAM - 4 CPU Cores - 80GB SSD</option>
                              </select>

                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="region" class="col-md-4 col-form-label text-md-right">Server Region</label>

                          <div class="col-md-6">
                              <select id="region" type="text" class="form-control" name="name"  required autofocus>
                                <option value="ams2">Amsterdam 2</option>
                                <option value="ams3">Amsterdam 3</option>
                                <option value="blr1">Bangalore</option>
                                <option value="lon1">London</option>
                                <option value="fra1">Frankfurt</option>
                                <option value="nyc1">New York 1</option>
                                <option value="nyc2">New York 2</option>
                                <option value="nyc3">New York 3</option>
                                <option value="sfo1">San Francisco 1</option>
                                <option value="sfo2">San Francisco 2</option>
                                <option value="sgp1">Singapore</option>
                                <option value="tor1">Toronto</option>
                              </select>

                          </div>
                      </div>


                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Create New Server
                              </button>
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
        }
    }
</script>
