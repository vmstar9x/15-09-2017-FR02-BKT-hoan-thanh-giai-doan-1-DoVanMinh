<div class="breadLine">
    <ul class="breadcrumb">
        <li><a href="<?php echo BASE_URL . LIST_USER?>">List Users</a></li>
    </ul>
</div>

<div class="workplace">
    <div class="row-fluid">
        <div class="span12 search">
            <form method="GET" action="<?php echo BASE_URL . SHOW_USER; ?>">
                <input type="text" class="span11" placeholder="Some text for search..." name="search" value="<?php echo $valueSearch;?>"/>
                <button class="btn span1" type="submit" name = "btn-search-user" value="Search">Search</button>
            </form>
        </div>
    </div>
    <!-- /row-fluid-->

    <div class="row-fluid">

        <div class="span12">
            <div class="head">
                <div class="isw-grid"></div>
                <h1>Users Management</h1>
                <div class="clear"></div>
            </div>

            <div class="block-fluid table-sorting">
                <a href="<?php echo BASE_URL . ADD_USER; ?>" class="btn btn-add">Add User</a>
                
                <center><p id='notifyMessage'></p></center>

                <?php if($count != 0) {?>

                 <form action="<?php echo BASE_URL . ACTIVE_USER ?>" method="POST">
                <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                    <thead>
                        <tr>
                            <?php
                                if(empty($_GET['search']))  $_GET['search'] = '';
                                if(empty($_GET['page']))    $_GET['page'] = 1;
                                if(isset($_SESSION['checkBox'])) echo $_SESSION['checkBox'];
                                unset($_SESSION['checkBox']);
                            ?>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th width="15%" class="sorting"><a href="<?php pathShow(SHOW_USER, 'user_id', getSortType('user_id'), $_GET['page'], $_GET['search']); ?>">ID</a></th>
                            <th width="35%" class="sorting"><a href="<?php pathShow(SHOW_USER, 'username', getSortType('username'), $_GET['page'], $_GET['search']); ?>">Username</a></th>
                            <th width="20%" class="sorting"><a href="<?php pathShow(SHOW_USER, 'status', getSortType('status'), $_GET['page'], $_GET['search']); ?>">Activate</a></th>
                            <th width="10%" class="sorting"><a href="<?php pathShow(SHOW_USER, 'user_time_created', getSortType('user_time_created'), $_GET['page'], $_GET['search']); ?>">Time Created</a></th>
                            <th width="10%" class="sorting"><a href="<?php pathShow(SHOW_USER, 'user_time_updated', getSortType('user_time_updated'),  $_GET['page'], $_GET['search']); ?>">Time Updated</a></th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lists as $list) { ?>
                            <tr>
                                <td><input class="case" type="checkbox" value="<?=$list['user_id'];?>" name="checkbox[]"/></td>
                                <td><a href="<?=BASE_URL . EDIT_USER . '/' . $list['user_id']; ?>"><?=$list['user_id'] ?></a></td>
                                <td><?=htmlentities($list['username']); ?></td>
                                <td><?=($list['status'] == ACTIVE_VALUE) ? "<span class='text-success'>Activated</span>" : "<span class='text-error'>Deactive</span>";?></td>
                                <td><?=getDateFormat($list['user_time_created'])?></td>
                                <td><?=getDateFormat($list['user_time_updated'])?></td>
                                <td><a href="<?=BASE_URL . EDIT_USER . '/' . $list['user_id']; ?>" class="btn btn-info">Edit</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="bulk-action">
                    <input type="submit" class="btn btn-success" name="btn-ac" value="Activate">
                    <input type="submit" class="btn btn-danger" name="btn-dac" value="Deactive">
                </div><!-- /bulk-action-->
                 </form>

                 <?php } else {
                        echo "<p><center><i>No User</p></center></i>";
                    }
                 ?>
                <div class="dataTables_paginate">
                    <?=$page_links;?>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>
    <div class="dr"><span></span></div>

</div>