<div class="breadLine">
    <ul class="breadcrumb">
        <li><a href="<?php echo BASE_URL . LIST_USER; ?>">List Users</a> <span class="divider">></span></li>
        <li class="active"><?php echo $title;?></li>
    </ul>
</div>

<div class="workplace">
    <div class="row-fluid">
        <div class="span12">
            <div class="head">
                <div class="isw-grid"></div><h1>Users Management</h1><div class="clear"></div>
            </div>

            <div class="block-fluid">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="row-form">
                        <div class="span3">Username:</div>
                        <div class="span9">
                            <input type="text" placeholder="some text value..." name="username" value="<?php getData($user, 'username'); ?>"/>
                            <p id='notifyMessage'><?php getData($message, 'name'); ?></p>
                        </div>
                        <div class="clear"></div>
                    </div> 

                    <div class="row-form">
                        <div class="span3">Email:</div>
                        <div class="span9">
                            <input type="text" placeholder="some text value..." name="email" value="<?php getData($user, 'user_email'); ?>"/>
                            <p id='notifyMessage'><?php getData($message, 'email'); ?></p>
                        </div>
                        <div class="clear"></div>
                    </div> 

                    <div class="row-form">
                        <div class="span3">Password:</div>
                        <div class="span9">
                            <input type="password" placeholder="some text value..." name="pass" value="<?php getData($user, 'pass'); ?>"/>
                            <p id='notifyMessage'><?php getData($message, 'pass'); ?></p>
                        </div>
                        <div class="clear"></div>
                    </div> 

                    <div class="row-form">
                        <div class="span3">Upload Avatar:</div>
                        <div class="span9">
                            <?php 
                                if(!empty($user['user_img'])) { ?>
                                    <img src="<?php getImage($user['user_img'])?>" alt="Old Image" width="50" height="50">
                                    <input type="checkbox" name="checkdel">Delete
                                    <br>
                                <?php }
                            ?>
                            <input type="file" name="fileToUpload">
                            <p id='notifyMessage'><?php echo getData($message, 'img'); ?></p>
                        </div>
                        <div class="clear"></div>
                    </div> 

                    <div class="row-form">
                        <div class="span3">Activate:</div>
                        <div class="span9">
                            <select name="status">
                            <?php
                                // Check page add
                                if(!isset($user['user_id'])) $user['status'] = 1;

                                // Check page edit
                                if(empty($user['status']) ) $user['status'] = 0;

                            ?>
                            <option value = '<?=ACTIVE_VALUE;?>' <?php if($user['status'] == ACTIVE_VALUE) echo 'selected';?>>Activate</option>
                            <option value = '<?=DEACTIVE_VALUE;?>' <?php if($user['status'] == DEACTIVE_VALUE) echo 'selected';?>>Deactivate</option>

                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row-form">
                        <button class="btn btn-success" type="submit" name="<?php echo $btnName;?>"><?php echo $title;?></button>
                        <div class="clear"></div>
                    </div>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="dr"><span></span></div>

</div>