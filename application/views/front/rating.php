<div class="in-wrap">
    
    <section id="intro" class="intro-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1></h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content-section search-results">
    	<div class="container-fluid">
        	<div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Title</h4>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12 scard-body text-left">
                            	<div class="row ques-row">
                                	<div class="col-md-6 col-sm-12">
                                    	<form id="rating" action="<?php echo base_url("user/rating/$UserID/$ProviderID/$BookingID") ?>" method="post">
                                        <div class="form-group">
                                        	<ol>
                                            	<li>
                                                	<p><b>How was the overall journey experience?</b></p>
                                                    <p>
                                                        <div class="stars">
                                                        <input type="radio" name="question[0]" class="star-1" id="star-1" value="1" />
                                                        <label class="star-1" for="star-1">1</label>
                                                        <input type="radio" name="question[0]" class="star-2" id="star-2" value="2" />
                                                        <label class="star-2" for="star-2">2</label>
                                                        <input type="radio" name="question[0]" class="star-3" id="star-3" value="3"/>
                                                        <label class="star-3" for="star-3">3</label>
                                                        <input type="radio" name="question[0]" class="star-4" id="star-4" value="4"/>
                                                        <label class="star-4" for="star-4">4</label>
                                                        <input type="radio" name="question[0]" class="star-5" id="star-5" value="5"/>
                                                        <label class="star-5" for="star-5">5</label>
                                                        <span></span>
                                                        </div>
                                                    </p>
                                                </li>
                                                <li>
                                                	<p><b>Did the taxi arrive on time?</b></p>
                                                    <p>
                                                        <div class="stars">
                                                        <input type="radio" name="question[1]" class="star-1" id="star-6" value="1" />
                                                        <label class="star-1" for="star-6">1</label>
                                                        <input type="radio" name="question[1]" class="star-2" id="star-7" value="2" />
                                                        <label class="star-2" for="star-7">2</label>
                                                        <input type="radio" name="question[1]" class="star-3" id="star-8" value="3"/>
                                                        <label class="star-3" for="star-8">3</label>
                                                        <input type="radio" name="question[1]" class="star-4" id="star-9" value="4"/>
                                                        <label class="star-4" for="star-9">4</label>
                                                        <input type="radio" name="question[1]" class="star-5" id="star-10" value="5"/>
                                                        <label class="star-5" for="star-10">5</label>
                                                        <span></span>
                                                        </div>
                                                    </p>
                                                </li>
                                                <li>
                                                	<p><b>How friendly was the taxi driver?</b></p>
                                                    <p>
                                                        <div class="stars">
                                                        <input type="radio" name="question[2]" class="star-1" id="star-11" value="1" />
                                                        <label class="star-1" for="star-11">1</label>
                                                        <input type="radio" name="question[2]" class="star-2" id="star-12" value="2" />
                                                        <label class="star-2" for="star-12">2</label>
                                                        <input type="radio" name="question[2]" class="star-3" id="star-13" value="3"/>
                                                        <label class="star-3" for="star-13">3</label>
                                                        <input type="radio" name="question[2]" class="star-4" id="star-14" value="4"/>
                                                        <label class="star-4" for="star-14">4</label>
                                                        <input type="radio" name="question[2]" class="star-5" id="star-15" value="5"/>
                                                        <label class="star-5" for="star-15">5</label>
                                                        <span></span>
                                                        </div>
                                                    </p>
                                                </li>
                                                <li>
                                                	<p><b>How would you rate the cleanliness of the taxi provided?</b></p>
                                                    <p>
                                                        <div class="stars">
                                                        <input type="radio" name="question[3]" class="star-1" id="star-16" value="1" />
                                                        <label class="star-1" for="star-16">1</label>
                                                        <input type="radio" name="question[3]" class="star-2" id="star-17" value="2" />
                                                        <label class="star-2" for="star-17">2</label>
                                                        <input type="radio" name="question[3]" class="star-3" id="star-18" value="3"/>
                                                        <label class="star-3" for="star-18">3</label>
                                                        <input type="radio" name="question[3]" class="star-4" id="star-19" value="4"/>
                                                        <label class="star-4" for="star-19">4</label>
                                                        <input type="radio" name="question[3]" class="star-5" id="star-20" value="5"/>
                                                        <label class="star-5" for="star-20">5</label>
                                                        <span></span>
                                                        </div>
                                                    </p>
                                                </li>
                                                <li>
                                                	<p><b>Would you recommend this service to a friend?</b></p>
                                                    <p>
                                                        <div class="stars">
                                                        <input type="radio" name="question[4]" class="star-1" id="star-21" value="1" />
                                                        <label class="star-1" for="star-21">1</label>
                                                        <input type="radio" name="question[4]" class="star-2" id="star-22" value="2" />
                                                        <label class="star-2" for="star-22">2</label>
                                                        <input type="radio" name="question[4]" class="star-3" id="star-23" value="3"/>
                                                        <label class="star-3" for="star-23">3</label>
                                                        <input type="radio" name="question[4]" class="star-4" id="star-24" value="4"/>
                                                        <label class="star-4" for="star-24">4</label>
                                                        <input type="radio" name="question[4]" class="star-5" id="star-25" value="5"/>
                                                        <label class="star-5" for="star-25">5</label>
                                                        <span></span>
                                                        </div>
                                                    </p>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="form-group">
                                          <div class="col-md-4 col-md-offset-4">
                                            <button type="submit" class="btn btn-yellow btn-block">Submit</button>
                                          </div>
                                        </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-12">
                                    	<table class="table table-bordered">
                                        	<tr>
                                                <td><strong>Company</strong></td>
                                                <td><?php echo $provider_details['CompanyName'] ?></td>
                                            </td>
                                            <tr>
                                                <td><strong>Address</strong></td>
                                                <td><?php echo $provider_details['StreetAddress'] ?></td>
                                            </td>
                                            <tr>
                                                <td><strong>Phone No</strong></td>
                                                <td><?php echo $provider_details['ContactNumber'] ?></td>
                                            </td>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>