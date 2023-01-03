<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
            <a href="{{url('/Serveyor')}}" class="app-brand-link">
              <img src="{{asset('public/assets/img/logo.png')}}" style="width: 100%;"> 
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
    
    <ul class="menu-inner">
     <li class="menu-item {{ (request()->is('Serveyor')) ? 'active' : '' }}">
        <a href="{{url('Serveyor')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>
      

      <li class="menu-item">
        <a href="{{url('surveyor/serveyorInsurer')}}" class="menu-link">
          <i class="menu-icon tf-icons fa fa-list-alt"></i>
          <div data-i18n="Insurer">Insurer</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url('surveyor/serveyorBankAccounts')}}" class="menu-link">
          <i class="menu-icon tf-icons fa fa-university"></i>
          <div data-i18n="Bank Accouts">Bank Accounts</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url('serveyor/urlGenerated')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-link-alt"></i>
          <div data-i18n="url generator">URL Generator</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url('report-list')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-list-ul"></i>         
          <div data-i18n="Reports">Report List</div>
        </a>
      </li>
      <?php $surv_privileges_arr = explode(',',session('surv_privileges')); ?>
@php
        if(in_array(1, $surv_privileges_arr)){
     @endphp    
      <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Spot</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="app-user-list.html" class="menu-link">
            <div data-i18n="List">S1</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="View">S2</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="app-user-view-account.html" class="menu-link">
                <div data-i18n="Account">S3</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    @php } @endphp


@php
        if(in_array(2, $surv_privileges_arr)){
     @endphp    
     <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Final</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="app-user-list.html" class="menu-link">
            <div data-i18n="List">S1</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="View">S2</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="app-user-view-account.html" class="menu-link">
                <div data-i18n="Account">S3</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
@php } @endphp


    @php
        if(in_array(3, $surv_privileges_arr)){
     @endphp    

     <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Reinspection</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="app-user-list.html" class="menu-link">
            <div data-i18n="List">S1</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="View">S2</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="app-user-view-account.html" class="menu-link">
                <div data-i18n="Account">S3</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    @php } @endphp

@php
        if(in_array(4, $surv_privileges_arr)){
     @endphp    
     <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Valuation</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="app-user-list.html" class="menu-link">
            <div data-i18n="List">S1</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="View">S2</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="app-user-view-account.html" class="menu-link">
                <div data-i18n="Account">S3</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
@php } @endphp

@php
        if(in_array(5, $surv_privileges_arr)){
     @endphp    
     <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Acounting</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="app-user-list.html" class="menu-link">
            <div data-i18n="List">S1</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="View">S2</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="app-user-view-account.html" class="menu-link">
                <div data-i18n="Account">S3</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    @php } @endphp

@php
        if(in_array(6, $surv_privileges_arr)){
     @endphp     
  <li class="menu-item">
        <a href="{{url('reports/add-album')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-photo-album"></i>
          <div data-i18n="Album">Album</div> 
        </a>
  </li>
@php } @endphp

<?php   if(in_array(7, $surv_privileges_arr)){ ?>
 <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Users</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="app-user-list.html" class="menu-link">
            <div data-i18n="List">List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <div data-i18n="View">View</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="app-user-view-account.html" class="menu-link">
                <div data-i18n="Account">Account</div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
<?php } ?>

    <li class="menu-item">
        <a href="{{url('user-list')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Users">User Management</div>
        </a>
      </li>

       <li class="menu-item">
        <a href="{{url('allBill')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Bill">Bill</div>
        </a>
      </li>

    </ul>

</aside>