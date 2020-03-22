<template>
    <div class="container ">
         <div class="row ">
           <h2 v-show="authorized==0">You are unauthorized to perform this action</h2>
           <div class="col-12" v-show ="authorized==1">
               <div class="card card-warning">
               <div class="card-header" >
               <h3 class="card-title">Update User Information</h3>
                 <div class="card-tools">
                 <p> Gotra : {{users.gotra}} 
                   <br> Family Head : {{users.family_head}}
                 </p>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" @submit.prevent='updateuserdata()' enctype="multipart/form-data">
                  <div class="row">
                     <div class="form-check">
                        <input type="radio" name="allowsearch" class="form-check-in" v-model="form.allowsearch" value=1  :class="{'is-invalid': form.errors.has('allowsearch')}">
                          <label for="allowserch" class="form-check-label">I do not want my data in user search</label>
                           <input type="radio" name="allowsearch" class="form-check-in" v-model="form.allowsearch" value=0  :class="{'is-invalid': form.errors.has('allowsearch')}">
                          <label for="allowserch" class="form-check-label">I want my data in user search</label>
                        </div>
                    </div>
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
                        <select v-model="form.relation" @change="relation()" class="form-control" name="relation" :class="{ 'is-invalid': form.errors.has('relation')}">
                          <option value="self">Self</option>
                          <option value="wife">Wife</option>
                          <option value="son">Son</option>
                          <option value="daughter">Daughter</option>
                          <option value="grand daughter">Grand Daughter</option>
                          <option value="daughter in law">Daughter in law</option>
                          <option value="son in law">Son in law</option>
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
                        <div class="form-check">
                          <input class="form-check-input" value="widow" v-model="form.marriage_status" type="radio" name="marriage_status" checked="" :class="{'is-invalid': form.errors.has('marriage_status')}">
                          <label class="form-check-label">Widow</label>
                          <has-error :form="form" field="marriage_status"></has-error>
                        </div>
                       
                          </div>
                           <div class="form-group">
                           <div class="form-check">
                          <input class="form-check-input" v-show="form.marriage_status ==='single'" v-model="form.matrimonial" type="checkbox" name="matrimonial" value="true" :class="{'is-invalid': form.errors.has('matrimonial')}">
                          <label class="form-check-label" v-show="form.marriage_status ==='single'">Do you want to be featured in our Matrimonial Section?</label>
                          <has-error :form="form" field="matrimonial"></has-error>
                        </div>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Blood Group</label>
                     <select class="form-control" name="blood_group" v-model="form.blood_group" :class="{'is-invalid':form.errors.has('blood_group')}">
                           <option value="NA">I do not know</option>
                           <option value="A+ve">A+ve</option>
                           <option value="A-ve">A-ve</option>
                           <option value="B+ve">B+ve</option>
                           <option value="B-ve">B-ve</option>
                           <option value="O+ve">O+ve</option>
                           <option value="O-ve">O-ve</option>
                           <option value="AB+ve">AB+ve</option>
                           <option value="AB-ve">AB-ve</option>
                           </select> 
                         <has-error :form="form" field="blood_group"></has-error>
                        
                      </div>
                         </div>
                     <div class="col-sm-6">
                      <!-- textarea -->
                        <div class="form-group">
                        <label >Email</label>
                      
                         <input type="email" v-model="form.email" class="form-control" :class="{'is-invalid':form.errors.has('email')}" placeholder="Enter your email Address" name="email">
                         <has-error :form="form" field="email"></has-error>
                          </div>
                      </div>
                      <div class="col-sm-6">
                       <div class="form-group">
                        <label>Mobile Number</label>
                          <input type="text"  v-model="form.mobile" class="form-control" :class="{'is-invalid':form.errors.has('mobile')}" placeholder="Enter your Mobile Number" name="mobile">
                          <has-error :form="form" field="mobile"></has-error>
                                  
                      </div>
                    </div>
                </div>
                       <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fathers Name</label>
                        <input type="text" v-model="form.father_name" class="form-control" placeholder="Enter Name ..." name="father_name" :class="{'is-invalid':form.errors.has('father_name')}" >
                      <has-error :form="form" field="father_name"></has-error>
                      </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="form-group">
                        <label>Mothers Name</label>
                        <input type="text" v-model="form.mother_name" class="form-control" placeholder="Mothers Name" name="mother_name" :class="{'is-invalid':form.errors.has('mother_name')}" >
                        <has-error :form="form" field="mother_name"></has-error>
                      </div>
                  </div>
                  <div class="col-sm-4">
                       <div class="form-group">
                        <label>Spouse Name</label>
                        <input type="text" v-model="form.spouse_name" class="form-control" placeholder="Mothers Name" name="mother_name" :class="{'is-invalid':form.errors.has('mother_name')}" >
                        <has-error :form="form" field="spouse_name"></has-error>
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
                        <label>State</label>
                        <select @change="getcity()" v-model="form.state" class="form-control" name="state" :class="{'is-invalid':form.errors.has('state')}">
                          <option value="Rajasthan">Rajasthan</option>
                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                          <option value="Assam">Assam</option>
                          <option value="Bihar">Bihar</option>
                          <option value="Chhattisgarh">Chhattisgarh</option>
                          <option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
                          <option value="Daman & Diu">Daman & Diu</option>
                          <option value="Delhi">Delhi</option>
                          <option value="Goa">Goa</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="Himachal Pradesh"> Himachal Pradesh</option>
                          <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerela">Kerela</option>
                          <option value="Lakshadweep">Lakshadweep</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Orissa">Orissa</option>
                          <option value="Pondicherry">Pondicherry</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Uttrakhand">Uttrakhand</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="West Bengal">West Bengal</option>
                          
                        </select>
                        <!-- <input type="text" v-model="form.state" class="form-control" :class="{'is-invalid':form.errors.has('state')}" placeholder="Enter State Name ..." name="state" > -->
                        <has-error :form="form" field="state"></has-error>
                      </div>
                      </div>
                      <div class="col-sm-6">
                        <label>City</label>
                          <div class="form-group">
                           <input type="text" list="city" v-model="form.city"  class="form-control" />
                        <datalist id="city">
                        <option v-for="city in cities">{{city}}</option>
                        </datalist>
                          </div>
                      </div>
                  </div>
                  
                  <hr>
                  <div><h3>Professional Details</h3></div>
                  <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="">Occupation</label>
                         <select v-model="form.occupation" @change="getjobs()" class="form-control" name="occupation" :class="{'is-invalid':form.errors.has('occupation')}">
                          <option value="Govt">Government Job</option>
                          <option value="private">Private Job</option>
                          <option value="self employed">Self Employed</option>
                          <option value="student">Student</option>
                          <option value="unemployed">Unemployed</option>
                          <option value="retired">Retired</option>
                          <option value="house wife">House wife</option>
                        </select>
                        <has-error :form="form" field="occupation" ></has-error>
                          </div>
                          
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group" v-if ="form.occupation == 'Govt' || form.occupation == 'private' || form.occupation == 'self employed'">
                              <label for="">Department</label>
                          <select v-if ="form.occupation == 'private' || form.occupation=='self employed'" v-model="form.department"   class="form-control">

                        <option>Accounts/ Banking / Finance / Tax</option>
                        <option>Accountant</option>
                        <option>Debt Recovery Agent</option>
                        <option>Equity Dealer</option>
                        <option>Financial Planner</option>
                        <option>Insurance Agent</option>
                        <option>Mutual Fund Agent</option>
                        <option>Analytics</option>
                        <option>Analytics / Business Intelligence / Data Science</option>
                        <option>Back Office Operations</option>
                        <option>Admin Executive</option>
                        <option>Back Office</option>
                        <option>Claims Processing Executive</option>
                        <option>Data Entry</option>
                        <option>Helper</option>
                        <option>Human Resource (HR)</option>
                        <option>MIS Executive</option>
                        <option>Office Assistant</option>
                        <option>Office Boy</option>
                        <option>Personal Assistant</option>
                        <option>Stenographer</option>
                        <option>Business Operations</option>
                        <option>BPO</option>
                        <option>Data Collection Executive</option>
                        <option>Operations Executive</option>
                        <option>Design</option>
                        <option>Architecture</option>
                        <option>Draftsman</option>
                        <option>DTP Operator</option>
                        <option>Fashion Designer</option>
                        <option>Web / Graphic Design</option>
                        <option>Front Desk Operations</option>
                        <option>Cashier</option>
                        <option>Customer Care</option>
                        <option>Public Relations (PR) Executive</option>
                        <option>Receptionist/Front Desk</option>
                        <option>Store Keeper</option>
                        <option>Hospitality</option>
                        <option>Air Hostess</option>
                        <option>Bartender</option>
                        <option>Cabin Crew</option>
                        <option>Cook / Chef</option>
                        <option>Waiter / Steward</option>
                        <option>IT - Hardware &amp; Software</option>
                        <option>Android Developer</option>
                        <option>Application Programming / Maintenance / Architecture</option>
                        <option>Database Administrator</option><option>IT Software - ERP / CRM</option>
                        <option>IT Software - Frontend / Backend</option>
                        <option>IT Software - Mobile Development</option>
                        <option>IT Support - Hardware</option>
                        <option>Network / Security / System Administration</option>
                        <option>Product / Project Management</option>
                        <option>Software Developer</option>
                        <option>Software Testing / QA</option>
                        <option>Logistics / Supply Chain</option>
                        <option>Delivery Boy</option>
                        <option>Labourer</option>
                        <option>Loader</option>
                        <option>Merchandiser</option>
                        <option>Manufacturing</option>
                        <option>Machine Operator</option>
                        <option>Packer</option>
                        <option>Pujari</option>
                        <option>Production/ Quality Control/ Maintenance</option>
                        <option>Purchase / Procurement Executive</option>
                        <option>Marketing</option><option>Content Writer</option>
                        <option>Digital Marketing Expert</option>
                        <option>Marketing Executive</option>
                        <option>Non-IT Engineering</option>
                        <option>Aeronautical Engineer</option>
                        <option>Chemical Engineer</option>
                        <option>Civil Engineer</option>
                        <option>Electrical Engineer</option>
                        <option>Electronics Engineer</option>
                        <option>Embedded / VLSI / ASIC / Chip Design</option>
                        <option>Engineering</option>
                        <option>Environmental Engineer</option>
                        <option>Industrial Engineer</option>
                        <option>Instrumentation Engineer</option>
                        <option>Mechanical Engineer</option>
                        <option>Telecommunications Engineer</option>
                        <option>Pharmacy / Medical</option>
                        <option>Doctor</option>
                        <option>Laboratory Assistant</option>
                        <option>Medical Representative</option>
                        <option>Nurse</option>
                        <option>Nursing Attendant/Wardboy</option>
                        <option>Physiotherapist</option>
                        <option>Radiology Technician</option>
                        <option>Sales</option>
                        <option>Counter Sales</option>
                        <option>Promoter</option>
                        <option>Sales / Business Development</option>
                        <option>Telesales / Telemarketing</option>
                        <option>Services</option>
                        <option>Aayah</option>
                        <option>Beautician</option>
                        <option>Caretaker</option>
                        <option>Carpenter</option>
                        <option>Counselors</option>
                        <option>Driver</option>
                        <option>Fitness Trainer</option>
                        <option>Gardener</option>
                        <option>Hair Stylist</option>
                        <option>Housekeeping</option>
                        <option>Maid</option>
                        <option>Massuese</option>
                        <option>Photographer</option>
                        <option>Plumber</option>
                        <option>Security Guard</option>
                        <option>Spot Boy</option>
                        <option>Tailor</option>
                        <option>Tutor / Teacher</option>
                        <option>Technicians</option>
                        <option>Electrician</option>
                        <option>Fitter</option>
                        <option>Mechanic</option>
                        <option>Technician</option>
                        <option>Tower Technician</option>
                        </select>
                        <select v-show ="form.occupation == 'Govt'" v-model="form.department"  class="form-control">
                          <option>Agriculture &amp; Cooperation </option><option>Animal Husbandry &amp; Fishing </option><option>Art &amp; Culture </option><option>Chemicals &amp; Fertilizers </option><option>Coal &amp; Mine </option><option>Commerce &amp; Industry </option><option>Communications &amp; Information Technology (</option><option>Defence </option><option>Education &amp; Training </option><option>Employment &amp; Labour </option><option>Energy &amp; Power </option><option>Environment &amp; Natural Resources </option><option>Finance, Banking &amp; Insurance </option><option>Food &amp; Public Distribution </option><option>Forestry &amp; Wildlife </option><option>Governance &amp; Administration</option><option>Health &amp; Family welfare </option><option>Home affairs &amp; National Security </option><option>Housing &amp; Urban Development </option><option>Information &amp; Broadcasting </option><option>International Affairs</option><option>Law &amp; Justice</option><option>People &amp; Organisations </option><option>Petroleum, Oil &amp; Natural Gas</option><option>Rural Development &amp; Panchayati Raj </option><option>Science, Technology &amp; Research</option><option>Social Justice &amp; Empowerment </option><option>Tourism </option><option>Transport &amp; Infrastructure</option><option>Youth Affairs &amp; Sports</option>
                        </select>
                      </div>
                          </div>
                          <div class="col-sm-4">
                           <div class="form-group" v-if ="form.occupation != 'student'">
                              <label for="">Highest education</label>
                            <select name="Highest Education" id="" v-model="form.highest_education" class="form-control">
                              <option value="5th pass">5th Pass</option>
                              <option value="8th pass">8th Pass</option>
                              <option value="10th pass">10th Pass</option>
                              <option value="12th pass">12th Pass</option>
                              <option value="BA">BA</option>
                              <option value="BCom">BCom</option>
                              <option value="BSc">BSc</option>
                              <option value="BCA">BCA</option>
                              <option value="Btech">Btech</option>
                              <option value="LLB">LLB</option>
                              <option value="BFA">BFA</option>
                              <option value="MSc">MSc</option>
                              <option value="MA">MA</option>
                              <option value="MCom">MCom</option>
                              <option value="MCA">MCA</option>
                              <option value="other graduate degree">Other Graduate Degree</option>
                              <option value="other postgraduate degree">Other Postgraduate Degree</option>
                              <option value="illiterate">illiterate</option>
                              
                              </select>
                          </div>
                      </div> 


                      </div>
                  
                  <hr>
                    <h3 v-show="form.occupation=='student'">Educational Details</h3>
                  <div v-show="form.occupation=='student'" class="row">
                    <div class="col-sm-4">
                  
                    <div class="form-group">
                      <label for ="">Education Level</label>
                      <select name="education" id="" v-model="form.education" class="form-control">
                        <option value="post graduate">Post Graduate</option>
                        <option value="graduate">Graduate</option>
                        <option value="12th">12th</option>
                        <option value="11th">11th</option>
                        <option value="10th">10th</option>
                        <option value="9th">9th</option>
                        <option value="8th">8th</option>
                        <option value="7th">7th</option>
                        <option value="6th">6th</option>
                        <option value="5th">5th</option>
                        <option value="4th">4th</option>
                        <option value="3rd">3rd</option>
                        <option value="2nd">2nd</option>
                        <option value="1st">1st</option>
                        <option value="LKG/UKG">LKG/UKG</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                      <input class="form-check-input" v-show="form.education ==='10th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='10th'" > are you appearing in class 10 in {{ 2020 | getYear}}</label>
                     <input class="form-check-input" v-show="form.education ==='12th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='12th'" > are you appearing in class 12 in {{ 2020 | getYear}}</label>
                      <input class="form-check-input" v-show="form.education ==='8th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='8th'" > are you appearing in class 8 in {{ 2020 | getYear}}</label>
                    <input class="form-check-input" v-show="form.education ==='9th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='9th'" > are you appearing in class 9 in {{ 2020 | getYear}}</label>
                    <input class="form-check-input" v-show="form.education ==='11th'" v-model="form.current_year" type="checkbox" name="current_year" value="true" :class="{'is-invalid': form.errors.has('current_year')}">
                     <label v-show="form.education ==='11th'" > are you appearing in class 11 in {{ 2020 | getYear}}</label>
                   
                   
                   
                    <label v-show="form.education ==='graduate'" >Graduation Subject</label>
                    <select v-model="form.graduation" v-show ="form.education=='graduate'" class="form-control" >
                       
                          <option value="BA">BA</option>
                          <option value="BCom">BCom</option>
                          <option value="BFA">BFA</option>
                          <option value="BSc">BSc</option>
                          <option value="Btech">Btech</option>
                          <option value="BCA">BCA</option>
                          <option value="BBA">BBA</option>
                          <option value="MBBS">MBBS</option>
                       </select>
                        <label v-show="form.education ==='post graduate'" > Post Graduation Subject</label>
                    <select v-model="form.post_graduation" v-show ="form.education=='post graduate'" class="form-control">
                        
                         <option value="MA">MA</option>
                         <option value="LLB">LLB</option>
                         <option value="MCom">MCom</option>
                         <option value="MSc">MSc</option>
                         <option value="MS">MS</option>
                         <option value="MD">MD</option>
                         <option value="MCA">MCA</option>
                         <option value="Mtech">Mtech</option>
                       </select>
                      </div>
                    </div>
                    <div class="col-sm-4" v-if="form.education === 'graduate' || form.education === 'post graduate'">
                      <label v-if="form.education === 'graduate' || form.education==='post graduate'"> Year</label>
                        <select class="form-control" v-model="form.grad_year">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th" v-if="form.graduation === 'Btech' || form.graduation==='MBBS' || form.graduation==='BFA'">4th</option>
                        <option value="5th" v-show ="form.graduation==='MBBS'">5th</option>
                        </select>
                      </div>
                    </div>
                 <div class="row">
                   <div class="col-sm-6">
                     <div class="form-group">
                       <label>Password</label>
                     <input type="password" name="password" class="form-control" v-model="form.password" :class="{'is-invalid' :form.errors.has('password') }">
                      <has-error :form="form" field="password"></has-error>
                   </div>
                   </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                       <label>Upload Image</label>
                     <input type="file" name="photo" @change="updateProfilePic" class="input-control" :class="{'is-invalid' :form.errors.has('password') }">
                      <has-error :form="form" field="password"></has-error>
                   </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-sm-6">
                   <div class="form-group">
                     <button class="btn btn-success" >Submit Form</button>
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
     data() {
        return {
          authorized:'',
          jobs:{},
          userdetail:{},
          users:{},
          mydetails:{},
          cities:{},
          userstatus:'',
              form: new Form({
              id:'',
              name:'',
              relation:'',
              gender:'',
              dob:'',
              marriage_status:'',
              matrimonial:'',
              email:'',
              mobile:'',
              blood_group:'',
              father_name:'',
              mother_name:'',
              address:'',
              city:'',
              state:'',
              occupation:'',
              department:'',
              education:'',
              graduation:'',
              post_graduation:'',
              current_year:'',
              self_data:'no',
              password:'',
              gotra:'',
              photo:'',
              allowsearch:0,
              grad_year:'',
              highest_education:'',
              spouse_name:''
            }),
            
           
        }
      },
     methods:{
       loadusers(){
         var userid = this.$route.query.userid;
         axios.get('api/checkAuth/'+ userid).then(({data})=>(this.authorized = data)); 
        // console.log(this.authorized);
       axios.get('api/getuserdetail/'+ userid).then(({data})=>(this.form.fill(data[0])));
        
        
       
      //  axios.get('api/checkUserStatus').then(({data})=>(this.userstatus=data));
        // axios.get('api/mydetails').then(({data})=>(this.mydetails=data));
          },
       
          getcity(){            
            axios.get('api/getcities/'+this.form.state).then(({data})=>(this.cities = data));
           //console.log(this.cities.target.value);
          },
          getjobs(){
             axios.get('api/getjoblist/'+this.form.occupation).then(({data})=>(this.jobs = data));
          },
         
        updateProfilePic(e){
          let file = e.target.files[0];
         console.log(file);
          let reader = new FileReader();
           
           if(file['size']<2111775){
              reader.onloadend = (file) => {
           // console.log('RESULT', reader.result)
           this.form.photo = reader.result;
          }          
           reader.readAsDataURL(file);
           }
           else{
             Swal.fire(
                'Oops',
                'File size is bigger than 2 mb.',
                'error'
              )

           }
          
        },
        updateuserdata(){
          this.$Progress.start();
       this.form.put('api/updateuserdetails/'+this.form.id)
       .then(()=>{
         // success
        
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
               
         
       })
       .catch(()=>{
          this.$Progress.fail();
       })

       this.$Progress.finish();


        },
      },
      created() {
      this.loadusers();
     
   //   console.log(this.users.data);
      //console.log(this.users);
              },
      mounted(){
       
        }
    }
</script>
