<body>
 
<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>/home/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box"></i><span>DOC</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>/doc/sidebar">
              <i class="bi bi-circle"></i><span>Kelola DOC</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>/doc/inputData">
              <i class="bi bi-circle"></i><span>Tambah Data DOC</span>
            </a>
          </li>
        </ul>
      </li><!-- End DOC Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house"></i><span>Kandang</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>/kandang/sidebar">
              <i class="bi bi-circle"></i><span>Kelola Kandang</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>/kandang/inputData">
              <i class="bi bi-circle"></i><span>Tambah Data Kandang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Kandang Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Peternak</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>/peternak/sidebar">
              <i class="bi bi-circle"></i><span>kelola Peternak</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>/peternak/inputData">
              <i class="bi bi-circle"></i><span>Tambah Data Peternak</span>
            </a>
          </li>
        </ul>
      </li><!-- End Peternak Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-circle"></i><span>PPL</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>/ppl/sidebar">
              <i class="bi bi-circle"></i><span>Kelola PPL</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>/ppl/inputData">
              <i class="bi bi-circle"></i><span>Tambah Data PPL</span>
            </a>
          </li>
        </ul>
      </li><!-- End PPL Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard-data"></i><span>Recording</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>/peternak/pilihan">
              <i class="bi bi-circle"></i><span>Kelola Recording</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>/periode/sidebar">
              <i class="bi bi-circle"></i><span>Kelola Periode</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> -->
      <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>/user/sidebar">
          <i class="bi bi-card-list"></i>
          <span>Kelola Akun</span>
        </a>
      </li><!-- End Register Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->