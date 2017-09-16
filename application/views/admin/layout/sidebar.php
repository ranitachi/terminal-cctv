<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url()?>assets/img/png/120x120 pixel-02.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$user->nama?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?=$menu=='home' ? 'active' : ''?>">
        <a href="<?=site_url()?>admin"><i class="fa fa-home"></i> <span>Home</span></a>
      </li>
      <li class="<?=$menu=='terminal' ? 'active' : ''?>">
        <a href="<?=site_url()?>admin/terminal"><i class="fa fa-automobile"></i> <span>Terminal</span></a>
      </li>

        <li class="<?=$menu=='cctv' ? 'active' : ''?>">
          <a href="<?=site_url()?>admin/cctv"><i class="fa fa-video-camera"></i> <span>CCTV</span></a>
        </li>
    <?
    if($user->level==1 || $user->level==3)
    {
    ?>
      <li class="<?=$menu=='user' ? 'active' : ''?>">
        <a href="<?=site_url()?>admin/user"><i class="fa fa-users"></i> <span>User</span></a>
      </li>
      <?

    }
    ?>
      <li class="<?=$menu=='news' ? 'active' : ''?>">
        <a href="<?=site_url()?>admin/news"><i class="fa fa-newspaper-o"></i> <span>Berita</span></a>
      </li>
      <li class="<?=$menu=='schedule' ? 'active' : ''?>">
        <a href="<?=site_url()?>admin/schedule"><i class="fa fa-calendar"></i> <span>Schedule</span></a>
      </li>
      <?
      if($user->level==1)
      {
      ?>
      <li class="treeview <?=$menu=='config' ? 'active' : ''?>">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Config</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=(isset($submenu) ? ($submenu=='aboutus' ? 'active' : '') : '' )?>"><a href="<?=site_url()?>config/aboutus">About Terminal-ku</a></li>
            <li class="<?=(isset($submenu) ? ($submenu=='video' ? 'active' : '') : '' )?>"><a href="<?=site_url()?>config/video">Video Profile</a></li>
          </ul>
        </li>
      <?
      }
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
