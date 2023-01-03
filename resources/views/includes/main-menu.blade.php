<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
            <a href="{{url('/SuperAdmin')}}" class="app-brand-link">
              <img src="{{asset('public/assets/img/logo.png')}}" style="width: 100%;">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
    
    <ul class="menu-inner">
      
        <li class="menu-item active">
        <a href="{{url('SuperAdmin')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>

      <!-- Layouts -->
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="User Management">User Management</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{url('Components/urlGenerated')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-food-menu"></i>
              <div data-i18n="Add Surveyor">Add Surveyor</div>
            </a>
          </li>
           <li class="menu-item">
            <a href="{{url('Master/insurerList')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-menu"></i>
              <div data-i18n="Insurer List">Insurer List</div>
            </a>
          </li>
         
         

          <li class="menu-item">
            <a href="{{url('Components/user-list')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>  
              <div data-i18n="User List">User List</div>
            </a>
          </li>
           
        </ul>
      </li>


      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Components">Plan Management</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{url('Components/SubscriptionPlans')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-menu"></i>
              <div data-i18n="Subscription Plans">Subscription Plans</div>
            </a>
          </li>
          
        </ul>
      </li>

      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Master Settings">Master Settings</div>
        </a>

        <ul class="menu-sub">

           <li class="menu-item">
            <a href="{{url('Master/insurer-master')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-menu"></i>
              <div data-i18n="Insurer Master">Insurer Master</div>
            </a>
          </li>
         
          <li class="menu-item">
            <a href="{{url('Master/insurer-branch-master')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>  
              <div data-i18n="Insurer Branch Master">Insurer Branch Master</div>
            </a>
          </li>
          
          <li class="menu-item">
            <a href="{{url('Master/vehicle-master')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>  
              <div data-i18n="Vehicle Master">Vehicle Master</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{url('Master/master-fees')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-food-menu"></i>
              <div data-i18n="Master Fee">Master Fee</div>
            </a>
          </li> 
          <!-- <li class="menu-item">
            <a href="{{url('Master/garage-master')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>  
              <div data-i18n="Garage Master">Garage Master</div>
            </a>
          </li>-->
          <li class="menu-item">
            <a href="{{url('Master/bank-master')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>  
              <div data-i18n="Bank Master">Bank Master</div>
            </a>
          </li> 

          <li class="menu-item">
            <a href="{{url('Master/part-master')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>  
              <div data-i18n="Part Master">Part Master</div>
            </a>
          </li> 
          
           <li class="menu-item">
            <a href="{{url('Master/sub-part-master')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>  
              <div data-i18n="Sub Part Master">Sub Part Master</div>
            </a>
          </li>  
          
        </ul>
      </li>

      
    </ul>

</aside>