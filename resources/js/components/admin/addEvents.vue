<template>
<div class="container ">
        <div class="card card-warning elevation-4">
              <div class="card-header">
                <h3 class="card-title">Add new Event</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="applyjobs">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Event Name</label>
                    <div class="col-sm-10">
                     <input v-model="form.event_name" type="text" name="event_name"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('event_name') }">
                         <has-error :form="form" field="event_name"></has-error>
                    </div>
                  </div>
                   
                   <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Event Date</label>
                          <div class="col-sm-10">
                        <input type="date" class="form-control" v-model="form.event_date" :class="{'is-invalid': form.errors.has('event_date')}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" autocomplete="off" name="event_date">
                        <has-error :form="form" field="event_date"></has-error>
                          </div>
                      </div>                 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Event Venue</label>
                    <div class="col-sm-10">
                     <input v-model="form.event_venue" type="text" name="event_venue"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('event_venue') }">
                         <has-error :form="form" field="event_venue"></has-error>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Remarks</label>
                    <div class="col-sm-10">
                     <input v-model="form.remarks" type="text" name="remarks"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('remarks') }">
                         <has-error :form="form" field="remarks"></has-error>
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
      categories:[],
      form: new Form ({
        event_name: '',
        event_date:'',
        event_venue:'',
        event_remarks:''
      })
    }
  },
   methods: {
     applyjobs() {
       this.form.post('api/event').then(()=>{
            Toast.fire({
            type: 'success',
            title: 'Job Application Sent successfully'
              })
              this.form.reset();
            }
          ).catch(()=>{
             Toast.fire({
            type: 'error',
            title: 'some problem in the application'
              })
            
          });
     },
     getjobs(){
       axios.get('api/jobcategory').then(([data])=>(this.category = data))
     },
      
   },
   created(){
     this.getjobs();
   },
   computed:{
     options :()=>categories
  }
   } 

</script>