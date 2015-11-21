<?php $this->pageTitle=Yii::app()->name; ?>

<h1>স্বাগতম <i><?php echo CHtml::encode(Yii::app()->name); ?></i> এ</h1>


<?php if(Yii::app()->user->isGuest):?>
<p>
    <?php 
        $locale = Yii::app()->getLocale('bn_bd');
        Yii::import('application.apis.*');
        $BanglaDate=new ShowBanglaDateTime();
        $bn = new BanglaDate(time());
        $bn->set_time(time());
        $bdate = $bn->get_date();
        
        echo $BanglaDate->bangla_date_time(date('l')).', '.$bdate[0]  . ' ' . $bdate[1] . ' ' . $bdate[2] . ' '. $BanglaDate->bangla_date_time(date('h:i:s A')).'( '; 
        echo  $locale->dateFormatter->formatDateTime(time(),'full').' )';
    ?>
</p>
<?php endif;?>


<?php if(!Yii::app()->user->isGuest):?>
<p>
আপনার শেষ লগ ইন 
    <?php 
        $locale = Yii::app()->getLocale('bn_bd');
        Yii::import('application.apis.*');
        $BanglaDate=new ShowBanglaDateTime();
        $bn = new BanglaDate(time());
        $bn->set_time(Yii::app()->user->lastLoginTime);
        $bdate = $bn->get_date();
        
        echo $BanglaDate->bangla_date_time(date('l', Yii::app()->user->lastLoginTime)).', '.$bdate[0]  . ' ' . $bdate[1] . ' ' . $bdate[2] . ' '. $BanglaDate->bangla_date_time(date('h:i:s A', Yii::app()->user->lastLoginTime)).'( '; 
        echo  $locale->dateFormatter->formatDateTime(Yii::app()->user->lastLoginTime,'full').' )';
    ?>
</p>
<?php
//    echo '<br><hr>';
//    echo $locale->numberFormatter->formatCurrency(123.12, 'BDT');
//    $int = 123.12;
//    $engNumber = array(1,2,3,4,5,6,7,8,9,0);
//    $bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
//    echo $converted = str_replace($engNumber, $bangNumber, $int);
?>
<?php endif;?>