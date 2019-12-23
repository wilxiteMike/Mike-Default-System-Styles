<?

$sidebarNav = array(
    "Dashboard" => array(
        "icon" => "home",
        "pageurl" => "index.php"
    ),
    "Recipients" => array(
        "icon" => "users",
        "pageurl" => "recipients.php"
    ),
    "Groups" => array(
        "icon" => "layer-group",
        "pageurl" => "groups.php"
    ),
    "Emails" => array(
        "icon" => "envelope",
        "pageurl" => "emails.php"
    ),
    "Sender" => array(
        "icon" => "paper-plane",
        "pageurl" => "sender.php"
    ),
    "Analysis" => array(
        "icon" => "file-chart-line",
        "pageurl" => "analysis",
        "submenu" => array(
            "Email Analysis" => array(
                "icon" => "envelope-open",
                "pageurl" => "analysis-emails.php",
            ),
            "Usage" => array(
                "icon" => "chart-bar",
                "pageurl" => "analysis-usage.php"
            ),
            "Activity Logs" => array(
                "icon" => "clipboard-list",
                "pageurl" => "analysis-activity.php"
            )
        )
    ),
    "Settings" => array(
        "icon" => "cogs",
        "pageurl" => "",
        "submenu" => array(
            "Company Settings" => array(
                "icon" => "building",
                "pageurl" => "settings-company.php"
            ),
            "Email Settings" => array(
                "icon" => "envelope-open-text",
                "pageurl" => "settings-emails.php"
            ),
            "Custom Fields" => array(
                "icon" => "stream",
                "pageurl" => "settings-fields.php"
            ),
            "Unsubscribe Page" => array(
                "icon" => "users-cog",
                "pageurl" => "settings-unsubscribe.php",
            )
        )
    )
);

function create_sidebar_menu($menuArray, $active = "") 
{
    $html = "";
    foreach($menuArray as $navTitle => $navDetails) 
    {
        if($navDetails["submenu"]) 
        {
            if(array_key_exists($active, $navDetails["submenu"]))
            {
                $html .= '<div class="sidebar-item has-submenu open">';
            }
            else 
            {
                $html .= '<div class="sidebar-item has-submenu">';
            }
        }
        else 
        {
            if($active == $navTitle) 
            {
                $html .= '<div class="sidebar-item active">';
            } 
            else 
            {
                $html .= '<div class="sidebar-item">';
            }
        }

        if($navDetails["pageurl"] && !$navDetails["submenu"]) 
        { 
            $html .= '<a href="'.$navDetails["pageurl"].'">';
        }
        else if(array_key_exists($active, $navDetails["submenu"]))
        {
            $html .= '<a class="submenu-open">';
        }
        else 
        {
            $html .= '<a>';
        }

        $html .= '<i class="fa-fw fas fa-'.$navDetails["icon"].'"></i> <span>'.$navTitle.'</span></a>';

        if($navDetails["submenu"] && array_key_exists($active, $navDetails["submenu"]))
        { 
            $html .= '<div class="sidebar-submenu open">'.create_sidebar_menu($navDetails["submenu"], $active).'</div>';
        }
        else if($navDetails["submenu"]) 
        {
            $html .= '<div class="sidebar-submenu">'.create_sidebar_menu($navDetails["submenu"]).'</div>';
        }

        $html .= "</div>";
    }
    return $html;
}

function create_active_nav($sidebarNav, $activeNav, $additionalNav = "") 
{
    $text = "";
    if(array_key_exists($activeNav, $sidebarNav))
    {
        $text .= $activeNav;
    }
    else 
    {
        foreach($sidebarNav as $navTitle => $navDetails) 
        {
            if(is_array($navDetails["submenu"]))
            {
                if(array_key_exists($activeNav, $navDetails["submenu"]))
                {
                    $text .= $navTitle." / ".create_active_nav($navDetails["submenu"], $activeNav);
                }
            }
        }
    }
    if($additionalNav && $text)
    {
        $text .= " / ".$additionalNav;
    }
    return $text;
}

?>

<div id="sidebar" class="<?= $_COOKIE["__Host-nav-control"] ? "open" : "" ?>">

    <div class="sidebar-item menu-toggle">
        <a><i class="fa-fw fas fa-bars"></i> <span>Menu</span></a>
    </div>

    <?= create_sidebar_menu($sidebarNav, $activeNav) ?>

</div>  

<div id="nav" class="<?= $_COOKIE["__Host-nav-control"] ? "open" : "" ?>">

    <span id="page-active-nav"><?= create_active_nav($sidebarNav, $activeNav, $additionalNav) ?></span>

    <span id="nav-menu">
        <i class="fas fa-user-circle nav-menu-icon"></i>
        <i class="far fa-chevron-down nav-menu-toggle"></i>
        <ul id="nav-menu-drop">
            <a href="/my-account"><li>My Account</li></a>
            <a href="/my-preferences"><li>Preferences</li></a>
            <hr>
            <a href="login.php"><li>Logout</li></a>
            <div class="menu-arrow"></div>
        </ul>
    </span>

</div>

<script>
        
    $('.menu-toggle').click( function(){

        if($('#sidebar').hasClass('open')) {
            setCookie("nav-control", "0", 900, "/")
        } else {
            setCookie("nav-control", "1", 900, "/")
        }

        $('#sidebar').toggleClass('open');
        $('#nav').toggleClass('open');
        $('#app').toggleClass('open');

    });

    $('.sidebar-item.has-submenu a').click( function(){

        $(this).toggleClass('submenu-open')
        $(this).next('.sidebar-submenu').toggleClass('open');

    });

    $('#nav-menu').click( function(){

        $(this).toggleClass('open');
        $('#nav-menu .nav-menu-toggle').toggleClass('fa-chevron-down');
        $('#nav-menu .nav-menu-toggle').toggleClass('fa-chevron-up');

    });

    function setCookie(cname, cvalue, exdays, expath) {

        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "__Host-" + cname + "=" + cvalue + ";" + expires + ";path=" + expath + ";secure";

    }

    $( function(){

        var nav_control_cookie = <?= $_COOKIE["__Host-nav-control"] ?>;
        var window_width = $(window).width();

        if(window_width <= 768) {
            $('#sidebar').removeClass('open');
            $('#nav').removeClass('open');
            $('#app').removeClass('open');
        }

    });

</script>