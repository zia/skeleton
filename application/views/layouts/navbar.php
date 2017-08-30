<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Navigation Bar-->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url();?>"><i class="fa fa-home" aria-hidden="true"></i> Skeleton</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=site_url('books')?>"><i class="fa fa-book" aria-hidden="true"></i> Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-link" aria-hidden="true"></i> Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><i class="fa fa-wheelchair" aria-hidden="true"></i> Disabled</a>
                </li>
            </ul>
            <?php
                $attributes = array('class' => 'form-inline my-2 my-lg-0');
                echo form_open('', $attributes);
            ?>
            <!--<form class="form-inline my-2 my-lg-0">-->
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="q">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <!--</form>-->
            <?=form_close()?>
        </div>
    </nav>
    <!-- NavBar Ends-->