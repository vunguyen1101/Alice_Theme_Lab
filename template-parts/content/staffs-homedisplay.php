<div class="col-lg-3 col-sm-6">
    <div class="ExpertTag">
        <div class="ImgExpertHover">
            <?php	  
            if( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
            ?>
            <div class="ExpertTagHover"><span class="ion-ios-eye"></span></div>
        </div>
        <?php $staffs = get_field('staffs'); ?>
        <div class="NameExpert"><?php echo $staffs['name_staff']; ?></div>
        <div class="CExpert">
            <?php echo $staffs['major']; ?>
        </div>
        <hr class="TeamHR">
        <div class="socialNet">
            <span><a class="ion-social-facebook" href="<?php echo $staffs['staff_contact']['facebook']; ?>"></a></span>
            <span><a class="ion-social-twitter" href="<?php echo $staffs['staff_contact']['facebook']; ?>"></a></span>
            <span><a class="ion-social-googleplus" href="<?php echo $staffs['staff_contact']['facebook']; ?>"></a></span>
            <span><a class="ion-social-linkedin" href="<?php echo $staffs['staff_contact']['facebook']; ?>"></a></span>
        </div>
    </div>
</div>
