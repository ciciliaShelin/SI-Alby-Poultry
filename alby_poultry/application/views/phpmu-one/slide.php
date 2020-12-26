<?php 
      echo "<div class='jumbotron'>
          <div class='slider-wrapper theme-default'>
            <div id='slider' class='nivoSlider'>";
                  $slider = $this->model_main->slide();
                  foreach ($slider->result_array() as $row){
                        echo "<img style='height:285px; weight:250px;'  class='img-thumbnail'  src='".base_url()."asset/foto_slide/".$row['gambar']."' title='".$row['keterangan']."'>";
                  }
      echo "</div>
          </div>
      </div>";