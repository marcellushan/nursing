<div class="main container">
    <div class="row">
		<div class="col-sm-8  right-border">
            <h1 class="wrapper">New Applicants</h1>
                <h1 class="mytitle">Application for Admission<br>
                    RN/BSN Program
                    <br>Fall 2017
                </h1>


                <h2>The Nursing Program is competitive with a limited number of seats.</h2>
                <h3>
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vivamus suscipit tortor eget felis porttitor volutpat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus
                    convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus.
                </h3>

                <form action="<?=base_url("home/display/create_applicant")?>" method="post" id="welcome">

            <div class="mytitle"><div class="col-sm-4 col-sm-offset-4"><button type="submit"class="btn btn-lg btn-success">Continue to Application</button></div></div>
                </form>
        </div><!--col-sm-6 -->
        <div class="col-sm-4">
                <h1 class="wrapper">Returning Applicants</h1>
                <h3>Previous applicants login here to complete application or address issues</h3>
            <br>
            <h4>
                <form action='<?=base_url("home/checkLogin")?>' method="post" id="login">
                    <fieldset>
                        <div class="row">
                            <label class="col-md-5 col-sm-12">Email Address </label><input type="text"  class="col-md-5  col-sm-12" name="email">
                        </div><!--row -->
                        <div class="row">
                            <label class="col-md-5 col-sm-12">Password</label>
                            <input type="password"  class="col-md-5  col-sm-12" name="password" id="password" >
                        </div><!--row -->
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4"><button type="submit"class="btn btn-sm btn-success">Submit</button></div>

                        </div>
                    </fieldset>
                </form>
            </h4>
        </div><!--col-sm-6 -->
     </div><!--row -->
    </div><!-- container -->


