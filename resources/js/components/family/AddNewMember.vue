<template>
    <div class="container ">
     
        <div class="row ">
           <div class="col-12">
               <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add New Family Member</h3>
                 <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" @submit.prevent="createUserDetails">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name')}" 
                          placeholder="Enter Name ..." name="name" >
                          <has-error :form="form" field="name"></has-error>
                      </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group" >
                        <label>Relation With Family Head</label>
                        <select v-model="form.relation" class="form-control" name="relation" :class="{ 'is-invalid': form.errors.has('relation')}">
                          <option value="wife">Wife</option>
                          <option value="son">Son</option>
                          <option value="daughter">Daughter</option>
                          <option value="grand daughter">Grand Daughter</option>
                          <option value="grand son">Grand Son</option>
                          <option value="brother">Brother</option>
                          <option value="sister">Sister</option>
                          <option value="nephew">Nephew</option>
                          <option value="neice">Neice</option>
                        </select>
                          <has-error :form="form" field="relation"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <label>Gender</label><br>
                      <div class="form-group form-check-inline">
                        
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" v-model="form.gender" value="male" :class="{ 'is-invalid': form.errors.has('gender')}">
                          <label class="form-check-label">Male</label>
                        <has-error :form="form" field="gender"></has-error>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value="female" v-model="form.gender" :class="{ 'is-invalid': form.errors.has('gender')}">
                          <label class="form-check-label">Female</label>
                        <has-error :form="form" field="gender"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" v-model="form.dob" :class="{'is-invalid': form.errors.has('dob')}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" autocomplete="off" name="dob">
                        <has-error :form="form" field="dob"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <label>Maritial Status</label><br>
                      <div class="form-group  form-check-inline">
                        
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="marriage_status" v-model="form.marriage_status" value="married" :class="{'is-invalid': form.errors.has('marriage_status')}" >
                          <label class="form-check-label">Married</label>
                          <has-error :form="form" field="marriage_status"></has-error>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" v-model="form.marriage_status" type="radio" name="marriage_status" value="engaged" :class="{'is-invalid': form.errors.has('marriage_status')}">
                          <label class="form-check-label">Engaged</label>
                          <has-error :form="form" field="marriage_status"></has-error>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="single" v-model="form.marriage_status" type="radio" name="marriage_status" checked="" :class="{'is-invalid': form.errors.has('marriage_status')}">
                          <label class="form-check-label">Single</label>
                          <has-error :form="form" field="marriage_status"></has-error>
                        </div>
                       
                          </div>
                           <div class="form-group">
                           <div class="form-check">
                          <input class="form-check-input" v-model="form.matrimonial" type="checkbox" name="matrimonial" value="true" :class="{'is-invalid': form.errors.has('matrimonial')}">
                          <label class="form-check-label">Do you want to be featured in our Matrimonial Section?</label>
                          <has-error :form="form" field="matrimonial"></has-error>
                        </div>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Email ID</label>
                        <div class="form-check">
                         <input type="email" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.has('email')}" placeholder="Enter your email Address" name="email">
                       <has-error :form="form" field="email"></has-error>
                        </div>
                        
                      </div>
                      <div class="form-group">
                        <label>Mobile Number</label>
                        <div class="form-check">
                         <input type="text" v-model="form.mobile" class="form-control" :class="{'is-invalid':form.errors.has('mobile')}" placeholder="Enter your Mobile Number" name="mobile">
                          <has-error :form="form" field="mobile"></has-error>
                        </div>
                       
                      </div>
                    </div>
                </div>
                       <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fathers Name</label>
                        <input type="text" v-model="form.father_name" class="form-control" placeholder="Enter Name ..." name="father_name" :class="{'is-invalid':form.errors.has('father_name')}" >
                      <has-error :form="form" field="father_name"></has-error>
                      </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>Mothers Name</label>
                        <input type="text" v-model="form.mother_name" class="form-control" placeholder="Mothers Name" name="mother_name" :class="{'is-invalid':form.errors.has('mother_name')}" >
                        <has-error :form="form" field="mother_name"></has-error>
                      </div>
                  </div>
                  </div>
                  <!-- input states -->
                  <div class="form-group">
                      <label class="col-form-label" for="address">Address </label>
                   <textarea v-model="form.address" class="form-control" name="address" rows="3" placeholder="Enter ..." autocomplete="off" :class="{'is-invalid':form.errors.has('address')}"></textarea>
                  <has-error :form="form" field="address"></has-error>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                        <label>City</label>
                        <input type="text" v-model="form.city" class="form-control" placeholder="Enter Name ..." name="city" :class="{'is-invalid':form.errors.has('city')}" >
                        <has-error :form="form" field="city"></has-error>
                      </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                        <label>State</label>
                        <input type="text" v-model="form.state" class="form-control" :class="{'is-invalid':form.errors.has('state')}" placeholder="Enter State Name ..." name="state" >
                        <has-error :form="form" field="state"></has-error>
                      </div>
                      </div>
                  </div>
                  <hr>
                  <div><h3>Professional Details</h3></div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Occupation</label>
                         <select v-model="form.occupation" class="form-control" name="occupation" :class="{'is-invalid':form.errors.has('occupation')}">
                          <option value="Government Job">Government Job</option>
                          <option value="Private job">Private Job</option>
                          <option value="self employed">Self Employed</option>
                          <option value="student">Student</option>
                          <option value="unemployed">Unemployed</option>
                        </select>
                        <has-error :form="form" field="occupation" ></has-error>
                          </div>
                          
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="">Department</label>
                            <input v-model="form.department" type="text" class="form-control" name="department" :class="{'is-invalid':form.errors.has('department')}">
                          <has-error :form="form" field="department"></has-error>
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
                       <input type="text" v-model="form.post_graduate_degree" :class="{'is-invalid':form.errors.has('post_graduate_degree')}" class="form-control" name="post_graduate_degree" placeholder="Degree">
                       <has-error :form="form" field="post_graduate_degree"></has-error>
                   </div>
                   <div class="form-group">
                     <label>City</label>
                       <input type="text" class="form-control" name="post_graduate_university_city" v-model='form.post_graduate_university_city' placeholder="city" :class="{'is-invalid':form.errors.has('post_graduate_university_city')}">
                       <has-error :form="form" field="post_graduate_university_city"></has-error>
                   </div>
                   <div class="form-group">
                     <label>Year of Passing</label>
                     <input type="text" class="form-control" v-model="form.post_graduate_year_of_passing" name="post_graduate_year_of_passing" placeholder="year of Passing" :class="{'is-invalid':form.errors.has('post_graduate_year_of_passing')}" >
                     <has-error :form="form" field="post_graduate_year_of_passing"></has-error>
                   </div>
                    
                   </div>
                    <div class="col-sm-6">
                   <div class="form-group">
                     <label>University</label>
                       <input type="text" v-model="form.post_graduate_university" class="form-control" name="post_graduate_university" :class="{'is-invalid':form.errors.has('post_graduate_university')}">
                       <has-error :form="form" field="post_graduate_university"></has-error>
                   </div>
                   <div class="form-group">
                     <label>State</label>
                       <input type="text" class="form-control" v-model="form.post_graduate_university_state"  name="post_graduate_university_state" :class="{'is-invalid':form.errors.has('post_graduate_university_state')}">
                        <has-error :form="form" field="post_graduate_university_state"></has-error>
                   </div>
                   <div class="form-group">
                     <label>Percentage</label>
                     <input type="text" v-model ="form.post_graduate_university_percentage" class="form-control" :class="{'is-invalid':form.errors.has('post_graduate_university_percentage')}" name="post_graduate_university_percentage">
                     <has-error :form="form" field="post_graduate_university_percentage"></has-error>
                   </div>
                   </div>
                 </div>
                 <div class="font-weight-bold text-primary">Graduation Degree</div>
                 <div class="row">
                    
                    <div class="col-sm-6">
                   <div class="form-group">
                     <label>Degree</label>
                       <input type="text" class="form-control" v-model="form.graduate_degree" name="graduate_degree" placeholder="Graduation Degree" :class="{'is-invalid':form.errors.has('graduate_degree')}">
                        <has-error :form="form" field="graduate_degree"></has-error>
                   </div>
                   <div class="form-group">
                     <label>City</label>
                       <input type="text" class="form-control" :class="{'is-invalid':form.errors.has('graduate_university_city')}" v-model="form.graduate_university_city" name="graduate_university_city" placeholder = "City" >
                        <has-error :form="form" field="graduate_university_city"></has-error>
                   </div>
                   <div class="form-group">
                     <label>Year of Passing</label>
                     <input type="text" class="form-control" v-model="form.graduate_year_of_passing" :class="{'is-invalid':form.errors.has('graduate_year_of_passing')}" name="graduate_year_of_passing" placeholder="Year of Passing">
                     <has-error :form="form" field="graduate_year_of_passing"></has-error>
                   </div>
                    
                   </div>
                    <div class="col-sm-6">
                   <div class="form-group">
                     <label>University</label>
                       <input type="text" class="form-control" v-model="form.graduate_university" :class="{'is-invalid':form.errors.has('graduate_university')}" name="graduate_university" placeholder="university" >
                       <has-error :form="form" field="graduate_university"></has-error>
                   </div>
                   <div class="form-group">
                     <label>State</label>
                       <input type="text" v-model="form.graduate_university_state" class="form-control" placeholder="State" name="graduate_university_state" :class="{'is-invalid':form.errors.has('graduate_university_state')}">
                        <has-error :form="form" field="graduate_university_state"></has-error>
                   </div>
                   <div class="form-group">
                     <label>Percentage</label>
                     <input type="text" class="form-control" v-model="form.graduate_university_percentage" name="graduate_university_percentage" placeholder="Percentage" :class="{'is-invalid':form.errors.has('graduate_university_percentage')}">
                      <has-error :form="form" field="graduate_university_percentage"></has-error>
                   </div>
                   </div>
                 </div>
                 <!-- 
                   School education section

                  -->
                 <div class="font-weight-bold text-primary">10+2 (Senior Secondary Education)</div>
                 <div class="row">
                   <div class="col-sm-6">
                   <div class="form-group">
                     <label>Board</label>
                       <input type="text" class="form-control" v-model="form.class_12_board" :class="{'is-invalid' :form.errors.has('class_12_board') }" name="class_12_board" placeholder="Board Name" >
                       <has-error :form="form" field="class_12_board"></has-error>
                   </div>
                   
                   <div class="form-group">
                     <label>Percentage</label>
                     <input type="text" class="form-control" v-model="form.class_12_percentage" name="class_12_percentage" placeholder="Percentage" :class="{'is-invalid' :form.errors.has('class_12_percentage') }">
                     <has-error :form="form" field="class_12_percentage"></has-error>
                   </div>
                   <div class="form-group">
                     <label>Year of Passing</label>
                     <input type="text" class="form-control" v-model="form.class_12_year_of_passing" :class="{'is-invalid' :form.errors.has('class_12_year_of_passing') }" name="class_12_year_of_passing" placeholder="Year of Passing">
                      <has-error :form="form" field="class_12_year_of_passing"></has-error>
                   </div>
                   </div>
                   <div class="col-sm-6">
                   <div class="form-group">
                     <label>School Name</label>
                       <input type="text" class="form-control" v-model="form.class_12_school_name" placeholder="School Name" name="class_12_school_name" :class="{'is-invalid' :form.errors.has('class_12_school_name') }">
                        <has-error :form="form" field="class_12_school_name"></has-error>
                   </div>
                   <div class="form-group">
                     <label>City</label>
                       <input type="text" class="form-control" v-model="form.class_12_city" name="class_12_city" placeholder = "City" :class="{'is-invalid' :form.errors.has('class_12_city') }">
                       <has-error :form="form" field="class_12_city"></has-error>
                   </div>
                   
                    
                   </div>
                 </div>
                  <div class="font-weight-bold text-primary">Class 10 (Secondary Education)</div>
                 <div class="row">
                   <div class="col-sm-6">
                   <div class="form-group">
                     <label>Board</label>
                       <input type="text" class="form-control" v-model="form.class_10_board" :class="{'is-invalid' :form.errors.has('class_10_board') }" name="class_10_board" placeholder="Board Name" >
                       <has-error :form="form" field="class_10_board"></has-error>
                   </div>
                   
                   <div class="form-group">
                     <label>Percentage</label>
                     <input type="text" class="form-control" v-model="form.class_10_percentage" name="class_10_percentage" placeholder="Percentage" :class="{'is-invalid' :form.errors.has('class_10_percentage') }">
                     <has-error :form="form" field="class_10_percentage"></has-error>
                   </div>
                   <div class="form-group">
                     <label>Year of Passing</label>
                     <input type="text" class="form-control" v-model="form.class_10_year_of_passing" :class="{'is-invalid' :form.errors.has('class_10_year_of_passing') }" name="class_10_year_of_passing" placeholder="Year of Passing">
                      <has-error :form="form" field="class_10_year_of_passing"></has-error>
                   </div>
                   </div>
                   <div class="col-sm-6">
                   <div class="form-group">
                     <label>School Name</label>
                       <input type="text" class="form-control" v-model="form.class_10_school_name" placeholder="School Name" name="class_10_school_name" :class="{'is-invalid' :form.errors.has('class_10_school_name') }">
                        <has-error :form="form" field="class_10_school_name"></has-error>
                   </div>
                   <div class="form-group">
                     <label>City</label>
                       <input type="text" class="form-control" v-model="form.class_10_city" name="class_10_city" placeholder = "City" :class="{'is-invalid' :form.errors.has('class_10_city') }">
                       <has-error :form="form" field="class_10_city"></has-error>
                   </div>
                   
                    
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-sm-6">
                     <div class="form-group">
                       <label>Username</label>
                     <input type="text" name="username" class="form-control" v-model="form.username" :class="{'is-invalid' :form.errors.has('username') }">
                      <has-error :form="form" field="username"></has-error>
                   </div>
                   </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                       <label>Password</label>
                     <input type="password" name="password" class="form-control" v-model="form.password" :class="{'is-invalid' :form.errors.has('password') }">
                      <has-error :form="form" field="password"></has-error>
                   </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-sm-6">
                   <div class="form-group">
                     <button class="btn btn-success">Submit Form</button>
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
      data(){
          return{
            users:{},
            form: new Form({
              name:'',
              relation:'',
              gender:'',
              dob:'',
              marriage_status:'',
              matrimonial:'',
              email:'',
              mobile:'',
              father_name:'',
              mother_name:'',
              address:'',
              city:'',
              state:'',
              occupation:'',
              department:'',
              post_graduate_degree:'',
              post_graduate_university:'',
              post_graduate_university_city:'',
              post_graduate_university_state:'',
              post_graduate_university_percentage:'',
              post_graduate_year_of_passing:'',
              graduate_degree:'',
              graduate_university:'',
              graduate_university_city:'',
              graduate_university_state:'',
              graduate_university_percentage:'',
              graduate_year_of_passing:'',
              class_12_board : '',
              class_12_school_name:'',
              class_12_percentage:'',
              class_12_year_of_passing:'',
              class_12_city:'',
              class_10_board:'',
              class_10_school_name:'',
              class_10_percentage:'',
              class_10_year_of_passing:'',
              class_10_city:'',
              username:'',
              password:''

            })
          }
      },
     methods:{
      loaduser(){
          axios.get('api/userDetails').then(({data})=>(this.users = data.data));
       
      },
       createUserDetails(){
         this.$Progress.start();
          this.form.post('api/userDetails');
          Toast.fire({
             type: 'success',
            title: 'User created successfully'
              })

          this.$Progress.finish();
       },
      
      },
      mounted() {
      this.loaduser();
      console.log(this.users);
        }
    }
</script>
