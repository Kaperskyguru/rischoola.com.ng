<div class="container-fluid">
    <div class="row">
        <div id ="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div style="width: 100%; height: 350px; background-color: transparent;
    background: linear-gradient(to bottom, #BDBFC1,#000);">
                        
                    </div>

                   
                </div>
                <div class="item">
                    <div style="width: 100%; height: 350px; background-color: transparent;
    background: linear-gradient(to bottom, #2d364c ,#f44337); ">
                        
                    </div>
                </div>
                <div class="item">
                    <div style="width: 100%; height: 350px; background-color: transparent;
    background: linear-gradient(to bottom,#f44337 , #1579BB);">
                        
                    </div>
                </div>
                <div class="item">
                    <div style="width: 100%; height: 350px;  background-color: transparent;
    background: linear-gradient(to bottom,#5cb85c , #1579BB);  ">
                        
                    </div>
                </div>
                <div class="carousel-caption">
                    <div class="text-center">
                        <h1 class="site-slogan white-text hidden-xs" >Schooling in Rivers State just got easier</h1>
                        <h5  class="site-slogan white-text  hidden-xs">Search a School Category and Get Latest Information About Them</h5>
                        <h5  class="site-slogan white-text visible-xs">Schooling in Rivers State just got easier</h5>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <select class="form-control" id="school_type">
                                    <option disabled="ture" selected="">Select School Category</option>
                                    <option value= 1>University</option>
                                    <option value= 2>Polytecnic</option>
                                    <option value= 3>Colledges</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <select class="form-control" id="list_of_schools">
                                <option disabled="true" selected="">Select a school from here to get latest information</option>
                                    <?php $schoolController->get_schools();?>
                                </select>

                            </div>
                            <div class="col-sm-2 form-group">
                                <button class="btn btn-success form-control" >Go to Page</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
