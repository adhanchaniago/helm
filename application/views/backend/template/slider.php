<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?php echo base_url() ?>templateBackend/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              Hizrian
              <span class="user-level">Administrator</span>
              <!-- <span class="caret"></span> -->
            </span>
          </a>
          <div class="clearfix"></div>

          <!-- <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#profile">
                  <span class="link-collapse">My Profile</span>
                </a>
              </li>
              <li>
                <a href="#edit">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>
              <li>
                <a href="#settings">
                  <span class="link-collapse">Settings</span>
                </a>
              </li>
            </ul>
          </div> -->
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item">
          <a href="<?php echo base_url('admin/dashboard/') ?>" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Master Produk</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo base_url('admin/produk/') ?>">
                  <span class="sub-item">Produk</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/kategori/') ?>">
                  <span class="sub-item">Kategori</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/merk/') ?>">
                  <span class="sub-item">Merk</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/warna/') ?>">
                  <span class="sub-item">Warna</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/ukuran/') ?>">
                  <span class="sub-item">Ukuran</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/supplier/') ?>">
                  <span class="sub-item">Supplier</span>
                </a>
              </li>
            </ul>
          </div>
				</li>
				<li class="nav-item">
          <a data-toggle="collapse" href="#base1">
            <i class="fas fa-layer-group"></i>
            <p>Master Frontend</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base1">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo base_url('admin/slide/') ?>">
                  <span class="sub-item">Slide</span>
                </a>
              </li>
              
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
