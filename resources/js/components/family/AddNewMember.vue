<template>
    <div class="container ">
     
        <div class="row ">
           <div class="col-12">
               <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add New Family Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name ..." name="name" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>Relation With Family Head</label>
                        <select class="form-control" name="relation">
                          <option>Wife</option>
                          <option>Son</option>
                          <option>Daughter</option>
                          <option>Grand Daughter</option>
                          <option>Grand Son</option>
                          <option>Brother</option>
                          <option>Sister</option>
                          <option>Nephew</option>
                          <option>Neice</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <label>Gender</label><br>
                      <div class="form-group form-check-inline">
                        
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender">
                          <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" checked="">
                          <label class="form-check-label">Female</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" autocomplete="off" name="dob">
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <label>Maritial Status</label><br>
                      <div class="form-group  form-check-inline">
                        
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="marriage">
                          <label class="form-check-label">Married</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="marriage" checked="">
                          <label class="form-check-label">Engaged</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="marriage" checked="">
                          <label class="form-check-label">Single</label>
                        </div>
                       
                          </div>
                           <div class="form-group">
                           <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="matrimonial">
                          <label class="form-check-label">Do you want to be featured in our Matrimonial Section?</label>
                        </div>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Email ID</label>
                        <div class="form-check">
                         <input type="email" class="form-control" placeholder="Enter your email Address" name="email">
                        </div>
                        
                      </div>
                    </div>
                </div>
                       <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fathers Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name ..." name="father_name" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>Mothers Name</label>
                        <input type="text" class="form-control" placeholder="Mothers Name" name="mother_name" >
                      </div>
                  </div>
                  </div>
                  <!-- input states -->
                  <div class="form-group">
                      <label class="col-form-label" for="address">Address </label>
                   <textarea class="form-control" name="address" rows="3" placeholder="Enter ..." autocomplete="off"></textarea>
                  
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="Enter Name ..." name="city" >
                      </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" placeholder="Enter Name ..." name="state" >
                      </div>
                      </div>
                  </div>
                  <hr>
                  <div><h3>Professional Details</h3></div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Occupation</label>
                            <select class="form-control" name="occupation">
                          <option>Government Job</option>
                          <option value="">Private Job</option>
                          <option value="">Government Job</option>
                          <option value="">Self Employed</option>
                          <option value="">Student</option>
                          <option value="">Unemployed</option>
                        </select>
                          </div>
                          
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Department</label>
                            <input type="text" class="form-control" name="department">
                      
                          </div>
                          
                      </div>
                  </div>
                  <hr>
                 <div><h3>Educational Details</h3></div>
                 <div class="font-weight-bold text-primary">Post Graduation</div>
                
                 <div class="row">
                    <div class="col-sm-6">
                   <div class="form-group">
                     <label>Degree</label>
                       <input type="text" class="form-control" name="post_degree" placeholder="Degree">
                   </div>
                   <div class="form-group">
                     <label>City</label>
                       <input type="text" class="form-control" name="post_uni_city" placeholder="city">
                   </div>
                   <div class="form-group">
                     <label>Year of Passing</label>
                     <input type="text" class="form-control" name="post_yop" placeholder="year of Passing">
                   </div>
                    
                   </div>
                    <div class="col-sm-6">
                   <div class="form-group">
                     <label>University</label>
                       <input type="text" class="form-control" name="post_university">
                   </div>
                   <div class="form-group">
                     <label>State</label>
                       <input type="text" class="form-control" name="post_uni_state">
                   </div>
                   <div class="form-group">
                     <label>Percentage</label>
                     <input type="text" class="form-control" name="post_percentage">
                   </div>
                   </div>
                 </div>
                 <div class="font-weight-bold text-primary">Graduation Degree</div>
                 <div class="row">
                    
                    <div class="col-sm-6">
                   <div class="form-group">
                     <label>Degree</label>
                       <input type="text" class="form-control" name="grad_degree" placeholder="Graduation Degree">
                   </div>
                   <div class="form-group">
                     <label>City</label>
                       <input type="text" class="form-control" name="grad_uni_city" placeholder = "City" >
                   </div>
                   <div class="form-group">
                     <label>Year of Passing</label>
                     <input type="text" class="form-control" name="grad_yop" placeholder="Year of Passing">
                   </div>
                    
                   </div>
                    <div class="col-sm-6">
                   <div class="form-group">
                     <label>University</label>
                       <input type="text" class="form-control" name="grad_university" placeholder="university" >
                   </div>
                   <div class="form-group">
                     <label>State</label>
                       <input type="text" class="form-control" placeholder="State" name="grad_uni_state">
                   </div>
                   <div class="form-group">
                     <label>Percentage</label>
                     <input type="text" class="form-control" name="grad_percentage" placeholder="Percentage">
                   </div>
                   </div>
                 </div>
                 <div class="font-weight-bold text-primary">10+2 (Senior Secondary Education)</div>
                 <div class="row">
                   <div class="col-sm-6">
                   <div class="form-group">
                     <label>Board</label>
                       <input type="text" class="form-control" name="sen_board" placeholder="Board Name" >
                   </div>
                   <div class="form-group">
                     <label>School Name</label>
                       <input type="text" class="form-control" placeholder="School Name" name="School Name">
                   </div>
                   <div class="form-group">
                     <label>Percentage</label>
                     <input type="text" class="form-control" name="grad_percentage" placeholder="Percentage">
                   </div>
                   </div>
                   <div class="col-sm-6">
                   <div class="form-group">
                     <label>School Name</label>
                       <input type="text" class="form-control" placeholder="School Name" name="School Name">
                   </div>
                   <div class="form-group">
                     <label>City</label>
                       <input type="text" class="form-control" name="grad_uni_city" placeholder = "City" >
                   </div>
                   <div class="form-group">
                     <label>Year of Passing</label>
                     <input type="text" class="form-control" name="grad_yop" placeholder="Year of Passing">
                   </div>
                    
                   </div>
                 </div>
                </form>
              </div>
              <!-- /.card-body -->
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
