<template>
<div class="container ">
        <div class="card card-warning elevation-4">
              <div class="card-header">
                <h3 class="card-title">Apply for New Job</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="createJobs">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                     <input v-model="form.title" type="text" name="title"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                         <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                     <textarea v-model="form.description" type="text" name="description"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                         <has-error :form="form" field="description"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                     <input v-model="form.city" type="text" name="city"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('city') }">
                         <has-error :form="form" field="city"></has-error>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Contact Person</label>
                    <div class="col-sm-10">
                     <input v-model="form.contact_person" type="text" name="contact_person"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('contact_person') }">
                         <has-error :form="form" field="contact_person"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-10">
                     <input v-model="form.contact_number" type="text" name="contact_number"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('contact_number') }">
                         <has-error :form="form" field="contact_number"></has-error>
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

  data(){
    return {
      form: new Form ({
        
      })
    }
  }
    
}
</script>