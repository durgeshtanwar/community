<template>
    <div class="container ">
        <div class="card card-warning elevation-4">
              <div class="card-header">
                <h3 class="card-title">Insert News</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="insertnews">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">News Title</label>
                    <div class="col-sm-10">
                     <input v-model="form.news_title" type="text" name="news_title"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('news_title') }">
                         <has-error :form="form" field="news_title"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">News Description</label>
                    <div class="col-sm-10">
                     <textarea v-model="form.news_description" type="text" name="news_description"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('news_description') }"></textarea>
                         <has-error :form="form" field="news_description"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">url</label>
                    <div class="col-sm-10">
                     <input v-model="form.url" type="text" name="url"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('url') }">
                         <has-error :form="form" field="url"></has-error>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                     <select v-model="form.status" type="text" name="status"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                         <has-error :form="form" field="status"></has-error>
                     <option value="enable">Enable</option>
                     <option value="disable">Disable</option>
                     </select>
                    </div>
                  </div>
                 

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
    </div>
</template>

<script>
    export default {
      data() {
        return {
            form: new Form({
            news_title : '',
            news_description:'',
            url:'',
            status:''
           
          })
        }
      },
      methods: {
       
        insertnews() {
          this.$Progress.start();
          this.form.post('api/insertnews');
          Toast.fire({
             type: 'success',
            title: 'News Inserted successfully'
              })

          this.$Progress.finish();
        }
      },
        created() {
          // this.loadUsers();
        },
        mounted(){
          console.log(
            "this. is mounted"
          )
        }
    }
</script>
