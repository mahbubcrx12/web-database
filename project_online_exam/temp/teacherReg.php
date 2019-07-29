<?php include 'head.php' ?>
 <?php include 'header.php' ?>
<div class="col-md-6 create_account_left_bx">
                	<h2>Create Teacher Account</h2>
                   
                    <p>You will be able create question sets and judge the marks for the puropse of judging your students!.        
                    </p>

     
                    
                     <div class="col-md-12">
                     	  <form id="login-form" action="#" method="post" role="form" style="display: block;">
                            
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="teachfname">First Name :</label>
                              <input type="text" class="form-control" name="fname" value="" required="" id="teachfname" placeholder="Eg: Dr. Gregor">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="teachlname">Last Name :</label>
                              <input type="text" class="form-control" name="lname" value="" required="" id="teachlname" placeholder="Eg: John Mendel">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="techgender">Gender :</label>
                         
                              <select required class="form-control from-control-login" name="gender" id="techgender">
                                <option value="">Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="techmobile">Mobile :</label>
                              <input type="text" class="form-control" placeholder="Eg: 01678076362" value="" name="techmobile" required="" minlength="11" id="techmobile">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="techemail">Email :</label>
                              <input type="email" name="email" value="" placeholder="Eg: someone@gmail.com" required="" class="form-control" id="techemail">
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="techexp">Teaching Experience :</label>
                              <select name="techexp" id="techexp" required="" class="form-control from-control-login">
                                     <option value="">Select</option>
                                     <option value="1"> less than 1 Year </option>
                                     <option value="3"> 2 Years </option>
                                     <option value="2"> 3 years </option>
                                     <option value="4"> 4 Years </option>
                                     <option value="5"> 5 Years </option>
                                     <option value="6"> More than 5 Years </option>
                              </select>
                            </div>
                        <div class="clear"></div>
    
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="techpass">Password :</label>
                              <input type="password" name="password" class="form-control" id="techpass" required="" placeholder="Eg: Ab@123456" />
                            </div>
                            <div class="form-group col-md-4 col-xs-offset-1">
                              <label for="techrepass">Re-Enter Password :</label>
                              <input type="password" name="repassword" class="form-control" id="techrepass" required="" placeholder="Eg: as same as your password" />
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