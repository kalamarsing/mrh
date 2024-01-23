<!-- Header -->
<div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">

        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            <img src="images/mws-logo.png" alt="MyRentalHost" onclick="window.location='http://'+window.location.hostname+'/dashboard.php'" style="height:30px;width:300px;background-color:#ffffff;cursor:pointer;">
        </div>
    </div>

    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">




        <?php /*
        <!-- Notifications -->
        <div id="mws-user-notif" class="mws-dropdown-menu">
            <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>

            <!-- Unread notification count -->
            <span class="mws-dropdown-notif">35</span>

            <!-- Notifications dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-notifications">
                        <li class="read">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mws-dropdown-viewall">
                        <a href="#">View All Notifications</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div id="mws-user-message" class="mws-dropdown-menu">
            <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>

            <!-- Unred messages count -->
            <span class="mws-dropdown-notif">35</span>

            <!-- Messages dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-messages">
                        <li class="read">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mws-dropdown-viewall">
                        <a href="#">View All Messages</a>
                    </div>
                </div>
            </div>
        </div>
        */ ?>







        <!-- User Information and functions section -->
        <div id="mws-user-info" class="mws-inset">

            <!-- User Photo -->
            <div id="mws-user-photo">
                <?php if(Auth::user()->image == ''){ ?>
                    <img src="images/profile.png" alt="User Photo">
                <?php }else{ ?>
                    <?php if(Auth::user()->type =='Cliente'){ ?>
                        <img src="images/clientes/<?php echo Auth::user()->image ?>" alt="User Photo">
                    <?php }else{ ?>
                        <img src="images/profiles/<?php echo Auth::user()->image ?>" alt="User Photo">
                    <?php } ?>

                <?php } ?>
            </div>

            <!-- Username and Functions -->
            <div id="mws-user-functions">
                <div id="mws-username">
                    Hello, <?php echo Auth::user()->name ?>
                </div>
                <ul>
                    <?php if(Auth::user()->type =='Cliente'){ ?>
                        <li><a href="/clientec.php#tab-2">Profile</a></li>
                    <?php }else{ ?>
                        <li><a href="/profile.php">Profile</a></li>
                    <?php } ?>
                    <li><a href="/changePassword.php">Change Password</a></li>
                    <li><a href="/cnt/_logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>