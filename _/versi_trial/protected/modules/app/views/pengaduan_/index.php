<?php 
    if(Yii::app()->user->isGuest == 'T') {
        $style = 'span12';
    } else {
        $style = 'span9';
    }
?>
<div class="main-content">
    <div class="container">
        <div class="row show-grid">
            <div class="<?php echo $style;?>">
                <div class="row show-grid">
                    <div class="<?php echo $style;?> main-column">                        
                        <h1>Pertanyaan-pertanyaan Seputar Perizinan Online</h1>
                        <div class="text-divider1"></div>                        
                       <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/faq.jpg" width="100%">
                        <div id="accordion2" class="accordion">
                            <div class="accordion-group">
                             <?php $no=1; foreach ($data_faq as $faq): ?>
                                <div class="accordion-heading">
                                    <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?php echo $faq['tblfaqanswer_id'] ?>" class="accordion-toggle collapsed" style="color: blue;">
                                         <?php echo $no++;?>. <?php echo $faq['tblfaq_pertanyaan']; ?>
                                    </a>
                                </div>
                                <div id="collapse<?php echo $faq['tblfaqanswer_id'] ?>" class="panel-collapse collapse" style="height: 0px; margin-left: 69px;">
                                    <div class="panel-body">
                                        <ul>
                                            <li><?php echo $faq['tblfaqanswer_jawaban']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
