<ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link <?php if($subtitle == 'Account'){ ?>active<?php } ?> " href="{{url('settings-account')}}"><i class="bx bx-user me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link <?php if($subtitle == 'Security'){ ?>active<?php } ?>" href="{{url('settings-security')}}"><i class="bx bx-lock-alt me-1"></i> Security</a></li>
      <!-- <li class="nav-item"><a class="nav-link <?php if($subtitle == 'Billings & Plans'){ ?>active<?php } ?>" href="{{url('settings-billing')}}"><i class="bx bx-detail me-1"></i> Billing & Plans</a></li> -->
      <!-- <li class="nav-item"><a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-account-settings-connections.html"><i class="bx bx-link-alt me-1"></i> Connections</a></li> -->
    </ul>