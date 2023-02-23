<div class="panel-group smart-accordion-default" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Data Primer <i>klik untuk melihat</i> </a></h4> 
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body" style="height:150px; overflow: auto;">
      <table id="" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
      <tr>
       <th data-class="expand">
         Nama Variabel </th>
        <th data-class="expand">
         Nama Field </th>
        <th data-hide="phone">
        Tipe Field</th>
        <th data-hide="phone">
        Panjang</th>
        
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach($data['primer'] as $columns):

              $nama_kolom = $columns->name;
              $tipe_kolom = explode('(', $columns->dbType);
              $tipe_kolom = $tipe_kolom[0];
              $panjang_kolom = $columns->size;
        ?>
        <tr>
          <td><?php echo "$".$nama_kolom."$"; ?></td>
          <td><?php echo $nama_kolom; ?></td>
          <td><?php echo $tipe_kolom; ?></td>   
          <td><?php echo $panjang_kolom; ?></td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
</table>
       
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Data Sekunder  <i>klik untuk melihat</i> </a></h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body" style="height:150px; overflow: auto;">
       <table id="" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
      <tr>
       <th data-class="expand">
         Nama Variabel </th>
        <th data-class="expand">
         Nama Field </th>
        <th data-hide="phone">
        Tipe Field</th>
        <th data-hide="phone">
        Panjang</th>
        
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach($data['sekunder'] as $columns):

              $nama_kolom = $columns->name;
              $tipe_kolom = explode('(', $columns->dbType);
              $tipe_kolom = $tipe_kolom[0];
              $panjang_kolom = $columns->size;
        ?>
        <tr>
          <td><?php echo "$".$nama_kolom."$"; ?></td>
          <td><?php echo $nama_kolom; ?></td>
          <td><?php echo $tipe_kolom; ?></td>   
          <td><?php echo $panjang_kolom; ?></td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
</table>
      </div>
    </div>
  </div>
</div> 