<!-- ************************************** MEDIA ***************************************************-->
        <div class="col-md-8" >
          <h3>Media Share</h3>
          <div class="div-graph-media">
            <!--BARIS 1-->
              <div  class="graph-media-left">
                <div class="gm-left-left">
                  <a href="#" title="republika">
                    <img src="<?php echo base_url().'assets/images/media_republika.png'?>">
                    <h5>nn.nn%</h5>
                  </a>
                </div>
                <div  class="gm-left-right">
                  <a href="#" title="media">
                    <img src="<?php echo base_url().'assets/images/media_kompas.png'?>">
                    <h5>nn.nn%</h5>
                  </a>
                </div>
              </div>

              <div class="graph-media-right">
                <div class="gm-right-left">
                  <a href="#" title="republika">
                    <img src="<?php echo base_url().'assets/images/media_republika.png'?>">
                    <h5>nn.nn%</h5>
                  </a>
                </div>
                <div class="gm-right-right">
                  <a class="gm-a" href="#" title="media">
                    <img src="<?php echo base_url().'assets/images/media_kompas.png'?>">
                    <h5>nn.nn%</h5>
                  </a>
                </div>
              </div>
              <!--BARIS 1-->

          </div>
        </div>
<!-- ************************************** MEDIA ***************************************************-->
<style>
/*--------------------------------------------------media---------------------------------------------------------------------*/

.div-graph-media{
  border: 2px solid grey;
  height:350px;
}

.graph-media-left{
  align:middle;
  width: 50%;
  height:50px;
  display:inline-block;
  float: left;
}

.gm-left-left{
  border:1px solid grey;
  width: 46%;
  height: 40px;
  float: left;
  margin: 2%;
}

.gm-left-right{
  border:1px solid grey;
  width: 46%;
  height: 40px;
  float: right;
  margin: 2%;
}

.graph-media-right{
  align:middle;
  width: 50%;
  height:50px;
  display:inline-block;
  float: right;
}

.gm-right-left{
  border:1px solid grey;
  width: 46%;
  height: 40px;
  float: left;
  margin: 2%;
}

.gm-right-right{
  border:1px solid grey;
  width: 46%;
  height: 40px;
  float: right;
  margin: 2%;
}

.gm-left-left a, .gm-left-right a, .gm-right-left a, .gm-right-right a{
  text-decoration: none;
}

.gm-left-left a img, .gm-left-right a img, .gm-right-left a img, .gm-right-right a img{
  align:center;
  width:65%;
  padding: 5% 2% 5% 2%;
  display: inline-block;
  float: left;
}

.gm-left-left a h5, .gm-left-right a h5,.gm-right-left a h5, .gm-right-right a h5{
  align:center;
  color:rgb(84,74,255) ;
}
/*--------------------------------------------------media---------------------------------------------------------------------*/



</style>
