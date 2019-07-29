<?php include 'head.php' ?>
 <?php include 'header.php' ?>
<div class="col-md-6 create_account_left_bx">
                	<h2>Create Student Account</h2>
                   
                    <p>You will be able take part in various online examination for the purpose of self assesment!.        
                    </p>

        
                    
                     <div class="col-md-12">
                     	  <form id="login-form" action="#" method="post" role="form" style="display: block;">
                            
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="stufname">First Name :</label>
                              <input type="text" class="form-control" name="stufname" value="" required="" id="stufname" placeholder="Eg: Dr. Gregor">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="stulname">Last Name :</label>
                              <input type="text" class="form-control" name="lname" value="" required="" id="stulname" placeholder="Eg: John Mendel">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="stugender">Gender :</label>
                         
                              <select required class="form-control from-control-login" name="gender" id="stugender">
                                <option value="">Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="stumobile">Mobile :</label>
                              <input type="text" class="form-control" placeholder="Example: 01678076362" value="" name="mobile" required="" minlength="11" id="stumobile">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="stuemail">Email :</label>
                              <input type="email" name="email" value="" placeholder="someone@gmail.com" required="" class="form-control" id="stuemail">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="stulofedu">Last Level Of Education :</label>
                              <select name="lvlOfEdu" required="" class="form-control from-control-login" id="stulofedu">
                                     <option value="">Select</option>
                                     <option value="1"> JSC </option>
                                     <option value="3"> HSC </option>
                                     <option value="2"> B.SC </option>
                                     <option value="4"> BA </option>
                                     <option value="5"> B.Com </option>
                                     <option value="6"> M.Sc </option>
                                     <option value="39"> MA </option>
                              </select>
                            </div>
                        <div class="clear"></div>
    
                            
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="stupass">Password :</label>
                              <input type="password" name="password" class="form-control" id="stupass" required="" placeholder="Eg: Ab@123456" />
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="sturepass">Re-Enter Password :</label>
                              <input type="password" name="repassword" class="form-control" id="sturepass" required="" placeholder="Eg: as same as your password" />
                            </div>
                            <div class="col-md-4 col-xs-offset-1 cre_btn_padding"><button type="submit" name="login-submit" class="btn btn-primary"> Create Account </button></div>
                            </form>
                         
                            
                             <div class="col-md-10 col-xs-offset-1 cre_btn_padding">
                               <h2> Already a Registered? Please LogIn? <a href="#"> <span style="color: Green;"> LogIn </span> </a> <br />
                               </h2>
                            </div>

                      <!--  <div class="col-md-12">
                                <div class="col-md-3"><h4> Connect with <i class="fa fa-question-circle"></i></h4></div>
                                <div class="col-md-9">
                                    <a class="btn btn-fb" href="#"> 
                                      <i class="fa fa-facebook left"></i> 
                                    Facebook
                                    </a> 
                                </div>
                            </div>-->
                          
                     </div>
                     
                    
                </div>

<?php include 'footer.php' ?>