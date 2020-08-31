<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/php_project/admin/?controller=admindashboard&action=view" aria-expanded="false"><i class="fa fa-car" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/php_project/admin/?controller=carDetail&action=view" aria-expanded="false"><i class="fa fa-car" aria-hidden="true"></i><span class="hide-menu">View Cars</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/php_project/admin/?controller=rental&action=view" aria-expanded="false"><i class="fa fa-money" aria-hidden="true"></i><span class="hide-menu">Rents Cars</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/php_project/admin/?controller=returnrental&action=view" aria-expanded="false"><i class="fa fa-taxi" aria-hidden="true"></i><span class="hide-menu">Return Cars</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/php_project/admin/?controller=customer&action=view" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">View Client</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/php_project/admin/?controller=employees&action=view" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span class="hide-menu">View employees</span></a></li>
                <?php if (isset($_SESSION['employee'])&& unserialize($_SESSION['employee'])->getLevel()==1): ?>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Admin Reports </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="/php_project/admin/?controller=carsreport&action=view" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Car Report </span></a></li>
                            <li class="sidebar-item"><a href="/php_project/admin/?controller=rentreport&action=view" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Rent Report </span></a></li>
                            <li class="sidebar-item"><a href="/php_project/admin/?controller=customerreport&action=view" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Client Report </span></a></li>
                        </ul>
                    </li>
                <?php endif ?>


                    


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->